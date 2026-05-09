package Controller;

import Entities.Commande;
import Entities.Livraison;
import services.CommandeService;
import services.LivraisonService;
// ✅ IMPORT UserDashboardController — adapter le package selon votre projet fusionné
import Controller.UserDashboardController;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.stage.Stage;

import java.awt.Desktop;
import java.io.IOException;
import java.net.URI;
import java.net.URLEncoder;
import java.nio.charset.StandardCharsets;
import java.time.*;
import java.time.format.DateTimeFormatter;
import java.time.format.TextStyle;
import java.sql.Date;
import java.util.TimeZone;
import java.time.ZoneId;
import java.util.*;

public class CalendrierLivraisonsController {

    // ═══════════════════════════════════════════════════
    //  FXML  (INCHANGÉ — pas de navbar dans ce controller)
    // ═══════════════════════════════════════════════════
    @FXML private GridPane grilleCalendrier;
    @FXML private Label    lblMoisAnnee;
    @FXML private Label    lblSousTitre;
    @FXML private VBox     detailPanel;
    @FXML private ScrollPane detailScrollPane;

    @FXML private Label lblTotalCommandes;
    @FXML private Label lblTotalLivrees;
    @FXML private Label lblTotalEnCours;
    @FXML private Label lblSansLivraison;

    // ═══════════════════════════════════════════════════
    //  Services & état  (INCHANGÉ)
    // ═══════════════════════════════════════════════════
    private CommandeService  commandeService;
    private LivraisonService livraisonService;

    private YearMonth moisActuel;

    private final Map<LocalDate, List<EvenementCalendrier>> evenementsParDate = new HashMap<>();
    private List<EvenementCalendrier> tousLesEvenements = new ArrayList<>();

    private static final DateTimeFormatter FMT_MOIS =
            DateTimeFormatter.ofPattern("MMMM yyyy", Locale.FRENCH);

    private static final DateTimeFormatter FMT_DATE_LIVRAISON =
            DateTimeFormatter.ofPattern("yyyy-MM-dd");

    // ═══════════════════════════════════════════════════
    //  Init  (INCHANGÉ)
    // ═══════════════════════════════════════════════════

    @FXML
    public void initialize() {
        commandeService  = new CommandeService();
        livraisonService = new LivraisonService();
        moisActuel       = YearMonth.now();
        chargerDonnees();
        afficherCalendrier();
        mettreAJourCompteurs();
    }

    // ═══════════════════════════════════════════════════
    //  Chargement des données  (INCHANGÉ)
    // ═══════════════════════════════════════════════════

    private void chargerDonnees() {
        evenementsParDate.clear();
        tousLesEvenements.clear();

        List<Commande> commandes = commandeService.afficher();

        for (Commande commande : commandes) {
            Livraison livraison = livraisonService.rechercherParIdCommande(commande.getIdCommande());

            LocalDate dateParsee = null;

            if (livraison != null && livraison.getDateLivraison() != null) {
                Object raw = livraison.getDateLivraison();
                System.out.println(">>> [CAL] N°" + commande.getNumeroCommande()
                        + " | type=" + raw.getClass().getSimpleName()
                        + " | valeur=" + raw);
                try {
                    if (raw instanceof LocalDate) {
                        dateParsee = (LocalDate) raw;
                    } else if (raw instanceof java.sql.Date) {
                        String s = raw.toString();
                        dateParsee = LocalDate.parse(s, FMT_DATE_LIVRAISON);
                    } else if (raw instanceof LocalDateTime) {
                        dateParsee = ((LocalDateTime) raw).toLocalDate();
                    } else {
                        String s = raw.toString();
                        if (s.length() >= 10) {
                            dateParsee = LocalDate.parse(s.substring(0, 10), FMT_DATE_LIVRAISON);
                        }
                    }
                } catch (Exception e) {
                    System.err.println("⚠️ Parse date échouée: " + raw + " → " + e.getMessage());
                }
            }

            System.out.println(">>> [CAL] → dateParsee=" + dateParsee
                    + " | moisActuel=" + moisActuel);

            LocalDate dateGrille;
            if (dateParsee == null) {
                dateGrille = moisActuel.atDay(1);
            } else if (YearMonth.from(dateParsee).equals(moisActuel)) {
                dateGrille = dateParsee;
            } else {
                dateGrille = moisActuel.atDay(1);
            }

            System.out.println(">>> [CAL] → dateGrille=" + dateGrille);

            EvenementCalendrier evt = new EvenementCalendrier(commande, livraison,
                    dateParsee != null ? dateParsee : moisActuel.atDay(1));
            tousLesEvenements.add(evt);
            evenementsParDate.computeIfAbsent(dateGrille, k -> new ArrayList<>()).add(evt);
        }
    }

