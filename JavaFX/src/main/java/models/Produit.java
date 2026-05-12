package models;

public class Produit {

    private int id;
    private String nomProduit;
    private String adresse;
    private double prix;
    private int quantite;
    private String imageURL;
    private String slug;
    private int categorieId;
    private String categorieNom;
    private Integer fournisseurId;
    private String fournisseurNom;

    public Produit(int id, String nomProduit, String adresse, double prix, int quantite, String imageURL) {
        this(id, nomProduit, adresse, prix, quantite, imageURL, null, 0, null, null, null);
    }

    public Produit(int id, String nomProduit, String adresse, double prix, int quantite, String imageURL,
                   String slug, int categorieId, String categorieNom, Integer fournisseurId, String fournisseurNom) {
        this.id = id;
        this.nomProduit = nomProduit;
        this.adresse = adresse;
        this.prix = prix;
        this.quantite = quantite;
        this.imageURL = imageURL;
        this.slug = slug;
        this.categorieId = categorieId;
        this.categorieNom = categorieNom;
        this.fournisseurId = fournisseurId;
        this.fournisseurNom = fournisseurNom;
    }

    public Produit(String nomProduit, String adresse, double prix, int quantite, String imageURL) {
        this.nomProduit = nomProduit;
        this.adresse = adresse;
        this.prix = prix;
        this.quantite = quantite;
        this.imageURL = imageURL;
    }

    public int getId() { return id; }
    public String getNomProduit() { return nomProduit; }
    public String getAdresse() { return adresse; }
    public double getPrix() { return prix; }
    public int getQuantite() { return quantite; }
    public String getImageURL() { return imageURL; }
    public String getSlug() { return slug; }
    public int getCategorieId() { return categorieId; }
    public String getCategorieNom() { return categorieNom; }
    public Integer getFournisseurId() { return fournisseurId; }
    public String getFournisseurNom() { return fournisseurNom; }

    public void setId(int id) { this.id = id; }
    public void setNomProduit(String nomProduit) { this.nomProduit = nomProduit; }
    public void setAdresse(String adresse) { this.adresse = adresse; }
    public void setPrix(double prix) { this.prix = prix; }
    public void setQuantite(int quantite) { this.quantite = quantite; }
    public void setImageURL(String imageURL) { this.imageURL = imageURL; }
    public void setSlug(String slug) { this.slug = slug; }
    public void setCategorieId(int categorieId) { this.categorieId = categorieId; }
    public void setCategorieNom(String categorieNom) { this.categorieNom = categorieNom; }
    public void setFournisseurId(Integer fournisseurId) { this.fournisseurId = fournisseurId; }
    public void setFournisseurNom(String fournisseurNom) { this.fournisseurNom = fournisseurNom; }

    @Override
    public String toString() {
        return "Produit{" +
                "id=" + id +
                ", nomProduit='" + nomProduit + '\'' +
                ", adresse='" + adresse + '\'' +
                ", prix=" + prix +
                ", quantite=" + quantite +
                ", imageURL='" + imageURL + '\'' +
                ", categorieId=" + categorieId +
                ", categorieNom='" + categorieNom + '\'' +
                ", fournisseurId=" + fournisseurId +
                '}';
    }
}
