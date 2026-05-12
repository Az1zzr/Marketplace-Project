package dao;

import models.Feedback;
import models.User;
import utils.MyDB;
import utils.SessionManager;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class FeedbackDAO {

    public boolean ajouter(Feedback feedback) {
        applyCurrentAuthor(feedback);
        String sql = "INSERT INTO feedback (titre, commentaire, note, ambiance, recommande, date_statut, auteur_id, produit_id, ligne_commande_id, livraison_id) " +
                "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            fillStatement(ps, feedback, false);
            int rows = ps.executeUpdate();
            if (rows > 0) {
                try (ResultSet rs = ps.getGeneratedKeys()) {
                    if (rs.next()) feedback.setId(rs.getInt(1));
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
        String sql = "SELECT id, titre, commentaire, note, ambiance, recommande, date_statut, auteur_id, produit_id, ligne_commande_id, livraison_id " +
                "FROM feedback ORDER BY date_statut DESC, id DESC";
        try (Connection conn = MyDB.getInstance().getConn();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) list.add(mapRow(rs));
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
        applyCurrentAuthor(feedback);
        String sql = "UPDATE feedback SET titre = ?, commentaire = ?, note = ?, ambiance = ?, recommande = ?, " +
                "date_statut = ?, auteur_id = ?, produit_id = ?, ligne_commande_id = ?, livraison_id = ? WHERE id = ?";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            fillStatement(ps, feedback, true);
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur update feedback : " + e.getMessage());
            return false;
        }
    }

    public Feedback getById(int id) {
        String sql = "SELECT id, titre, commentaire, note, ambiance, recommande, date_statut, auteur_id, produit_id, ligne_commande_id, livraison_id " +
                "FROM feedback WHERE id = ?";
        try (Connection conn = MyDB.getInstance().getConn();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) return mapRow(rs);
            }
        } catch (SQLException e) {
            System.err.println("Erreur getById feedback : " + e.getMessage());
        }
        return null;
    }

    private Feedback mapRow(ResultSet rs) throws SQLException {
        Feedback f = new Feedback();
        f.setId(rs.getInt("id"));
        f.setTitre(rs.getString("titre"));
        f.setCommentaire(rs.getString("commentaire"));
        f.setNote(rs.getString("note"));
        f.setAmbiance(rs.getString("ambiance"));
        Object recommande = rs.getObject("recommande");
        f.setRecommande(recommande == null ? null : rs.getBoolean("recommande"));
        Timestamp date = rs.getTimestamp("date_statut");
        if (date != null) f.setDateStatut(new Date(date.getTime()));
        f.setAuteurId(nullableInt(rs, "auteur_id"));
        f.setProduitId(nullableInt(rs, "produit_id"));
        f.setLigneCommandeId(nullableInt(rs, "ligne_commande_id"));
        f.setLivraisonId(nullableInt(rs, "livraison_id"));
        return f;
    }

    private void fillStatement(PreparedStatement ps, Feedback feedback, boolean includeId) throws SQLException {
        ps.setString(1, blankToNull(feedback.getTitre()));
        ps.setString(2, feedback.getCommentaire());
        ps.setString(3, feedback.getNote());
        ps.setString(4, blankToNull(feedback.getAmbiance()));
        if (feedback.getRecommande() == null) ps.setNull(5, Types.BOOLEAN); else ps.setBoolean(5, feedback.getRecommande());
        ps.setTimestamp(6, feedback.getDateStatut() == null ? new Timestamp(System.currentTimeMillis()) : new Timestamp(feedback.getDateStatut().getTime()));
        setNullableInt(ps, 7, feedback.getAuteurId());
        setNullableInt(ps, 8, feedback.getProduitId());
        setNullableInt(ps, 9, feedback.getLigneCommandeId());
        setNullableInt(ps, 10, feedback.getLivraisonId());
        if (includeId) ps.setInt(11, feedback.getId());
    }

    private void applyCurrentAuthor(Feedback feedback) {
        User currentUser = SessionManager.getInstance().getCurrentUser();
        if (feedback.getAuteurId() == null && currentUser != null && currentUser.getId() > 0) {
            feedback.setAuteurId(currentUser.getId());
        }
    }

    private Integer nullableInt(ResultSet rs, String column) throws SQLException {
        int value = rs.getInt(column);
        return rs.wasNull() ? null : value;
    }

    private void setNullableInt(PreparedStatement ps, int index, Integer value) throws SQLException {
        if (value == null || value <= 0) ps.setNull(index, Types.INTEGER); else ps.setInt(index, value);
    }

    private String blankToNull(String value) {
        return value == null || value.isBlank() ? null : value.trim();
    }
}
