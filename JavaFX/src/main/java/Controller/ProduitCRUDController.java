package Controller;

import com.google.gson.JsonObject;
import com.google.gson.JsonParser;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.VBox;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import models.Produit;
import services.ProduitService;
import utils.SelectedContext;

import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.nio.charset.StandardCharsets;
import java.nio.file.*;
import java.util.Locale;
import java.util.Map;
import java.util.stream.Collectors;

public class ProduitCRUDController {

    // TABLE
    @FXML private TableView<Produit> produitTable;
    @FXML private TableColumn<Produit, Integer> colId;
    @FXML private TableColumn<Produit, String>  colNom;
    @FXML private TableColumn<Produit, String>  colAdresse;
    @FXML private TableColumn<Produit, Double>  colPrix;
    @FXML private TableColumn<Produit, Integer> colQuantite;
    @FXML private TableColumn<Produit, String>  colImage;
    @FXML private TableColumn<Produit, Double>  colPrixEUR;
    @FXML private TableColumn<Produit, Double>  colPrixUSD;
    @FXML private TableColumn<Produit, Void>    colDetail;

    // SEARCH
    @FXML private TextField searchField;

    // FORM
    @FXML private Label     idLabel;
    @FXML private TextField nomField;
    @FXML private TextField adresseField;
    @FXML private TextField prixField;
    @FXML private TextField quantiteField;
    @FXML private Button    uploadImageButton;
    @FXML private Label     imageLabel;
    @FXML private Button    addStockForSelectedButton;

    @FXML private Label     statusLabel;
    @FXML private ImageView qrImageView;

    private final ProduitService produitService = new ProduitService();
    private final ObservableList<Produit> data  = FXCollections.observableArrayList();
    private Produit selected        = null;
    private String  uploadedImagePath = null;
    private double  tauxEUR = 0;
    private double  tauxUSD = 0;

    private final Path UPLOAD_DIR = Paths.get("uploads");

    @FXML
    public void initialize() {
        // Bind colonnes
        colId.setCellValueFactory(new PropertyValueFactory<>("id"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nomProduit"));
        colAdresse.setCellValueFactory(new PropertyValueFactory<>("adresse"));
        colPrix.setCellValueFactory(new PropertyValueFactory<>("prix"));
        colQuantite.setCellValueFactory(new PropertyValueFactory<>("quantite"));
        colImage.setCellValueFactory(new PropertyValueFactory<>("imageURL"));

        // Miniature image dans la colonne
        colImage.setCellFactory(column -> new TableCell<>() {
            private final ImageView iv = new ImageView();
            { iv.setFitWidth(80); iv.setFitHeight(60); iv.setPreserveRatio(true); }

            @Override
            protected void updateItem(String path, boolean empty) {
                super.updateItem(path, empty);
                if (empty || path == null || path.isEmpty()) { setGraphic(null); return; }
                try {
                    File f = new File(path);
                    if (!f.exists()) f = new File("uploads/" + path);
                    if (f.exists()) { iv.setImage(new Image(f.toURI().toString(), 80, 60, true, true)); setGraphic(iv); }
                    else setGraphic(null);
                } catch (Exception e) { setGraphic(null); }
            }
        });

        // Bouton Détail
        colDetail.setCellFactory(column -> new TableCell<>() {
            private final Button btn = new Button("🔍 Détail");
            {
                btn.setStyle("-fx-cursor:hand;-fx-background-color:#f97316;-fx-text-fill:white;" +
                        "-fx-font-weight:bold;-fx-padding:5 10;-fx-background-radius:6px;");
                btn.setOnAction(e -> {
                    Produit p = getTableView().getItems().get(getIndex());
                    if (p != null && p.getImageURL() != null && !p.getImageURL().isEmpty()) {
                        File f = new File(p.getImageURL());
                        if (!f.exists()) f = new File("uploads/" + p.getImageURL());
                        if (f.exists()) openImageWindow(f.toURI().toString(), p.getImageURL());
                        else alert("Erreur", "Image introuvable: " + p.getImageURL());
                    } else {
                        alert("Erreur", "Aucune image associée à ce produit.");
                    }
                });
            }

            @Override
            protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);
                setGraphic(empty ? null : btn);
            }
        });

        produitTable.setItems(data);

        // Sélection → remplissage du formulaire
        produitTable.getSelectionModel().selectedItemProperty().addListener((obs, oldV, newV) -> {
            selected = newV;
            boolean has = newV != null;
            if (addStockForSelectedButton != null) addStockForSelectedButton.setDisable(!has);
            if (newV != null) fillForm(newV);
        });

        // Créer dossier uploads si absent
        try { if (!Files.exists(UPLOAD_DIR)) Files.createDirectories(UPLOAD_DIR); }
        catch (IOException e) { e.printStackTrace(); }

        // Colonnes prix convertis
        colPrixEUR.setCellValueFactory(cd ->
                new javafx.beans.property.SimpleDoubleProperty(cd.getValue().getPrix() * tauxEUR).asObject());
        colPrixUSD.setCellValueFactory(cd ->
                new javafx.beans.property.SimpleDoubleProperty(cd.getValue().getPrix() * tauxUSD).asObject());

        // Chargement des taux de change
        tauxEUR = fetchRate("TND", "EUR");
        tauxUSD = fetchRate("TND", "USD");

        refresh();
        clearForm();
        if (addStockForSelectedButton != null) addStockForSelectedButton.setDisable(true);
    }

