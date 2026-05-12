package Entities;

public class LigneCommande {
    private int id;
    private int commandeId;
    private int produitId;
    private String nomProduit;
    private int quantite;
    private double prixUnitaire;

    public LigneCommande() {
    }

    public LigneCommande(int id, int commandeId, int produitId, String nomProduit, int quantite, double prixUnitaire) {
        this.id = id;
        this.commandeId = commandeId;
        this.produitId = produitId;
        this.nomProduit = nomProduit;
        this.quantite = quantite;
        this.prixUnitaire = prixUnitaire;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }
    public int getCommandeId() { return commandeId; }
    public void setCommandeId(int commandeId) { this.commandeId = commandeId; }
    public int getProduitId() { return produitId; }
    public void setProduitId(int produitId) { this.produitId = produitId; }
    public String getNomProduit() { return nomProduit; }
    public void setNomProduit(String nomProduit) { this.nomProduit = nomProduit; }
    public int getQuantite() { return quantite; }
    public void setQuantite(int quantite) { this.quantite = quantite; }
    public double getPrixUnitaire() { return prixUnitaire; }
    public void setPrixUnitaire(double prixUnitaire) { this.prixUnitaire = prixUnitaire; }
    public double getSousTotal() { return quantite * prixUnitaire; }
}
