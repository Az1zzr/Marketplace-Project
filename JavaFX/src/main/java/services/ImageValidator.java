package services;

import java.net.URI;
import java.net.http.*;
import java.nio.file.*;
import java.util.Base64;
import org.json.*;

public class ImageValidator {

    private static final String API_KEY = "AIzaSyB1Uw6e7DiGSV8wSDyLrYeE3NazL_WvwLI"; // ← remplace ici

    /**
     * Retourne true si l'image est sensible (adulte, violence, gore, etc.)
     */
    public static boolean isImageSensitive(String imagePath) throws Exception {

        // 1. Lire l'image et encoder en Base64
        byte[] imageBytes = Files.readAllBytes(Path.of(imagePath));
        String base64Image = Base64.getEncoder().encodeToString(imageBytes);

        // 2. Construire la requête JSON
        String requestBody = """
        {
          "requests": [{
            "image": { "content": "%s" },
            "features": [{ "type": "SAFE_SEARCH_DETECTION" }]
          }]
        }
        """.formatted(base64Image);

        // 3. Envoyer la requête à Google Vision API
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(
                        "https://vision.googleapis.com/v1/images:annotate?key=" + API_KEY))
                .header("Content-Type", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(requestBody))
                .build();

        HttpResponse<String> response = HttpClient.newHttpClient()
                .send(request, HttpResponse.BodyHandlers.ofString());

        // 4. Parser la réponse
        JSONObject json = new JSONObject(response.body());
        JSONObject safeSearch = json
                .getJSONArray("responses")
                .getJSONObject(0)
                .getJSONObject("safeSearchAnnotation");

        System.out.println("🔍 SafeSearch résultat : " + safeSearch);

        // 5. Vérifier les niveaux de sensibilité
        return isSensitiveLevel(safeSearch.getString("adult"))
                || isSensitiveLevel(safeSearch.getString("violence"))
                || isSensitiveLevel(safeSearch.getString("racy"))
                || isSensitiveLevel(safeSearch.getString("medical"))
                || isSensitiveLevel(safeSearch.getString("spoof"));
    }

    /**
     * LIKELY ou VERY_LIKELY = image sensible
     */
    private static boolean isSensitiveLevel(String level) {
        return level.equals("LIKELY") || level.equals("VERY_LIKELY");
    }
}