package dao;

import models.Reponse;
import models.User;
import utils.MyDB;
import utils.SessionManager;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ReponseDAO {

    public boolean ajouter(Reponse reponse) {
        applyCurrentAuthor(reponse);
        String sql = "INSERT INTO reponse (contenu, date_reponse, feedback_id, auteur_id) VALUES (?, ?, ?, ?)";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            fillStatement(ps, reponse, false);
            int rows = ps.executeUpdate();
            if (rows > 0) {
                try (ResultSet rs = ps.getGeneratedKeys()) {
                    if (rs.next()) reponse.setId(rs.getInt(1));
                }
                return true;
            }
        } catch (SQLException e) {
            System.err.println("Erreur ajout réponse : " + e.getMessage());
        }
        return false;
    }

    public List<Reponse> getByFeedbackId(int feedbackId) {
        List<Reponse> list = new ArrayList<>();
        String sql = "SELECT id, contenu, date_reponse, feedback_id, auteur_id FROM reponse WHERE feedback_id = ? ORDER BY date_reponse ASC";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setInt(1, feedbackId);
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) list.add(mapRow(rs));
            }
        } catch (SQLException e) {
            System.err.println("Erreur liste réponses : " + e.getMessage());
        }
        return list;
    }

    public boolean update(Reponse reponse) {
        applyCurrentAuthor(reponse);
        String sql = "UPDATE reponse SET contenu = ?, date_reponse = ?, feedback_id = ?, auteur_id = ? WHERE id = ?";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            fillStatement(ps, reponse, true);
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur update réponse : " + e.getMessage());
            return false;
        }
    }

    public boolean supprimer(int id) {
        String sql = "DELETE FROM reponse WHERE id = ?";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setInt(1, id);
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur suppression réponse : " + e.getMessage());
            return false;
        }
    }

    private Reponse mapRow(ResultSet rs) throws SQLException {
        Reponse r = new Reponse();
        r.setId(rs.getInt("id"));
        r.setContenu(rs.getString("contenu"));
        Timestamp date = rs.getTimestamp("date_reponse");
        if (date != null) r.setDateReponse(new Date(date.getTime()));
        r.setFeedbackId(rs.getInt("feedback_id"));
        int auteurId = rs.getInt("auteur_id");
        r.setAuteurId(rs.wasNull() ? null : auteurId);
        return r;
    }

    private void fillStatement(PreparedStatement ps, Reponse reponse, boolean includeId) throws SQLException {
        ps.setString(1, reponse.getContenu());
        ps.setTimestamp(2, reponse.getDateReponse() == null ? new Timestamp(System.currentTimeMillis()) : new Timestamp(reponse.getDateReponse().getTime()));
        ps.setInt(3, reponse.getFeedbackId());
        if (reponse.getAuteurId() == null || reponse.getAuteurId() <= 0) ps.setNull(4, Types.INTEGER); else ps.setInt(4, reponse.getAuteurId());
        if (includeId) ps.setInt(5, reponse.getId());
    }

    private void applyCurrentAuthor(Reponse reponse) {
        User currentUser = SessionManager.getInstance().getCurrentUser();
        if (reponse.getAuteurId() == null && currentUser != null && currentUser.getId() > 0) {
            reponse.setAuteurId(currentUser.getId());
        }
    }
}
