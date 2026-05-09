package services;

import models.Role;
import models.User;
import utils.MyDB;
import utils.PasswordUtil;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class UserService implements IService<User> {

    private Connection conn() { return MyDB.getInstance().getConn(); }

    // ─── ADD ─────────────────────────────────────────────────────────────────
    public void add(User user) throws SQLException {
        // ✅ Hasher le mot de passe
        user.setMotDePasse(PasswordUtil.hash(user.getMotDePasse()));
        if (isAdminRole(user) && countAdmins() >= 1)
            throw new SQLException("Un seul administrateur est autorisé !");

        String sql = "INSERT INTO user (nom, prenom, email, telephone, motDePasse, date_naissance, id_role, photo_profil) " +
                "VALUES (?,?,?,?,?,?,?,?)";
        try (PreparedStatement ps = conn().prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, user.getNom());
            ps.setString(2, user.getPrenom() != null ? user.getPrenom() : "");
            ps.setString(3, user.getEmail().toLowerCase());
            ps.setString(4, user.getTelephone());
            ps.setString(5, user.getMotDePasse());
            ps.setDate(6, user.getDateNaissance() != null ? Date.valueOf(user.getDateNaissance()) : null);
            if (user.getRole() != null) ps.setInt(7, user.getRole().getId_role());
            else ps.setNull(7, Types.INTEGER);
            ps.setString(8, user.getPhotoPath());
            ps.executeUpdate();

            try (ResultSet keys = ps.getGeneratedKeys()) {
                if (keys.next()) user.setId(keys.getInt(1));
            }
        }
    }

    // ─── GET ALL ─────────────────────────────────────────────────────────────
    public List<User> getAll() throws SQLException {
        return query("""
            SELECT u.id, u.nom, u.prenom, u.email, u.telephone, u.motDePasse, u.date_naissance,
                   u.photo_profil, r.id_role, r.nomRole
            FROM user u LEFT JOIN role r ON u.id_role = r.id_role
            ORDER BY u.nom, u.prenom
            """);
    }

    @Override
    public void ajouter(User p) throws SQLException {

    }

    @Override
    public void supprimer(User p) {

    }

    @Override
    public void modifier(User p, String nom) {

    }

    @Override
    public List<User> recuperer() throws SQLException {
        return List.of();
    }

    // ─── GET NON-ADMINS ───────────────────────────────────────────────────────
    public List<User> getNonAdmins() throws SQLException {
        return query("""
            SELECT u.id, u.nom, u.prenom, u.email, u.telephone, u.motDePasse, u.date_naissance,
                   u.photo_profil, r.id_role, r.nomRole
            FROM user u LEFT JOIN role r ON u.id_role = r.id_role
            WHERE LOWER(r.nomRole) != 'admin'
            ORDER BY u.nom, u.prenom
            """);
    }

    // ─── UPDATE ───────────────────────────────────────────────────────────────
    public void update(User user) throws SQLException {
        // ✅ Hasher seulement si pas déjà hashé
        String pwd = user.getMotDePasse();
        if (!pwd.startsWith("$2a$") && !pwd.startsWith("$2b$") && !pwd.startsWith("$argon2")) {
            user.setMotDePasse(PasswordUtil.hash(pwd));
        }
        String sql = "UPDATE user SET nom=?, prenom=?, email=?, telephone=?, motDePasse=?, " +
                "date_naissance=?, id_role=?, photo_profil=? WHERE id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, user.getNom());
            ps.setString(2, user.getPrenom() != null ? user.getPrenom() : "");
            ps.setString(3, user.getEmail().toLowerCase());
            ps.setString(4, user.getTelephone());
            ps.setString(5, user.getMotDePasse());
            ps.setDate(6, user.getDateNaissance() != null ? Date.valueOf(user.getDateNaissance()) : null);
            if (user.getRole() != null) ps.setInt(7, user.getRole().getId_role());
            else ps.setNull(7, Types.INTEGER);
            ps.setString(8, user.getPhotoPath());
            ps.setInt(9, user.getId());

            int rows = ps.executeUpdate();
            if (rows == 0)
                throw new SQLException("Aucun utilisateur mis à jour. ID introuvable : " + user.getId());
        }
    }

    // ─── DELETE ───────────────────────────────────────────────────────────────
    public void delete(User user) throws SQLException {
        if (isAdminRole(user) && countAdmins() <= 1)
            throw new SQLException("Impossible de supprimer le seul administrateur !");
        try (PreparedStatement ps = conn().prepareStatement("DELETE FROM user WHERE id=?")) {
            ps.setInt(1, user.getId());
            ps.executeUpdate();
        }
    }

    // ─── AUTHENTICATE ─────────────────────────────────────────────────────────
    public User authenticate(String email, String password) throws SQLException {
        String sql = """
            SELECT u.id, u.nom, u.prenom, u.email, u.telephone, u.motDePasse, u.date_naissance,
            u.photo_profil, r.id_role, r.nomRole
            FROM user u LEFT JOIN role r ON u.id_role = r.id_role
            WHERE u.email = ?
            """;
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, email.toLowerCase());
            System.err.println("[AUTH] Looking up email: " + email.toLowerCase());
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    User user = mapRow(rs);
                    System.err.println("[AUTH] User found: id=" + user.getId() + " email=" + user.getEmail() + " hashPrefix=" + user.getMotDePasse().substring(0, Math.min(10, user.getMotDePasse().length())) + " hashLen=" + user.getMotDePasse().length());
                    boolean ok = PasswordUtil.verify(password, user.getMotDePasse());
                    System.err.println("[AUTH] Password verify result: " + ok);
                    if (ok) return user;
                } else {
                    System.err.println("[AUTH] No user found with email: " + email.toLowerCase());
                }
            }
        } catch (SQLException e) {
            System.err.println("[AUTH] SQL Error: " + e.getMessage());
            throw e;
        }
        return null;
    }

    // ─── HELPERS ──────────────────────────────────────────────────────────────
    private List<User> query(String sql) throws SQLException {
        List<User> list = new ArrayList<>();
        try (Statement st = conn().createStatement(); ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) list.add(mapRow(rs));
        }
        return list;
    }

    // ✅ "admin" au lieu de "Administrateur"
    private boolean isAdminRole(User user) {
        return user.getRole() != null
                && user.getRole().getNomRole().equalsIgnoreCase("admin");
    }

    // ✅ "admin" au lieu de "administrateur"
    private int countAdmins() throws SQLException {
        String sql = "SELECT COUNT(*) FROM user u JOIN role r ON u.id_role=r.id_role " +
                "WHERE LOWER(r.nomRole)='admin'";
        try (Statement st = conn().createStatement(); ResultSet rs = st.executeQuery(sql)) {
            return rs.next() ? rs.getInt(1) : 0;
        }
    }

    private User mapRow(ResultSet rs) throws SQLException {
        User u = new User();
        u.setId(rs.getInt("id"));
        u.setNom(rs.getString("nom"));
        u.setPrenom(rs.getString("prenom"));
        u.setEmail(rs.getString("email"));
        try { u.setTelephone(rs.getString("telephone")); } catch (SQLException ignored) {}
        u.setMotDePasse(rs.getString("motDePasse"));
        Date ddn = rs.getDate("date_naissance");
        if (ddn != null) u.setDateNaissance(ddn.toLocalDate());
        try { u.setPhotoPath(rs.getString("photo_profil")); } catch (SQLException ignored) {}
        int idRole = rs.getInt("id_role");
        if (!rs.wasNull()) {
            Role r = new Role();
            r.setId_role(idRole);
            r.setNomRole(rs.getString("nomRole"));
            u.setRole(r);
        }
        return u;
    }

    public User findByPhone(String phone) throws SQLException {
        // Nettoyer le numéro reçu (supprimer tout sauf chiffres et +)
        String cleaned = phone.replaceAll("[^0-9+]", "");

        // Extraire uniquement les 8 derniers chiffres (format local tunisien)
        String localFormat = cleaned.replaceAll("^\\+?216", ""); // retire +216 ou 216 en tête

        String sql = """
        SELECT u.id, u.nom, u.prenom, u.email, u.telephone, u.motDePasse,
               u.date_naissance, u.photo_profil, r.id_role, r.nomRole
        FROM user u LEFT JOIN role r ON u.id_role = r.id_role
        WHERE REPLACE(REPLACE(REPLACE(u.telephone, ' ', ''), '-', ''), '+216', '') = ?
           OR REPLACE(REPLACE(u.telephone, ' ', ''), '-', '') = ?
           OR REPLACE(REPLACE(u.telephone, ' ', ''), '-', '') = ?
        """;
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, localFormat);          // ex: 20123456 → cherche 20123456 en base
            ps.setString(2, cleaned);              // ex: +21620123456 → cherche tel exact
            ps.setString(3, "216" + localFormat);  // ex: 21620123456
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) return mapRow(rs);
            }
        }
        return null;
    }

    public User findByEmail(String email) throws SQLException {
        String sql = """
        SELECT u.id, u.nom, u.prenom, u.email, u.telephone, u.motDePasse, 
               u.date_naissance, u.photo_profil, r.id_role, r.nomRole
        FROM user u LEFT JOIN role r ON u.id_role = r.id_role
        WHERE u.email = ?
        """;
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, email.toLowerCase());
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) return mapRow(rs);
            }
        }
        return null;
    }
    public void updateProfilePhoto(int userId, String imagePath) throws Exception {

        boolean isSensitive = ImageValidator.isImageSensitive(imagePath);

        if (isSensitive) {
            throw new Exception("❌ Image sensible détectée ! Veuillez choisir une autre photo.");
        }

        // Mettre à jour la photo en base de données
        String sql = "UPDATE user SET photo_profil=? WHERE id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, imagePath);
            ps.setInt(2, userId);
            ps.executeUpdate();
        }
    }
}
