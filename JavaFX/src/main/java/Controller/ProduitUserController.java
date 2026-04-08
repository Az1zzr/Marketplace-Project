package Controller;

import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import models.Produit;
import services.ProduitService;

import java.io.File;
import java.util.Comparator;
import java.util.List;
import java.util.Locale;
import java.util.stream.Collectors;

public class ProduitUserController {

    @FXML private TextField  searchField;
    @FXML private ComboBox<String> sortBox;
    @FXML private FlowPane   productGrid;
    @FXML private Label      lblCount;
    @FXML private VBox       emptyState;
    @FXML private ScrollPane scrollPane;

    private final ProduitService produitService = new ProduitService();
    private List<Produit> allProduits;

    @FXML
    public void initialize() {
        // Options de tri
        sortBox.getItems().addAll(
            "Nom A → Z",
            "Nom Z → A",
            "Prix croissant",
            "Prix décroissant",
            "Quantité disponible"
        );
        sortBox.setValue("Nom A → Z");
        sortBox.setOnAction(e -> applyFilters());

        // Recherche dynamique
        searchField.textProperty().addListener((obs, o, n) -> applyFilters());

        // Style du ComboBox
        sortBox.setStyle(
            "-fx-background-color: #1e2130; -fx-text-fill: white;" +
            "-fx-border-color: #2d3347; -fx-border-radius: 12;" +
            "-fx-border-width: 1.5; -fx-font-size: 13px;" +
            "-fx-pref-height: 44px; -fx-pref-width: 160px;"
        );

        loadProduits();
    }

    private void loadProduits() {
        new Thread(() -> {
            allProduits = produitService.recuperer();
            Platform.runLater(this::applyFilters);
        }).start();
    }

    @FXML
    private void onRefresh() {
        loadProduits();
    }

    private void applyFilters() {
        if (allProduits == null) return;

        String query = searchField.getText().trim().toLowerCase(Locale.ROOT);

        // Filtrage
        List<Produit> filtered = allProduits.stream()
            .filter(p -> query.isEmpty()
                || p.getNomProduit().toLowerCase(Locale.ROOT).contains(query)
                || (p.getAdresse() != null && p.getAdresse().toLowerCase(Locale.ROOT).contains(query)))
            .collect(Collectors.toList());

        // Tri
        String sort = sortBox.getValue();
        if (sort != null) {
            switch (sort) {
                case "Nom A → Z"          -> filtered.sort(Comparator.comparing(p -> p.getNomProduit().toLowerCase()));
                case "Nom Z → A"          -> filtered.sort(Comparator.comparing((Produit p) -> p.getNomProduit().toLowerCase()).reversed());
                case "Prix croissant"      -> filtered.sort(Comparator.comparingDouble(Produit::getPrix));
                case "Prix décroissant"    -> filtered.sort(Comparator.comparingDouble(Produit::getPrix).reversed());
                case "Quantité disponible" -> filtered.sort(Comparator.comparingInt(Produit::getQuantite).reversed());
            }
        }

        renderCards(filtered);
    }

    private void renderCards(List<Produit> produits) {
        productGrid.getChildren().clear();

        boolean isEmpty = produits.isEmpty();
        emptyState.setVisible(isEmpty);
        emptyState.setManaged(isEmpty);

        lblCount.setText(produits.size() + " produit" + (produits.size() > 1 ? "s" : ""));

        for (Produit p : produits) {
            productGrid.getChildren().add(buildCard(p));
        }
    }