    // ================= CRUD =================

    @FXML
    private void onAdd() {
        Produit p = readForm(false);
        if (p == null) return;
        produitService.ajouter(p);
        setStatus("✅ Produit ajouté (ID: " + p.getId() + ")");
        refresh();
        clearForm();
    }

    @FXML
    private void onUpdate() {
        if (selected == null) { alert("Sélection requise", "Sélectionne un produit dans le tableau."); return; }
        Produit p = readForm(true);
        if (p == null) return;
        p.setId(selected.getId());
        produitService.modifier(p, "");
        setStatus("✅ Produit modifié (ID: " + p.getId() + ")");
        refresh();
        selectRowById(p.getId());
    }

    @FXML
    private void onDelete() {
        if (selected == null) { alert("Sélection requise", "Sélectionne un produit dans le tableau."); return; }
        if (!confirm("Confirmation", "Supprimer le produit #" + selected.getId() + " ?")) return;
        produitService.supprimer(selected);
        setStatus("🗑️ Produit supprimé (ID: " + selected.getId() + ")");
        refresh();
        clearForm();
    }

    @FXML private void onClear()   { clearForm(); setStatus("Formulaire vidé."); }
    @FXML private void onRefresh() { refresh();   setStatus("✅ Liste actualisée."); }

    @FXML
    private void onSearch() {
        String q = safe(searchField.getText()).trim().toLowerCase(Locale.ROOT);
        if (q.isEmpty()) { refresh(); return; }
            var filtered = produitService.recupererPourUtilisateurCourant().stream()
                .filter(p -> safe(p.getNomProduit()).toLowerCase(Locale.ROOT).contains(q)
                        || safe(p.getAdresse()).toLowerCase(Locale.ROOT).contains(q))
                .collect(Collectors.toList());
        data.setAll(filtered);
        setStatus("🔎 " + filtered.size() + " résultat(s).");
    }

    // ─── Navigation vers Stock (via MainLayout) ───

    /**
     * Bouton "Gérer Stock de ce Produit" dans le formulaire.
     * Navigue dans le contentArea du MainLayout.
     */
    @FXML
    private void onAddStockForSelected() {
        if (selected == null) {
            alert("Sélection requise", "Sélectionne un produit dans le tableau.");
            return;
        }
        SelectedContext.setSelectedProduitId(selected.getId());
        navigateToStock();
    }

    /** Alias conservé pour compatibilité (ex: bouton nav supprimé du FXML mais méthode gardée) */
    @FXML
    private void onOpenStock() {
        if (selected == null) {
            alert("Sélection requise", "Sélectionne un produit dans le tableau.");
            return;
        }
        SelectedContext.setSelectedProduitId(selected.getId());
        navigateToStock();
    }

    /**
     * Délègue la navigation à MainLayoutController.current.
     * Si on n'est pas dans le MainLayout (fenêtre autonome), ouvre une fenêtre séparée.
     */
    private void navigateToStock() {
        if (MainLayoutController.current != null) {
            MainLayoutController.current.showStock();
        } else {
            // Fallback : fenêtre autonome (mode hors MainLayout)
            openWindow("/crudStock.fxml", "Gestion Stock");
        }
    }

    // ================= Upload Image =================

