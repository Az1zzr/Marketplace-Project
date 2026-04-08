package Controller;

import utils.SessionManager;
import models.Feedback;
import services.FeedbackService;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import utils.AISentimentAnalyzer;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;
import java.util.stream.Collectors;

/**
 * Contrôleur pour afficher la liste des feedbacks sous forme de cartes.
 */
public class AfficherFeedbacksController {

    @FXML private VBox vboxFeedbacks;
    @FXML private TextField txtRecherche;
    @FXML private ComboBox<String> comboTri;

    private final FeedbackService service = new FeedbackService();
    private List<Feedback> feedbacksOriginaux = new ArrayList<>();

    // Styles CSS réutilisables
    private static final String STYLE_BUTTON_BASE = "-fx-background-color: %s; -fx-text-fill: white; -fx-font-size: 14px; -fx-padding: 10 20; -fx-background-radius: 20; -fx-cursor: hand; -fx-font-weight: bold;";
    private static final String STYLE_BUTTON_HOVER = "-fx-background-color: derive(%s, -10%%); -fx-text-fill: white; -fx-font-size: 14px; -fx-padding: 10 20; -fx-background-radius: 20; -fx-cursor: hand; -fx-font-weight: bold; -fx-scale-x: 1.05; -fx-scale-y: 1.05;";

    @FXML
    public void initialize() {
        configurerRecherche();
        configurerTri();
        chargerFeedbacks();
    }

    private void configurerRecherche() {
        if (txtRecherche != null) {
            txtRecherche.textProperty().addListener((obs, old, nv) -> filtrerEtAfficher());
        }
    }

    private void configurerTri() {
        if (comboTri != null) {
            comboTri.getItems().addAll(
                    "Note (décroissante) ⭐",
                    "Note (croissante) ⭐",
                    "Date (récente)",
                    "Date (ancienne)",
                    "Par défaut"
            );
            comboTri.setValue("Par défaut");
            comboTri.setOnAction(e -> filtrerEtAfficher());
        }
    }

    private void chargerFeedbacks() {
        feedbacksOriginaux = service.getAll();
        filtrerEtAfficher();
    }

    private void filtrerEtAfficher() {
        vboxFeedbacks.getChildren().clear();

        // 1. Copie de la liste
        List<Feedback> liste = new ArrayList<>(feedbacksOriginaux);

        // 2. Filtre par recherche
        String recherche = txtRecherche.getText().trim().toLowerCase();
        if (!recherche.isEmpty()) {
            liste = liste.stream()
                    .filter(f -> f.getCommentaire().toLowerCase().contains(recherche)
                            || String.valueOf(f.getId()).contains(recherche))
                    .collect(Collectors.toList());
        }

        // 3. Tri
        String tri = comboTri.getValue();
        if (tri != null) {
            switch (tri) {
                case "Note (décroissante) ⭐":
                    liste.sort((f1, f2) -> Integer.compare(extraireNote(f2.getNote()), extraireNote(f1.getNote())));
                    break;
                case "Note (croissante) ⭐":
                    liste.sort(Comparator.comparingInt(f -> extraireNote(f.getNote())));
                    break;
                case "Date (récente)":
                    liste.sort((f1, f2) -> f2.getDateStatut().compareTo(f1.getDateStatut()));
                    break;
                case "Date (ancienne)":
                    liste.sort(Comparator.comparing(Feedback::getDateStatut));
                    break;
                default:
                    liste.sort(Comparator.comparing(Feedback::getId));
            }
        }

        // 4. Affichage
        if (liste.isEmpty()) {
            afficherEtatVide();
        } else {
            for (Feedback f : liste) {
                vboxFeedbacks.getChildren().add(createFeedbackCard(f));
            }
        }
    }

