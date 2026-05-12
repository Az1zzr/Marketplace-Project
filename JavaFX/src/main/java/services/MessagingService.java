package services;

import models.Conversation;
import models.ConversationMessage;
import models.User;
import utils.MyDB;
import utils.SessionManager;

import java.sql.*;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class MessagingService {

    private Connection conn() { return MyDB.getInstance().getConn(); }

    public List<Conversation> findConversationsForCurrentUser() {
        User user = requireUser();
        String sql = "SELECT c.id, c.client_id, c.fournisseur_id, c.produit_id, c.commande_id, c.created_at, c.last_message_at, " +
                "TRIM(CONCAT(COALESCE(client.prenom, ''), ' ', COALESCE(client.nom, ''))) AS client_name, " +
                "TRIM(CONCAT(COALESCE(fournisseur.prenom, ''), ' ', COALESCE(fournisseur.nom, ''))) AS fournisseur_name, " +
                "p.nom_produit AS produit_name, " +
                "(SELECT cm.content FROM conversation_message cm WHERE cm.conversation_id = c.id ORDER BY cm.created_at DESC, cm.id DESC LIMIT 1) AS last_message, " +
                "(SELECT COUNT(*) FROM conversation_message unread WHERE unread.conversation_id = c.id AND unread.sender_id <> ? AND unread.read_at IS NULL) AS unread_count " +
                "FROM conversation c " +
                "INNER JOIN user client ON client.id = c.client_id " +
                "INNER JOIN user fournisseur ON fournisseur.id = c.fournisseur_id " +
                "LEFT JOIN produit p ON p.id = c.produit_id " +
                "WHERE c.client_id = ? OR c.fournisseur_id = ? " +
                "ORDER BY c.last_message_at DESC, c.id DESC";
        List<Conversation> conversations = new ArrayList<>();
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, user.getId());
            ps.setInt(2, user.getId());
            ps.setInt(3, user.getId());
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) conversations.add(mapConversation(rs));
            }
        } catch (SQLException e) {
            System.err.println("Erreur récupération conversations: " + e.getMessage());
        }
        return conversations;
    }

    public List<User> findAvailableSuppliers() {
        String sql = "SELECT DISTINCT u.id, u.nom, u.prenom, u.email, u.telephone, u.motDePasse, u.date_naissance, u.photo_profil, r.id_role, r.nomRole " +
                "FROM user u INNER JOIN role r ON r.id_role = u.id_role INNER JOIN produit p ON p.fournisseur_id = u.id " +
                "WHERE LOWER(r.nomRole) IN ('fournisseur', 'fournisseurs', 'supplier', 'suppliers') ORDER BY u.nom, u.prenom";
        List<User> suppliers = new ArrayList<>();
        try (PreparedStatement ps = conn().prepareStatement(sql); ResultSet rs = ps.executeQuery()) {
            while (rs.next()) suppliers.add(mapUser(rs));
        } catch (SQLException e) {
            System.err.println("Erreur récupération fournisseurs: " + e.getMessage());
        }
        return suppliers;
    }

    public Conversation startConversation(int fournisseurId) {
        User user = requireUser();
        if (!SessionManager.getInstance().isClient()) {
            throw new IllegalStateException("Seuls les clients peuvent démarrer une conversation.");
        }

        Conversation existing = findDirectConversation(user.getId(), fournisseurId);
        if (existing != null) return existing;

        String sql = "INSERT INTO conversation (client_id, fournisseur_id, created_at, last_message_at) VALUES (?, ?, NOW(), NOW())";
        try (PreparedStatement ps = conn().prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setInt(1, user.getId());
            ps.setInt(2, fournisseurId);
            ps.executeUpdate();
            try (ResultSet keys = ps.getGeneratedKeys()) {
                if (keys.next()) return findConversationById(keys.getInt(1));
            }
        } catch (SQLException e) {
            Conversation raceWinner = findDirectConversation(user.getId(), fournisseurId);
            if (raceWinner != null) return raceWinner;
            throw new IllegalStateException("Impossible de créer la conversation: " + e.getMessage(), e);
        }
        return null;
    }

    public Conversation findConversationById(int id) {
        User user = requireUser();
        String sql = "SELECT c.id, c.client_id, c.fournisseur_id, c.produit_id, c.commande_id, c.created_at, c.last_message_at, " +
                "TRIM(CONCAT(COALESCE(client.prenom, ''), ' ', COALESCE(client.nom, ''))) AS client_name, " +
                "TRIM(CONCAT(COALESCE(fournisseur.prenom, ''), ' ', COALESCE(fournisseur.nom, ''))) AS fournisseur_name, " +
                "p.nom_produit AS produit_name, NULL AS last_message, 0 AS unread_count " +
                "FROM conversation c INNER JOIN user client ON client.id = c.client_id INNER JOIN user fournisseur ON fournisseur.id = c.fournisseur_id " +
                "LEFT JOIN produit p ON p.id = c.produit_id WHERE c.id = ? AND (c.client_id = ? OR c.fournisseur_id = ?)";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, id);
            ps.setInt(2, user.getId());
            ps.setInt(3, user.getId());
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) return mapConversation(rs);
            }
        } catch (SQLException e) {
            System.err.println("Erreur récupération conversation: " + e.getMessage());
        }
        return null;
    }

    public List<ConversationMessage> findMessages(int conversationId) {
        User user = requireUser();
        Conversation conversation = findConversationById(conversationId);
        if (conversation == null) return List.of();

        String sql = "SELECT m.id, m.conversation_id, m.sender_id, TRIM(CONCAT(COALESCE(u.prenom, ''), ' ', COALESCE(u.nom, ''))) AS sender_name, " +
                "m.content, m.created_at, m.read_at FROM conversation_message m INNER JOIN user u ON u.id = m.sender_id " +
                "WHERE m.conversation_id = ? ORDER BY m.created_at ASC, m.id ASC";
        List<ConversationMessage> messages = new ArrayList<>();
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, conversationId);
            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) messages.add(mapMessage(rs));
            }
        } catch (SQLException e) {
            System.err.println("Erreur récupération messages: " + e.getMessage());
        }

        markMessagesRead(conversationId, user.getId());
        return messages;
    }

    public boolean sendMessage(int conversationId, String content) {
        User user = requireUser();
        if (content == null || content.trim().length() < 1) return false;
        if (content.trim().length() > 2000) throw new IllegalArgumentException("Message trop long.");
        if (findConversationById(conversationId) == null) return false;

        String insert = "INSERT INTO conversation_message (conversation_id, sender_id, content, created_at) VALUES (?, ?, ?, NOW())";
        String touch = "UPDATE conversation SET last_message_at = NOW() WHERE id = ?";
        try (PreparedStatement ps = conn().prepareStatement(insert); PreparedStatement touchPs = conn().prepareStatement(touch)) {
            ps.setInt(1, conversationId);
            ps.setInt(2, user.getId());
            ps.setString(3, content.trim());
            ps.executeUpdate();
            touchPs.setInt(1, conversationId);
            touchPs.executeUpdate();
            return true;
        } catch (SQLException e) {
            System.err.println("Erreur envoi message: " + e.getMessage());
            return false;
        }
    }

    private Conversation findDirectConversation(int clientId, int fournisseurId) {
        String sql = "SELECT id FROM conversation WHERE client_id = ? AND fournisseur_id = ?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, clientId);
            ps.setInt(2, fournisseurId);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) return findConversationById(rs.getInt("id"));
            }
        } catch (SQLException e) {
            System.err.println("Erreur conversation directe: " + e.getMessage());
        }
        return null;
    }

    private void markMessagesRead(int conversationId, int viewerId) {
        String sql = "UPDATE conversation_message SET read_at = NOW() WHERE conversation_id = ? AND sender_id <> ? AND read_at IS NULL";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, conversationId);
            ps.setInt(2, viewerId);
            ps.executeUpdate();
        } catch (SQLException e) {
            System.err.println("Erreur lecture messages: " + e.getMessage());
        }
    }

    private Conversation mapConversation(ResultSet rs) throws SQLException {
        Conversation c = new Conversation();
        c.setId(rs.getInt("id"));
        c.setClientId(rs.getInt("client_id"));
        c.setFournisseurId(rs.getInt("fournisseur_id"));
        c.setProduitId(nullableInt(rs, "produit_id"));
        c.setCommandeId(nullableInt(rs, "commande_id"));
        c.setClientName(rs.getString("client_name"));
        c.setFournisseurName(rs.getString("fournisseur_name"));
        c.setProduitName(rs.getString("produit_name"));
        c.setCreatedAt(toLocalDateTime(rs.getTimestamp("created_at")));
        c.setLastMessageAt(toLocalDateTime(rs.getTimestamp("last_message_at")));
        c.setLastMessage(rs.getString("last_message"));
        c.setUnreadCount(rs.getInt("unread_count"));
        return c;
    }

    private ConversationMessage mapMessage(ResultSet rs) throws SQLException {
        ConversationMessage m = new ConversationMessage();
        m.setId(rs.getInt("id"));
        m.setConversationId(rs.getInt("conversation_id"));
        m.setSenderId(rs.getInt("sender_id"));
        m.setSenderName(rs.getString("sender_name"));
        m.setContent(rs.getString("content"));
        m.setCreatedAt(toLocalDateTime(rs.getTimestamp("created_at")));
        m.setReadAt(toLocalDateTime(rs.getTimestamp("read_at")));
        return m;
    }

    private User mapUser(ResultSet rs) throws SQLException {
        User u = new User();
        u.setId(rs.getInt("id"));
        u.setNom(rs.getString("nom"));
        u.setPrenom(rs.getString("prenom"));
        u.setEmail(rs.getString("email"));
        u.setTelephone(rs.getString("telephone"));
        u.setMotDePasse(rs.getString("motDePasse"));
        Date birthDate = rs.getDate("date_naissance");
        if (birthDate != null) u.setDateNaissance(birthDate.toLocalDate());
        models.Role role = new models.Role();
        role.setId_role(rs.getInt("id_role"));
        role.setNomRole(rs.getString("nomRole"));
        u.setRole(role);
        u.setPhotoPath(rs.getString("photo_profil"));
        return u;
    }

    private Integer nullableInt(ResultSet rs, String column) throws SQLException {
        int value = rs.getInt(column);
        return rs.wasNull() ? null : value;
    }

    private LocalDateTime toLocalDateTime(Timestamp timestamp) {
        return timestamp == null ? null : timestamp.toLocalDateTime();
    }

    private User requireUser() {
        User user = SessionManager.getInstance().getCurrentUser();
        if (user == null || user.getId() <= 0) throw new IllegalStateException("Utilisateur non connecté.");
        return user;
    }
}
