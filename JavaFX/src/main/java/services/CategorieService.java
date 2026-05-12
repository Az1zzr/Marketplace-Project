package services;

import models.Categorie;
import utils.MyConnection;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class CategorieService {
    private final Connection cnx;

    public CategorieService() {
        this.cnx = MyConnection.getInstance().getConnection();
    }

    public List<Categorie> getAll() {
        List<Categorie> categories = new ArrayList<>();
        String sql = "SELECT id, nom, description FROM categorie ORDER BY nom ASC";
        try (Statement st = cnx.createStatement(); ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) {
                categories.add(mapRow(rs));
            }
        } catch (SQLException e) {
            System.err.println("Erreur récupération catégories: " + e.getMessage());
        }
        return categories;
    }

    public Categorie findById(int id) {
        String sql = "SELECT id, nom, description FROM categorie WHERE id = ?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) return mapRow(rs);
            }
        } catch (SQLException e) {
            System.err.println("Erreur récupération catégorie: " + e.getMessage());
        }
        return null;
    }

    public int getDefaultCategoryId() {
        List<Categorie> categories = getAll();
        if (!categories.isEmpty()) {
            return categories.get(0).getId();
        }

        String sql = "INSERT INTO categorie (nom, description) VALUES (?, ?)";
        try (PreparedStatement ps = cnx.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, "General");
            ps.setString(2, "Default category for products created from JavaFX");
            ps.executeUpdate();
            try (ResultSet keys = ps.getGeneratedKeys()) {
                if (keys.next()) return keys.getInt(1);
            }
        } catch (SQLException e) {
            System.err.println("Erreur création catégorie par défaut: " + e.getMessage());
        }
        return 1;
    }

    private Categorie mapRow(ResultSet rs) throws SQLException {
        return new Categorie(rs.getInt("id"), rs.getString("nom"), rs.getString("description"));
    }
}
