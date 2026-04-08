package Controller;

import models.Reponse;
import services.ReponseService;
import javafx.fxml.FXML;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;

import java.sql.Date;
import java.time.LocalDate;
import java.util.List;

/**
 * Contrôleur pour afficher et gérer les réponses d'un feedback.
 */
public class VoirReponsesController {

    @FXML private VBox vboxReponses;
    @FXML private TextArea txtContenuReponse;
    @FXML private DatePicker dpDateReponse;
    @FXML private Label lblTitre;

    private final ReponseService service = new ReponseService();
    private int feedbackId;

    public void setFeedbackId(int id) {
        this.feedbackId = id;
        if (lblTitre != null) lblTitre.setText("💬 Réponses au Feedback #" + id);
    }

    @FXML
    public void initialize() {
        dpDateReponse.setValue(LocalDate.now());
    }

    public void chargerReponses() {
        vboxReponses.getChildren().clear();
        List<Reponse> reponses = service.getByFeedbackId(feedbackId);

        if (reponses.isEmpty()) {
            vboxReponses.getChildren().add(creerEtatVide());
            return;
        }

        for (Reponse r : reponses) {
            vboxReponses.getChildren().add(creerCarteReponse(r));
        }
    }

    private VBox creerEtatVide() {
        VBox empty = new VBox(20);
        empty.setAlignment(Pos.CENTER);
        empty.setStyle("-fx-padding: 50; -fx-background-color: #f8f9fa; -fx-background-radius: 10;");

        Label icon = new Label("💭");
        icon.setStyle("-fx-font-size: 60px;");

        Label msg = new Label("Aucune réponse pour ce feedback");
        msg.setStyle("-fx-font-size: 18px; -fx-text-fill: #666666; -fx-font-weight: bold;");

        Label sub = new Label("Soyez le premier à répondre !");
        sub.setStyle("-fx-font-size: 13px; -fx-text-fill: #999999;");

        empty.getChildren().addAll(icon, msg, sub);
        return empty;
    }

    private VBox creerCarteReponse(Reponse r) {
        VBox card = new VBox(12);
        card.setStyle("-fx-background-color: white; -fx-border-color: #E0E0E0; -fx-border-width: 1; -fx-padding: 20; -fx-background-radius: 10; -fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 8, 0, 0, 2);");

        // En-tête
        HBox header = new HBox(15);
        header.setAlignment(Pos.CENTER_LEFT);

        Label num = new Label("Réponse #" + r.getId());
        num.setStyle("-fx-font-size: 16px; -fx-font-weight: bold; -fx-text-fill: #1F4AA8;");

        Label date = new Label("📅 " + r.getDateReponse());
        date.setStyle("-fx-font-size: 13px; -fx-text-fill: #999999;");

        header.getChildren().addAll(num, date);

        // Contenu
        Label contenu = new Label(r.getContenu());
        contenu.setWrapText(true);
        contenu.setStyle("-fx-font-size: 14px; -fx-text-fill: #333333; -fx-padding: 10 0;");

        Separator sep = new Separator();
        sep.setStyle("-fx-background-color: #E0E0E0;");

        // Boutons
        HBox boutons = new HBox(12);
        boutons.setAlignment(Pos.CENTER_RIGHT);

        Button btnModifier = creerBoutonAction("✏️ Modifier", "#2196F3");
        btnModifier.setOnAction(e -> modifierReponse(r));

        Button btnSupprimer = creerBoutonAction("🗑️ Supprimer", "#f44336");
        btnSupprimer.setOnAction(e -> supprimerReponse(r.getId()));

        boutons.getChildren().addAll(btnModifier, btnSupprimer);

        card.getChildren().addAll(header, contenu, sep, boutons);
        return card;
    }

