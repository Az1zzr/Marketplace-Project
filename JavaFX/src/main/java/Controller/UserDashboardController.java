package Controller;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Pos;
import javafx.scene.Node;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import models.User;
import utils.SessionManager;

import java.io.File;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

/**
 * Dashboard UTILISATEUR — accès restreint.
 * Gère : Mon Compte, Produits, Commandes (+ sous-pages), Publications, Feedback.
 */
public class UserDashboardController {

    // ── Référence statique pour la navigation inter-contrôleurs ──
    public static UserDashboardController current;

    @FXML private StackPane contentArea;
    @FXML private Label     lblPageTitle;
    @FXML private Label     lblUserName;
    @FXML private Label     lblUserRole;
    @FXML private Label     lblAvatarInitial;
    @FXML private Label     lblTopAvatar;
    @FXML private Label     lblRoleBadge;
    @FXML private ImageView imgTopAvatar;

    // ── Boutons sidebar ──
    @FXML private Button btnAccueil;
    @FXML private Button btnProduits;
    @FXML private Button btnCommandes;
    @FXML private Button btnAjouterCommande;
    @FXML private Button btnAvecLivraison;
    @FXML private Button btnCalendrier;
    @FXML private Button btnPaiement;
    @FXML private Button btnPublications;
    @FXML private Button btnFeedback;
    @FXML private Button btnMessages;

    private Button activeButton;
    private final Map<String, Node> cache = new HashMap<>();

    // ── Styles boutons ──
    private static final String BTN_ACTIVE =
            "-fx-background-color: #f97316; -fx-text-fill: white; -fx-font-size: 13px; " +
                    "-fx-font-weight: bold; -fx-alignment: CENTER_LEFT; -fx-padding: 12 16; " +
                    "-fx-background-radius: 10px; -fx-cursor: hand;";

    private static final String BTN_INACTIVE =
            "-fx-background-color: transparent; -fx-text-fill: #7a9ab8; -fx-font-size: 13px; " +
                    "-fx-alignment: CENTER_LEFT; -fx-padding: 12 16; -fx-background-radius: 10px; -fx-cursor: hand;";

    private static final String BTN_SUB_ACTIVE =
            "-fx-background-color: rgba(249,115,22,0.15); -fx-text-fill: #f97316; -fx-font-size: 12px; " +
                    "-fx-font-weight: bold; -fx-alignment: CENTER_LEFT; -fx-padding: 10 16 10 28; " +
                    "-fx-background-radius: 10px; -fx-cursor: hand;";

    private static final String BTN_SUB_INACTIVE =
            "-fx-background-color: transparent; -fx-text-fill: #7a9ab8; -fx-font-size: 12px; " +
                    "-fx-alignment: CENTER_LEFT; -fx-padding: 10 16 10 28; -fx-background-radius: 10px; -fx-cursor: hand;";

    // ── Boutons sous-menu (commandes) ──
    private final Button[] subButtons = new Button[4]; // sera rempli dans initialize

    @FXML
    public void initialize() {
        current = this;
        activeButton = btnAccueil;
        loadPage("/AccueilUser.fxml", "Mon Compte", btnAccueil, false);
    }

    public void setCurrentUser(User user) {
        if (user == null) return;
        String prenom = user.getPrenom() != null ? user.getPrenom() : "";
        String nom    = user.getNom()    != null ? user.getNom()    : "";
        String role   = user.getRole()   != null ? user.getRole().getNomRole() : "Utilisateur";

        lblUserName.setText(prenom + " " + nom);
        lblUserRole.setText(role);

        String init = !prenom.isEmpty() ? String.valueOf(prenom.charAt(0)).toUpperCase()
                : (!nom.isEmpty() ? String.valueOf(nom.charAt(0)).toUpperCase() : "U");
        if (lblAvatarInitial != null) lblAvatarInitial.setText(init);
        if (lblTopAvatar     != null) lblTopAvatar.setText(init);

        // Badge rôle
        if (lblRoleBadge != null) {
            String roleLower = role.trim().toLowerCase();
            lblRoleBadge.setText("● " + role.toUpperCase());
            String color = roleLower.startsWith("fournisseur") ? "#c2410c" : "#f97316";
            lblRoleBadge.setStyle(
                    "-fx-font-size: 10px; -fx-font-weight: bold; -fx-text-fill: " + color + ";" +
                            "-fx-background-color: rgba(249,115,22,0.1);" +
                            "-fx-background-radius: 20px; -fx-padding: 4 14;");
        }

        // Photo de profil top bar
        loadTopAvatar(user);
    }

