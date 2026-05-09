package models;

import java.time.LocalDateTime;

public class Conversation {
    private int id;
    private int clientId;
    private int fournisseurId;
    private Integer produitId;
    private Integer commandeId;
    private String clientName;
    private String fournisseurName;
    private String produitName;
    private LocalDateTime createdAt;
    private LocalDateTime lastMessageAt;
    private String lastMessage;
    private int unreadCount;

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }
    public int getClientId() { return clientId; }
    public void setClientId(int clientId) { this.clientId = clientId; }
    public int getFournisseurId() { return fournisseurId; }
    public void setFournisseurId(int fournisseurId) { this.fournisseurId = fournisseurId; }
    public Integer getProduitId() { return produitId; }
    public void setProduitId(Integer produitId) { this.produitId = produitId; }
    public Integer getCommandeId() { return commandeId; }
    public void setCommandeId(Integer commandeId) { this.commandeId = commandeId; }
    public String getClientName() { return clientName; }
    public void setClientName(String clientName) { this.clientName = clientName; }
    public String getFournisseurName() { return fournisseurName; }
    public void setFournisseurName(String fournisseurName) { this.fournisseurName = fournisseurName; }
    public String getProduitName() { return produitName; }
    public void setProduitName(String produitName) { this.produitName = produitName; }
    public LocalDateTime getCreatedAt() { return createdAt; }
    public void setCreatedAt(LocalDateTime createdAt) { this.createdAt = createdAt; }
    public LocalDateTime getLastMessageAt() { return lastMessageAt; }
    public void setLastMessageAt(LocalDateTime lastMessageAt) { this.lastMessageAt = lastMessageAt; }
    public String getLastMessage() { return lastMessage; }
    public void setLastMessage(String lastMessage) { this.lastMessage = lastMessage; }
    public int getUnreadCount() { return unreadCount; }
    public void setUnreadCount(int unreadCount) { this.unreadCount = unreadCount; }

    public String displayNameFor(User viewer) {
        if (viewer != null && viewer.getId() == clientId) return fournisseurName;
        return clientName;
    }

    @Override
    public String toString() {
        String unread = unreadCount > 0 ? " (" + unreadCount + ")" : "";
        return (fournisseurName == null ? "Conversation #" + id : fournisseurName) + unread;
    }
}