    private void afficherEtatVide() {
        VBox empty = new VBox(20);
        empty.setAlignment(Pos.CENTER);
        empty.setStyle("-fx-padding: 60; -fx-background-color: white; -fx-background-radius: 15; -fx-border-color: #E0E0E0; -fx-border-width: 2; -fx-border-radius: 15;");

        String recherche = txtRecherche.getText().trim();
        Label icon = new Label(recherche.isEmpty() ? "📭" : "🔍");
        icon.setStyle("-fx-font-size: 72px;");

        Label msg = new Label(recherche.isEmpty() ? "Aucun feedback pour le moment" : "Aucun résultat trouvé");
        msg.setStyle("-fx-font-size: 22px; -fx-text-fill: #666666; -fx-font-weight: bold;");

        Label sub = new Label(recherche.isEmpty() ? "Cliquez sur 'AJOUTER FEEDBACK' pour commencer" : "Essayez avec d'autres mots-clés");
        sub.setStyle("-fx-font-size: 14px; -fx-text-fill: #999999;");

        empty.getChildren().addAll(icon, msg, sub);
        vboxFeedbacks.getChildren().add(empty);
    }

    private VBox createFeedbackCard(Feedback f) {
        VBox card = new VBox(15);
        card.setStyle("-fx-background-color: white; -fx-border-color: #E0E0E0; -fx-border-width: 1; -fx-padding: 25; -fx-background-radius: 12; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.1), 10, 0, 0, 3);");

        // En-tête avec ID et étoiles
        HBox header = new HBox(20);
        header.setAlignment(Pos.CENTER_LEFT);

        Label idLabel = new Label("Feedback #" + f.getId());
        idLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: #1F4AA8;");

        HBox etoiles = creerAffichageEtoiles(f.getNote());
        header.getChildren().addAll(idLabel, etoiles);

        // Ligne info : date + sentiment
        Label dateLabel = new Label("📅 " + f.getDateStatut());
        dateLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #999999;");

        String sentiment = AISentimentAnalyzer.analyze(f.getCommentaire());
        Label sentimentLabel = new Label();
        String styleSentiment;
        switch (sentiment) {
            case "POSITIF":
                sentimentLabel.setText("😊 Positif");
                styleSentiment = "-fx-text-fill: #4CAF50; -fx-background-color: #E8F5E8;";
                break;
            case "NEGATIF":
                sentimentLabel.setText("😡 Négatif");
                styleSentiment = "-fx-text-fill: #f44336; -fx-background-color: #FFEBEE;";
                break;
            default:
                sentimentLabel.setText("😐 Neutre");
                styleSentiment = "-fx-text-fill: #FF9800; -fx-background-color: #FFF3E0;";
        }
        sentimentLabel.setStyle(styleSentiment + " -fx-font-weight: bold; -fx-padding: 5 10; -fx-background-radius: 15;");

        HBox infoBox = new HBox(15, dateLabel, sentimentLabel);
        infoBox.setAlignment(Pos.CENTER_LEFT);

        // Commentaire
        Label commentaire = new Label(f.getCommentaire());
        commentaire.setWrapText(true);
        commentaire.setStyle("-fx-font-size: 15px; -fx-text-fill: #333333; -fx-padding: 15 0;");

        Separator sep = new Separator();
        sep.setStyle("-fx-background-color: #E0E0E0;");

        // Boutons d'action
        HBox boutons = new HBox(15);
        boutons.setAlignment(Pos.CENTER_RIGHT);

        Button btnReponses = createStyledButton("💬 Réponses", "#4CAF50");
        btnReponses.setOnAction(e -> ouvrirReponses(f.getId()));

        Button btnModifier = createStyledButton("✏️ Modifier", "#2196F3");
        btnModifier.setOnAction(e -> modifierFeedback(f));

        Button btnSupprimer = createStyledButton("🗑️ Supprimer", "#f44336");
        btnSupprimer.setOnAction(e -> supprimerFeedback(f.getId()));

        // Masquer les boutons Modifier/Supprimer si l'utilisateur n'est pas admin
        if (!SessionManager.getInstance().isAdmin()) {
            btnModifier.setVisible(false);
            btnSupprimer.setVisible(false);
        }

        boutons.getChildren().addAll(btnReponses, btnModifier, btnSupprimer);

        card.getChildren().addAll(header, infoBox, commentaire, sep, boutons);
        return card;
    }

