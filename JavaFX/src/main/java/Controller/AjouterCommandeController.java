package Controller;

// ✅ IMPORT UserDashboardController — adapter le package selon votre projet fusionné
import Controller.UserDashboardController;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import Entities.Commande;
import services.CommandeService;
import java.io.IOException;
import java.time.LocalDate;

public class AjouterCommandeController {

    @FXML private TextField numeroCommandeField;
    @FXML private TextField nomClientField;
    @FXML private DatePicker dateCommandePicker;
    @FXML private TextField montantField;
    @FXML private TextField adresseLivraisonField;
    @FXML private ComboBox<String> statutComboBox;
    @FXML private Button ajouterButton;
    @FXML private Button payerButton;
    @FXML private Button afficherButton;
    @FXML private Button effacerButton;

    // ✅ SUPPRIMÉ : @FXML private Parent navbar;  (navbar retirée de la FXML)

    private CommandeService commandeService;

    @FXML
    public void initialize() {
        System.out.println(">>> initialize() appelé");

        System.out.println("numeroCommandeField = " + numeroCommandeField);
        System.out.println("nomClientField      = " + nomClientField);
        System.out.println("montantField        = " + montantField);
        System.out.println("ajouterButton       = " + ajouterButton);

        commandeService = new CommandeService();

        statutComboBox.getItems().addAll("En attente", "Confirmee", "Annulee");
        statutComboBox.setValue("En attente");
        dateCommandePicker.setValue(LocalDate.now());

        // ✅ SUPPRIMÉ : bloc navbar (plus de navbar dans la nouvelle FXML)

        System.out.println(">>> initialize() terminé");
    }

    @FXML
    public void ajouterCommande() {
        System.out.println(">>> ajouterCommande() appelé");

        if (numeroCommandeField == null || nomClientField == null ||
                montantField == null || adresseLivraisonField == null) {
            afficherErreur("Erreur technique",
                    "Un champ du formulaire est null!\n" +
                            "numeroCommandeField = " + numeroCommandeField + "\n" +
                            "nomClientField = " + nomClientField + "\n" +
                            "montantField = " + montantField + "\n" +
                            "adresseLivraisonField = " + adresseLivraisonField);
            return;
        }

        if (numeroCommandeField.getText().trim().isEmpty()) {
            afficherErreur("Champ manquant", "Le numéro de commande est obligatoire!");
            numeroCommandeField.requestFocus();
            return;
        }
        if (nomClientField.getText().trim().isEmpty()) {
            afficherErreur("Champ manquant", "Le nom du client est obligatoire!");
            nomClientField.requestFocus();
            return;
        }
        if (montantField.getText().trim().isEmpty()) {
            afficherErreur("Champ manquant", "Le montant est obligatoire!");
            montantField.requestFocus();
            return;
        }
        if (adresseLivraisonField.getText().trim().isEmpty()) {
            afficherErreur("Champ manquant", "L'adresse de livraison est obligatoire!");
            adresseLivraisonField.requestFocus();
            return;
        }

        try {
            String numeroCommande   = numeroCommandeField.getText().trim();
            String nomClient        = nomClientField.getText().trim();
            LocalDate dateCommande  = dateCommandePicker.getValue();
            double montant          = Double.parseDouble(montantField.getText().trim().replace(",", "."));
            String adresseLivraison = adresseLivraisonField.getText().trim();
            String statut           = statutComboBox.getValue();

            System.out.println(">>> Données: " + numeroCommande + " | " + nomClient +
                    " | " + dateCommande + " | " + montant + " | " + statut);

            Commande commande = new Commande(
                    numeroCommande, nomClient, dateCommande, montant, adresseLivraison, statut
            );

            System.out.println(">>> Appel commandeService.ajouter()...");
            boolean resultat = commandeService.ajouter(commande);
            System.out.println(">>> Résultat: " + resultat);

            if (resultat) {
                afficherSucces("Succès ✅",
                        "Commande ajoutée avec succès!\n\n" +
                                "Numéro  : " + numeroCommande + "\n" +
                                "Client  : " + nomClient + "\n" +
                                "Montant : " + String.format("%.2f TND", montant));
                effacerFormulaire();
            } else {
                afficherErreur("Erreur BD",
                        "L'insertion a échoué (0 lignes affectées).\n\n" +
                                "Vérifiez:\n" +
                                "• La connexion à la base de données\n" +
                                "• Que la table 'commande' existe\n" +
                                "• Que le numéro '" + numeroCommande + "' n'est pas déjà utilisé (UNIQUE)");
            }

        } catch (NumberFormatException e) {
            afficherErreur("Montant invalide",
                    "Valeur saisie : '" + montantField.getText() + "'\n" +
                            "Saisissez un nombre valide (ex: 450 ou 450.00)");
        } catch (Exception e) {
            afficherErreur("Erreur inattendue",
                    e.getClass().getSimpleName() + ":\n" + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    public void ouvrirPaiement() {
        // ✅ INCHANGÉ : ouvre dans une nouvelle fenêtre (dialog), pas une navigation de page
        System.out.println(">>> ouvrirPaiement() appelé");

        if (numeroCommandeField.getText().trim().isEmpty() ||
                montantField.getText().trim().isEmpty()) {
            afficherErreur("Erreur",
                    "Remplissez au moins le numéro de commande et le montant avant de payer!");
            return;
        }

        try {
            double montant   = Double.parseDouble(montantField.getText().trim().replace(",", "."));
            String numero    = numeroCommandeField.getText().trim();
            String nomClient = nomClientField.getText().trim();
            String email     = (nomClient.isEmpty() ? "client" :
                    nomClient.toLowerCase().replaceAll("\\s+", ".")) + "@example.com";

            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/com/example/gestion_commande/ChoixPaiement.fxml"));
            Parent root = loader.load();

            ChoixPaiementController controller = loader.getController();
            controller.remplirInfos(numero, montant, nomClient, email);

            Stage stage = new Stage();
            stage.setTitle("Paiement - " + numero);
            stage.setScene(new Scene(root, 900, 650));
            stage.showAndWait();

        } catch (NumberFormatException e) {
            afficherErreur("Montant invalide",
                    "Valeur saisie : '" + montantField.getText() + "'\n" +
                            "Saisissez un nombre valide avant de payer.");
        } catch (IOException e) {
            afficherErreur("Erreur chargement",
                    "Impossible d'ouvrir ChoixPaiement.fxml\n\n" + e.getMessage());
            e.printStackTrace();
        }
    }

    // ✅ MODIFIÉ : navigation via UserDashboardController
    @FXML
    public void afficherCommandes() {
        System.out.println(">>> afficherCommandes() appelé");
        if (UserDashboardController.current != null) {
            UserDashboardController.current.showCommandes();
        }
    }

    @FXML
    public void effacerFormulaire() {
        System.out.println(">>> effacerFormulaire() appelé");
        numeroCommandeField.clear();
        nomClientField.clear();
        montantField.clear();
        adresseLivraisonField.clear();
        dateCommandePicker.setValue(LocalDate.now());
        statutComboBox.setValue("En attente");
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
}
