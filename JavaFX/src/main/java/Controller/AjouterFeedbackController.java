package Controller;

import models.Feedback;
import services.FeedbackService;
import javafx.fxml.FXML;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.scene.text.Text;
import utils.SpellChecker;

import java.sql.Date;
import java.time.LocalDate;

/**
 * Contrôleur pour ajouter ou modifier un feedback.
 */
public class AjouterFeedbackController {

    @FXML private TextArea txtCommentaire;
    @FXML private HBox hboxEtoiles;
    @FXML private DatePicker dpDate;
    @FXML private Label lblNoteSelectionnee;
    @FXML private Button btnVerifierOrthographe;

    private final SpellChecker spellChecker = new SpellChecker();
    private final FeedbackService service = new FeedbackService();
    private Feedback feedbackAModifier = null;
    private int noteSelectionnee = 0;
    private final Text[] etoiles = new Text[5];

    @FXML
    public void initialize() {
        configurerEtoiles();
        dpDate.setValue(LocalDate.now()); // Date par défaut
    }

    private void configurerEtoiles() {
        hboxEtoiles.setAlignment(Pos.CENTER);
        hboxEtoiles.setSpacing(10);

        for (int i = 0; i < 5; i++) {
            final int index = i;
            Text etoile = new Text("★");
            etoile.setFont(Font.font("Arial", 45));
            etoile.setFill(Color.web("#E0E0E0"));
            etoile.setStyle("-fx-cursor: hand;");

            // Hover : colorie les étoiles jusqu'à l'index
            etoile.setOnMouseEntered(e -> {
                for (int j = 0; j <= index; j++) etoiles[j].setFill(Color.web("#FFD700"));
            });
            etoile.setOnMouseExited(e -> afficherEtoiles(noteSelectionnee));

            // Clic : sélectionne la note
            etoile.setOnMouseClicked(e -> {
                noteSelectionnee = index + 1;
                afficherEtoiles(noteSelectionnee);
                mettreAJourLabelNote();
            });

            etoiles[i] = etoile;
            hboxEtoiles.getChildren().add(etoile);
        }
    }

    private void afficherEtoiles(int note) {
        for (int i = 0; i < 5; i++) {
            etoiles[i].setFill(i < note ? Color.web("#FFD700") : Color.web("#E0E0E0"));
        }
    }

    private void mettreAJourLabelNote() {
        String[] labels = {"", "Très mauvais", "Mauvais", "Moyen", "Bon", "Excellent"};
        lblNoteSelectionnee.setText(labels[noteSelectionnee] + " (" + noteSelectionnee + "/5)");
        String couleur = switch (noteSelectionnee) {
            case 1, 2 -> "#d9534f";
            case 3 -> "#FF9800";
            case 4, 5 -> "#4CAF50";
            default -> "#666666";
        };
        lblNoteSelectionnee.setStyle("-fx-font-size: 18px; -fx-font-weight: bold; -fx-text-fill: " + couleur + ";");
    }

    /**
     * Pré-remplit le formulaire pour la modification.
     */
    public void preRemplir(Feedback f) {
        this.feedbackAModifier = f;
        txtCommentaire.setText(f.getCommentaire());
        dpDate.setValue(f.getDateStatut().toLocalDate());

        try {
            String noteStr = f.getNote();
            if (noteStr.contains("/")) noteStr = noteStr.split("/")[0].trim();
            int note = Integer.parseInt(noteStr);
            noteSelectionnee = Math.min(Math.max(note, 0), 5);
            afficherEtoiles(noteSelectionnee);
            mettreAJourLabelNote();
        } catch (NumberFormatException ignored) {}
    }

    @FXML
    private void ajouter() {
        // Validation
        if (txtCommentaire.getText().trim().isEmpty()) {
            showAlert("Erreur", "Le commentaire est obligatoire.", Alert.AlertType.ERROR);
            return;
        }
        if (noteSelectionnee == 0) {
            showAlert("Erreur", "Veuillez sélectionner une note.", Alert.AlertType.ERROR);
            return;
        }
        if (dpDate.getValue() == null) {
            showAlert("Erreur", "La date est obligatoire.", Alert.AlertType.ERROR);
            return;
        }

        Feedback f = (feedbackAModifier != null) ? feedbackAModifier : new Feedback();
        f.setCommentaire(txtCommentaire.getText().trim());
        f.setNote(String.valueOf(noteSelectionnee));
        f.setDateStatut(Date.valueOf(dpDate.getValue()));

        try {
            boolean succes = (feedbackAModifier != null) ? service.update(f) : service.ajouter(f);
            if (succes) {
                showAlert("Succès", (feedbackAModifier != null) ? "Feedback modifié !" : "Feedback ajouté !", Alert.AlertType.INFORMATION);
                fermerFenetre();
            } else {
                showAlert("Erreur", "Échec de l'opération.", Alert.AlertType.ERROR);
            }
        } catch (IllegalArgumentException e) {
            showAlert("Erreur de validation", e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    @FXML
    private void verifierOrthographe() {
        String commentaire = txtCommentaire.getText().trim();
        if (commentaire.isEmpty()) {
            showAlert("Information", "Le commentaire est vide.", Alert.AlertType.INFORMATION);
            return;
        }

        // Récupération fiable du bouton
        Button btn = btnVerifierOrthographe;
        if (btn == null) {
            // Chercher dans la scène si l'injection a échoué
            btn = (Button) txtCommentaire.getScene().lookup("#btnVerifierOrthographe");
        }
        final Button finalBtn = btn; // pour le lambda

        if (finalBtn != null) {
            finalBtn.setDisable(true);
        }

        new Thread(() -> {
            String errors = spellChecker.check(commentaire);
            javafx.application.Platform.runLater(() -> {
                if (finalBtn != null) {
                    finalBtn.setDisable(false);
                }
                if (errors != null && !errors.isEmpty()) {
                    Alert alert = new Alert(Alert.AlertType.WARNING);
                    alert.setTitle("Orthographe");
                    alert.setHeaderText("Erreurs potentielles détectées :");
                    alert.setContentText(errors);
                    alert.showAndWait();
                } else {
                    showAlert("Félicitations", "Aucune erreur orthographique détectée.", Alert.AlertType.INFORMATION);
                }
            });
        }).start();
    }

    @FXML
    private void retour() {
        fermerFenetre();
    }

    private void fermerFenetre() {
        txtCommentaire.getScene().getWindow().hide();
    }

    private void showAlert(String titre, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(titre);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}