    // ═══════════════════════════════════════════════════
    //  Affichage calendrier  (INCHANGÉ)
    // ═══════════════════════════════════════════════════

    private void afficherCalendrier() {
        String moisStr = moisActuel.format(FMT_MOIS);
        lblMoisAnnee.setText(moisStr.substring(0, 1).toUpperCase() + moisStr.substring(1));
        lblSousTitre.setText("Vue mensuelle — " + tousLesEvenements.size() + " commandes au total");

        grilleCalendrier.getChildren().clear();

        LocalDate premierJour = moisActuel.atDay(1);
        int debutColonne = premierJour.getDayOfWeek().getValue() - 1;
        int nbJours = moisActuel.lengthOfMonth();
        LocalDate aujourdhui = LocalDate.now();

        int col = debutColonne;
        int row = 0;

        for (int jour = 1; jour <= nbJours; jour++) {
            LocalDate date = moisActuel.atDay(jour);
            List<EvenementCalendrier> evts = evenementsParDate.getOrDefault(date, List.of());

            VBox cellule = creerCelluleJour(jour, date, evts, aujourdhui.equals(date));

            grilleCalendrier.add(cellule, col, row);

            col++;
            if (col > 6) { col = 0; row++; }
        }

        for (int i = 0; i < debutColonne; i++) {
            grilleCalendrier.add(creerCelluleVide(), i, 0);
        }

        while (col <= 6) {
            grilleCalendrier.add(creerCelluleVide(), col, row);
            col++;
        }
    }

    private VBox creerCelluleJour(int jour, LocalDate date,
                                  List<EvenementCalendrier> evts, boolean estAujourdhui) {
        VBox cell = new VBox(4);
        cell.setPadding(new Insets(6, 6, 6, 8));
        cell.setPrefWidth(Double.MAX_VALUE);
        cell.setPrefHeight(110);

        String cellStyle = "-fx-border-color: #e5e9f0; -fx-border-width: 0.5;";
        if (estAujourdhui) {
            cellStyle += " -fx-background-color: rgba(31,74,168,0.06);";
        }
        cell.setStyle(cellStyle);

        Label numJour = new Label(String.valueOf(jour));
        numJour.setStyle(estAujourdhui
                ? "-fx-font-size: 15px; -fx-font-weight: bold; -fx-text-fill: #1F4AA8;" +
                " -fx-background-color: #1F4AA8; -fx-text-fill: white;" +
                " -fx-background-radius: 50%; -fx-padding: 2 6;"
                : "-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #1e293b;");

        if (date.getDayOfWeek() == DayOfWeek.SUNDAY) {
            numJour.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #dc2626;");
        }

        cell.getChildren().add(numJour);

        int affiche = 0;
        for (EvenementCalendrier evt : evts) {
            if (affiche >= 3) {
                Label plusLabel = new Label("+" + (evts.size() - 3) + " autres");
                plusLabel.setStyle("-fx-font-size: 10px; -fx-text-fill: #94a3b8; -fx-padding: 0 2;");
                cell.getChildren().add(plusLabel);
                break;
            }
            cell.getChildren().add(creerBadgeEvenement(evt));
            affiche++;
        }

        cell.setOnMouseClicked(e -> afficherDetailJour(date, evts));
        cell.setStyle(cell.getStyle() + " -fx-cursor: hand;");
        cell.setOnMouseEntered(e -> cell.setStyle(cell.getStyle() + " -fx-background-color: rgba(31,74,168,0.04);"));

        return cell;
    }

    private Label creerBadgeEvenement(EvenementCalendrier evt) {
        String couleur = getCouleurStatut(evt);
        String texte = "N°" + evt.commande.getNumeroCommande();
        if (evt.livraison != null) {
            texte += " · " + evt.livraison.getStatutLivraison();
        } else {
            texte += " · Sans livraison";
        }

        Label badge = new Label(texte);
        badge.setMaxWidth(Double.MAX_VALUE);
        badge.setWrapText(false);
        badge.setEllipsisString("…");
        badge.setStyle("-fx-background-color: " + couleur + ";" +
                "-fx-text-fill: white;" +
                "-fx-font-size: 10px;" +
                "-fx-font-weight: bold;" +
                "-fx-padding: 2 6;" +
                "-fx-background-radius: 4px;");
        return badge;
    }

    private VBox creerCelluleVide() {
        VBox cell = new VBox();
        cell.setPrefHeight(110);
        cell.setStyle("-fx-background-color: #f8fafc; -fx-border-color: #e5e9f0; -fx-border-width: 0.5;");
        return cell;
    }

    // ═══════════════════════════════════════════════════
    //  Détail d'un jour  (INCHANGÉ)
    // ═══════════════════════════════════════════════════

