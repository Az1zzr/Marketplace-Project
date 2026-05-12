package services;

import models.Stock;
import utils.MyConnection;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class StockService implements IService<Stock> {

    private final Connection cnx;

    public StockService() {
        this.cnx = MyConnection.getInstance().getConnection();
    }

    @Override
    public void add(Stock stock) throws SQLException { ajouter(stock); }

    @Override
    public void update(Stock stock) throws SQLException { modifier(stock, ""); }

    @Override
    public void delete(Stock stock) throws SQLException { supprimer(stock); }

    @Override
    public List<Stock> getAll() { return recuperer(); }

    @Override
    public void ajouter(Stock s) {
        updateProduitQuantite(s.getProduitId(), s.getQuantite());
        s.setId(s.getProduitId());
    }

    @Override
    public void supprimer(Stock s) {
        int produitId = s.getProduitId() > 0 ? s.getProduitId() : s.getId();
        updateProduitQuantite(produitId, 0);
    }

    @Override
    public void modifier(Stock s, String ignored) {
        int produitId = s.getProduitId() > 0 ? s.getProduitId() : s.getId();
        updateProduitQuantite(produitId, s.getQuantite());
        s.setId(produitId);
    }

    @Override
    public List<Stock> recuperer() {
        List<Stock> stocks = new ArrayList<>();
        String sql = "SELECT id, id AS produit_id, quantite FROM produit ORDER BY id ASC";
        try (Statement st = cnx.createStatement(); ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) {
                stocks.add(new Stock(rs.getInt("id"), rs.getInt("produit_id"), rs.getInt("quantite")));
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la récupération des quantités produit : " + e.getMessage());
        }
        return stocks;
    }

    public Stock recupererParId(int id) {
        return recupererParProduitId(id);
    }

    public Stock recupererParProduitId(int produitId) {
        String sql = "SELECT id, id AS produit_id, quantite FROM produit WHERE id = ?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, produitId);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) return new Stock(rs.getInt("id"), rs.getInt("produit_id"), rs.getInt("quantite"));
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la récupération de la quantité produit " + produitId + " : " + e.getMessage());
        }
        return null;
    }

    private void updateProduitQuantite(int produitId, int quantite) {
        String sql = "UPDATE produit SET quantite = ? WHERE id = ?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, Math.max(0, quantite));
            ps.setInt(2, produitId);
            int updated = ps.executeUpdate();
            if (updated == 0) {
                System.out.println("Aucun produit trouvé avec l'ID: " + produitId);
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la mise à jour quantité produit: " + e.getMessage());
        }
    }
}
