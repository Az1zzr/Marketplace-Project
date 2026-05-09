package services;

import Entities.LigneCommande;
import utils.MyDB2;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class LigneCommandeService {
    private final Connection connection;

    public LigneCommandeService() {
        this.connection = MyDB2.getConnection();
    }

    public List<LigneCommande> findByCommande(int commandeId) {
        List<LigneCommande> lignes = new ArrayList<>();
        String sql = "SELECT lc.id, lc.commande_id, lc.produit_id, p.nom_produit, lc.quantite, lc.prix_unitaire " +
                "FROM ligne_commande lc INNER JOIN produit p ON p.id = lc.produit_id WHERE lc.commande_id = ? ORDER BY lc.id ASC";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setInt(1, commandeId);
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    lignes.add(new LigneCommande(
                            rs.getInt("id"),
                            rs.getInt("commande_id"),
                            rs.getInt("produit_id"),
                            rs.getString("nom_produit"),
                            rs.getInt("quantite"),
                            rs.getDouble("prix_unitaire")
                    ));
                }
            }
        } catch (SQLException e) {
            System.err.println("Erreur récupération lignes commande: " + e.getMessage());
        }
        return lignes;
    }
}
