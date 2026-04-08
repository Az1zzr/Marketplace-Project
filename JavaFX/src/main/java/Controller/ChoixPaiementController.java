package Controller;

import services.PromoCodeService;
import services.PromoCodeService.ResultatPromo;
// ✅ IMPORT UserDashboardController — adapter le package selon votre projet fusionné
import Controller.UserDashboardController;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import java.util.Optional;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.geometry.Insets;
import javafx.geometry.Pos;

public class ChoixPaiementController {

    @FXML private Label titleLabel;
    @FXML private Label montantLabel;
    @FXML private Button btnOnline;
    @FXML private Button btnTPE;
    @FXML private Button btnEspece;
    @FXML private Button btnAnnuler;
    @FXML private TextArea detailsCommande;

    @FXML private TextField promoCodeField;
    @FXML private Button btnAppliquerPromo;
    @FXML private Label promoResultLabel;
    @FXML private Label montantFinalLabel;

    private String numeroCommande;
    private Double montant;
    private Double montantApresPromo;
    private String nomClient;
    private String email;

    private String methodePaiementSelectionnee = null;
    private final PromoCodeService promoService = new PromoCodeService();
    private ResultatPromo dernierResultatPromo = null;

    @FXML
    public void initialize() {
        setupUI();
    }

    private void setupUI() {
        styleButton(btnOnline,   "-fx-background-color: #4F46E5;", "💳 Paiement en Ligne");
        styleButton(btnTPE,      "-fx-background-color: #F59E0B;", "🏪 Paiement TPE");
        styleButton(btnEspece,   "-fx-background-color: #10B981;", "💵 Paiement Espèces");
        styleButton(btnAnnuler,  "-fx-background-color: #EF4444;", "❌ Annuler");

        if (btnAppliquerPromo != null) {
            btnAppliquerPromo.setStyle(
                    "-fx-background-color: #FF9800; -fx-text-fill: white; " +
                            "-fx-font-size: 13px; -fx-cursor: hand; -fx-background-radius: 5;"
            );
            btnAppliquerPromo.setOnAction(e -> appliquerCodePromo());
        }

        if (promoCodeField != null) {
            promoCodeField.setOnAction(e -> appliquerCodePromo());
            promoCodeField.setPromptText("Ex: WELCOME10, PROMO20, VIP...");
        }

        btnOnline.setOnAction(e  -> choisirPaiementOnline());
        btnTPE.setOnAction(e     -> choisirPaiementTPE());
        btnEspece.setOnAction(e  -> choisirPaiementEspece());
        btnAnnuler.setOnAction(e -> annuler());
    }

    private void styleButton(Button btn, String style, String texte) {
        btn.setText(texte);
        btn.setStyle(style + " -fx-text-fill: white; -fx-font-size: 14px; -fx-padding: 15px; -fx-cursor: hand;");
        btn.setMinWidth(200);
    }

    public void remplirInfos(String numeroCommande, Double montant, String nomClient, String email) {
        this.numeroCommande   = numeroCommande;
        this.montant          = montant;
        this.montantApresPromo = montant;
        this.nomClient        = nomClient;
        this.email            = email;

        titleLabel.setText("Choisir la méthode de paiement");
        montantLabel.setText("Montant: " + String.format("%.2f TND", montant));

        if (montantFinalLabel != null) {
            montantFinalLabel.setText("Montant à payer : " + String.format("%.2f TND", montant));
            montantFinalLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #1F4AA8;");
        }

        mettreAJourDetails();
    }

    // =====================================================
    // CODE PROMO  (INCHANGÉ)
    // =====================================================

    @FXML
    public void appliquerCodePromo() {
        if (promoCodeField == null) return;

        String code = promoCodeField.getText().trim();

        if (code.isEmpty()) {
            afficherPromoMessage("⚠️ Entrez un code promo.", "orange");
            return;
        }

        ResultatPromo resultat = promoService.appliquerCodePromo(code, montant);
        dernierResultatPromo = resultat;

        if (resultat.valide) {
            montantApresPromo = resultat.montantFinalTND;

            montantLabel.setText("Montant original : " + String.format("%.2f TND", montant));

            if (montantFinalLabel != null) {
                montantFinalLabel.setText(
                        "💰 Montant à payer : " + String.format("%.2f TND", montantApresPromo) +
                                "  (économie : " + String.format("%.2f TND", resultat.reductionTND) + ")"
                );
                montantFinalLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #4CAF50;");
            }

            afficherPromoMessage(resultat.message, "#4CAF50");
            promoCodeField.setDisable(true);
            if (btnAppliquerPromo != null) {
                btnAppliquerPromo.setText("✅ Appliqué");
                btnAppliquerPromo.setDisable(true);
            }

        } else {
            montantApresPromo = montant;
            afficherPromoMessage(resultat.message, "#EF4444");
        }

        mettreAJourDetails();
    }

