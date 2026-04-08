package dao;

import models.Feedback;
import utils.MyDB;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class FeedbackDAO {

    // Pas besoin de garder une connexion en attribut, on la récupère à chaque appel

    public boolean ajouter(Feedback feedback) {
        String sql = "INSERT INTO feedback (commentaire, note, date_statut) VALUES (?, ?, ?)";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, feedback.getCommentaire());
            ps.setString(2, feedback.getNote());
            ps.setDate(3, feedback.getDateStatut());
            int rows = ps.executeUpdate();
            if (rows > 0) {
                try (ResultSet rs = ps.getGeneratedKeys()) {
                    if (rs.next()) {
                        feedback.setId(rs.getInt(1));
                    }
                }
                return true;
            }
        } catch (SQLException e) {
            System.err.println("Erreur ajout feedback : " + e.getMessage());
        }
        return false;
    }

    public List<Feedback> getAll() {
        List<Feedback> list = new ArrayList<>();
        String sql = "SELECT * FROM feedback ORDER BY id DESC";
        try (Connection conn = MyDB.getInstance().getConn();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Feedback f = new Feedback();
                f.setId(rs.getInt("id"));
                f.setCommentaire(rs.getString("commentaire"));
                f.setNote(rs.getString("note"));
                f.setDateStatut(rs.getDate("date_statut"));
                list.add(f);
            }
        } catch (SQLException e) {
            System.err.println("Erreur liste feedbacks : " + e.getMessage());
        }
        return list;
    }

    public boolean supprimer(int id) {
        String sql = "DELETE FROM feedback WHERE id = ?";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setInt(1, id);
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur suppression feedback : " + e.getMessage());
            return false;
        }
    }

    public boolean update(Feedback feedback) {
        String sql = "UPDATE feedback SET commentaire = ?, note = ?, date_statut = ? WHERE id = ?";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setString(1, feedback.getCommentaire());
            ps.setString(2, feedback.getNote());
            ps.setDate(3, feedback.getDateStatut());
            ps.setInt(4, feedback.getId());
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur update feedback : " + e.getMessage());
            return false;
        }
    }

    public Feedback getById(int id) {
        String sql = "SELECT * FROM feedback WHERE id = ?";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    Feedback f = new Feedback();
                    f.setId(rs.getInt("id"));
                    f.setCommentaire(rs.getString("commentaire"));
                    f.setNote(rs.getString("note"));
                    f.setDateStatut(rs.getDate("date_statut"));
                    return f;
                }
            }
        } catch (SQLException e) {
            System.err.println("Erreur getById feedback : " + e.getMessage());
        }
        return null;
    }
}