    private void afficherDetailJour(LocalDate date, List<EvenementCalendrier> evts) {
        detailPanel.getChildren().clear();

        if (evts.isEmpty()) {
            Label aucun = new Label("Aucune commande le " +
                    date.format(DateTimeFormatter.ofPattern("dd MMMM yyyy", Locale.FRENCH)));
            aucun.setStyle("-fx-font-size: 13px; -fx-text-fill: #94a3b8; -fx-padding: 8 0;");
            detailPanel.getChildren().add(aucun);
            return;
        }

        Label titre = new Label("📅  Commandes du " +
                date.format(DateTimeFormatter.ofPattern("EEEE dd MMMM yyyy", Locale.FRENCH))
                        .substring(0, 1).toUpperCase() +
                date.format(DateTimeFormatter.ofPattern("EEEE dd MMMM yyyy", Locale.FRENCH)).substring(1));
        titre.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #1e293b; -fx-padding: 0 0 8 0;");
        detailPanel.getChildren().add(titre);

        HBox cartes = new HBox(12);
        cartes.setAlignment(Pos.CENTER_LEFT);

        for (EvenementCalendrier evt : evts) {
            cartes.getChildren().add(creerCarteDetail(evt));
        }
        detailPanel.getChildren().add(cartes);
    }

    private VBox creerCarteDetail(EvenementCalendrier evt) {
        VBox card = new VBox(6);
        card.setPadding(new Insets(12, 16, 12, 16));
        card.setPrefWidth(220);
        String couleur = getCouleurStatut(evt);

        card.setStyle("-fx-background-color: white;" +
                "-fx-background-radius: 10;" +
                "-fx-border-color: " + couleur + ";" +
                "-fx-border-width: 2;" +
                "-fx-border-radius: 10;" +
                "-fx-effect: dropshadow(gaussian,rgba(0,0,0,0.07),8,0,0,2);");

        Label numCmd = new Label("Commande #" + evt.commande.getNumeroCommande());
        numCmd.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: #1e293b;");

        Label statCmd = new Label("📋 " + evt.commande.getStatut());
        statCmd.setStyle("-fx-font-size: 11px; -fx-text-fill: " + couleur + "; -fx-font-weight: bold;");

        card.getChildren().addAll(numCmd, statCmd);

        if (evt.livraison != null) {
            Label statLiv = new Label("🚚 " + evt.livraison.getStatutLivraison());
            statLiv.setStyle("-fx-font-size: 11px; -fx-text-fill: #555;");
            Label livreur = new Label("👤 " + evt.livraison.getLivreur());
            livreur.setStyle("-fx-font-size: 11px; -fx-text-fill: #555;");
            Label bl = new Label("📄 BL: " + evt.livraison.getNumeroBL());
            bl.setStyle("-fx-font-size: 11px; -fx-text-fill: #64748b;");
            card.getChildren().addAll(statLiv, livreur, bl);

            Button exportBtn = new Button("🗓 Google Cal");
            exportBtn.setStyle("-fx-background-color: #EA4335; -fx-text-fill: white; " +
                    "-fx-font-size: 10px; -fx-background-radius: 6; " +
                    "-fx-cursor: hand; -fx-padding: 4 8;");
            exportBtn.setOnAction(e -> exporterEvenementVersGoogle(evt));
            card.getChildren().add(exportBtn);
        } else {
            Label sans = new Label("⚠️ Pas de livraison assignée");
            sans.setStyle("-fx-font-size: 11px; -fx-text-fill: #94a3b8;");
            card.getChildren().add(sans);
        }

        return card;
    }

    // ═══════════════════════════════════════════════════
    //  Compteurs  (INCHANGÉ)
    // ═══════════════════════════════════════════════════

    private void mettreAJourCompteurs() {
        long total       = tousLesEvenements.size();
        long livrees     = tousLesEvenements.stream()
                .filter(e -> e.livraison != null && "Livree".equals(e.livraison.getStatutLivraison())
                        && e.date.getMonth() == moisActuel.getMonth()
                        && e.date.getYear()  == moisActuel.getYear())
                .count();
        long enCours     = tousLesEvenements.stream()
                .filter(e -> e.livraison != null && "En cours".equals(e.livraison.getStatutLivraison()))
                .count();
        long sansLiv     = tousLesEvenements.stream()
                .filter(e -> e.livraison == null)
                .count();

        lblTotalCommandes.setText(String.valueOf(total));
        lblTotalLivrees.setText(String.valueOf(livrees));
        lblTotalEnCours.setText(String.valueOf(enCours));
        lblSansLivraison.setText(String.valueOf(sansLiv));
    }

    // ═══════════════════════════════════════════════════
    //  Navigation boutons FXML  (INCHANGÉ)
    // ═══════════════════════════════════════════════════

    @FXML
    private void moisPrecedent() {
        moisActuel = moisActuel.minusMonths(1);
        chargerDonnees();
        afficherCalendrier();
        mettreAJourCompteurs();
        detailPanel.getChildren().clear();
    }