    // ══════════════════════════════════════════════════════════════
    // Navigation principale
    // ══════════════════════════════════════════════════════════════

    @FXML public void showAccueil() {
        resetSubButtons();
        loadPage("/AccueilUser.fxml", "Mon Compte", btnAccueil, false);
    }

    @FXML public void showProduits() {
        resetSubButtons();
        if (SessionManager.getInstance().isFournisseur()) {
            loadPage("/crudProduit.fxml", "Mes Produits", btnProduits, false);
        } else {
            loadPage("/Produit.fxml", "Produits", btnProduits, false);
        }
    }

    @FXML public void showPublications() {
        resetSubButtons();
        loadPage("/Publications.fxml", "Publications", btnPublications, false);
    }

    @FXML public void showFeedback() {
        resetSubButtons();
        loadPage("/feedback/AfficherFeedbacks.fxml", "Feedback", btnFeedback, false);
    }

    @FXML public void showMessages() {
        resetSubButtons();
        loadPage("/messaging.fxml", "Messages", btnMessages, false);
    }

    // ══════════════════════════════════════════════════════════════
    // Navigation Commandes — sous-menu
    // ══════════════════════════════════════════════════════════════

    @FXML public void showCommandes() {
        activateSubButton(btnCommandes);
        loadPage("/com/example/gestion_commande/AfficherCommandesView.fxml", "Mes Commandes", btnCommandes, true);
    }

    @FXML public void showAjouterCommande() {
        activateSubButton(btnAjouterCommande);
        // Invalider le cache pour réinitialiser le formulaire à chaque ouverture
        cache.remove("com/example/gestion_commande/AjouterCommandeView.fxml");
        loadPage("/com/example/gestion_commande/AjouterCommandeView.fxml", "Ajouter Commande", btnAjouterCommande, true);
    }

    @FXML public void showAvecLivraison() {
        activateSubButton(btnAvecLivraison);
        loadPage("/com/example/gestion_commande/AfficherCommandesAvecLivraisonView.fxml", "Commandes avec Livraison", btnAvecLivraison, true);
    }

    @FXML public void showCalendrier() {
        activateSubButton(btnCalendrier);
        loadPage("/com/example/gestion_commande/CalendrierLivraisons.fxml", "Calendrier des Livraisons", btnCalendrier, true);
    }

    @FXML public void showPaiement() {
        activateSubButton(btnPaiement);
        cache.remove("/com/example/gestion_commande/ChoixPaiement.fxml");
        loadPage("/com/example/gestion_commande/ChoixPaiement.fxml", "Paiement", btnPaiement, true);
    }

