package Controller;

import Entities.Commande;
import services.CommandeService;
import javafx.application.Platform;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.stage.Modality;
import javafx.stage.Stage;

import java.awt.Desktop;
import java.io.*;
import java.net.URI;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

public class StripeWebViewDialog {

    private static final String STRIPE_PAYMENT_LINK = "https://buy.stripe.com/test_3cIcN5c43eDNbmI4GW8k801";

    // Taux de conversion TND -> EUR (1 EUR ≈ 3.30 TND)
    private static final double TAUX_TND_TO_EUR = 3.30;

    private Stage dialogStage;
    private boolean paiementEffectue = false;
    private final Commande commande;
    private final Runnable onPaiementSuccess;

    public StripeWebViewDialog(Commande commande, Runnable onPaiementSuccess) {
        this.commande = commande;
        this.onPaiementSuccess = onPaiementSuccess;
    }

    private double getMontantEUR() {
        return commande.getMontantTotal() / TAUX_TND_TO_EUR;
    }

    public void afficher(Stage parentStage) {
        dialogStage = new Stage();
        dialogStage.initModality(Modality.APPLICATION_MODAL);
        dialogStage.initOwner(parentStage);
        dialogStage.setTitle("Paiement Stripe - Commande " + commande.getNumeroCommande());
        dialogStage.setWidth(560);
        dialogStage.setHeight(520);
        dialogStage.setResizable(false);

        // EN-TETE
        HBox header = new HBox();
        header.setAlignment(Pos.CENTER_LEFT);
        header.setSpacing(15);
        header.setPadding(new Insets(12, 20, 12, 20));
        header.setStyle("-fx-background-color: #1F4AA8;");

        Label titleLabel = new Label("Paiement Securise Stripe");
        titleLabel.setFont(new Font("Arial Bold", 16));
        titleLabel.setTextFill(Color.WHITE);

        Region headerSpacer = new Region();
        HBox.setHgrow(headerSpacer, Priority.ALWAYS);

        VBox infoBox = new VBox(2);
        infoBox.setAlignment(Pos.CENTER_RIGHT);
        Label infoCommande = new Label("N " + commande.getNumeroCommande() + "  |  " + commande.getClient());
        infoCommande.setFont(new Font("Arial Bold", 12));
        infoCommande.setTextFill(Color.web("#FFD700"));
        Label infoMontant = new Label(String.format("Montant : %.2f TND (approx %.2f EUR)", commande.getMontantTotal(), getMontantEUR()));
        infoMontant.setFont(new Font("Arial Bold", 13));
        infoMontant.setTextFill(Color.web("#90EE90"));
        infoBox.getChildren().addAll(infoCommande, infoMontant);

        Button fermerBtn = new Button("X");
        fermerBtn.setStyle("-fx-background-color: #d9534f; -fx-text-fill: white; -fx-font-size: 14; -fx-font-weight: bold; -fx-cursor: hand; -fx-background-radius: 5; -fx-min-width: 35; -fx-min-height: 35;");
        fermerBtn.setOnAction(e -> dialogStage.close());

        header.getChildren().addAll(titleLabel, headerSpacer, infoBox, fermerBtn);

        // BARRE TEST
        HBox testBar = new HBox();
        testBar.setAlignment(Pos.CENTER);
        testBar.setSpacing(20);
        testBar.setPadding(new Insets(8, 20, 8, 20));
        testBar.setStyle("-fx-background-color: #FFF3CD; -fx-border-color: #FFD700; -fx-border-width: 0 0 1 0;");
        Label testIcon = new Label("MODE TEST");
        testIcon.setFont(new Font("Arial Bold", 11));
        testIcon.setTextFill(Color.web("#856404"));
        Label testInfo = new Label("Carte de test :  4242 4242 4242 4242   |   Exp : 12/29   |   CVC : 123");
        testInfo.setFont(new Font("Arial", 11));
        testInfo.setTextFill(Color.web("#856404"));
        testBar.getChildren().addAll(testIcon, testInfo);

        // CONTENU - 3 etapes (remplace la WebView bloquee par Stripe)
        VBox content = new VBox(14);
        content.setPadding(new Insets(25, 30, 15, 30));
        VBox.setVgrow(content, Priority.ALWAYS);
        content.getChildren().addAll(
                creerEtape("1", "#1F4AA8", "Cliquer sur Ouvrir Stripe",
                        "La page de paiement s'ouvre dans Chrome / Firefox / Edge"),
                creerEtape("2", "#635BFF", "Effectuer le paiement sur Stripe",
                        "Carte test : 4242 4242 4242 4242   |   Exp : 12/29   |   CVC : 123"),
                creerEtape("3", "#4CAF50", "Revenir ici et cliquer Confirmer",
                        "Une fois le paiement termine sur Stripe, cliquez le bouton vert ci-dessous")
        );

        // FOOTER avec boutons
        VBox footer = new VBox(10);
        footer.setPadding(new Insets(10, 20, 20, 20));
        footer.setStyle("-fx-border-color: #CCCCCC; -fx-border-width: 1 0 0 0;");

        // Bouton 1 : Ouvrir Stripe dans le navigateur
        Button ouvrirBtn = new Button("Ouvrir Stripe dans le navigateur");
        ouvrirBtn.setMaxWidth(Double.MAX_VALUE);
        ouvrirBtn.setStyle("-fx-background-color: #635BFF; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-cursor: hand; -fx-background-radius: 8; -fx-padding: 13;");
        ouvrirBtn.setOnAction(e -> ouvrirStripeNavigateur());

        // Bouton 2 : Confirmer apres paiement dans le navigateur
        Button confirmerBtn = new Button("J'ai paye - Confirmer le paiement");
        confirmerBtn.setMaxWidth(Double.MAX_VALUE);
        confirmerBtn.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white; -fx-font-size: 14px; -fx-font-weight: bold; -fx-cursor: hand; -fx-background-radius: 8; -fx-padding: 13;");
        confirmerBtn.setOnAction(e -> onPaiementDetecte());

        // Bouton 3 : Annuler
        Button annulerBtn = new Button("Annuler");
        annulerBtn.setMaxWidth(Double.MAX_VALUE);
        annulerBtn.setStyle("-fx-background-color: transparent; -fx-text-fill: #d9534f; -fx-font-size: 12px; -fx-cursor: hand; -fx-border-color: #d9534f; -fx-border-radius: 8; -fx-background-radius: 8; -fx-padding: 8;");
        annulerBtn.setOnAction(e -> dialogStage.close());

        Label secureLabel = new Label("Paiement securise par Stripe - Vos donnees ne transitent pas par cette application");
        secureLabel.setFont(new Font("Arial", 9));
        secureLabel.setTextFill(Color.web("#888888"));
        secureLabel.setWrapText(true);

        footer.getChildren().addAll(ouvrirBtn, confirmerBtn, annulerBtn, secureLabel);

        // ASSEMBLAGE
        VBox root = new VBox();
        root.getChildren().addAll(header, testBar, content, footer);
        VBox.setVgrow(content, Priority.ALWAYS);

        Scene scene = new Scene(root);
        dialogStage.setScene(scene);
        dialogStage.showAndWait();
    }

