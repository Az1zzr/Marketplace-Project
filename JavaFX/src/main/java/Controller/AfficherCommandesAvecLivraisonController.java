package Controller;

import Entities.Commande;
import Entities.Livraison;
import services.CommandeService;
import services.LivraisonService;
// ✅ IMPORT UserDashboardController — adapter le package selon votre projet fusionné
import Controller.UserDashboardController;
import javafx.application.Platform;
import javafx.concurrent.Task;
import javafx.concurrent.Worker;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.input.Clipboard;
import javafx.scene.input.ClipboardContent;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.scene.text.TextAlignment;
import javafx.stage.Stage;
import javafx.scene.web.WebEngine;
import javafx.scene.web.WebView;

import java.awt.Desktop;
import java.io.IOException;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URI;
import java.net.URL;
import java.net.URLEncoder;
import java.nio.charset.StandardCharsets;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class AfficherCommandesAvecLivraisonController {

    // ═══════════════════════════════════════════════════════════
    //  FXML — page principale
    // ═══════════════════════════════════════════════════════════
    @FXML private VBox   commandesVBox;

    // ✅ SUPPRIMÉ : @FXML private Parent navbar;  (navbar retirée de la FXML)

    // ═══════════════════════════════════════════════════════════
    //  FXML — chatbot
    // ═══════════════════════════════════════════════════════════
    @FXML private VBox       chatMessagesBox;
    @FXML private ScrollPane chatScrollPane;
    @FXML private TextField  chatInput;
    @FXML private Label      chatStatusLabel;

    // ═══════════════════════════════════════════════════════════
    //  Services
    // ═══════════════════════════════════════════════════════════
    private CommandeService  commandeService;
    private LivraisonService livraisonService;
    private List<Commande>   commandesEnMemoire = new ArrayList<>();

    // ═══════════════════════════════════════════════════════════
    //  Groq API
    // ═══════════════════════════════════════════════════════════
    private static final String GROQ_URL   = "https://api.groq.com/openai/v1/chat/completions";
    private static final String GROQ_MODEL = "openai/gpt-oss-20b";
    private static final String GROQ_KEY   = "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";
    private final List<String[]> conversationHistory = new ArrayList<>();

    // ═══════════════════════════════════════════════════════════
    //  Initialisation
    // ═══════════════════════════════════════════════════════════

    @FXML
    public void initialize() {
        commandeService  = new CommandeService();
        livraisonService = new LivraisonService();
        chargerCommandesAvecLivraison();

        // ✅ SUPPRIMÉ : bloc navbar (plus de navbar dans la nouvelle FXML)
    }

    // ═══════════════════════════════════════════════════════════
    //  Chargement des commandes  (INCHANGÉ)
    // ═══════════════════════════════════════════════════════════

    private void chargerCommandesAvecLivraison() {
        List<Commande> commandes = commandeService.afficher();
        commandesEnMemoire.clear();
        commandesEnMemoire.addAll(commandes);
        commandesVBox.getChildren().clear();

        if (commandes.isEmpty()) {
            Label label = new Label("Aucune commande trouvée");
            label.setFont(new Font("Arial", 16));
            label.setTextFill(Color.web("#666666"));
            commandesVBox.getChildren().add(label);
            return;
        }

        for (Commande commande : commandes) {
            Livraison livraison = livraisonService.rechercherParIdCommande(commande.getIdCommande());
            commandesVBox.getChildren().add(creerEntreeCommande(commande, livraison));
        }
    }

    // ═══════════════════════════════════════════════════════════
    //  Entrée = HBox originale + bandeau promo si livré  (INCHANGÉ)
    // ═══════════════════════════════════════════════════════════

    private VBox creerEntreeCommande(Commande commande, Livraison livraison) {
        VBox wrapper = new VBox(0);
        wrapper.setStyle("-fx-background-color: transparent;");
        wrapper.getChildren().add(creerLigneCommande(commande, livraison));
        if (livraison != null && "Livré".equals(livraison.getStatutLivraison())) {
            wrapper.getChildren().add(creerBandeauCodePromo(commande));
        }
        return wrapper;
    }

    // ═══════════════════════════════════════════════════════════
    //  Ligne HBox  (INCHANGÉ)
    // ═══════════════════════════════════════════════════════════

    private HBox creerLigneCommande(Commande commande, Livraison livraison) {
        HBox ligne = new HBox();
        ligne.setPrefHeight(80);
        ligne.setSpacing(12);
        ligne.setAlignment(Pos.CENTER_LEFT);
        ligne.setStyle("-fx-background-color: white; -fx-border-color: #CCCCCC; " +
                "-fx-border-width: 1; -fx-border-radius: 5; -fx-background-radius: 5;");
        ligne.setPadding(new Insets(15));

        VBox numeroBox = new VBox(5);
        numeroBox.setPrefWidth(120);
        Label numeroTitle = new Label("N° Commande");
        numeroTitle.setFont(new Font("Arial Bold", 11));
        numeroTitle.setTextFill(Color.web("#666666"));
        Label numeroValue = new Label(commande.getNumeroCommande());
        numeroValue.setFont(new Font("Arial Bold", 14));
        numeroValue.setTextFill(Color.web("#1F4AA8"));
        numeroBox.getChildren().addAll(numeroTitle, numeroValue);

        VBox clientBox = new VBox(5);
        clientBox.setPrefWidth(150);
        Label clientTitle = new Label("Client");
        clientTitle.setFont(new Font("Arial Bold", 11));
        clientTitle.setTextFill(Color.web("#666666"));
        Label clientValue = new Label(commande.getClient());
        clientValue.setFont(new Font("Arial", 13));
        clientBox.getChildren().addAll(clientTitle, clientValue);

        VBox montantBox = new VBox(5);
        montantBox.setPrefWidth(100);
        Label montantTitle = new Label("Montant");
        montantTitle.setFont(new Font("Arial Bold", 11));
        montantTitle.setTextFill(Color.web("#666666"));
        Label montantValue = new Label(String.format("%.2f TND", commande.getMontantTotal()));
        montantValue.setFont(new Font("Arial Bold", 13));
        montantValue.setTextFill(Color.web("#FF9800"));
        montantBox.getChildren().addAll(montantTitle, montantValue);

        VBox statutCommBox = new VBox(5);
        statutCommBox.setPrefWidth(120);
        Label statutCommTitle = new Label("Statut Cmd");
        statutCommTitle.setFont(new Font("Arial Bold", 11));
        statutCommTitle.setTextFill(Color.web("#666666"));
        Label statutCommValue = new Label(commande.getStatut());
        statutCommValue.setFont(new Font("Arial Bold", 11));
        statutCommValue.setTextFill(Color.WHITE);
        String couleurStatutComm = commande.getStatut().equals("Confirmée") ? "#4CAF50" :
                commande.getStatut().equals("En attente") ? "#FF9800" :
                        commande.getStatut().equals("Payée")      ? "#1F4AA8" : "#d9534f";
        statutCommValue.setStyle("-fx-background-color: " + couleurStatutComm +
                "; -fx-padding: 5px 8px; -fx-border-radius: 3;");
        statutCommBox.getChildren().addAll(statutCommTitle, statutCommValue);

        VBox statutLivBox = new VBox(5);
        statutLivBox.setPrefWidth(130);
        Label statutLivTitle = new Label("Statut Livraison");
        statutLivTitle.setFont(new Font("Arial Bold", 11));
        statutLivTitle.setTextFill(Color.web("#666666"));
        Label statutLivValue;
        if (livraison != null) {
            statutLivValue = new Label(livraison.getStatutLivraison());
            String couleurLiv = livraison.getStatutLivraison().equals("Livré")    ? "#4CAF50" :
                    livraison.getStatutLivraison().equals("En cours") ? "#FF9800" : "#d9534f";
            statutLivValue.setStyle("-fx-background-color: " + couleurLiv +
                    "; -fx-text-fill: white; -fx-padding: 5px 8px; -fx-border-radius: 3;");
        } else {
            statutLivValue = new Label("Pas de livraison");
            statutLivValue.setStyle("-fx-background-color: #CCCCCC; -fx-text-fill: white;" +
                    " -fx-padding: 5px 8px; -fx-border-radius: 3;");
        }
        statutLivValue.setFont(new Font("Arial Bold", 11));
        statutLivBox.getChildren().addAll(statutLivTitle, statutLivValue);

        VBox blBox = new VBox(5);
        blBox.setPrefWidth(100);
        Label blTitle = new Label("N° BL");
        blTitle.setFont(new Font("Arial Bold", 11));
        blTitle.setTextFill(Color.web("#666666"));
        Label blValue = new Label(livraison != null ? livraison.getNumeroBL() : "-");
        blValue.setFont(new Font("Arial", 12));
        blBox.getChildren().addAll(blTitle, blValue);

        VBox livreurBox = new VBox(5);
        livreurBox.setPrefWidth(110);
        Label livreurTitle = new Label("Livreur");
        livreurTitle.setFont(new Font("Arial Bold", 11));
        livreurTitle.setTextFill(Color.web("#666666"));
        Label livreurValue = new Label(livraison != null ? livraison.getLivreur() : "-");
        livreurValue.setFont(new Font("Arial", 12));
        livreurBox.getChildren().addAll(livreurTitle, livreurValue);

        Button modifierLivraisonBtn = new Button("✏ Modifier");
        modifierLivraisonBtn.setPrefWidth(90);
        modifierLivraisonBtn.setStyle("-fx-background-color: #FF9800; -fx-text-fill: white; " +
                "-fx-font-size: 11.0; -fx-font-weight: bold; -fx-cursor: hand;");
        if (livraison == null) {
            modifierLivraisonBtn.setDisable(true);
            modifierLivraisonBtn.setStyle("-fx-background-color: #CCCCCC; -fx-text-fill: white; " +
                    "-fx-font-size: 11.0; -fx-cursor: default;");
        } else {
            modifierLivraisonBtn.setOnAction(e -> ouvrirModifierLivraison(livraison));
        }

        Button calBtn = new Button("📅");
        calBtn.setPrefWidth(38);
        calBtn.setPrefHeight(32);
        calBtn.setStyle("-fx-background-color: #1F4AA8; -fx-text-fill: white; " +
                "-fx-font-size: 14.0; -fx-cursor: hand; -fx-background-radius: 5;");
        calBtn.setTooltip(new Tooltip("Ajouter au Google Calendar"));
        calBtn.setOnAction(e -> exporterCommandeVersGoogle(commande, livraison));

        ligne.getChildren().addAll(numeroBox, clientBox, montantBox, statutCommBox,
                statutLivBox, blBox, livreurBox, modifierLivraisonBtn, calBtn);

        if ("Confirmée".equals(commande.getStatut())) {
            Button payerBtn = new Button("💳 PAYER");
            payerBtn.setPrefWidth(90);
            payerBtn.setStyle("-fx-background-color: #1F4AA8; -fx-text-fill: white; " +
                    "-fx-font-size: 11.0; -fx-font-weight: bold; -fx-cursor: hand; " +
                    "-fx-background-radius: 5;");
            payerBtn.setOnAction(e -> {
                Stage parentStage = (Stage) commandesVBox.getScene().getWindow();
                StripeWebViewDialog dialog =
                        new StripeWebViewDialog(commande, this::chargerCommandesAvecLivraison);
                dialog.afficher(parentStage);
            });
            ligne.getChildren().add(payerBtn);
        }

        if ("Payée".equals(commande.getStatut())) {
            Label paidBadge = new Label("✅ PAYÉE");
            paidBadge.setFont(new Font("Arial Bold", 11));
            paidBadge.setTextFill(Color.WHITE);
            paidBadge.setStyle("-fx-background-color: #1F4AA8; " +
                    "-fx-padding: 6px 10px; -fx-background-radius: 5;");
            ligne.getChildren().add(paidBadge);
        }

        return ligne;
    }

    // ═══════════════════════════════════════════════════════════
    //  Bandeau code promo  (INCHANGÉ)
    // ═══════════════════════════════════════════════════════════

    private String genererCodePromo(Commande commande) {
        int base = Math.abs(commande.getNumeroCommande().hashCode()) % 9000 + 1000;
        return "PROMO50-" + base;
    }

    private HBox creerBandeauCodePromo(Commande commande) {
        String codePromo = genererCodePromo(commande);

        HBox bandeau = new HBox(14);
        bandeau.setAlignment(Pos.CENTER_LEFT);
        bandeau.setPadding(new Insets(8, 16, 8, 16));
        bandeau.setStyle("-fx-background-color: linear-gradient(to right, #16a34a, #22c55e);" +
                "-fx-background-radius: 0 0 5 5;");

        Label emoji = new Label("🎉");
        emoji.setStyle("-fx-font-size: 16px;");

        Label texte = new Label("Livraison confirmée ! -50% sur votre prochaine commande :");
        texte.setStyle("-fx-text-fill: white; -fx-font-size: 12px; -fx-font-weight: bold;");

        Label codeLabel = new Label(codePromo);
        codeLabel.setStyle("-fx-text-fill: #16a34a; -fx-background-color: white;" +
                "-fx-font-size: 14px; -fx-font-weight: bold;" +
                "-fx-padding: 3 14; -fx-background-radius: 5;");

        Button copierBtn = new Button("📋 Copier");
        copierBtn.setStyle("-fx-background-color: rgba(255,255,255,0.25); -fx-text-fill: white;" +
                "-fx-font-size: 11px; -fx-font-weight: bold;" +
                "-fx-background-radius: 5; -fx-cursor: hand; -fx-padding: 3 10;");
        copierBtn.setOnAction(e -> {
            ClipboardContent cc = new ClipboardContent();
            cc.putString(codePromo);
            Clipboard.getSystemClipboard().setContent(cc);
            copierBtn.setText("✅ Copié !");
            new Thread(() -> {
                try { Thread.sleep(2000); } catch (InterruptedException ignored) {}
                Platform.runLater(() -> copierBtn.setText("📋 Copier"));
            }).start();
        });

        Label validite = new Label("⏰ Valable 30 jours");
        validite.setStyle("-fx-text-fill: rgba(255,255,255,0.8); -fx-font-size: 10px;");

        bandeau.getChildren().addAll(emoji, texte, codeLabel, copierBtn, validite);
        return bandeau;
    }

    // ═══════════════════════════════════════════════════════════
    //  Modifier livraison  (INCHANGÉ — dialog modal)
    // ═══════════════════════════════════════════════════════════

    private void ouvrirModifierLivraison(Livraison livraison) {
        try {
            Dialog<ButtonType> dialog = new Dialog<>();
            dialog.setTitle("Modifier Livraison");
            dialog.setHeaderText("Modifier le statut de livraison: " + livraison.getNumeroBL());

            VBox formBox = new VBox(12);
            formBox.setPadding(new Insets(15));

            Label blLabel = new Label("Numéro BL:");
            blLabel.setStyle("-fx-font-weight: bold;");
            TextField blField = new TextField(livraison.getNumeroBL());
            blField.setDisable(true);

            Label livreurLabel = new Label("Livreur:");
            livreurLabel.setStyle("-fx-font-weight: bold;");
            TextField livreurField = new TextField(livraison.getLivreur());

            Label dateLabel = new Label("Date de Livraison:");
            dateLabel.setStyle("-fx-font-weight: bold;");
            DatePicker datePicker = new DatePicker(livraison.getDateLivraison());

            Label statutLabel = new Label("Statut de Livraison:");
            statutLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: #FF6B00;");
            ComboBox<String> statutCombo = new ComboBox<>();
            statutCombo.getItems().addAll("En cours", "Livré", "Retardé");
            statutCombo.setValue(livraison.getStatutLivraison());
            statutCombo.setPrefWidth(200);

            Label notesLabel = new Label("Notes:");
            notesLabel.setStyle("-fx-font-weight: bold;");
            TextArea notesArea = new TextArea(
                    livraison.getNoteDelivery() != null ? livraison.getNoteDelivery() : "");
            notesArea.setPrefRowCount(3);
            notesArea.setWrapText(true);

            formBox.getChildren().addAll(
                    blLabel, blField, livreurLabel, livreurField,
                    dateLabel, datePicker, statutLabel, statutCombo,
                    notesLabel, notesArea);

            dialog.getDialogPane().setContent(formBox);
            dialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

            if (dialog.showAndWait().get() == ButtonType.OK) {
                livraison.setLivreur(livreurField.getText().trim());
                livraison.setDateLivraison(datePicker.getValue());
                livraison.setStatutLivraison(statutCombo.getValue());
                livraison.setNoteDelivery(notesArea.getText().trim());

                if (livraisonService.modifier(livraison)) {
                    afficherAlert("Succès", "Livraison modifiée avec succès!", Alert.AlertType.INFORMATION);
                    chargerCommandesAvecLivraison();
                } else {
                    afficherAlert("Erreur", "Erreur lors de la modification!", Alert.AlertType.ERROR);
                }
            }
        } catch (Exception e) {
            afficherAlert("Erreur", "Erreur lors de l'ouverture du formulaire!", Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    // ═══════════════════════════════════════════════════════════
    //  Navigation Calendrier  ✅ MODIFIÉ
    // ═══════════════════════════════════════════════════════════

    @FXML
    private void ouvrirCalendrier() {
        if (UserDashboardController.current != null) {
            UserDashboardController.current.showCalendrier();
        }
    }

    // ═══════════════════════════════════════════════════════════
    //  Export Google Calendar  (INCHANGÉ)
    // ═══════════════════════════════════════════════════════════

    @FXML
    private void exporterVersGoogleCalendar() {
        if (commandesEnMemoire.isEmpty()) {
            afficherAlert("Info", "Aucune commande à exporter.", Alert.AlertType.INFORMATION);
            return;
        }
        int exported = 0;
        for (Commande commande : commandesEnMemoire.stream().limit(8).toList()) {
            Livraison livraison = livraisonService.rechercherParIdCommande(commande.getIdCommande());
            if (exporterCommandeVersGoogle(commande, livraison)) exported++;
        }
        afficherAlert("Succès",
                exported + " commande(s) exportée(s) vers Google Calendar !\n" +
                        "Connectez-vous à votre compte Google pour les enregistrer.",
                Alert.AlertType.INFORMATION);
    }

    private boolean exporterCommandeVersGoogle(Commande commande, Livraison livraison) {
        try {
            String titre = "Livraison Commande #" + commande.getNumeroCommande();
            StringBuilder details = new StringBuilder();
            details.append("Commande N° ").append(commande.getNumeroCommande()).append("\n");
            details.append("Statut : ").append(commande.getStatut()).append("\n");
            if (livraison != null) {
                details.append("Livraison : ").append(livraison.getStatutLivraison()).append("\n");
                details.append("Livreur : ").append(livraison.getLivreur()).append("\n");
                details.append("N° BL : ").append(livraison.getNumeroBL()).append("\n");
            }

            String dateDebut;
            try {
                String ds = livraison != null
                        ? livraison.getDateLivraison().toString().substring(0, 10)
                        : LocalDate.now().toString();
                dateDebut = LocalDate.parse(ds).format(DateTimeFormatter.ofPattern("yyyyMMdd"));
            } catch (Exception ex) {
                dateDebut = LocalDate.now().format(DateTimeFormatter.ofPattern("yyyyMMdd"));
            }
            String dateFin = LocalDate.parse(dateDebut, DateTimeFormatter.ofPattern("yyyyMMdd"))
                    .plusDays(1).format(DateTimeFormatter.ofPattern("yyyyMMdd"));

            String url = "https://calendar.google.com/calendar/render?action=TEMPLATE" +
                    "&text="    + URLEncoder.encode(titre,              StandardCharsets.UTF_8) +
                    "&dates="   + dateDebut + "/" + dateFin +
                    "&details=" + URLEncoder.encode(details.toString(), StandardCharsets.UTF_8) +
                    "&sf=true&output=xml";

            if (Desktop.isDesktopSupported() &&
                    Desktop.getDesktop().isSupported(Desktop.Action.BROWSE)) {
                Desktop.getDesktop().browse(new URI(url));
                return true;
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return false;
    }

    // ═══════════════════════════════════════════════════════════
    //  Chatbot  (INCHANGÉ)
    // ═══════════════════════════════════════════════════════════

    private String buildSystemPrompt() {
        StringBuilder sb = new StringBuilder();
        sb.append("Tu es un assistant EXCLUSIVEMENT dédié au suivi des commandes et livraisons de notre application. ");
        sb.append("Tu ne peux répondre QU'AUX questions liées à : commandes, livraisons, statuts, numéros BL, livreurs, dates de livraison. ");
        sb.append("Tu réponds uniquement en français, de façon concise et amicale.\n\n");
        sb.append("RÈGLE ABSOLUE : Si l'utilisateur pose une question sur N'IMPORTE QUEL autre sujet ");
        sb.append("(psychologie, histoire, politique, sport, cuisine, technologie, actualités, ");
        sb.append("mathématiques, langues, jeux, médecine, ou tout autre domaine hors de l'application), ");
        sb.append("tu DOIS répondre UNIQUEMENT par : \"Je suis uniquement disponible pour vous aider ");
        sb.append("avec vos commandes et livraisons. Posez-moi une question sur votre suivi de commande !\"\n\n");
        sb.append("Tu ne fournis JAMAIS d'informations financières, de noms de clients, ");
        sb.append("d'identifiants internes, ni de coordonnées GPS.\n\n");
        sb.append("Données disponibles :\n\n");

        if (commandesEnMemoire.isEmpty()) {
            sb.append("Aucune commande disponible.\n");
        } else {
            for (Commande commande : commandesEnMemoire) {
                Livraison liv = livraisonService.rechercherParIdCommande(commande.getIdCommande());
                sb.append("--- Commande N°").append(commande.getNumeroCommande()).append(" ---\n");
                sb.append("  Statut commande : ").append(commande.getStatut()).append("\n");
                if (liv != null) {
                    sb.append("  Statut livraison : ").append(liv.getStatutLivraison()).append("\n");
                    sb.append("  Numéro BL        : ").append(liv.getNumeroBL()).append("\n");
                    sb.append("  Livreur          : ").append(liv.getLivreur()).append("\n");
                    sb.append("  Date livraison   : ").append(liv.getDateLivraison()).append("\n");
                    if ("Livré".equals(liv.getStatutLivraison()))
                        sb.append("  Code promo 50%   : ").append(genererCodePromo(commande)).append("\n");
                } else {
                    sb.append("  Livraison        : non assignée\n");
                }
                sb.append("\n");
            }
        }
        sb.append("Limite tes réponses à 120 mots. Ne génère jamais de contenu hors de l'application.");
        return sb.toString();
    }

    @FXML private void onSendMessage() {
        String text = chatInput.getText().trim();
        if (text.isEmpty()) return;
        chatInput.clear();
        envoyerMessage(text);
    }
    @FXML private void onSuggestion1() { envoyerMessage("Quelles sont mes commandes en cours ?"); }
    @FXML private void onSuggestion2() { envoyerMessage("Quel est le statut de mes livraisons ?"); }
    @FXML private void onSuggestion3() { envoyerMessage("Quelles commandes sont en attente ?"); }
    @FXML private void onSuggestion4() { envoyerMessage("Comment puis-je suivre ma livraison ?"); }

    @FXML
    private void onClearChat() {
        conversationHistory.clear();
        if (chatMessagesBox.getChildren().size() > 1)
            chatMessagesBox.getChildren().remove(1, chatMessagesBox.getChildren().size());
    }

    private void envoyerMessage(String userText) {
        ajouterBulleUtilisateur(userText);
        conversationHistory.add(new String[]{"user", userText});
        Label typingLabel = ajouterBulleTyping();
        setChatStatus("● Rédaction...", "#f97316");

        Task<String> apiTask = new Task<>() {
            @Override protected String call() throws Exception {
                return callGroqApi(buildSystemPrompt(), conversationHistory);
            }
        };
        apiTask.setOnSucceeded(e -> Platform.runLater(() -> {
            chatMessagesBox.getChildren().removeIf(n ->
                    n instanceof VBox v && v.getChildren().contains(typingLabel));
            conversationHistory.add(new String[]{"assistant", apiTask.getValue()});
            ajouterBulleAssistant(apiTask.getValue());
            setChatStatus("● En ligne", "#4ade80");
            scrollChatToBottom();
        }));
        apiTask.setOnFailed(e -> Platform.runLater(() -> {
            chatMessagesBox.getChildren().removeIf(n ->
                    n instanceof VBox v && v.getChildren().contains(typingLabel));
            ajouterBulleAssistant("⚠️ Erreur de connexion. Vérifiez votre réseau et réessayez.");
            setChatStatus("● Hors ligne", "#ef4444");
            apiTask.getException().printStackTrace();
        }));
        Thread t = new Thread(apiTask);
        t.setDaemon(true);
        t.start();
        scrollChatToBottom();
    }

    private String callGroqApi(String systemPrompt, List<String[]> history) throws Exception {
        StringBuilder msgs = new StringBuilder("[");
        msgs.append("{\"role\":\"system\",\"content\":").append(jsonString(systemPrompt)).append("}");
        for (String[] msg : history)
            msgs.append(",{\"role\":\"").append(msg[0]).append("\",\"content\":")
                    .append(jsonString(msg[1])).append("}");
        msgs.append("]");

        String payload = "{\"model\":\"" + GROQ_MODEL + "\",\"messages\":" + msgs +
                ",\"max_tokens\":300,\"temperature\":0.6}";

        URL url = new URL(GROQ_URL);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("POST");
        conn.setRequestProperty("Content-Type", "application/json");
        conn.setRequestProperty("Authorization", "Bearer " + GROQ_KEY);
        conn.setConnectTimeout(15_000);
        conn.setReadTimeout(30_000);
        conn.setDoOutput(true);
        try (OutputStream os = conn.getOutputStream()) {
            os.write(payload.getBytes(StandardCharsets.UTF_8));
        }
        int status = conn.getResponseCode();
        if (status != 200) {
            String err = new Scanner(conn.getErrorStream(), StandardCharsets.UTF_8)
                    .useDelimiter("\\A").next();
            throw new RuntimeException("Groq HTTP " + status + " : " + err);
        }
        return extractContent(new Scanner(conn.getInputStream(), StandardCharsets.UTF_8)
                .useDelimiter("\\A").next());
    }

    private String extractContent(String json) {
        String marker = "\"content\":\"";
        int start = json.indexOf(marker);
        if (start == -1) return "Je n'ai pas pu traiter votre demande.";
        start += marker.length();
        StringBuilder sb = new StringBuilder();
        for (int i = start; i < json.length(); i++) {
            char c = json.charAt(i);
            if (c == '"' && (i == 0 || json.charAt(i - 1) != '\\')) break;
            if (c == '\\' && i + 1 < json.length()) {
                char n = json.charAt(i + 1);
                switch (n) {
                    case 'n' -> { sb.append('\n'); i++; }
                    case 't' -> { sb.append('\t'); i++; }
                    case '"' -> { sb.append('"');  i++; }
                    case '\\' -> { sb.append('\\'); i++; }
                    default -> sb.append(c);
                }
            } else sb.append(c);
        }
        return sb.toString().trim();
    }

    private String jsonString(String s) {
        return "\"" + s.replace("\\", "\\\\").replace("\"", "\\\"")
                .replace("\n", "\\n").replace("\r", "\\r").replace("\t", "\\t") + "\"";
    }

    // ═══════════════════════════════════════════════════════════
    //  Bulles chat  (INCHANGÉ)
    // ═══════════════════════════════════════════════════════════

    private void ajouterBulleUtilisateur(String text) {
        VBox w = new VBox(); w.setAlignment(Pos.CENTER_RIGHT);
        Label b = new Label(text);
        b.setWrapText(true); b.setMaxWidth(220);
        b.setStyle("-fx-background-color:#f97316;-fx-text-fill:white;-fx-font-size:13px;" +
                "-fx-padding:10 14;-fx-background-radius:12 0 12 12;");
        VBox.setMargin(b, new Insets(0, 0, 0, 80));
        w.getChildren().add(b);
        chatMessagesBox.getChildren().add(w);
    }

    private void ajouterBulleAssistant(String text) {
        VBox w = new VBox(); w.setAlignment(Pos.CENTER_LEFT);
        HBox row = new HBox(8); row.setAlignment(Pos.BOTTOM_LEFT);
        Label avatar = new Label("🤖"); avatar.setStyle("-fx-font-size:18px;");
        Label b = new Label(text); b.setWrapText(true); b.setMaxWidth(220);
        b.setTextAlignment(TextAlignment.LEFT);
        b.setStyle("-fx-background-color:#1a2d47;-fx-text-fill:#e2e8f0;-fx-font-size:13px;" +
                "-fx-padding:10 14;-fx-background-radius:0 12 12 12;");
        row.getChildren().addAll(avatar, b); w.getChildren().add(row);
        chatMessagesBox.getChildren().add(w);
    }

    private Label ajouterBulleTyping() {
        VBox w = new VBox(); w.setAlignment(Pos.CENTER_LEFT);
        HBox row = new HBox(8); row.setAlignment(Pos.BOTTOM_LEFT);
        Label avatar = new Label("🤖"); avatar.setStyle("-fx-font-size:18px;");
        Label b = new Label("⏳  En train de répondre...");
        b.setStyle("-fx-background-color:#1a2d47;-fx-text-fill:#7a9ab8;-fx-font-size:12px;" +
                "-fx-font-style:italic;-fx-padding:10 14;-fx-background-radius:0 12 12 12;");
        row.getChildren().addAll(avatar, b); w.getChildren().add(row);
        chatMessagesBox.getChildren().add(w);
        return b;
    }

    private void setChatStatus(String text, String color) {
        if (chatStatusLabel != null) {
            chatStatusLabel.setText(text);
            chatStatusLabel.setStyle("-fx-text-fill:" + color + ";-fx-font-size:11px;");
        }
    }

    private void scrollChatToBottom() {
        Platform.runLater(() -> chatScrollPane.setVvalue(1.0));
    }

    // ═══════════════════════════════════════════════════════════
    //  Navigation  ✅ MODIFIÉ
    // ═══════════════════════════════════════════════════════════

    @FXML
    private void retourner() {
        if (UserDashboardController.current != null) {
            UserDashboardController.current.showCommandes();
        }
    }

    @FXML
    private void actualiser() {
        chargerCommandesAvecLivraison();
        afficherAlert("Info", "Données actualisées!", Alert.AlertType.INFORMATION);
    }

    private void afficherAlert(String titre, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(titre);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}