package Controller;

import Entities.Commande;
import Entities.Livraison;
import services.CommandeService;
import services.LivraisonService;
import javafx.application.Platform;
import javafx.concurrent.Worker;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.web.WebEngine;
import javafx.scene.web.WebView;
import netscape.javascript.JSObject;

import java.time.LocalDate;

public class AjouterLivraisonController {

    // UI Components
    @FXML private TextField numeroBLField;
    @FXML private DatePicker dateLivraisonPicker;
    @FXML private TextField livreurField;
    @FXML private ComboBox<String> statutLivraisonComboBox;
    @FXML private TextArea noteDeliveryArea;

    // Map Components
    @FXML private WebView mapWebView;
    @FXML private Label latLabel;
    @FXML private Label lngLabel;
    @FXML private Label mapHintLabel;

    // Info commande
    @FXML private Label idCommandeLabel; // Optionnel: pour afficher l'ID commande
    @FXML private Label commandeInfoLabel; // Optionnel: pour afficher infos commande

    // Services
    private LivraisonService livraisonService;
    private CommandeService commandeService;

    // Données
    private int idCommande = -1;
    private Commande commandeActuelle;
    private double selectedLat = 0;
    private double selectedLng = 0;
    private boolean locationSelected = false;

    @FXML
    public void initialize() {
        // Initialiser les services
        livraisonService = new LivraisonService();
        commandeService = new CommandeService();

        // Configurer le ComboBox
        statutLivraisonComboBox.getItems().addAll("En cours", "Livré", "Retardé");
        statutLivraisonComboBox.setValue("En cours");

        // Date par défaut = aujourd'hui
        dateLivraisonPicker.setValue(LocalDate.now());

        // Initialiser la carte
        initMap(36.8065, 10.1815, false);

        System.out.println("✅ AjouterLivraisonController initialisé");
    }

    /**
     * Méthode appelée par le controller parent pour passer l'ID de la commande
     */
    public void setIdCommande(int idCommande) {
        this.idCommande = idCommande;
        System.out.println("✅ setIdCommande() appelé avec ID: " + idCommande);

        // Charger les informations de la commande
        chargerInfosCommande();
    }

