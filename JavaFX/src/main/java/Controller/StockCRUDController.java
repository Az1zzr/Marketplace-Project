package Controller;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import models.Stock;
import services.StockService;
import utils.SelectedContext;

import java.util.stream.Collectors;

public class StockCRUDController {

    // TABLE
    @FXML private TableView<Stock>          stockTable;
    @FXML private TableColumn<Stock, Integer> colId;
    @FXML private TableColumn<Stock, Integer> colProduitId;
    @FXML private TableColumn<Stock, Integer> colQuantite;

    // SEARCH
    @FXML private TextField searchField;

    // FORM
    @FXML private Label     idLabel;
    @FXML private TextField produitIdField;
    @FXML private TextField quantiteField;

    @FXML private Label statusLabel;

    private final StockService stockService = new StockService();
    private final ObservableList<Stock> data = FXCollections.observableArrayList();
    private Stock selected = null;

    @FXML
    public void initialize() {
        colId.setCellValueFactory(new PropertyValueFactory<>("id"));
        colProduitId.setCellValueFactory(new PropertyValueFactory<>("produitId"));
        colQuantite.setCellValueFactory(new PropertyValueFactory<>("quantite"));

        stockTable.setItems(data);

        // Sélection → remplissage formulaire
        stockTable.getSelectionModel().selectedItemProperty().addListener((obs, o, n) -> {
            selected = n;
            if (n != null) fillForm(n);
        });

        // Pré-remplissage du produitId si on arrive depuis la page Produits
        Integer pid = SelectedContext.getSelectedProduitId();
        if (pid != null) {
            produitIdField.setText(String.valueOf(pid));
            setStatus("Produit pré-sélectionné : ID " + pid);
            SelectedContext.setSelectedProduitId(null);
        }

        refresh();
        clearFormKeepProduitId();
    }

    // ================= CRUD =================

    @FXML
    private void onAdd() {
        Stock s = readForm(false);
        if (s == null) return;
        stockService.ajouter(s);
        setStatus("✅ Stock ajouté (ID: " + s.getId() + ")");
        refresh();
        clearFormKeepProduitId();
    }

    @FXML
    private void onUpdate() {
        if (selected == null) { alert("Sélection requise", "Sélectionne une ligne dans le tableau."); return; }
        Stock s = readForm(true);
        if (s == null) return;
        s.setId(selected.getId());
        stockService.modifier(s, "");
        setStatus("✅ Stock modifié (ID: " + s.getId() + ")");
        refresh();
        selectRowById(s.getId());
    }

    @FXML
    private void onDelete() {
        if (selected == null) { alert("Sélection requise", "Sélectionne une ligne dans le tableau."); return; }
        if (!confirm("Confirmation", "Supprimer la ligne de stock #" + selected.getId() + " ?")) return;
        stockService.supprimer(selected);
        setStatus("🗑️ Stock supprimé (ID: " + selected.getId() + ")");
        refresh();
        clearFormKeepProduitId();
    }

    @FXML private void onClear()   { clearFormKeepProduitId(); setStatus("Formulaire vidé."); }
    @FXML private void onRefresh() { refresh(); setStatus("✅ Liste actualisée."); }

    @FXML
    private void onSearch() {
        String q = safe(searchField.getText()).trim();
        if (q.isEmpty()) { refresh(); return; }
        try {
            int pid = Integer.parseInt(q);
            var filtered = stockService.recuperer().stream()
                    .filter(s -> s.getProduitId() == pid)
                    .collect(Collectors.toList());
            data.setAll(filtered);
            setStatus("🔎 " + filtered.size() + " résultat(s) pour produit_id=" + pid);
        } catch (Exception e) {
            alert("Recherche invalide", "Saisir un entier (produit_id).");
        }
    }

    // ─── Navigation via MainLayout ───

    /** Bouton "Retour Produits" dans le formulaire et la barre haute */
    @FXML
    private void onOpenProduits() {
        if (MainLayoutController.current != null) {
            MainLayoutController.current.showProduits();
        } else {
            setStatus("Navigation : retour produits");
        }
    }

    /** Méthodes conservées pour compatibilité FXML si elles existent encore */
    @FXML private void onAccueil() {
        if (MainLayoutController.current != null) MainLayoutController.current.showDashboard();
        else setStatus("Dashboard");
    }

    @FXML private void onRetour() { onOpenProduits(); }

    // ================= Helpers =================

    private void refresh() { data.setAll(stockService.recuperer()); }

    private void fillForm(Stock s) {
        idLabel.setText(String.valueOf(s.getId()));
        produitIdField.setText(String.valueOf(s.getProduitId()));
        quantiteField.setText(String.valueOf(s.getQuantite()));
    }

    private void clearFormKeepProduitId() {
        selected = null;
        stockTable.getSelectionModel().clearSelection();
        idLabel.setText("(auto)");
        // Garder le produitId pré-rempli
        String keepPid = produitIdField.getText();
        produitIdField.setText(keepPid == null ? "" : keepPid.trim());
        quantiteField.clear();
    }

    private Stock readForm(boolean isUpdate) {
        String pidStr = safe(produitIdField.getText()).trim();
        String qteStr = safe(quantiteField.getText()).trim();
        if (pidStr.isEmpty() || qteStr.isEmpty()) {
            alert("Champs obligatoires", "Produit ID et Quantité sont obligatoires.");
            return null;
        }
        int pid, qte;
        try { pid = Integer.parseInt(pidStr); }
        catch (Exception e) { alert("Produit ID invalide", "Produit ID doit être un entier."); return null; }
        try { qte = Integer.parseInt(qteStr); }
        catch (Exception e) { alert("Quantité invalide", "Quantité doit être un entier."); return null; }
        if (pid <= 0 || qte < 0) { alert("Valeurs invalides", "Produit ID > 0 et Quantité >= 0."); return null; }
        return new Stock(pid, qte);
    }

    private void selectRowById(int id) {
        for (Stock s : data) {
            if (s.getId() == id) { stockTable.getSelectionModel().select(s); stockTable.scrollTo(s); break; }
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
