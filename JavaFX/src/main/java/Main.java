import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import java.io.IOException;

public class Main extends Application {

    @Override
    public void start(Stage primaryStage) {
        try {
            // ✅ Charger le fichier FXML avec le bon chemin
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/example/gestion_commande/AjouterCommandeView.fxml"));

            // Vérifier que le fichier est trouvé
            if (loader.getLocation() == null) {
                System.err.println("❌ Erreur: Le fichier FXML n'a pas pu être trouvé!");
                System.err.println("Chemin attendu: /com/example/gestion_commande/AjouterCommandeView.fxml");
                return;
            }

            Parent root = loader.load();

            // Créer la scène
            Scene scene = new Scene(root);

            // Configurer la fenêtre principale
            primaryStage.setTitle("Gestion des Commandes - MarketHub");
            primaryStage.setScene(scene);
            primaryStage.setWidth(900);
            primaryStage.setHeight(600);
            primaryStage.setResizable(true);

            System.out.println("✅ Application lancée avec succès!");

            // Afficher la fenêtre
            primaryStage.show();

        } catch (IOException e) {
            System.err.println("❌ Erreur lors du chargement du fichier FXML!");
            e.printStackTrace();
        } catch (Exception e) {
            System.err.println("❌ Erreur lors du chargement de l'application!");
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        launch(args);
    }
}
