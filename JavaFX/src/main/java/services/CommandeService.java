package services;

import Entities.Commande;
import models.User;
import utils.MyDB2;
import utils.SessionManager;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class CommandeService implements ICommandeService {

    private final Connection connection;

    public CommandeService() {
        this.connection = MyDB2.getConnection();
    }

    @Override
    public boolean ajouter(Commande commande) {
        User currentUser = SessionManager.getInstance().getCurrentUser();
        if (commande.getClientUserId() == null && currentUser != null && currentUser.getId() > 0) {
            commande.setClientUserId(currentUser.getId());
            if (isBlank(commande.getClient())) {
                commande.setClient(currentUser.getNomComplet());
            }
        }

        String sql = "INSERT INTO commande (numeroCommande, client, client_user_id, dateCommande, montantTotal, " +
                "adresseLivraison, statut, gouvernorat, telephoneLivraison, commentaireLivraison) " +
                "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try (PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            fillStatement(ps, commande, false);
            int rowsInserted = ps.executeUpdate();
            if (rowsInserted > 0) {
                try (ResultSet keys = ps.getGeneratedKeys()) {
                    if (keys.next()) commande.setIdCommande(keys.getInt(1));
                }
                return true;
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de l'ajout de la commande: " + e.getMessage());
        }
        return false;
    }

    @Override
    public boolean modifier(Commande commande) {
        String sql = "UPDATE commande SET numeroCommande = ?, client = ?, client_user_id = ?, dateCommande = ?, " +
                "montantTotal = ?, adresseLivraison = ?, statut = ?, gouvernorat = ?, telephoneLivraison = ?, " +
                "commentaireLivraison = ? WHERE idCommande = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            fillStatement(ps, commande, true);
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur lors de la modification de la commande: " + e.getMessage());
        }
        return false;
    }

    @Override
    public boolean supprimer(int idCommande) {
        String sql = "DELETE FROM commande WHERE idCommande = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setInt(1, idCommande);
            return ps.executeUpdate() > 0;
        } catch (SQLException e) {
            System.err.println("Erreur lors de la suppression de la commande: " + e.getMessage());
        }
        return false;
    }

    @Override
    public List<Commande> afficher() {
        User user = SessionManager.getInstance().getCurrentUser();
        StringBuilder sql = new StringBuilder(baseSelect());
        List<Object> params = new ArrayList<>();

        sql.append(" WHERE c.statut <> ?");
        params.add("Panier");

        if (user != null && SessionManager.getInstance().isClient()) {
            sql.append(" AND c.client_user_id = ?");
            params.add(user.getId());
        } else if (user != null && SessionManager.getInstance().isFournisseur()) {
            sql.append(" AND EXISTS (SELECT 1 FROM ligne_commande lc INNER JOIN produit p ON p.id = lc.produit_id WHERE lc.commande_id = c.idCommande AND p.fournisseur_id = ?)");
            params.add(user.getId());
        }

        sql.append(" ORDER BY c.dateCommande DESC, c.idCommande DESC");
        return query(sql.toString(), params);
    }

    @Override
    public Commande rechercherParId(int idCommande) {
        List<Commande> result = query(baseSelect() + " WHERE c.idCommande = ?", List.of(idCommande));
        return result.isEmpty() ? null : result.get(0);
    }

    @Override
    public Commande rechercherParNumero(String numeroCommande) {
        List<Commande> result = query(baseSelect() + " WHERE c.numeroCommande = ?", List.of(numeroCommande));
        return result.isEmpty() ? null : result.get(0);
    }

    @Override
    public List<Commande> rechercherParClient(String client) {
        return query(baseSelect() + " WHERE c.client LIKE ? ORDER BY c.dateCommande DESC", List.of("%" + client + "%"));
    }

    public List<Commande> afficherCommandesSansLivraison() {
        return query(baseSelect() + " WHERE c.statut <> ? AND NOT EXISTS (SELECT 1 FROM livraison l WHERE l.idCommande = c.idCommande) ORDER BY c.dateCommande DESC", List.of("Panier"));
    }

    private String baseSelect() {
        return "SELECT c.idCommande, c.numeroCommande, c.client, c.client_user_id, c.dateCommande, c.montantTotal, " +
                "c.adresseLivraison, c.statut, c.gouvernorat, c.telephoneLivraison, c.commentaireLivraison FROM commande c";
    }

    private List<Commande> query(String sql, List<Object> params) {
        List<Commande> commandes = new ArrayList<>();
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            for (int i = 0; i < params.size(); i++) {
                ps.setObject(i + 1, params.get(i));
            }
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) commandes.add(mapRow(rs));
            }
        } catch (SQLException e) {
            System.err.println("Erreur récupération commandes: " + e.getMessage());
        }
        return commandes;
    }

    private Commande mapRow(ResultSet rs) throws SQLException {
        Commande commande = new Commande(
                rs.getInt("idCommande"),
                rs.getString("numeroCommande"),
                rs.getString("client"),
                rs.getDate("dateCommande") == null ? null : rs.getDate("dateCommande").toLocalDate(),
                rs.getDouble("montantTotal"),
                rs.getString("adresseLivraison"),
                rs.getString("statut")
        );
        int clientUserId = rs.getInt("client_user_id");
        commande.setClientUserId(rs.wasNull() ? null : clientUserId);
        commande.setGouvernorat(rs.getString("gouvernorat"));
        commande.setTelephoneLivraison(rs.getString("telephoneLivraison"));
        commande.setCommentaireLivraison(rs.getString("commentaireLivraison"));
        return commande;
    }

    private void fillStatement(PreparedStatement ps, Commande commande, boolean includeId) throws SQLException {
        ps.setString(1, commande.getNumeroCommande());
        ps.setString(2, commande.getClient());
        if (commande.getClientUserId() == null) ps.setNull(3, Types.INTEGER); else ps.setInt(3, commande.getClientUserId());
        ps.setDate(4, Date.valueOf(commande.getDateCommande() == null ? java.time.LocalDate.now() : commande.getDateCommande()));
        ps.setDouble(5, commande.getMontantTotal());
        ps.setString(6, commande.getAdresseLivraison() == null ? "" : commande.getAdresseLivraison());
        ps.setString(7, normalizeStatus(commande.getStatut()));
        ps.setString(8, blankToNull(commande.getGouvernorat()));
        ps.setString(9, blankToNull(commande.getTelephoneLivraison()));
        ps.setString(10, blankToNull(commande.getCommentaireLivraison()));
        if (includeId) ps.setInt(11, commande.getIdCommande());
    }

    private String normalizeStatus(String status) {
        if (status == null || status.isBlank()) return "En attente";
        return switch (status.trim()) {
            case "Confirmée" -> "Confirmee";
            case "Annulée" -> "Annulee";
            default -> status.trim();
        };
    }

    private String blankToNull(String value) {
        return isBlank(value) ? null : value.trim();
    }

    private boolean isBlank(String value) {
        return value == null || value.isBlank();
    }
}