    /**
     * Charge les informations de la commande sélectionnée
     */
    private void chargerInfosCommande() {
        try {
            commandeActuelle = commandeService.rechercherParId(idCommande);
            if (commandeActuelle != null) {
                System.out.println("✅ Commande chargée: #" + commandeActuelle.getId() +
                        " - " + commandeActuelle.getNomClient());

                // Mettre à jour les labels si ils existent
                if (idCommandeLabel != null) {
                    idCommandeLabel.setText("Commande #" + idCommande);
                }

                if (commandeInfoLabel != null) {
                    commandeInfoLabel.setText("Client: " + commandeActuelle.getNomClient() +
                            " | Total: " + commandeActuelle.getTotal() + " DT");
                }
            } else {
                System.err.println("❌ Commande non trouvée avec ID: " + idCommande);
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur chargement commande: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    private void ajouterLivraison() {
        // Vérifier que nous avons un ID commande valide
        if (idCommande == -1) {
            afficherAlert("Erreur",
                    "Aucune commande associée.\nRetournez à la liste et cliquez sur une commande.",
                    Alert.AlertType.ERROR);
            return;
        }

        // Valider le formulaire
        if (!validerFormulaire()) {
            return;
        }

        try {
            // Vérifier si une livraison existe déjà pour cette commande
            Livraison livraisonExistante = livraisonService.rechercherParIdCommande(idCommande);

            if (livraisonExistante != null) {
                afficherAlert(
                        "Livraison Existante",
                        "Cette commande a déjà une livraison associée.\n\n" +
                                "📦 Numéro BL: " + livraisonExistante.getNumeroBL() + "\n" +
                                "🚚 Livreur: " + livraisonExistante.getLivreur() + "\n" +
                                "📊 Statut: " + livraisonExistante.getStatutLivraison() + "\n\n" +
                                "Consultez l'onglet 'AVEC LIVRAISON' pour modifier.",
                        Alert.AlertType.WARNING
                );
                return;
            }

            // Récupérer les données du formulaire
            String numeroBL = numeroBLField.getText().trim();
            LocalDate dateLiv = dateLivraisonPicker.getValue();
            String livreur = livreurField.getText().trim();
            String statut = statutLivraisonComboBox.getValue();
            String note = noteDeliveryArea.getText().trim();

            // Créer la livraison
            Livraison livraison = new Livraison(
                    idCommande,
                    numeroBL,
                    dateLiv,
                    livreur,
                    statut,
                    note,
                    selectedLat,
                    selectedLng
            );

            // Ajouter la livraison
            if (livraisonService.ajouter(livraison)) {
                // Mettre à jour le statut de la commande
                changerStatutCommande();

                afficherAlert("Succès",
                        "✅ Livraison ajoutée avec succès !\n\n" +
                                "Commande #" + idCommande + "\n" +
                                "BL: " + numeroBL + "\n" +
                                "Livreur: " + livreur,
                        Alert.AlertType.INFORMATION);

                // Retourner à la liste des commandes
                retourner();
            } else {
                afficherAlert("Erreur",
                        "❌ Échec de l'ajout.\n\n" +
                                "Causes possibles :\n" +
                                "• Le numéro BL « " + numeroBL + " » existe déjà\n" +
                                "• Problème de connexion à la base de données",
                        Alert.AlertType.ERROR);
            }

        } catch (Exception e) {
            System.err.println("❌ ERREUR ajouterLivraison: " + e.getMessage());
            e.printStackTrace();
            afficherAlert("Erreur", "Erreur : " + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    /**
     * Met à jour le statut de la commande à "Confirmée"
     */
    private void changerStatutCommande() {
        try {
            if (commandeActuelle != null) {
                commandeActuelle.setStatut("Confirmée");
                if (commandeService.modifier(commandeActuelle)) {
                    System.out.println("✅ Statut commande #" + idCommande + " → Confirmée");
                }
            } else {
                // Si commandeActuelle est null, rechercher à nouveau
                Commande commande = commandeService.rechercherParId(idCommande);
                if (commande != null) {
                    commande.setStatut("Confirmée");
                    if (commandeService.modifier(commande)) {
                        System.out.println("✅ Statut commande #" + idCommande + " → Confirmée");
                    }
                }
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur changement statut: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    private void retourner() {
        if (UserDashboardController.current != null) {
            UserDashboardController.current.showCommandes();
        }
    }

    @FXML
    private void effacer() {
        numeroBLField.clear();
        livreurField.clear();
        noteDeliveryArea.clear();
        dateLivraisonPicker.setValue(LocalDate.now());
        statutLivraisonComboBox.setValue("En cours");
        handleResetLocation();
    }

    /**
     * Valide les champs du formulaire
     */
    private boolean validerFormulaire() {
        // Validation numéro BL
        String numeroBL = numeroBLField.getText().trim();
        if (numeroBL.isEmpty()) {
            afficherAlert("Validation", "Veuillez entrer le numéro BL!", Alert.AlertType.WARNING);
            numeroBLField.requestFocus();
            return false;
        }
        if (!numeroBL.matches("^[0-9]+$")) {
            afficherAlert("Validation",
                    "Le numéro BL doit contenir uniquement des chiffres!\n(Ex: 001, 123, 2024)",
                    Alert.AlertType.WARNING);
            numeroBLField.requestFocus();
            return false;
        }

        // Validation date
        if (dateLivraisonPicker.getValue() == null) {
            afficherAlert("Validation", "Veuillez sélectionner une date!", Alert.AlertType.WARNING);
            dateLivraisonPicker.requestFocus();
            return false;
        }

        // Validation livreur
        String livreur = livreurField.getText().trim();
        if (livreur.isEmpty()) {
            afficherAlert("Validation", "Veuillez entrer le nom du livreur!", Alert.AlertType.WARNING);
            livreurField.requestFocus();
            return false;
        }
        if (!livreur.matches("^[a-zA-Z\\s'-]+$")) {
            afficherAlert("Validation",
                    "Le nom du livreur doit contenir uniquement des lettres!\n(Ex: Ahmed, Jean-Marie)",
                    Alert.AlertType.WARNING);
            livreurField.requestFocus();
            return false;
        }

        return true;
    }

    private void afficherAlert(String titre, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(titre);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    // ================== GESTION DE LA CARTE ==================

    private void initMap(double defaultLat, double defaultLng, boolean hasMarker) {
        if (mapWebView == null) {
            System.err.println("❌ ERREUR : mapWebView est null !");
            return;
        }

        WebEngine engine = mapWebView.getEngine();
        engine.setJavaScriptEnabled(true);
        engine.setUserAgent(
                "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 " +
                        "(KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36"
        );

        engine.setOnError(e -> System.out.println("⚠️ WEB ERROR: " + e.getMessage()));
        engine.getLoadWorker().exceptionProperty().addListener((obs, oldEx, newEx) -> {
            if (newEx != null) {
                System.out.println("⚠️ LOAD EXCEPTION: " + newEx.getMessage());
                newEx.printStackTrace();
            }
        });

        engine.loadContent(buildLeafletHtml(defaultLat, defaultLng, hasMarker));

        engine.getLoadWorker().stateProperty().addListener((obs, old, newState) -> {
            if (newState == Worker.State.SUCCEEDED) {
                Platform.runLater(() -> {
                    JSObject window = (JSObject) engine.executeScript("window");
                    window.setMember("javaApp", new MapBridge());

                    // Forcer le redimensionnement de la carte
                    String redrawScript =
                            "function forceRedraw() {" +
                                    "  if (typeof map !== 'undefined' && map) {" +
                                    "    map.invalidateSize(true);" +
                                    "    map._onResize();" +
                                    "  }" +
                                    "}" +
                                    "setTimeout(forceRedraw, 100);" +
                                    "setTimeout(forceRedraw, 400);" +
                                    "setTimeout(forceRedraw, 800);" +
                                    "setTimeout(forceRedraw, 1500);";

                    engine.executeScript(redrawScript);
                });
            }
        });

        // Redessiner la carte quand la taille change
        mapWebView.widthProperty().addListener((obs, old, newVal) -> {
            if (engine.getLoadWorker().getState() == Worker.State.SUCCEEDED)
                engine.executeScript("if (map) map.invalidateSize(true);");
        });

        mapWebView.heightProperty().addListener((obs, old, newVal) -> {
            if (engine.getLoadWorker().getState() == Worker.State.SUCCEEDED)
                engine.executeScript("if (map) map.invalidateSize(true);");
        });
    }

    /**
     * Bridge entre Java et JavaScript pour la carte
     */
    public class MapBridge {
        public void onLocationSelected(double lat, double lng) {
            Platform.runLater(() -> {
                selectedLat = lat;
                selectedLng = lng;
                locationSelected = true;

                if (latLabel != null) {
                    latLabel.setText(String.format("%.6f", lat));
                    latLabel.setStyle("-fx-text-fill: #10b981; -fx-font-weight: bold;");
                }

                if (lngLabel != null) {
                    lngLabel.setText(String.format("%.6f", lng));
                    lngLabel.setStyle("-fx-text-fill: #10b981; -fx-font-weight: bold;");
                }

                if (mapHintLabel != null) {
                    mapHintLabel.setText("✅ Position sélectionnée !");
                    mapHintLabel.setStyle("-fx-text-fill: #10b981; -fx-font-weight: bold;");
                }

                System.out.println("📍 Position sélectionnée: " + lat + ", " + lng);
            });
        }

        public void onTileError(String url) {
            Platform.runLater(() -> {
                System.out.println("⚠️ Erreur de tuile: " + url);
                if (mapHintLabel != null) {
                    mapHintLabel.setText("⚠️ Problème de chargement des tuiles");
                    mapHintLabel.setStyle("-fx-text-fill: #ef4444; -fx-font-weight: bold;");
                }
            });
        }
    }

    private String buildLeafletHtml(double lat, double lng, boolean hasMarker) {
        String markerJs = hasMarker ? "currentMarker = L.marker([" + lat + "," + lng + "]).addTo(map);" : "";

        return "<!DOCTYPE html>" +
                "<html><head><meta charset='UTF-8'/>" +
                "<meta name='viewport' content='width=device-width, initial-scale=1.0'/>" +
                "<style>html, body { margin:0; padding:0; height:100%; width:100%; }" +
                "#map { width:100%; height:100%; background-color: #f0f0f0; }</style>" +
                "<link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css'/>" +
                "</head><body><div id='map'></div>" +
                "<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js'></script>" +
                "<script>" +
                "var map = L.map('map').setView([" + lat + ", " + lng + "], 7);" +
                "L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {" +
                "  maxZoom: 19," +
                "  attribution: '© OpenStreetMap'" +
                "}).on('tileerror', function(e) {" +
                "  if (window.javaApp) window.javaApp.onTileError(e.url);" +
                "}).addTo(map);" +
                "var currentMarker = null;" +
                markerJs +
                "map.on('click', function(e) {" +
                "  if (currentMarker) map.removeLayer(currentMarker);" +
                "  currentMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);" +
                "  currentMarker.bindPopup('📍 ' + e.latlng.lat.toFixed(6) + ', ' + e.latlng.lng.toFixed(6)).openPopup();" +
                "  if (window.javaApp) window.javaApp.onLocationSelected(e.latlng.lat, e.latlng.lng);" +
                "});" +
                "</script></body></html>";
    }

    @FXML
    private void handleResetLocation() {
        selectedLat = 0;
        selectedLng = 0;
        locationSelected = false;

        if (latLabel != null) {
            latLabel.setText("—");
            latLabel.setStyle("");
        }

        if (lngLabel != null) {
            lngLabel.setText("—");
            lngLabel.setStyle("");
        }

        if (mapHintLabel != null) {
            mapHintLabel.setText("Cliquez sur la carte pour sélectionner la position");
            mapHintLabel.setStyle("-fx-text-fill: #64748b;");
        }

        initMap(36.8065, 10.1815, false);
    }
}