    @FXML
    private void onUploadImage() {
        FileChooser fc = new FileChooser();
        fc.getExtensionFilters().add(new FileChooser.ExtensionFilter("Images", "*.png","*.jpg","*.jpeg","*.gif"));
        File file = fc.showOpenDialog(uploadImageButton.getScene().getWindow());
        if (file != null) {
            try {
                String filename = System.currentTimeMillis() + "_" + file.getName();
                Path target = UPLOAD_DIR.resolve(filename);
                Files.copy(file.toPath(), target, StandardCopyOption.REPLACE_EXISTING);
                uploadedImagePath = "uploads/" + filename;
                imageLabel.setText(filename);
                setStatus("✅ Image uploadée: " + filename);
            } catch (IOException e) {
                alert("Erreur upload", "Impossible de copier le fichier.\n" + e.getMessage());
            }
        }
    }

    // ================= QR & Stats =================

    @FXML
    private void onGenerateQR() {
        if (selected == null) { alert("Sélection requise", "Sélectionne un produit dans le tableau."); return; }
        try {
            String qrText  = "Produit#" + selected.getId() + " - " + selected.getNomProduit();
            String encoded = URLEncoder.encode(qrText, StandardCharsets.UTF_8);
            String qrUrl   = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" + encoded;
            ImageView qrView = new ImageView(new Image(qrUrl));
            qrView.setFitWidth(300); qrView.setFitHeight(300); qrView.setPreserveRatio(true);
            Stage s = new Stage();
            s.setTitle("QR Code - Produit #" + selected.getId());
            s.setScene(new Scene(new javafx.scene.layout.StackPane(qrView), 320, 320));
            s.show();
            setStatus("✅ QR code généré pour #" + selected.getId());
        } catch (Exception e) { alert("Erreur QR", "Impossible de générer le QR.\n" + e.getMessage()); }
    }

    @FXML
    private void onShowStats() {
        try {
            GridPane grid = new GridPane();
            grid.setPadding(new Insets(20)); grid.setHgap(20); grid.setVgap(12);
            grid.setStyle("-fx-background-color:#f5f5f5;-fx-font-size:14px;");
            int row = 0;

            addStatRow(grid, row++, "💰 Valeur totale du stock:",
                    String.format("%.2f TND", data.stream().mapToDouble(p -> p.getPrix() * p.getQuantite()).sum()));

            Produit maxP = data.stream().max((a, b) -> Double.compare(a.getPrix(), b.getPrix())).orElse(null);
            addStatRow(grid, row++, "🏆 Produit le plus cher:",
                    maxP != null ? maxP.getNomProduit() + " – " + maxP.getPrix() + " TND" : "N/A");

            addStatRow(grid, row++, "📦 Quantité totale:",
                    String.valueOf(data.stream().mapToInt(Produit::getQuantite).sum()));

            addStatRow(grid, row++, "📊 Prix moyen:",
                    String.format("%.2f TND", data.stream().mapToDouble(Produit::getPrix).average().orElse(0)));

            Map<String, Long> byAddr = data.stream()
                    .collect(Collectors.groupingBy(Produit::getAdresse, Collectors.counting()));
            VBox addrBox = new VBox(4);
            byAddr.forEach((addr, cnt) -> {
                Label l = new Label(addr + " : " + cnt + " produit(s)");
                l.setStyle("-fx-font-weight:bold;");
                addrBox.getChildren().add(l);
            });
            grid.add(new Label("📍 Répartition par adresse:"), 0, row);
            grid.add(addrBox, 1, row);

            Stage s = new Stage();
            s.setTitle("📊 Statistiques Produits");
            s.setScene(new Scene(grid, 500, 400));
            s.setResizable(true);
            s.show();
        } catch (Exception e) { alert("Erreur", "Impossible d'afficher les statistiques.\n" + e.getMessage()); }
    }

    private void addStatRow(GridPane g, int row, String lbl, String val) {
        Label v = new Label(val); v.setStyle("-fx-font-weight:bold;");
        g.add(new Label(lbl), 0, row); g.add(v, 1, row);
    }

    // ================= Helpers =================

    private double fetchRate(String from, String to) {
        try {
            String apiUrl = "https://api.fastforex.io/fetch-multi?api_key=e753119b45-50aa8059a8-tb1hys&from=" + from + "&to=" + to;
            URL url = new URL(apiUrl);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET"); conn.setConnectTimeout(5000); conn.setReadTimeout(5000);
            try (InputStreamReader reader = new InputStreamReader(conn.getInputStream())) {
                JsonObject results = JsonParser.parseReader(reader).getAsJsonObject().getAsJsonObject("results");
                return results != null && results.has(to) && !results.get(to).isJsonNull()
                        ? results.get(to).getAsDouble() : 0;
            }
        } catch (Exception e) { return 0; }
    }