    @FXML
    private void moisSuivant() {
        moisActuel = moisActuel.plusMonths(1);
        chargerDonnees();
        afficherCalendrier();
        mettreAJourCompteurs();
        detailPanel.getChildren().clear();
    }

    @FXML
    private void allerAujourdhui() {
        moisActuel = YearMonth.now();
        chargerDonnees();
        afficherCalendrier();
        mettreAJourCompteurs();
        detailPanel.getChildren().clear();
    }

    @FXML
    private void actualiser() {
        chargerDonnees();
        afficherCalendrier();
        mettreAJourCompteurs();
        detailPanel.getChildren().clear();
    }

    // ═══════════════════════════════════════════════════
    //  Export Google Calendar  (INCHANGÉ)
    // ═══════════════════════════════════════════════════

    @FXML
    private void exporterTousVersGoogle() {
        List<EvenementCalendrier> duMois = tousLesEvenements.stream()
                .filter(e -> e.date.getMonth() == moisActuel.getMonth()
                        && e.date.getYear()  == moisActuel.getYear())
                .limit(10)
                .toList();

        if (duMois.isEmpty()) {
            new Alert(Alert.AlertType.INFORMATION,
                    "Aucune commande ce mois-ci à exporter.").showAndWait();
            return;
        }

        int exported = 0;
        for (EvenementCalendrier evt : duMois) {
            if (exporterEvenementVersGoogle(evt)) exported++;
        }

        new Alert(Alert.AlertType.INFORMATION,
                exported + " événement(s) ouvert(s) dans Google Calendar !\n" +
                        "Connectez-vous à votre compte Google pour les enregistrer.").showAndWait();
    }

    private boolean exporterEvenementVersGoogle(EvenementCalendrier evt) {
        try {
            String titre   = "Livraison Commande #" + evt.commande.getNumeroCommande();
            String details = buildDetailsEvenement(evt);

            String dateStr   = evt.date.format(DateTimeFormatter.ofPattern("yyyyMMdd"));
            String dateDebut = dateStr + "T110000Z";
            String dateFin   = dateStr + "T120000Z";

            String url = "https://calendar.google.com/calendar/render?action=TEMPLATE" +
                    "&text="    + URLEncoder.encode(titre,   StandardCharsets.UTF_8) +
                    "&dates="   + dateDebut + "/" + dateFin +
                    "&details=" + URLEncoder.encode(details, StandardCharsets.UTF_8);

            if (Desktop.isDesktopSupported() && Desktop.getDesktop().isSupported(Desktop.Action.BROWSE)) {
                Desktop.getDesktop().browse(new URI(url));
                return true;
            } else {
                TextArea ta = new TextArea(url);
                ta.setWrapText(true);
                ta.setEditable(false);
                ta.setPrefRowCount(4);
                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("Lien Google Calendar");
                alert.setHeaderText("Copiez ce lien dans votre navigateur :");
                alert.getDialogPane().setContent(ta);
                alert.showAndWait();
                return true;
            }
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
    }

    private String buildDetailsEvenement(EvenementCalendrier evt) {
        StringBuilder sb = new StringBuilder();
        sb.append("Commande N° ").append(evt.commande.getNumeroCommande()).append("\n");
        sb.append("Statut commande : ").append(evt.commande.getStatut()).append("\n");
        if (evt.livraison != null) {
            sb.append("Statut livraison : ").append(evt.livraison.getStatutLivraison()).append("\n");
            sb.append("Livreur : ").append(evt.livraison.getLivreur()).append("\n");
            sb.append("N° BL : ").append(evt.livraison.getNumeroBL()).append("\n");
        } else {
            sb.append("Livraison : non assignée\n");
        }
        return sb.toString();
    }

    // ═══════════════════════════════════════════════════
    //  retourner  ✅ MODIFIÉ
    // ═══════════════════════════════════════════════════

    @FXML
    private void retourner() {
        if (UserDashboardController.current != null) {
            UserDashboardController.current.showAvecLivraison();
        }
    }

    // ═══════════════════════════════════════════════════
    //  Helpers  (INCHANGÉ)
    // ═══════════════════════════════════════════════════

    private String getCouleurStatut(EvenementCalendrier evt) {
        if (evt.livraison == null) return "#94a3b8";
        return switch (evt.livraison.getStatutLivraison()) {
            case "Livree"    -> "#4CAF50";
            case "En cours" -> "#FF9800";
            default         -> "#d9534f";
        };
    }

    private static class EvenementCalendrier {
        final Commande  commande;
        final Livraison livraison;
        final LocalDate date;

        EvenementCalendrier(Commande commande, Livraison livraison, LocalDate date) {
            this.commande  = commande;
            this.livraison = livraison;
            this.date      = date;
        }
    }
}
