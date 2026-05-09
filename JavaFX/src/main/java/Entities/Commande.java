package Entities;

import java.time.LocalDate;

public class Commande {
    private int idCommande;
    private String numeroCommande;
    private String client;
    private Integer clientUserId;
    private LocalDate dateCommande;
    private double montantTotal;
    private String adresseLivraison;
    private String statut; // En attente, Confirmée, Annulée
    private String gouvernorat;
    private String telephoneLivraison;
    private String commentaireLivraison;

    // Constructeurs
    public Commande() {
    }

    public Commande(String numeroCommande, String client, LocalDate dateCommande,
                    double montantTotal, String adresseLivraison, String statut) {
        this.numeroCommande = numeroCommande;
        this.client = client;
        this.dateCommande = dateCommande;
        this.montantTotal = montantTotal    ;
        this.adresseLivraison = adresseLivraison;
        this.statut = statut;
    }

    public Commande(int idCommande, String numeroCommande, String client, LocalDate dateCommande,
                    double montantTotal, String adresseLivraison, String statut) {
        this.idCommande = idCommande;
        this.numeroCommande = numeroCommande;
        this.client = client;
        this.dateCommande = dateCommande;
        this.montantTotal = montantTotal;
        this.adresseLivraison = adresseLivraison;
        this.statut = statut;
    }

    // Getters et Setters
    public int getIdCommande() {
        return idCommande;
    }

    public void setIdCommande(int idCommande) {
        this.idCommande = idCommande;
    }

    public String getNumeroCommande() {
        return numeroCommande;
    }

    public void setNumeroCommande(String numeroCommande) {
        this.numeroCommande = numeroCommande;
    }

    public String getClient() {
        return client;
    }

    public void setClient(String client) {
        this.client = client;
    }

    public Integer getClientUserId() {
        return clientUserId;
    }

    public void setClientUserId(Integer clientUserId) {
        this.clientUserId = clientUserId;
    }

    public LocalDate getDateCommande() {
        return dateCommande;
    }

    public void setDateCommande(LocalDate dateCommande) {
        this.dateCommande = dateCommande;
    }

    public double getMontantTotal() {
        return montantTotal;
    }

    public void setMontantTotal(double montantTotal) {
        this.montantTotal = montantTotal;
    }

    public String getAdresseLivraison() {
        return adresseLivraison;
    }

    public void setAdresseLivraison(String adresseLivraison) {
        this.adresseLivraison = adresseLivraison;
    }

    public String getStatut() {
        return statut;
    }

    public void setStatut(String statut) {
        this.statut = statut;
    }

    public String getGouvernorat() {
        return gouvernorat;
    }

    public void setGouvernorat(String gouvernorat) {
        this.gouvernorat = gouvernorat;
    }

    public String getTelephoneLivraison() {
        return telephoneLivraison;
    }

    public void setTelephoneLivraison(String telephoneLivraison) {
        this.telephoneLivraison = telephoneLivraison;
    }

    public String getCommentaireLivraison() {
        return commentaireLivraison;
    }

    public void setCommentaireLivraison(String commentaireLivraison) {
        this.commentaireLivraison = commentaireLivraison;
    }

    @Override
    public String toString() {
        return "Commande{" +
                "idCommande=" + idCommande +
                ", numeroCommande='" + numeroCommande + '\'' +
                ", client='" + client + '\'' +
                ", dateCommande=" + dateCommande +
                ", montantTotal=" + montantTotal +
                ", adresseLivraison='" + adresseLivraison + '\'' +
                ", statut='" + statut + '\'' +
                '}';
    }

    public String getNomClient() {
        return client == null ? "" : client;
    }

    public String getId() {
        return String.valueOf(idCommande);
    }

    public String getTotal() {
        return String.format("%.2f", montantTotal);
    }
}