    /**
     * Cree une etape visuelle numerotee
     */
    private VBox creerEtape(String numero, String couleur, String titre, String description) {
        HBox box = new HBox(15);
        box.setAlignment(Pos.CENTER_LEFT);
        box.setPadding(new Insets(12, 15, 12, 15));
        box.setStyle("-fx-background-color: white; -fx-border-color: #E0E0E0; -fx-border-radius: 8; -fx-background-radius: 8;");

        Label numLabel = new Label(numero);
        numLabel.setMinWidth(36);
        numLabel.setMinHeight(36);
        numLabel.setAlignment(Pos.CENTER);
        numLabel.setStyle("-fx-background-color: " + couleur + "; -fx-background-radius: 18; -fx-text-fill: white; -fx-font-size: 16; -fx-font-weight: bold;");

        VBox texteBox = new VBox(3);
        Label titreLabel = new Label(titre);
        titreLabel.setFont(new Font("Arial Bold", 13));
        titreLabel.setTextFill(Color.web("#222222"));
        Label descLabel = new Label(description);
        descLabel.setFont(new Font("Arial", 11));
        descLabel.setTextFill(Color.web("#666666"));
        descLabel.setWrapText(true);
        texteBox.getChildren().addAll(titreLabel, descLabel);
        HBox.setHgrow(texteBox, Priority.ALWAYS);

        box.getChildren().addAll(numLabel, texteBox);
        return new VBox(box);
    }