    private VBox buildCard(Produit p) {
        VBox card = new VBox(0);
        card.setPrefWidth(240);
        card.setMaxWidth(240);
        card.setStyle(
            "-fx-background-color: #1a1d2e;" +
            "-fx-background-radius: 16;" +
            "-fx-border-color: #2d3347;" +
            "-fx-border-radius: 16;" +
            "-fx-border-width: 1.5;" +
            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.35), 12, 0, 0, 4);" +
            "-fx-cursor: hand;"
        );

        // ── Image ──
        StackPane imgContainer = new StackPane();
        imgContainer.setPrefHeight(160);
        imgContainer.setMaxHeight(160);
        imgContainer.setStyle(
            "-fx-background-color: #252838;" +
            "-fx-background-radius: 14 14 0 0;"
        );

        ImageView iv = new ImageView();
        iv.setFitWidth(240);
        iv.setFitHeight(160);
        iv.setPreserveRatio(true);

        try {
            File f = new File(p.getImageURL() != null ? p.getImageURL() : "");
            if (!f.exists()) f = new File("uploads/" + p.getImageURL());
            if (f.exists()) {
                iv.setImage(new Image(f.toURI().toString(), 240, 160, true, true));
            } else {
                // Placeholder avec emoji
                Label placeholder = new Label("📦");
                placeholder.setStyle("-fx-font-size: 48px;");
                imgContainer.getChildren().add(placeholder);
            }
        } catch (Exception e) {
            Label placeholder = new Label("📦");
            placeholder.setStyle("-fx-font-size: 48px;");
            imgContainer.getChildren().add(placeholder);
        }

        if (iv.getImage() != null) imgContainer.getChildren().add(iv);

        // Badge stock
        String stockText;
        String stockColor;
        if (p.getQuantite() == 0) {
            stockText  = "Rupture";
            stockColor = "#ef4444";
        } else if (p.getQuantite() <= 5) {
            stockText  = "Stock faible";
            stockColor = "#f59e0b";
        } else {
            stockText  = "En stock";
            stockColor = "#10b981";
        }

        Label stockBadge = new Label("● " + stockText);
        stockBadge.setStyle(
            "-fx-text-fill: " + stockColor + ";" +
            "-fx-font-size: 10px; -fx-font-weight: bold;" +
            "-fx-background-color: rgba(0,0,0,0.55);" +
            "-fx-background-radius: 20; -fx-padding: 4 10;"
        );
        StackPane.setAlignment(stockBadge, Pos.BOTTOM_LEFT);
        StackPane.setMargin(stockBadge, new Insets(0, 0, 10, 10));
        imgContainer.getChildren().add(stockBadge);

        // ── Contenu ──
        VBox content = new VBox(8);
        content.setPadding(new Insets(16, 16, 16, 16));

        // Nom
        Label lblNom = new Label(p.getNomProduit());
        lblNom.setStyle(
            "-fx-font-size: 15px; -fx-font-weight: bold;" +
            "-fx-text-fill: #f1f5f9; -fx-wrap-text: true;"
        );
        lblNom.setMaxWidth(208);

        // Adresse
        Label lblAdresse = new Label("📍 " + (p.getAdresse() != null ? p.getAdresse() : "—"));
        lblAdresse.setStyle(
            "-fx-font-size: 11px; -fx-text-fill: #64748b;"
        );

        // Séparateur
        Separator sep = new Separator();
        sep.setStyle("-fx-background-color: #2d3347;");

        // Ligne prix + quantité
        HBox bottom = new HBox();
        bottom.setAlignment(Pos.CENTER_LEFT);

        Label lblPrix = new Label(String.format("%.2f TND", p.getPrix()));
        lblPrix.setStyle(
            "-fx-font-size: 18px; -fx-font-weight: bold;" +
            "-fx-text-fill: #f97316;"
        );

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        Label lblQte = new Label("x" + p.getQuantite());
        lblQte.setStyle(
            "-fx-font-size: 12px; -fx-font-weight: bold;" +
            "-fx-text-fill: #475569;" +
            "-fx-background-color: #252838;" +
            "-fx-background-radius: 8; -fx-padding: 4 10;"
        );

        bottom.getChildren().addAll(lblPrix, spacer, lblQte);

        // Bouton Voir détail
        Button btnDetail = new Button("Voir le produit →");
        btnDetail.setMaxWidth(Double.MAX_VALUE);
        btnDetail.setStyle(
            "-fx-background-color: transparent;" +
            "-fx-text-fill: #f97316;" +
            "-fx-font-size: 13px; -fx-font-weight: bold;" +
            "-fx-border-color: #f97316;" +
            "-fx-border-radius: 10; -fx-background-radius: 10;" +
            "-fx-padding: 8 0; -fx-cursor: hand;"
        );

        btnDetail.setOnMouseEntered(e -> btnDetail.setStyle(
            "-fx-background-color: #f97316;" +
            "-fx-text-fill: white;" +
            "-fx-font-size: 13px; -fx-font-weight: bold;" +
            "-fx-border-color: #f97316;" +
            "-fx-border-radius: 10; -fx-background-radius: 10;" +
            "-fx-padding: 8 0; -fx-cursor: hand;"
        ));
        btnDetail.setOnMouseExited(e -> btnDetail.setStyle(
            "-fx-background-color: transparent;" +
            "-fx-text-fill: #f97316;" +
            "-fx-font-size: 13px; -fx-font-weight: bold;" +
            "-fx-border-color: #f97316;" +
            "-fx-border-radius: 10; -fx-background-radius: 10;" +
            "-fx-padding: 8 0; -fx-cursor: hand;"
        ));
        btnDetail.setOnAction(e -> showDetail(p));

        content.getChildren().addAll(lblNom, lblAdresse, sep, bottom, btnDetail);

        card.getChildren().addAll(imgContainer, content);

        // Hover effect sur la carte
        card.setOnMouseEntered(e -> card.setStyle(
            "-fx-background-color: #1e2238;" +
            "-fx-background-radius: 16;" +
            "-fx-border-color: #f97316;" +
            "-fx-border-radius: 16;" +
            "-fx-border-width: 1.5;" +
            "-fx-effect: dropshadow(gaussian, rgba(249,115,22,0.25), 20, 0, 0, 6);" +
            "-fx-cursor: hand;"
        ));
        card.setOnMouseExited(e -> card.setStyle(
            "-fx-background-color: #1a1d2e;" +
            "-fx-background-radius: 16;" +
            "-fx-border-color: #2d3347;" +
            "-fx-border-radius: 16;" +
            "-fx-border-width: 1.5;" +
            "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.35), 12, 0, 0, 4);" +
            "-fx-cursor: hand;"
        ));

        return card;
    }

    private void showDetail(Produit p) {
        // Fenêtre de détail produit
        VBox root = new VBox(0);
        root.setStyle("-fx-background-color: #0f1117;");
        root.setPrefWidth(480);

        // Image grande
        StackPane imgPane = new StackPane();
        imgPane.setPrefHeight(260);
        imgPane.setStyle("-fx-background-color: #1a1d2e;");

        ImageView iv = new ImageView();
        iv.setFitWidth(480); iv.setFitHeight(260);
        iv.setPreserveRatio(true);

        try {
            File f = new File(p.getImageURL() != null ? p.getImageURL() : "");
            if (!f.exists()) f = new File("uploads/" + p.getImageURL());
            if (f.exists()) iv.setImage(new Image(f.toURI().toString()));
        } catch (Exception ignored) {}

        if (iv.getImage() != null) imgPane.getChildren().add(iv);
        else { Label ph = new Label("📦"); ph.setStyle("-fx-font-size: 72px;"); imgPane.getChildren().add(ph); }

        // Détails
        VBox details = new VBox(14);
        details.setPadding(new Insets(24));

        Label nom = new Label(p.getNomProduit());
        nom.setStyle("-fx-font-size: 22px; -fx-font-weight: bold; -fx-text-fill: white;");

        Label prix = new Label(String.format("%.2f TND", p.getPrix()));
        prix.setStyle("-fx-font-size: 28px; -fx-font-weight: bold; -fx-text-fill: #f97316;");

        Label adresse = new Label("📍  " + (p.getAdresse() != null ? p.getAdresse() : "—"));
        adresse.setStyle("-fx-font-size: 13px; -fx-text-fill: #8892a4;");

        HBox stockRow = new HBox(12);
        stockRow.setAlignment(Pos.CENTER_LEFT);
        Label qteLabel = new Label("Quantité disponible :");
        qteLabel.setStyle("-fx-font-size: 13px; -fx-text-fill: #8892a4;");
        Label qteVal = new Label(String.valueOf(p.getQuantite()) + " unités");
        qteVal.setStyle("-fx-font-size: 13px; -fx-font-weight: bold; -fx-text-fill: white;");
        stockRow.getChildren().addAll(qteLabel, qteVal);

        Separator sep = new Separator();
        sep.setStyle("-fx-background-color: #2d3347;");

        Label idLabel = new Label("Référence #" + p.getId());
        idLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #4a5568;");

        details.getChildren().addAll(nom, prix, adresse, sep, stockRow, idLabel);
        root.getChildren().addAll(imgPane, details);

        javafx.stage.Stage stage = new javafx.stage.Stage();
        stage.setTitle("Détail — " + p.getNomProduit());
        stage.setScene(new javafx.scene.Scene(root));
        stage.setResizable(false);
        stage.show();
    }
}
