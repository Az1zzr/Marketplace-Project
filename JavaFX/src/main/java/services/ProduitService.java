package services;

import models.Produit;
import models.User;
import utils.MyConnection;
import utils.SessionManager;

import java.sql.*;
import java.text.Normalizer;
import java.util.ArrayList;
import java.util.List;
import java.util.Locale;

public class ProduitService implements IService<Produit> {

    private final Connection cnx;
    private final CategorieService categorieService = new CategorieService();

    public ProduitService() {
        this.cnx = MyConnection.getInstance().getConnection();
    }

    @Override
    public void add(Produit produit) throws SQLException {
        ajouter(produit);
    }

    @Override
    public void update(Produit produit) throws SQLException {
        modifier(produit, "");
    }

    @Override
    public void delete(Produit produit) throws SQLException {
        supprimer(produit);
    }

    @Override
    public List<Produit> getAll() {
        return recuperer();
    }

    @Override
    public void ajouter(Produit p) {
        int categorieId = p.getCategorieId() > 0 ? p.getCategorieId() : categorieService.getDefaultCategoryId();
        Integer fournisseurId = resolveCurrentSupplierId(p.getFournisseurId());
        String slug = uniqueSlug(p.getNomProduit(), 0);

        String sql = "INSERT INTO produit (nom_produit, adresse, prix, quantite, image_url, slug, categorie_id, fournisseur_id) " +
                "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        try (PreparedStatement ps = cnx.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, p.getNomProduit());
            ps.setString(2, p.getAdresse());
            ps.setDouble(3, p.getPrix());
            ps.setInt(4, p.getQuantite());
            ps.setString(5, blankToNull(p.getImageURL()));
            ps.setString(6, slug);
            ps.setInt(7, categorieId);
            if (fournisseurId == null) ps.setNull(8, Types.INTEGER); else ps.setInt(8, fournisseurId);

            int affectedRows = ps.executeUpdate();
            if (affectedRows > 0) {
                try (ResultSet rs = ps.getGeneratedKeys()) {
                    if (rs.next()) p.setId(rs.getInt(1));
                }
                p.setCategorieId(categorieId);
                p.setFournisseurId(fournisseurId);
                p.setSlug(slug);
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de l'ajout du produit : " + e.getMessage());
        }
    }

    @Override
    public void supprimer(Produit p) {
        String sql = "DELETE FROM produit WHERE id = ?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, p.getId());
            int rowsDeleted = ps.executeUpdate();
            if (rowsDeleted == 0) {
                System.out.println("Aucun produit trouvé avec l'ID: " + p.getId());
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la suppression du produit : " + e.getMessage());
        }
    }

    @Override
    public void modifier(Produit p, String ignored) {
        int categorieId = p.getCategorieId() > 0 ? p.getCategorieId() : categorieService.getDefaultCategoryId();
        Integer fournisseurId = resolveCurrentSupplierId(p.getFournisseurId());
        String slug = uniqueSlug(p.getNomProduit(), p.getId());

        String sql = "UPDATE produit SET nom_produit = ?, adresse = ?, prix = ?, quantite = ?, image_url = ?, " +
                "slug = ?, categorie_id = ?, fournisseur_id = ? WHERE id = ?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, p.getNomProduit());
            ps.setString(2, p.getAdresse());
            ps.setDouble(3, p.getPrix());
            ps.setInt(4, p.getQuantite());
            ps.setString(5, blankToNull(p.getImageURL()));
            ps.setString(6, slug);
            ps.setInt(7, categorieId);
            if (fournisseurId == null) ps.setNull(8, Types.INTEGER); else ps.setInt(8, fournisseurId);
            ps.setInt(9, p.getId());

            int rowsUpdated = ps.executeUpdate();
            if (rowsUpdated == 0) {
                System.out.println("Aucun produit trouvé avec l'ID: " + p.getId());
            } else {
                p.setCategorieId(categorieId);
                p.setFournisseurId(fournisseurId);
                p.setSlug(slug);
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la modification du produit : " + e.getMessage());
        }
    }