    public void reinitialiserPromo() {
        montantApresPromo = montant;
        dernierResultatPromo = null;

        if (promoCodeField != null) {
            promoCodeField.clear();
            promoCodeField.setDisable(false);
        }
        if (btnAppliquerPromo != null) {
            btnAppliquerPromo.setText("Appliquer");
            btnAppliquerPromo.setDisable(false);
        }
        if (promoResultLabel != null) {
            promoResultLabel.setText("");
        }
        if (montantFinalLabel != null) {
            montantFinalLabel.setText("Montant à payer : " + String.format("%.2f TND", montant));
            montantFinalLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #1F4AA8;");
        }

        montantLabel.setText("Montant: " + String.format("%.2f TND", montant));
        mettreAJourDetails();
    }

    private void afficherPromoMessage(String message, String couleur) {
        if (promoResultLabel != null) {
            promoResultLabel.setText(message);
            promoResultLabel.setStyle("-fx-text-fill: " + couleur + "; -fx-font-size: 12px;");
        }
    }

    private void mettreAJourDetails() {
        if (detailsCommande == null) return;

        StringBuilder details = new StringBuilder();
        details.append("=== DÉTAILS COMMANDE ===\n\n");
        details.append("Numéro: ").append(numeroCommande).append("\n");
        details.append("Client: ").append(nomClient).append("\n");
        details.append("Email: ").append(email).append("\n");
        details.append("Montant original: ").append(String.format("%.2f TND", montant)).append("\n");

        if (dernierResultatPromo != null && dernierResultatPromo.valide) {
            details.append("Code promo: ").append(dernierResultatPromo.codePromo.code).append("\n");
            details.append("Réduction: -").append(String.format("%.2f TND", dernierResultatPromo.reductionTND)).append("\n");
            details.append("💰 MONTANT FINAL: ").append(String.format("%.2f TND", montantApresPromo)).append("\n");
        } else {
            details.append("Montant à payer: ").append(String.format("%.2f TND", montantApresPromo)).append("\n");
        }

        details.append("Date: ").append(java.time.LocalDate.now()).append("\n");
        details.append("\n=========================");

        detailsCommande.setText(details.toString());
        detailsCommande.setEditable(false);
    }

    // =====================================================
    // PAIEMENT EN LIGNE  (INCHANGÉ)
    // =====================================================

