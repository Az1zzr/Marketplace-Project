package Entities;

import java.time.LocalDate;

public class Livraison {
    private int idLivraison;
    private int idCommande; // Clé étrangère pour la jointure 1-to-1
    private String numeroBL; // Bon de livraison
    private LocalDate dateLivraison;
    private String livreur;
    private String statutLivraison; // En cours, Livré, Retardé
    private String noteDelivery;
    private double latitude; // Nouvelle variable pour la latitude
    private double longitude; // Nouvelle variable pour la longitude

    // Constructeurs
    public Livraison() {
    }

    public Livraison(int idCommande, String numeroBL, LocalDate dateLivraison,
                     String livreur, String statutLivraison, String noteDelivery) {
        this.idCommande = idCommande;
        this.numeroBL = numeroBL;
        this.dateLivraison = dateLivraison;
        this.livreur = livreur;
        this.statutLivraison = statutLivraison;
        this.noteDelivery = noteDelivery;
    }

    public Livraison(int idCommande, String numeroBL, LocalDate dateLivraison,
                     String livreur, String statutLivraison, String noteDelivery,
                     double latitude, double longitude) {
        this.idCommande = idCommande;
        this.numeroBL = numeroBL;
        this.dateLivraison = dateLivraison;
        this.livreur = livreur;
        this.statutLivraison = statutLivraison;
        this.noteDelivery = noteDelivery;
        this.latitude = latitude;
        this.longitude = longitude;
    }

    public Livraison(int idLivraison, int idCommande, String numeroBL, LocalDate dateLivraison,
                     String livreur, String statutLivraison, String noteDelivery,
                     double latitude, double longitude) {
        this.idLivraison = idLivraison;
        this.idCommande = idCommande;
        this.numeroBL = numeroBL;
        this.dateLivraison = dateLivraison;
        this.livreur = livreur;
        this.statutLivraison = statutLivraison;
        this.noteDelivery = noteDelivery;
        this.latitude = latitude;
        this.longitude = longitude;
    }

    // Getters et Setters
    public int getIdLivraison() {
        return idLivraison;
    }

    public void setIdLivraison(int idLivraison) {
        this.idLivraison = idLivraison;
    }

    public int getIdCommande() {
        return idCommande;
    }

    public void setIdCommande(int idCommande) {
        this.idCommande = idCommande;
    }

    public String getNumeroBL() {
        return numeroBL;
    }

    public void setNumeroBL(String numeroBL) {
        this.numeroBL = numeroBL;
    }

    public LocalDate getDateLivraison() {
        return dateLivraison;
    }

    public void setDateLivraison(LocalDate dateLivraison) {
        this.dateLivraison = dateLivraison;
    }

    public String getLivreur() {
        return livreur;
    }

    public void setLivreur(String livreur) {
        this.livreur = livreur;
    }

    public String getStatutLivraison() {
        return statutLivraison;
    }

    public void setStatutLivraison(String statutLivraison) {
        this.statutLivraison = statutLivraison;
    }

    public String getNoteDelivery() {
        return noteDelivery;
    }

    public void setNoteDelivery(String noteDelivery) {
        this.noteDelivery = noteDelivery;
    }

    public double getLatitude() {
        return latitude;
    }

    public void setLatitude(double latitude) {
        this.latitude = latitude;
    }

    public double getLongitude() {
        return longitude;
    }

    public void setLongitude(double longitude) {
        this.longitude = longitude;
    }

    public boolean hasLocation() {
        return latitude != 0 && longitude != 0;
    }

    @Override
    public String toString() {
        return "Livraison{" +
                "idLivraison=" + idLivraison +
                ", idCommande=" + idCommande +
                ", numeroBL='" + numeroBL + '\'' +
                ", dateLivraison=" + dateLivraison +
                ", livreur='" + livreur + '\'' +
                ", statutLivraison='" + statutLivraison + '\'' +
                ", noteDelivery='" + noteDelivery + '\'' +
                ", latitude=" + latitude +
                ", longitude=" + longitude +
                '}';
    }
}