    private void refresh() { data.setAll(produitService.recupererPourUtilisateurCourant()); }

    private void fillForm(Produit p) {
        idLabel.setText(String.valueOf(p.getId()));
        nomField.setText(safe(p.getNomProduit()));
        adresseField.setText(safe(p.getAdresse()));
        prixField.setText(String.valueOf(p.getPrix()));
        quantiteField.setText(String.valueOf(p.getQuantite()));
        uploadedImagePath = safe(p.getImageURL());
        imageLabel.setText(uploadedImagePath != null ? new File(uploadedImagePath).getName() : "");
    }

    private void clearForm() {
        selected = null;
        produitTable.getSelectionModel().clearSelection();
        idLabel.setText("(auto)");
        nomField.clear(); adresseField.clear(); prixField.clear(); quantiteField.clear();
        uploadedImagePath = null;
        imageLabel.setText("");
    }

    private Produit readForm(boolean isUpdate) {
        String nom = safe(nomField.getText()).trim();
        String adresse = safe(adresseField.getText()).trim();
        String prixStr = safe(prixField.getText()).trim();
        String qteStr  = safe(quantiteField.getText()).trim();
        if (nom.isEmpty() || adresse.isEmpty() || prixStr.isEmpty() || qteStr.isEmpty()) {
            alert("Champs obligatoires", "Nom, Adresse, Prix et Quantité sont obligatoires.");
            return null;
        }
        double prix; int qte;
        try { prix = Double.parseDouble(prixStr.replace(",", ".")); }
        catch (Exception e) { alert("Prix invalide", "Prix doit être un nombre (ex: 50.00)"); return null; }
        try { qte = Integer.parseInt(qteStr); }
        catch (Exception e) { alert("Quantité invalide", "Quantité doit être un entier (ex: 10)"); return null; }
        if (prix < 0 || qte < 0) { alert("Valeurs invalides", "Prix et Quantité doivent être >= 0."); return null; }
        return new Produit(nom, adresse, prix, qte, uploadedImagePath);
    }

    private void selectRowById(int id) {
        for (Produit p : data) {
            if (p.getId() == id) { produitTable.getSelectionModel().select(p); produitTable.scrollTo(p); break; }
        }
    }

    private void openImageWindow(String imageUri, String imagePath) {
        try {
            ImageView iv = new ImageView(new Image(imageUri));
            iv.setPreserveRatio(true);
            if (iv.getImage().getWidth() > 800) iv.setFitWidth(800);
            if (iv.getImage().getHeight() > 600) iv.setFitHeight(600);
            javafx.scene.layout.StackPane pane = new javafx.scene.layout.StackPane(iv);
            pane.setStyle("-fx-background-color:#f0f0f0;-fx-padding:20;");
            Stage s = new Stage();
            s.setTitle("📷 Image Produit - " + new File(imagePath).getName());
            s.setScene(new Scene(pane)); s.sizeToScene(); s.setResizable(true); s.show();
            setStatus("✅ Image affichée");
        } catch (Exception e) { alert("Erreur", "Impossible d'afficher l'image.\n" + e.getMessage()); }
    }

    private Stage openWindow(String fxmlPath, String title) {
        try {
            var url = getClass().getResource(fxmlPath);
            if (url == null) throw new IllegalStateException("FXML introuvable: " + fxmlPath);
            var root = javafx.fxml.FXMLLoader.load(url);
            var stage = new Stage();
            stage.setTitle(title);
            stage.setScene(new Scene((javafx.scene.Parent) root));
            stage.show();
            return stage;
        } catch (Exception e) {
            alert("Erreur", "Impossible d'ouvrir la page.\n" + e.getMessage());
            return null;
        }
    }

    private void setStatus(String msg) { if (statusLabel != null) statusLabel.setText(msg); }

    private void alert(String title, String msg) {
        Alert a = new Alert(Alert.AlertType.WARNING);
        a.setTitle(title); a.setHeaderText(null); a.setContentText(msg); a.showAndWait();
    }

    private boolean confirm(String title, String msg) {
        Alert a = new Alert(Alert.AlertType.CONFIRMATION);
        a.setTitle(title); a.setHeaderText(null); a.setContentText(msg);
        return a.showAndWait().filter(btn -> btn == ButtonType.OK).isPresent();
    }

    private String safe(String s) { return s == null ? "" : s; }
}