    @FXML
    public void choisirPaiementOnline() {
        methodePaiementSelectionnee = "ONLINE";

        String infoPromo = "";
        if (dernierResultatPromo != null && dernierResultatPromo.valide) {
            infoPromo = "\n\n🎟️ CODE PROMO APPLIQUÉ:\n" +
                    "Code: " + dernierResultatPromo.codePromo.code + "\n" +
                    "Réduction: -" + String.format("%.2f TND", dernierResultatPromo.reductionTND) + "\n" +
                    "Montant final: " + String.format("%.2f TND", montantApresPromo);
        }

        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Paiement en Ligne");
        alert.setHeaderText("💳 Paiement sécurisé par Stripe");
        alert.setContentText(
                "Montant à payer: " + String.format("%.2f TND", montantApresPromo) + "\n" +
                        "Client: " + nomClient + infoPromo + "\n\n" +
                        "Cartes acceptées: Visa, Mastercard, American Express\n\n" +
                        "CARTES DE TEST:\n" +
                        "✅ 4242 4242 4242 4242 (Succès)\n" +
                        "❌ 4000 0000 0000 0002 (Échec)\n" +
                        "Exp: 12/34, CVC: 123"
        );

        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent()) {
            effectuerPaiementOnline();
        }
    }

    private void effectuerPaiementOnline() {
        try {
            afficherChargement("Initialisation paiement Stripe...");
            Thread.sleep(1500);
            ouvrirFormulaireStripe();
        } catch (InterruptedException e) {
            afficherErreur("Erreur", "Erreur lors du paiement: " + e.getMessage());
        }
    }

    private void ouvrirFormulaireStripe() {
        Dialog<String> dialog = new Dialog<>();
        dialog.setTitle("💳 Formulaire de Paiement Stripe");

        String titrePromo = dernierResultatPromo != null && dernierResultatPromo.valide
                ? String.format("Montant après promo : %.2f TND", montantApresPromo)
                : "Entrez vos informations de carte bancaire";
        dialog.setHeaderText(titrePromo);

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20));

        TextField carteField = new TextField();
        carteField.setPromptText("Numéro de carte (ex: 4242 4242 4242 4242)");

        TextField expirationField = new TextField();
        expirationField.setPromptText("MM/YY (ex: 12/34)");
        expirationField.setPrefWidth(100);

        TextField cvcField = new TextField();
        cvcField.setPromptText("CVC (ex: 123)");
        cvcField.setPrefWidth(100);

        grid.add(new Label("Numéro de carte:"), 0, 0);
        grid.add(carteField, 1, 0);
        grid.add(new Label("Expiration:"), 0, 1);
        grid.add(expirationField, 1, 1);
        grid.add(new Label("CVC:"), 0, 2);
        grid.add(cvcField, 1, 2);

        StringBuilder recap = new StringBuilder();
        recap.append("🧪 CARTES DE TEST:\n\n");
        recap.append("✅ Succès: 4242 4242 4242 4242\n");
        recap.append("❌ Échec: 4000 0000 0000 0002\n\n");
        recap.append("Expiration: 12/34  |  CVC: 123\n\n");

        if (dernierResultatPromo != null && dernierResultatPromo.valide) {
            recap.append("────────────────────\n");
            recap.append("🎟️ CODE PROMO : ").append(dernierResultatPromo.codePromo.code).append("\n");
            recap.append("Montant original : ").append(String.format("%.2f TND\n", montant));
            recap.append("Réduction : -").append(String.format("%.2f TND\n", dernierResultatPromo.reductionTND));
            recap.append("💰 À PAYER : ").append(String.format("%.2f TND", montantApresPromo));
        } else {
            recap.append("💰 À PAYER : ").append(String.format("%.2f TND", montantApresPromo));
        }

        TextArea infoArea = new TextArea(recap.toString());
        infoArea.setEditable(false);
        infoArea.setPrefHeight(180);
        infoArea.setWrapText(true);

        grid.add(new Label("Récapitulatif:"), 0, 3);
        grid.add(infoArea, 0, 4, 2, 1);

        dialog.getDialogPane().setContent(grid);
        dialog.getDialogPane().getButtonTypes().addAll(
                new ButtonType("💳 Payer " + String.format("%.2f TND", montantApresPromo), ButtonBar.ButtonData.OK_DONE),
                ButtonType.CANCEL
        );

        Optional<String> result = dialog.showAndWait();
        if (result.isPresent()) {
            confirmerPaiementOnline(carteField.getText());
        }
    }

    private void confirmerPaiementOnline(String numeroCarte) {
        if (!validerNumeroCarte(numeroCarte)) {
            afficherErreur("Erreur", "Numéro de carte invalide");
            return;
        }

        try {
            afficherChargement("Traitement du paiement...");
            Thread.sleep(2000);

            String msgSucces = "Votre paiement de " + String.format("%.2f TND", montantApresPromo) + " a été accepté.\n";
            if (dernierResultatPromo != null && dernierResultatPromo.valide) {
                msgSucces += "\n🎟️ Code promo «" + dernierResultatPromo.codePromo.code + "» utilisé.\n";
                msgSucces += "Économie réalisée : " + String.format("%.2f TND", dernierResultatPromo.reductionTND);
            }
            msgSucces += "\n\nUne facture a été envoyée à " + email;

            afficherSucces("Paiement réussi ! ✅", msgSucces);
            fermerOuNaviguer();
        } catch (InterruptedException e) {
            afficherErreur("Erreur", "Paiement échoué");
        }
    }

    // =====================================================
    // PAIEMENT TPE  (INCHANGÉ)
    // =====================================================

    @FXML
    public void choisirPaiementTPE() {
        methodePaiementSelectionnee = "TPE";

        Dialog<String> dialog = new Dialog<>();
        dialog.setTitle("🏪 Paiement par TPE");
        dialog.setHeaderText("Terminal de Paiement Électronique");

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20));

        ComboBox<String> tpeCombo = new ComboBox<>();
        tpeCombo.getItems().addAll(
                "TPE1 - Ingenico (Caisse 1)",
                "TPE2 - Verifone (Caisse 2)",
                "TPE3 - SumUp (Mobile)"
        );
        tpeCombo.setValue("TPE1 - Ingenico (Caisse 1)");

        PasswordField pinField = new PasswordField();
        pinField.setPromptText("Code PIN (défaut: 0000)");

        grid.add(new Label("Sélectionner le TPE:"), 0, 0);
        grid.add(tpeCombo, 1, 0);
        grid.add(new Label("Code PIN (optionnel):"), 0, 1);
        grid.add(pinField, 1, 1);

        StringBuilder infoText = new StringBuilder();
        infoText.append("💳 PAIEMENT TPE\n\n");
        if (dernierResultatPromo != null && dernierResultatPromo.valide) {
            infoText.append("🎟️ Code promo : ").append(dernierResultatPromo.codePromo.code).append("\n");
            infoText.append("Montant original : ").append(String.format("%.2f TND\n", montant));
            infoText.append("Réduction : -").append(String.format("%.2f TND\n", dernierResultatPromo.reductionTND));
            infoText.append("💰 Montant à présenter au TPE : ").append(String.format("%.2f TND", montantApresPromo));
        } else {
            infoText.append("Montant: ").append(String.format("%.2f TND", montantApresPromo));
        }

        TextArea infoArea = new TextArea(infoText.toString());
        infoArea.setEditable(false);
        infoArea.setPrefHeight(150);

        grid.add(infoArea, 0, 2, 2, 1);

        dialog.getDialogPane().setContent(grid);
        dialog.getDialogPane().getButtonTypes().addAll(
                new ButtonType("🏪 Initier le paiement", ButtonBar.ButtonData.OK_DONE),
                ButtonType.CANCEL
        );

        Optional<String> result = dialog.showAndWait();
        if (result.isPresent()) {
            effectuerPaiementTPE(tpeCombo.getValue(), pinField.getText());
        }
    }

    private void effectuerPaiementTPE(String nomTPE, String pin) {
        try {
            afficherChargement("Initialisation du TPE...");
            Thread.sleep(1500);

            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("TPE Actif");
            alert.setHeaderText("En attente du client");
            alert.setContentText(
                    "🏪 TPE: " + nomTPE + "\n" +
                            "💰 Montant à payer: " + String.format("%.2f TND", montantApresPromo) + "\n\n" +
                            "⏳ En attente que le client présente sa carte...\n\n" +
                            "Cliquez sur OK une fois le paiement confirmé"
            );

            Optional<ButtonType> result = alert.showAndWait();
            if (result.isPresent()) {
                afficherChargement("Confirmation du paiement TPE...");
                Thread.sleep(1500);
                afficherSucces("Paiement TPE réussi ! ✅",
                        "Paiement de " + String.format("%.2f TND", montantApresPromo) + " confirmé.");
                fermerOuNaviguer();
            }
        } catch (InterruptedException e) {
            afficherErreur("Erreur", "Erreur TPE: " + e.getMessage());
        }
    }

    // =====================================================
    // PAIEMENT ESPÈCES  (INCHANGÉ)
    // =====================================================

    @FXML
    public void choisirPaiementEspece() {
        methodePaiementSelectionnee = "ESPECE";

        Dialog<Double> dialog = new Dialog<>();
        dialog.setTitle("💵 Paiement en Espèces");
        dialog.setHeaderText("Paiement comptant");

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20));

        Label montantAPayerLabel = new Label("Montant à payer: " + String.format("%.2f TND", montantApresPromo));
        montantAPayerLabel.setFont(Font.font(null, FontWeight.BOLD, 14));

        if (dernierResultatPromo != null && dernierResultatPromo.valide) {
            Label promoInfo = new Label("🎟️ Promo «" + dernierResultatPromo.codePromo.code + "» : -"
                    + String.format("%.2f TND", dernierResultatPromo.reductionTND));
            promoInfo.setStyle("-fx-text-fill: #4CAF50; -fx-font-weight: bold;");
            grid.add(promoInfo, 0, 0, 2, 1);
            grid.add(montantAPayerLabel, 0, 1, 2, 1);
        } else {
            grid.add(montantAPayerLabel, 0, 0, 2, 1);
        }

        Spinner<Double> montantRecuSpinner = new Spinner<>(0.0, 10000.0, montantApresPromo, 50.0);
        montantRecuSpinner.setPrefWidth(150);

        int spinnerRow = (dernierResultatPromo != null && dernierResultatPromo.valide) ? 2 : 1;
        grid.add(new Label("Montant reçu en espèces:"), 0, spinnerRow);
        grid.add(montantRecuSpinner, 1, spinnerRow);

        TextArea infoArea = new TextArea();
        infoArea.setEditable(false);
        infoArea.setWrapText(true);

        final double montantAPayer = montantApresPromo;
        montantRecuSpinner.valueProperty().addListener((obs, oldVal, newVal) -> {
            double rendu = newVal - montantAPayer;
            StringBuilder info = new StringBuilder();
            info.append("💰 PAIEMENT EN ESPÈCES\n\n");
            info.append("À payer: ").append(String.format("%.2f TND", montantAPayer)).append("\n");
            info.append("Reçu: ").append(String.format("%.2f TND", newVal)).append("\n");
            if (rendu > 0)      info.append("Rendu: ").append(String.format("%.2f TND", rendu)).append(" ✓");
            else if (rendu < 0) info.append("Manquant: ").append(String.format("%.2f TND", Math.abs(rendu))).append(" ❌");
            else                info.append("Exact! ✓");
            infoArea.setText(info.toString());
        });
        montantRecuSpinner.getValueFactory().setValue(montantAPayer);

        grid.add(infoArea, 0, spinnerRow + 1, 2, 1);

        dialog.getDialogPane().setContent(grid);
        dialog.getDialogPane().getButtonTypes().addAll(
                new ButtonType("💵 Confirmer", ButtonBar.ButtonData.OK_DONE),
                ButtonType.CANCEL
        );

        dialog.setResultConverter(dialogButton -> {
            if (dialogButton.getButtonData() == ButtonBar.ButtonData.OK_DONE) {
                return montantRecuSpinner.getValue();
            }
            return null;
        });

        Optional<Double> result = dialog.showAndWait();
        if (result.isPresent()) {
            confirmerPaiementEspece(result.get());
        }
    }

    private void confirmerPaiementEspece(Double montantRecu) {
        if (montantRecu < montantApresPromo) {
            afficherErreur("Montant insuffisant",
                    "Montant reçu: " + String.format("%.2f TND", montantRecu) + "\n" +
                            "Montant requis: " + String.format("%.2f TND", montantApresPromo));
            return;
        }

        double rendu = montantRecu - montantApresPromo;

        StringBuilder message = new StringBuilder();
        message.append("Paiement de ").append(String.format("%.2f TND", montantApresPromo)).append(" confirmé!\n\n");
        if (rendu > 0)  message.append("💵 Rendu: ").append(String.format("%.2f TND", rendu)).append("\n");
        else            message.append("💵 Montant exact\n");

        if (dernierResultatPromo != null && dernierResultatPromo.valide) {
            message.append("\n🎟️ Code promo «").append(dernierResultatPromo.codePromo.code).append("» utilisé.\n");
            message.append("Économie : ").append(String.format("%.2f TND", dernierResultatPromo.reductionTND));
        }

        afficherSucces("Paiement en espèces réussi ! ✅", message.toString());
        fermerOuNaviguer();
    }

    // =====================================================
    // UTILITAIRES
    // =====================================================

    private void afficherChargement(String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Traitement...");
        alert.setHeaderText(message);
        alert.show();
    }

    private void afficherSucces(String titre, String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle(titre);
        alert.setHeaderText(titre);
        alert.setContentText(message);
        alert.showAndWait();
    }

    private void afficherErreur(String titre, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(titre);
        alert.setHeaderText(titre);
        alert.setContentText(message);
        alert.showAndWait();
    }

    private boolean validerNumeroCarte(String numeroCarte) {
        return numeroCarte != null && numeroCarte.replaceAll("\\s+", "").length() == 16;
    }

    /**
     * ✅ MODIFIÉ : distingue 2 cas :
     *   1. Ouvert comme dialog standalone (depuis AjouterCommandeController) → fermer la fenêtre
     *   2. Intégré dans le UserDashboard via sidebar → naviguer vers AjouterCommande
     */
    private void fermerOuNaviguer() {
        if (UserDashboardController.current != null) {
            UserDashboardController.current.showAjouterCommande();
        } else {
            fermerDialog();
        }
    }

    private void fermerDialog() {
        if (btnAnnuler != null && btnAnnuler.getScene() != null) {
            javafx.stage.Stage stage = (javafx.stage.Stage) btnAnnuler.getScene().getWindow();
            stage.close();
        }
    }

    // ✅ MODIFIÉ : annuler() utilise fermerOuNaviguer()
    @FXML
    public void annuler() {
        methodePaiementSelectionnee = null;
        fermerOuNaviguer();
    }

    public String getMethodePaiementSelectionnee() {
        return methodePaiementSelectionnee;
    }

    public Double getMontantApresPromo() {
        return montantApresPromo;
    }
}