    @Override
    public List<Produit> recuperer() {
        List<Produit> produits = new ArrayList<>();
        String sql = baseSelect() + " ORDER BY p.nom_produit ASC";

        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) produits.add(mapRow(rs));
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la récupération des produits : " + e.getMessage());
        }

        return produits;
    }

    public Produit recupererParId(int id) {
        String sql = baseSelect() + " WHERE p.id = ?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) return mapRow(rs);
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la récupération du produit avec l'ID " + id + " : " + e.getMessage());
        }
        return null;
    }

    public List<Produit> recupererPourUtilisateurCourant() {
        User currentUser = SessionManager.getInstance().getCurrentUser();
        if (currentUser == null || !SessionManager.getInstance().isFournisseur()) {
            return recuperer();
        }

        List<Produit> produits = new ArrayList<>();
        String sql = baseSelect() + " WHERE p.fournisseur_id = ? ORDER BY p.nom_produit ASC";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setInt(1, currentUser.getId());
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) produits.add(mapRow(rs));
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la récupération des produits fournisseur : " + e.getMessage());
        }
        return produits;
    }

    private String baseSelect() {
        return "SELECT p.id, p.nom_produit, p.adresse, p.prix, p.quantite, p.image_url, p.slug, " +
                "p.categorie_id, c.nom AS categorie_nom, p.fournisseur_id, " +
                "TRIM(CONCAT(COALESCE(f.prenom, ''), ' ', COALESCE(f.nom, ''))) AS fournisseur_nom " +
                "FROM produit p " +
                "LEFT JOIN categorie c ON c.id = p.categorie_id " +
                "LEFT JOIN user f ON f.id = p.fournisseur_id";
    }

    private Produit mapRow(ResultSet rs) throws SQLException {
        int fournisseurId = rs.getInt("fournisseur_id");
        Integer fournisseur = rs.wasNull() ? null : fournisseurId;
        return new Produit(
                rs.getInt("id"),
                rs.getString("nom_produit"),
                rs.getString("adresse"),
                rs.getDouble("prix"),
                rs.getInt("quantite"),
                rs.getString("image_url"),
                rs.getString("slug"),
                rs.getInt("categorie_id"),
                rs.getString("categorie_nom"),
                fournisseur,
                rs.getString("fournisseur_nom")
        );
    }

    private Integer resolveCurrentSupplierId(Integer fallback) {
        User currentUser = SessionManager.getInstance().getCurrentUser();
        if (currentUser != null && SessionManager.getInstance().isFournisseur()) {
            return currentUser.getId();
        }
        return fallback;
    }

    private String uniqueSlug(String value, int currentId) {
        String base = slugify(value);
        if (base.isBlank()) base = "product";
        String candidate = base;
        int suffix = 2;
        while (slugExists(candidate, currentId)) {
            candidate = base + "-" + suffix++;
        }
        return candidate;
    }

    private boolean slugExists(String slug, int currentId) {
        String sql = "SELECT COUNT(*) FROM produit WHERE slug = ? AND id <> ?";
        try (PreparedStatement ps = cnx.prepareStatement(sql)) {
            ps.setString(1, slug);
            ps.setInt(2, currentId);
            try (ResultSet rs = ps.executeQuery()) {
                return rs.next() && rs.getInt(1) > 0;
            }
        } catch (SQLException e) {
            System.err.println("Erreur vérification slug produit: " + e.getMessage());
            return false;
        }
    }

    private String slugify(String value) {
        String normalized = Normalizer.normalize(value == null ? "" : value, Normalizer.Form.NFD)
                .replaceAll("\\p{M}", "")
                .toLowerCase(Locale.ROOT)
                .replaceAll("[^a-z0-9]+", "-")
                .replaceAll("^-|-$", "");
        return normalized;
    }

    private String blankToNull(String value) {
        return value == null || value.isBlank() ? null : value.trim();
    }
}
