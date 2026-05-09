package services;

import Entities.Livraison;
import models.User;
import utils.MyDB2;
import utils.SessionManager;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class LivraisonService implements ILivraisonService {

    private final Connection connection;

    public LivraisonService() {
        this.connection = MyDB2.getConnection();
    }

    @Override
    public boolean ajouter(Livraison livraison) {
        String sql = "INSERT INTO livraison (idCommande, numeroBL, dateLivraison, livreur, statutLivraison, noteDelivery, latitude, longitude) " +
                "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        try (PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            fillStatement(ps, livraison, false);
            int rowsInserted = ps.executeUpdate();
            if (rowsInserted > 0) {
                try (ResultSet keys = ps.getGeneratedKeys()) {
                    if (keys.next()) livraison.setIdLivraison(keys.getInt(1));
                }
                return true;
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de l'ajout de la livraison: " + e.getMessage());
        }
        return false;
    }

    @Override
    public boolean modifier(Livraison livraison) {
        String sql = "UPDATE livraison SET idCommande = ?, numeroBL = ?, dateLivraison = ?, livreur = ?, " +
                "statutLivraison = ?, noteDelivery = ?, latitude = ?, longitude = ? WHERE idLivraison = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            fillStatement(ps, livraison, true);
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur lors de la modification de la livraison: " + e.getMessage());
        }
        return false;
    }

    @Override
    public boolean supprimer(int idLivraison) {
        String sql = "DELETE FROM livraison WHERE idLivraison = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setInt(1, idLivraison);
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur lors de la suppression de la livraison: " + e.getMessage());
        }
        return false;
    }

    @Override
    public List<Livraison> afficher() {
        User user = SessionManager.getInstance().getCurrentUser();
        StringBuilder sql = new StringBuilder("SELECT DISTINCT l.* FROM livraison l INNER JOIN commande c ON c.idCommande = l.idCommande");
        List<Object> params = new ArrayList<>();

        if (user != null && SessionManager.getInstance().isClient()) {
            sql.append(" WHERE c.client_user_id = ?");
            params.add(user.getId());
        } else if (user != null && SessionManager.getInstance().isFournisseur()) {
            sql.append(" INNER JOIN ligne_commande lc ON lc.commande_id = c.idCommande INNER JOIN produit p ON p.id = lc.produit_id WHERE p.fournisseur_id = ?");
            params.add(user.getId());
        }

        sql.append(" ORDER BY l.dateLivraison DESC, l.idLivraison DESC");
        return query(sql.toString(), params);
    }

    @Override
    public Livraison rechercherParId(int idLivraison) {
        List<Livraison> result = query("SELECT * FROM livraison WHERE idLivraison = ?", List.of(idLivraison));
        return result.isEmpty() ? null : result.get(0);
    }

    @Override
    public Livraison rechercherParIdCommande(int idCommande) {
        List<Livraison> result = query("SELECT * FROM livraison WHERE idCommande = ?", List.of(idCommande));
        return result.isEmpty() ? null : result.get(0);
    }

    @Override
    public Livraison rechercherParNumeroBL(String numeroBL) {
        List<Livraison> result = query("SELECT * FROM livraison WHERE numeroBL = ?", List.of(numeroBL));
        return result.isEmpty() ? null : result.get(0);
    }

    @Override
    public List<Livraison> rechercherParLivreur(String livreur) {
        return query("SELECT * FROM livraison WHERE livreur LIKE ? ORDER BY dateLivraison DESC", List.of("%" + livreur + "%"));
    }

    @Override
    public List<Livraison> rechercherParStatut(String statut) {
        return query("SELECT * FROM livraison WHERE statutLivraison = ? ORDER BY dateLivraison DESC", List.of(normalizeStatus(statut)));
    }

    private List<Livraison> query(String sql, List<Object> params) {
        List<Livraison> livraisons = new ArrayList<>();
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            for (int i = 0; i < params.size(); i++) ps.setObject(i + 1, params.get(i));
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) livraisons.add(mapRow(rs));
            }
        } catch (SQLException e) {
            System.err.println("Erreur récupération livraisons: " + e.getMessage());
        }
        return livraisons;
    }

    private Livraison mapRow(ResultSet rs) throws SQLException {
        return new Livraison(
                rs.getInt("idLivraison"),
                rs.getInt("idCommande"),
                rs.getString("numeroBL"),
                rs.getDate("dateLivraison") == null ? null : rs.getDate("dateLivraison").toLocalDate(),
                rs.getString("livreur"),
                rs.getString("statutLivraison"),
                rs.getString("noteDelivery"),
                rs.getDouble("latitude"),
                rs.getDouble("longitude")
        );
    }

    private void fillStatement(PreparedStatement ps, Livraison livraison, boolean includeId) throws SQLException {
        ps.setInt(1, livraison.getIdCommande());
        ps.setString(2, livraison.getNumeroBL());
        ps.setDate(3, Date.valueOf(livraison.getDateLivraison() == null ? java.time.LocalDate.now() : livraison.getDateLivraison()));
        ps.setString(4, livraison.getLivreur());
        ps.setString(5, normalizeStatus(livraison.getStatutLivraison()));
        ps.setString(6, livraison.getNoteDelivery());
        ps.setDouble(7, livraison.getLatitude());
        ps.setDouble(8, livraison.getLongitude());
        if (includeId) ps.setInt(9, livraison.getIdLivraison());
    }

    private String normalizeStatus(String status) {
        if (status == null || status.isBlank()) return "En cours";
        return switch (status.trim()) {
            case "Livré", "Livree" -> "Livree";
            case "Retardé", "Retardee" -> "Retardee";
            default -> status.trim();
        };
    }
}