    /**
     * Ouvre Stripe dans le vrai navigateur (Chrome/Firefox/Edge)
     * JavaFX WebView est bloque par Stripe pour des raisons de securite
     */
    private void ouvrirStripeNavigateur() {
        try {
            long montantCentimesEUR = Math.round(getMontantEUR() * 100);
            String urlAvecMontant = STRIPE_PAYMENT_LINK + "?prefilled_amount=" + montantCentimesEUR;

            System.out.println(">>> Ouverture navigateur: " + urlAvecMontant);
            System.out.println(">>> Montant TND: " + commande.getMontantTotal() + " -> EUR: " + String.format("%.2f", getMontantEUR()));

            if (Desktop.isDesktopSupported() && Desktop.getDesktop().isSupported(Desktop.Action.BROWSE)) {
                Desktop.getDesktop().browse(new URI(urlAvecMontant));
            } else {
                String os = System.getProperty("os.name").toLowerCase();
                if (os.contains("win"))      Runtime.getRuntime().exec(new String[]{"cmd", "/c", "start", urlAvecMontant});
                else if (os.contains("mac")) Runtime.getRuntime().exec(new String[]{"open", urlAvecMontant});
                else                         Runtime.getRuntime().exec(new String[]{"xdg-open", urlAvecMontant});
            }

        } catch (Exception e) {
            System.err.println("Erreur ouverture navigateur: " + e.getMessage());
            e.printStackTrace();
            Alert err = new Alert(Alert.AlertType.ERROR);
            err.setTitle("Erreur");
            err.setHeaderText("Impossible d'ouvrir le navigateur");
            err.setContentText("Copiez ce lien dans votre navigateur :\n\n" + STRIPE_PAYMENT_LINK);
            err.showAndWait();
        }
    }

