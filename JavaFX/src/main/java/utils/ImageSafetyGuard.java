package utils;

import javafx.application.Platform;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.control.Label;
import javafx.stage.FileChooser;
import javafx.stage.Window;

import javax.imageio.ImageIO;
import java.awt.image.BufferedImage;
import java.io.File;
import java.util.Optional;
import java.util.function.Consumer;

/**
 * ✅ Vérification locale des images — 100% gratuit, sans API externe.
 *
 * Stratégies :
 *  1. Vérification nom de fichier (mots suspects)
 *  2. Analyse skin-tone ratio (contenu adulte)
 *  3. Détection rouge sombre (gore/violence)
 */
public class ImageSafetyGuard {

    private static final double SKIN_BLOCK_THRESHOLD   = 0.55;
    private static final double SKIN_WARNING_THRESHOLD = 0.35;
    private static final double DARK_GORE_THRESHOLD    = 0.60;
    private static final int    MIN_IMAGE_SIZE          = 10;

    private static final java.util.List<String> SUSPECT_FILENAMES = java.util.List.of(
            "nude","naked","nsfw","porn","sex","xxx","adult",
            "gore","blood","kill","dead","violence","hentai",
            "rat","snake","spider","cockroach","bat","scorpion",
            "worm","maggot","creepy","gross"
    );

    private static final java.util.List<String> ANIMAL_KEYWORDS = java.util.List.of(
            "rat","snake","spider","cockroach","bat","scorpion",
            "worm","maggot","creepy","gross"
    );

    public static void pickAndCheck(Window window,
                                    ImageView imgView,
                                    Label lblAvatar,
                                    Consumer<File> onAccepted) {

        FileChooser chooser = new FileChooser();
        chooser.setTitle("Choisir une photo de profil");
        chooser.getExtensionFilters().add(
                new FileChooser.ExtensionFilter("Images", "*.png", "*.jpg", "*.jpeg", "*.gif")
        );
        File file = chooser.showOpenDialog(window);
        if (file == null) return;

        new Thread(() -> {
            try {
                String result = analyzeLocally(file);
                System.out.println("🔍 Résultat: " + result + " — " + file.getName());

                Platform.runLater(() -> {
                    switch (result) {
                        case "SAFE" -> {
                            applyImage(file, imgView, lblAvatar);
                            onAccepted.accept(file);
                        }
                        case "WARNING" -> {
                            Alert alert = new Alert(Alert.AlertType.WARNING);
                            alert.setTitle("Image suspecte");
                            alert.setHeaderText("⚠️ Cette image pourrait être inappropriée");
                            alert.setContentText("Voulez-vous quand même l'utiliser comme photo de profil ?");
                            alert.getButtonTypes().setAll(ButtonType.YES, ButtonType.NO);
                            Optional<ButtonType> resp = alert.showAndWait();
                            if (resp.isPresent() && resp.get() == ButtonType.YES) {
                                applyImage(file, imgView, lblAvatar);
                                onAccepted.accept(file);
                            }
                        }
                        case "ANIMAL_WARNING" -> {
                            Alert alert = new Alert(Alert.AlertType.WARNING);
                            alert.setTitle("Photo non personnelle");
                            alert.setHeaderText("⚠️ Photo non personnelle détectée !");
                            alert.setContentText(
                                    "Le nom de ce fichier suggère qu'il ne s'agit pas d'une photo personnelle.\n\n" +
                                            "Veuillez choisir une vraie photo de vous."
                            );
                            alert.getButtonTypes().setAll(ButtonType.OK);
                            alert.showAndWait();
                        }
                        default -> {
                            Alert alert = new Alert(Alert.AlertType.ERROR);
                            alert.setTitle("Image refusée");
                            alert.setHeaderText("❌ Image inappropriée détectée !");
                            alert.setContentText("Cette image a été refusée car elle pourrait contenir du contenu inapproprié.\nVeuillez choisir une autre photo.");
                            alert.showAndWait();
                        }
                    }
                });

            } catch (Exception e) {
                System.out.println("⚠️ Erreur analyse: " + e.getMessage());
                e.printStackTrace();
                Platform.runLater(() -> {
                    Alert alert = new Alert(Alert.AlertType.ERROR);
                    alert.setTitle("Erreur");
                    alert.setHeaderText("❌ Impossible d'analyser l'image");
                    alert.setContentText("Fichier invalide ou corrompu.\nVeuillez choisir une autre image.");
                    alert.showAndWait();
                });
            }
        }).start();
    }

    private static String analyzeLocally(File imageFile) throws Exception {

        // 1. Vérification nom de fichier
        String nameLower = imageFile.getName().toLowerCase();
        for (String suspect : SUSPECT_FILENAMES) {
            if (nameLower.contains(suspect)) {
                System.out.println("🚩 Nom suspect: " + suspect);
                return ANIMAL_KEYWORDS.contains(suspect) ? "ANIMAL_WARNING" : "BLOCKED";
            }
        }

        // 2. Charger l'image
        BufferedImage img = ImageIO.read(imageFile);
        if (img == null) throw new RuntimeException("Format d'image non supporté");

        int width  = img.getWidth();
        int height = img.getHeight();
        if (width < MIN_IMAGE_SIZE || height < MIN_IMAGE_SIZE)
            throw new RuntimeException("Image trop petite (" + width + "x" + height + ")");

        // 3. Échantillonnage des pixels
        int totalSampled = 0, skinCount = 0, darkRedCount = 0;
        int step = Math.max(1, Math.min(width, height) / 100);

        for (int y = 0; y < height; y += step) {
            for (int x = 0; x < width; x += step) {
                int rgb = img.getRGB(x, y);
                int r = (rgb >> 16) & 0xFF;
                int g = (rgb >> 8)  & 0xFF;
                int b =  rgb        & 0xFF;

                if (isSkinTone(r, g, b))  skinCount++;
                if (isDarkRed(r, g, b))   darkRedCount++;
                totalSampled++;
            }
        }

        double skinRatio    = (double) skinCount    / totalSampled;
        double darkRedRatio = (double) darkRedCount / totalSampled;

        System.out.println("📊 Skin: "    + String.format("%.1f%%", skinRatio    * 100));
        System.out.println("📊 DarkRed: " + String.format("%.1f%%", darkRedRatio * 100));

        // 4. Décision
        if (skinRatio    >= SKIN_BLOCK_THRESHOLD) return "BLOCKED";
        if (darkRedRatio >= DARK_GORE_THRESHOLD)  return "BLOCKED";
        if (skinRatio    >= SKIN_WARNING_THRESHOLD) return "WARNING";

        return "SAFE";
    }

    private static boolean isSkinTone(int r, int g, int b) {
        if (r <= 95 || g <= 40 || b <= 20) return false;
        if (Math.max(r, Math.max(g, b)) - Math.min(r, Math.min(g, b)) <= 15) return false;
        if (r <= g || r <= b) return false;
        double total = r + g + b;
        return (Math.abs(r - g) > 15)
                && (total > 0 && (r / total) > 0.36)
                && (total > 0 && (g / total) > 0.28);
    }

    private static boolean isDarkRed(int r, int g, int b) {
        int brightness = (r + g + b) / 3;
        return r > 100 && r > g * 2 && r > b * 2 && brightness < 80;
    }

    private static void applyImage(File file, ImageView imgView, Label lblAvatar) {
        if (imgView != null) {
            imgView.setImage(new Image(file.toURI().toString()));
            imgView.setVisible(true);
            imgView.setManaged(true);
        }
        if (lblAvatar != null) {
            lblAvatar.setVisible(false);
            lblAvatar.setManaged(false);
        }
    }
}