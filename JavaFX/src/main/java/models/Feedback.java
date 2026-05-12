package models;

import java.sql.Date;

public class Feedback {

    private int id;
    private String titre;
    private String commentaire;
    private String note;
    private String ambiance;
    private Boolean recommande;
    private Date dateStatut;
    private Integer auteurId;
    private Integer produitId;
    private Integer ligneCommandeId;
    private Integer livraisonId;

    public Feedback() {
    }

    public Feedback(String commentaire, String note, Date dateStatut) {
        this.commentaire = commentaire;
        this.note = note;
        this.dateStatut = dateStatut;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }
    public String getTitre() { return titre; }
    public void setTitre(String titre) { this.titre = titre; }
    public String getCommentaire() { return commentaire; }
    public void setCommentaire(String commentaire) { this.commentaire = commentaire; }
    public String getNote() { return note; }
    public void setNote(String note) { this.note = note; }
    public String getAmbiance() { return ambiance; }
    public void setAmbiance(String ambiance) { this.ambiance = ambiance; }
    public Boolean getRecommande() { return recommande; }
    public void setRecommande(Boolean recommande) { this.recommande = recommande; }
    public Date getDateStatut() { return dateStatut; }
    public void setDateStatut(Date dateStatut) { this.dateStatut = dateStatut; }
    public Integer getAuteurId() { return auteurId; }
    public void setAuteurId(Integer auteurId) { this.auteurId = auteurId; }
    public Integer getProduitId() { return produitId; }
    public void setProduitId(Integer produitId) { this.produitId = produitId; }
    public Integer getLigneCommandeId() { return ligneCommandeId; }
    public void setLigneCommandeId(Integer ligneCommandeId) { this.ligneCommandeId = ligneCommandeId; }
    public Integer getLivraisonId() { return livraisonId; }
    public void setLivraisonId(Integer livraisonId) { this.livraisonId = livraisonId; }

    @Override
    public String toString() {
        return "Feedback{" +
                "id=" + id +
                ", titre='" + titre + '\'' +
                ", commentaire='" + commentaire + '\'' +
                ", note='" + note + '\'' +
                ", dateStatut=" + dateStatut +
                '}';
    }
}