    /**
     * Appelee quand le paiement est confirme par l'utilisateur
     */
    private void onPaiementDetecte() {
        if (paiementEffectue) return;

        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmer le paiement");
        confirm.setHeaderText("Avez-vous bien effectue le paiement sur Stripe ?");
        confirm.setContentText(
                "Commande : " + commande.getNumeroCommande() + "\n" +
                        "Client    : " + commande.getClient() + "\n" +
                        "Montant   : " + String.format("%.2f TND (approx %.2f EUR)", commande.getMontantTotal(), getMontantEUR()) + "\n\n" +
                        "Confirmez uniquement si le paiement Stripe est termine."
        );

        confirm.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                paiementEffectue = true;
                finaliserPaiement();
            }
        });
    }

    private void finaliserPaiement() {
        // Mettre a jour le statut en BD
        try {
            commande.setStatut("Payee");
            CommandeService cs = new CommandeService();
            if (cs.modifier(commande)) {
                System.out.println("Commande " + commande.getNumeroCommande() + " marquee PAYEE");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        String cheminPDF = genererFacturePDFLocal();
        dialogStage.close();

        if (onPaiementSuccess != null) {
            Platform.runLater(onPaiementSuccess);
        }

        String cheminFinal = cheminPDF;
        Platform.runLater(() -> {

            Stage alertStage = new Stage();
            alertStage.setTitle("Paiement Reussi !");
            alertStage.setResizable(true);
            alertStage.setWidth(600);
            alertStage.setHeight(400);

            VBox vbox = new VBox(12);
            vbox.setPadding(new Insets(20));
            vbox.setStyle("-fx-background-color: white;");

            HBox headerBox = new HBox(10);
            headerBox.setAlignment(Pos.CENTER_LEFT);
            headerBox.setPadding(new Insets(12));
            headerBox.setStyle("-fx-background-color: #4CAF50; -fx-background-radius: 8;");
            Label iconLabel = new Label("OK");
            iconLabel.setFont(new Font("Arial Bold", 18));
            iconLabel.setTextFill(Color.WHITE);
            Label headerLabel = new Label("Paiement enregistre avec succes !");
            headerLabel.setFont(new Font("Arial Bold", 16));
            headerLabel.setTextFill(Color.WHITE);
            headerBox.getChildren().addAll(iconLabel, headerLabel);

            GridPane grid = new GridPane();
            grid.setHgap(15);
            grid.setVgap(8);
            grid.setPadding(new Insets(10));
            grid.setStyle("-fx-background-color: #f9f9f9; -fx-border-color: #ddd; -fx-border-radius: 5; -fx-background-radius: 5;");

            ajouterLigneGrid(grid, 0, "Commande", commande.getNumeroCommande());
            ajouterLigneGrid(grid, 1, "Client", commande.getClient());
            ajouterLigneGrid(grid, 2, "Montant", String.format("%.2f TND  (approx %.2f EUR payes via Stripe)", commande.getMontantTotal(), getMontantEUR()));
            ajouterLigneGrid(grid, 3, "Statut", "PAYEE");

            VBox cheminBox = new VBox(5);
            Label cheminLabel = new Label("Facture generee sur votre Bureau :");
            cheminLabel.setFont(new Font("Arial Bold", 12));
            cheminLabel.setTextFill(Color.web("#1F4AA8"));

            TextField cheminField = new TextField(cheminFinal != null ? cheminFinal : "Non generee");
            cheminField.setEditable(false);
            cheminField.setStyle("-fx-background-color: #e8f4e8; -fx-border-color: #4CAF50; -fx-font-size: 11; -fx-font-family: 'Courier New';");
            cheminField.setPrefWidth(560);
            cheminField.setOnMouseClicked(e -> cheminField.selectAll());
            cheminBox.getChildren().addAll(cheminLabel, cheminField);

            Button okBtn = new Button("OK - Ouvrir la facture");
            okBtn.setStyle("-fx-background-color: #1F4AA8; -fx-text-fill: white; -fx-font-size: 13; -fx-font-weight: bold; -fx-cursor: hand; -fx-background-radius: 5;");
            okBtn.setPrefWidth(200);
            okBtn.setOnAction(e -> {
                alertStage.close();
                if (cheminFinal != null) ouvrirFichier(cheminFinal);
            });

            HBox btnBox = new HBox();
            btnBox.setAlignment(Pos.CENTER_RIGHT);
            btnBox.getChildren().add(okBtn);

            vbox.getChildren().addAll(headerBox, grid, cheminBox, btnBox);
            alertStage.setScene(new Scene(vbox));
            alertStage.showAndWait();
        });
    }

    private void ajouterLigneGrid(GridPane grid, int row, String label, String valeur) {
        Label lbl = new Label(label + " :");
        lbl.setFont(new Font("Arial Bold", 12));
        lbl.setTextFill(Color.web("#555555"));
        Label val = new Label(valeur);
        val.setFont(new Font("Arial", 12));
        if (valeur.contains("PAYEE")) {
            val.setTextFill(Color.web("#4CAF50"));
            val.setStyle("-fx-font-weight: bold;");
        }
        grid.add(lbl, 0, row);
        grid.add(val, 1, row);
    }

    private String genererFacturePDFLocal() {
        try {
            String bureau = System.getProperty("user.home") + File.separator + "Desktop"
                    + File.separator + "Factures_Stripe";
            File dossier = new File(bureau);
            if (!dossier.exists()) dossier.mkdirs();

            String dateStr = LocalDateTime.now().format(DateTimeFormatter.ofPattern("yyyyMMdd_HHmmss"));
            String nomFichier = "Facture_" + commande.getNumeroCommande() + "_" + dateStr + ".html";
            String cheminFichier = bureau + File.separator + nomFichier;

            try (FileWriter writer = new FileWriter(cheminFichier)) {
                writer.write(genererHTMLFacture());
            }

            System.out.println("Facture generee: " + cheminFichier);
            return cheminFichier;

        } catch (Exception e) {
            System.err.println("Erreur generation facture: " + e.getMessage());
            e.printStackTrace();
            return null;
        }
    }

    private String genererHTMLFacture() {
        String dateNow = LocalDateTime.now().format(DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm"));
        double montantEUR = getMontantEUR();

        return "<!DOCTYPE html>" +
                "<html><head><meta charset='UTF-8'>" +
                "<title>Facture " + commande.getNumeroCommande() + "</title>" +
                "<style>" +
                "  body { font-family: Arial, sans-serif; margin: 40px; color: #333; }" +
                "  .header { background: #1F4AA8; color: white; padding: 20px; border-radius: 8px; display: flex; justify-content: space-between; }" +
                "  .header h1 { margin: 0; font-size: 24px; }" +
                "  .header .badge { background: #4CAF50; padding: 8px 15px; border-radius: 20px; font-weight: bold; }" +
                "  .section { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 8px; }" +
                "  .section h3 { color: #1F4AA8; margin-top: 0; border-bottom: 2px solid #1F4AA8; padding-bottom: 8px; }" +
                "  .row { display: flex; justify-content: space-between; margin: 8px 0; }" +
                "  .label { color: #666; font-weight: bold; }" +
                "  .value { color: #333; }" +
                "  .total-box { background: #1F4AA8; color: white; padding: 20px; border-radius: 8px; text-align: center; margin: 20px 0; }" +
                "  .total-box .amount { font-size: 32px; font-weight: bold; }" +
                "  .stripe-badge { background: #635BFF; color: white; padding: 5px 12px; border-radius: 5px; font-size: 12px; }" +
                "  .footer { text-align: center; color: #888; font-size: 11px; margin-top: 30px; padding-top: 15px; border-top: 1px solid #ddd; }" +
                "  table { width: 100%; border-collapse: collapse; }" +
                "  th { background: #1F4AA8; color: white; padding: 10px; text-align: left; }" +
                "  td { padding: 10px; border-bottom: 1px solid #eee; }" +
                "</style></head><body>" +
                "<div class='header'>" +
                "  <div><h1>FACTURE DE PAIEMENT</h1><p style='margin:5px 0;opacity:0.8'>Paiement securise via Stripe</p></div>" +
                "  <div style='text-align:right'>" +
                "    <div class='badge'>PAYEE</div>" +
                "    <p style='margin:8px 0;font-size:13px'>N " + commande.getNumeroCommande() + "</p>" +
                "    <p style='margin:0;font-size:12px;opacity:0.8'>" + dateNow + "</p>" +
                "  </div>" +
                "</div>" +
                "<div class='section'>" +
                "  <h3>Informations de la commande</h3>" +
                "  <div class='row'><span class='label'>Numero :</span><span class='value'>" + commande.getNumeroCommande() + "</span></div>" +
                "  <div class='row'><span class='label'>Client :</span><span class='value'>" + commande.getClient() + "</span></div>" +
                "  <div class='row'><span class='label'>Date :</span><span class='value'>" + commande.getDateCommande() + "</span></div>" +
                "  <div class='row'><span class='label'>Adresse :</span><span class='value'>" + commande.getAdresseLivraison() + "</span></div>" +
                "  <div class='row'><span class='label'>Statut :</span><span class='value' style='color:#4CAF50;font-weight:bold'>PAYEE</span></div>" +
                "</div>" +
                "<div class='section'>" +
                "  <h3>Detail du paiement</h3>" +
                "  <table>" +
                "    <tr><th>Description</th><th>Qte</th><th>Prix TND</th><th>Prix EUR (Stripe)</th></tr>" +
                "    <tr>" +
                "      <td>Commande N " + commande.getNumeroCommande() + "</td>" +
                "      <td>1</td>" +
                "      <td>" + String.format("%.2f TND", commande.getMontantTotal()) + "</td>" +
                "      <td><strong>" + String.format("%.2f EUR", montantEUR) + "</strong></td>" +
                "    </tr>" +
                "  </table>" +
                "  <p style='font-size:11px;color:#888;margin-top:8px'>* Taux de conversion : 1 EUR = " + TAUX_TND_TO_EUR + " TND</p>" +
                "</div>" +
                "<div class='total-box'>" +
                "  <div style='font-size:14px;opacity:0.8;margin-bottom:5px'>MONTANT TOTAL PAYE</div>" +
                "  <div class='amount'>" + String.format("%.2f TND", commande.getMontantTotal()) + "</div>" +
                "  <div style='font-size:16px;opacity:0.8;margin-top:5px'>(approx " + String.format("%.2f EUR", montantEUR) + " debites)</div>" +
                "  <div style='margin-top:10px'><span class='stripe-badge'>Powered by Stripe</span></div>" +
                "</div>" +
                "<div class='section'>" +
                "  <h3>Informations de paiement</h3>" +
                "  <div class='row'><span class='label'>Methode :</span><span class='value'>Stripe Payment Link</span></div>" +
                "  <div class='row'><span class='label'>Devise :</span><span class='value'>EUR (Euro) - Stripe ne supporte pas TND</span></div>" +
                "  <div class='row'><span class='label'>Date :</span><span class='value'>" + dateNow + "</span></div>" +
                "  <div class='row'><span class='label'>Statut :</span><span class='value' style='color:#4CAF50;font-weight:bold'>Paiement confirme</span></div>" +
                "  <div class='row'><span class='label'>Environnement :</span><span class='value' style='color:#FF9800'>Mode TEST Stripe</span></div>" +
                "</div>" +
                "<div class='footer'>" +
                "  <p>Facture generee automatiquement par Gestion Commande - " + dateNow + "</p>" +
                "  <p>Paiement securise par Stripe - Ce document est une preuve de paiement</p>" +
                "</div>" +
                "</body></html>";
    }

    private void ouvrirFichier(String chemin) {
        try {
            File file = new File(chemin);
            if (file.exists()) {
                Desktop.getDesktop().open(file);
                System.out.println("Facture ouverte: " + chemin);
            }
        } catch (Exception e) {
            System.err.println("Impossible d'ouvrir: " + e.getMessage());
        }
    }
}