    private Button creerBoutonAction(String texte, String couleur) {
        Button btn = new Button(texte);
        btn.setStyle("-fx-background-color: " + couleur + "; -fx-text-fill: white; -fx-font-size: 13px; -fx-padding: 8 18; -fx-background-radius: 18; -fx-cursor: hand; -fx-font-weight: bold;");
        btn.setOnMouseEntered(e -> btn.setStyle("-fx-background-color: derive(" + couleur + ", -10%); -fx-text-fill: white; -fx-font-size: 13px; -fx-padding: 8 18; -fx-background-radius: 18; -fx-cursor: hand; -fx-font-weight: bold; -fx-scale-x: 1.05; -fx-scale-y: 1.05;"));
        btn.setOnMouseExited(e -> btn.setStyle("-fx-background-color: " + couleur + "; -fx-text-fill: white; -fx-font-size: 13px; -fx-padding: 8 18; -fx-background-radius: 18; -fx-cursor: hand; -fx-font-weight: bold;"));
        return btn;
    }

    @FXML
    private void ajouterReponse() {
        if (txtContenuReponse.getText().trim().isEmpty()) {
            showAlert("Erreur", "Le contenu est obligatoire.", Alert.AlertType.ERROR);
            return;
        }
        if (dpDateReponse.getValue() == null) {
            showAlert("Erreur", "La date est obligatoire.", Alert.AlertType.ERROR);
            return;
        }

        Reponse r = new Reponse();
        r.setContenu(txtContenuReponse.getText().trim());
        r.setDateReponse(Date.valueOf(dpDateReponse.getValue()));
        r.setFeedbackId(feedbackId);

        if (service.ajouter(r)) {
            showAlert("Succès", "Réponse ajoutée !", Alert.AlertType.INFORMATION);
            txtContenuReponse.clear();
            dpDateReponse.setValue(LocalDate.now());
            chargerReponses();
        } else {
            showAlert("Erreur", "Échec de l'ajout.", Alert.AlertType.ERROR);
        }
    }

    private void modifierReponse(Reponse r) {
        Dialog<Reponse> dialog = new Dialog<>();
        dialog.setTitle("Modifier Réponse");
        dialog.setHeaderText("Modifiez le contenu de la réponse");

        ButtonType btnConfirmer = new ButtonType("✓ Confirmer", ButtonBar.ButtonData.OK_DONE);
        dialog.getDialogPane().getButtonTypes().addAll(btnConfirmer, ButtonType.CANCEL);

        TextArea txtContenu = new TextArea(r.getContenu());
        txtContenu.setPromptText("Nouveau contenu...");
        txtContenu.setPrefRowCount(5);
        txtContenu.setWrapText(true);

        DatePicker dpDate = new DatePicker(r.getDateReponse().toLocalDate());

        VBox content = new VBox(15, new Label("📝 Contenu :"), txtContenu, new Label("📅 Date :"), dpDate);
        content.setStyle("-fx-padding: 20;");
        dialog.getDialogPane().setContent(content);

        dialog.setResultConverter(button -> {
            if (button == btnConfirmer) {
                if (txtContenu.getText().trim().isEmpty()) {
                    showAlert("Erreur", "Le contenu ne peut pas être vide.", Alert.AlertType.ERROR);
                    return null;
                }
                r.setContenu(txtContenu.getText().trim());
                r.setDateReponse(Date.valueOf(dpDate.getValue()));
                return r;
            }
            return null;
        });

        dialog.showAndWait().ifPresent(updated -> {
            if (service.update(updated)) {
                showAlert("Succès", "Réponse modifiée !", Alert.AlertType.INFORMATION);
                chargerReponses();
            } else {
                showAlert("Erreur", "Échec de la modification.", Alert.AlertType.ERROR);
            }
        });
    }

    private void supprimerReponse(int id) {
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setHeaderText("Supprimer cette réponse ?");
        confirm.setContentText("Cette action est irréversible.");
        if (confirm.showAndWait().orElse(ButtonType.CANCEL) == ButtonType.OK) {
            if (service.supprimer(id)) {
                showAlert("Succès", "Réponse supprimée !", Alert.AlertType.INFORMATION);
                chargerReponses();
            } else {
                showAlert("Erreur", "Échec de la suppression.", Alert.AlertType.ERROR);
            }
        }
    }

    @FXML
    private void fermer() {
        ((Stage) txtContenuReponse.getScene().getWindow()).close();
    }

    private void showAlert(String titre, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(titre);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}