    /** Appelé depuis AjouterCommandeView / AfficherCommandesController → retour */
    public void showAjouterLivraison(int idCommande) {
        activateSubButton(btnAvecLivraison);
        lblPageTitle.setText("Ajouter Livraison");
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/example/gestion_commande/AjouterLivraisonView.fxml"));
            Node page = loader.load();
            Object controller = loader.getController();
            if (controller instanceof AjouterLivraisonController ajouterLivraisonController) {
                ajouterLivraisonController.setIdCommande(idCommande);
            }
            contentArea.getChildren().setAll(page);
        } catch (IOException e) {
            e.printStackTrace();
            showPlaceholder("Ajouter Livraison");
        }
    }

    // ══════════════════════════════════════════════════════════════
    // Gestion styles sous-boutons commandes
    // ══════════════════════════════════════════════════════════════

    /** Active visuellement un sous-bouton commande et désactive les autres */
    private void activateSubButton(Button target) {
        // Désactiver le bouton principal actif si ce n'est pas un bouton commande principal
        if (activeButton != null && activeButton != btnCommandes &&
                activeButton != btnAjouterCommande && activeButton != btnAvecLivraison &&
                activeButton != btnCalendrier && activeButton != btnPaiement) {
            activeButton.setStyle(BTN_INACTIVE);
        }

        // Reset tous les sous-boutons
        for (Button b : new Button[]{btnCommandes, btnAjouterCommande, btnAvecLivraison, btnCalendrier, btnPaiement}) {
            if (b != null) {
                boolean isMain = (b == btnCommandes);
                b.setStyle(isMain ? BTN_INACTIVE : BTN_SUB_INACTIVE);
            }
        }

        // Activer le bouton cible
        boolean isMainCommandes = (target == btnCommandes);
        target.setStyle(isMainCommandes ? BTN_ACTIVE : BTN_SUB_ACTIVE);
        activeButton = target;
    }

    /** Reset les sous-boutons quand on change de section principale */
    private void resetSubButtons() {
        for (Button b : new Button[]{btnCommandes, btnAjouterCommande, btnAvecLivraison, btnCalendrier, btnPaiement}) {
            if (b != null) {
                boolean isMain = (b == btnCommandes);
                b.setStyle(isMain ? BTN_INACTIVE : BTN_SUB_INACTIVE);
            }
        }
    }

    // ══════════════════════════════════════════════════════════════
    // Chargement de page dans le contentArea
    // ══════════════════════════════════════════════════════════════

    private void loadPage(String path, String title, Button btn, boolean isSubMenu) {
        lblPageTitle.setText(title);

        // Désactiver l'ancien bouton principal actif
        if (!isSubMenu && activeButton != null) {
            boolean wasSubMenu = (activeButton == btnAjouterCommande ||
                    activeButton == btnAvecLivraison ||
                    activeButton == btnCalendrier ||
                    activeButton == btnPaiement);
            activeButton.setStyle(wasSubMenu ? BTN_SUB_INACTIVE : BTN_INACTIVE);
        }

        if (!isSubMenu) {
            btn.setStyle(BTN_ACTIVE);
            btn.setMaxWidth(Double.MAX_VALUE);
            activeButton = btn;
        }

        try {
            Node page = cache.computeIfAbsent(path, p -> {
                try {
                    return FXMLLoader.load(getClass().getResource(p));
                } catch (IOException e) {
                    e.printStackTrace();
                    return null;
                }
            });

            if (page != null) {
                contentArea.getChildren().setAll(page);
            } else {
                System.err.println("❌ Échec chargement : " + path);
                showPlaceholder(title);
            }
        } catch (Exception e) {
            e.printStackTrace();
            showPlaceholder(title);
        }
    }

    private void showPlaceholder(String name) {
        VBox box = new VBox(16);
        box.setAlignment(Pos.CENTER);
        box.setStyle("-fx-background-color: white; -fx-background-radius: 16px; " +
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.07), 10, 0, 0, 3);");
        Label icon  = new Label("🚧"); icon.setStyle("-fx-font-size: 52px;");
        Label title = new Label("Module «" + name + "» en développement");
        title.setStyle("-fx-font-size: 17px; -fx-font-weight: bold; -fx-text-fill: #1e293b;");
        Label sub   = new Label("Cette section sera disponible prochainement.");
        sub.setStyle("-fx-font-size: 13px; -fx-text-fill: #94a3b8;");
        Region bar  = new Region();
        bar.setStyle("-fx-background-color: #f97316; -fx-pref-height: 4px; -fx-pref-width: 60px; -fx-background-radius: 2px;");
        box.getChildren().addAll(icon, title, sub, bar);
        contentArea.getChildren().setAll(box);
    }

    private void loadTopAvatar(User user) {
        String photoPath = user.getPhotoPath();
        if (photoPath != null && !photoPath.isBlank()) {
            File f = new File(photoPath);
            if (f.exists()) {
                try {
                    if (imgTopAvatar != null) {
                        imgTopAvatar.setImage(new Image(f.toURI().toString()));
                        imgTopAvatar.setVisible(true);
                        imgTopAvatar.setManaged(true);
                        if (lblTopAvatar != null) {
                            lblTopAvatar.setVisible(false);
                            lblTopAvatar.setManaged(false);
                        }
                    }
                } catch (Exception ignored) {}
            }
        }
    }

    @FXML private void handleTopAvatarClick() {
        showAccueil();
    }

    @FXML private void handleLogout() {
        current = null;
        cache.clear();
        SessionManager.getInstance().logout();
        navigateTo("/login.fxml", 1200, 700);
    }

    private void navigateTo(String path, double w, double h) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(path));
            javafx.scene.Parent root = loader.load();
            var scene = contentArea.getScene();
            scene.getWindow().setWidth(w);
            scene.getWindow().setHeight(h);
            ((javafx.stage.Stage) scene.getWindow()).centerOnScreen();
            scene.setRoot(root);
        } catch (IOException e) { e.printStackTrace(); }
    }
}