    private HBox creerAffichageEtoiles(String noteStr) {
        HBox box = new HBox(5);
        box.setAlignment(Pos.CENTER_LEFT);

        int note = extraireNote(noteStr);
        for (int i = 0; i < 5; i++) {
            Text etoile = new Text("★");
            etoile.setFont(Font.font("Arial", 24));
            etoile.setFill(i < note ? Color.web("#FFD700") : Color.web("#E0E0E0"));
            box.getChildren().add(etoile);
        }

        String[] labels = {"", "Très mauvais", "Mauvais", "Moyen", "Bon", "Excellent"};
        Label label = new Label(note > 0 && note <= 5 ? labels[note] : "");
        label.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #666666; -fx-padding: 0 0 0 10;");
        box.getChildren().add(label);

        return box;
    }

    private int extraireNote(String noteStr) {
        try {
            if (noteStr.contains("/")) noteStr = noteStr.split("/")[0].trim();
            return Integer.parseInt(noteStr);
        } catch (NumberFormatException e) {
            if (noteStr.toLowerCase().contains("excellent")) return 5;
            if (noteStr.toLowerCase().contains("bon")) return 4;
            if (noteStr.toLowerCase().contains("moyen")) return 3;
            if (noteStr.toLowerCase().contains("mauvais")) return 2;
            return 1;
        }
    }

    private Button createStyledButton(String text, String color) {
        Button btn = new Button(text);
        btn.setStyle(String.format(STYLE_BUTTON_BASE, color));
        btn.setOnMouseEntered(e -> btn.setStyle(String.format(STYLE_BUTTON_HOVER, color)));
        btn.setOnMouseExited(e -> btn.setStyle(String.format(STYLE_BUTTON_BASE, color)));
        return btn;
    }

    private void modifierFeedback(Feedback f) {
        ouvrirFenetre("/feedback/AjouterFeedback.fxml", "Modifier Feedback #" + f.getId(), controller -> {
            ((AjouterFeedbackController) controller).preRemplir(f);
        });
    }

    private void supprimerFeedback(int id) {
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setHeaderText("Supprimer ce feedback ?");
        confirm.setContentText("Cette action est irréversible.");
        if (confirm.showAndWait().orElse(ButtonType.CANCEL) == ButtonType.OK) {
            if (service.supprimer(id)) {
                showAlert("Succès", "Feedback supprimé !", Alert.AlertType.INFORMATION);
                chargerFeedbacks();
            } else {
                showAlert("Erreur", "Échec de la suppression.", Alert.AlertType.ERROR);
            }
        }
    }

    @FXML
    private void ajouterFeedback() {
        ouvrirFenetre("/feedback/AjouterFeedback.fxml", "Ajouter un Feedback", null);
    }

    @FXML
    private void actualiser() {
        chargerFeedbacks();
        showAlert("Actualisation", "Liste actualisée !", Alert.AlertType.INFORMATION);
    }

    @FXML
    private void effacerRecherche() {
        if (txtRecherche != null) txtRecherche.clear();
    }

    private void ouvrirReponses(int feedbackId) {
        ouvrirFenetre("/feedback/VoirReponses.fxml", "Réponses au Feedback #" + feedbackId, controller -> {
            ((VoirReponsesController) controller).setFeedbackId(feedbackId);
            ((VoirReponsesController) controller).chargerReponses();
        });
    }

    /**
     * Ouvre une fenêtre modale avec un FXML donné.
     * @param fxmlPath chemin du FXML
     * @param titre titre de la fenêtre
     * @param initAction action à effectuer après chargement du contrôleur (peut être null)
     */
    private void ouvrirFenetre(String fxmlPath, String titre, java.util.function.Consumer<Object> initAction) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent root = loader.load();
            if (initAction != null) initAction.accept(loader.getController());
            Stage stage = new Stage();
            stage.setScene(new Scene(root));
            stage.setTitle(titre);
            stage.showAndWait();
            chargerFeedbacks(); // Rafraîchir après fermeture
        } catch (IOException e) {
            showAlert("Erreur", "Impossible d'ouvrir la fenêtre : " + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    private void showAlert(String titre, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(titre);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}