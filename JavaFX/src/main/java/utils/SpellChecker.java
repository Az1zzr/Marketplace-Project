package utils;

import java.io.IOException;
import java.net.URI;
import java.net.URLEncoder;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.nio.charset.StandardCharsets;

public class SpellChecker {

    // Utilise l'URL stable de LanguageTool (version 2)
    private static final String API_URL = "https://languagetool.org/api/v2/check";
    private final HttpClient client = HttpClient.newHttpClient();

    public String check(String text) {
        try {
            String encodedText = URLEncoder.encode(text, StandardCharsets.UTF_8);
            String url = API_URL + "?text=" + encodedText + "&language=fr&enabledOnly=false";
            HttpRequest request = HttpRequest.newBuilder()
                    .uri(URI.create(url))
                    .header("User-Agent", "LocalTrade-App/1.0") // Ajout d'un User-Agent
                    .GET()
                    .build();

            HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
            int status = response.statusCode();
            if (status == 200) {
                return parseErrors(response.body());
            } else if (status == 426) {
                // Upgrade Required : on peut essayer avec l'URL alternative
                return tryAlternativeApi(text);
            } else {
                System.err.println("Erreur API LanguageTool : " + status);
                return null;
            }
        } catch (IOException | InterruptedException e) {
            e.printStackTrace();
            return null;
        }
    }

    private String tryAlternativeApi(String text) {
        // URL alternative (api.languagetoolplus.com)
        try {
            String encodedText = URLEncoder.encode(text, StandardCharsets.UTF_8);
            String url = "https://api.languagetoolplus.com/v2/check?text=" + encodedText + "&language=fr&enabledOnly=false";
            HttpRequest request = HttpRequest.newBuilder()
                    .uri(URI.create(url))
                    .header("User-Agent", "LocalTrade-App/1.0")
                    .GET()
                    .build();
            HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() == 200) {
                return parseErrors(response.body());
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }

    private String parseErrors(String json) {
        StringBuilder result = new StringBuilder();
        String key = "\"message\":\"";
        int pos = 0;
        while (true) {
            int start = json.indexOf(key, pos);
            if (start == -1) break;
            start += key.length();
            int end = json.indexOf("\"", start);
            if (end == -1) break;
            String message = json.substring(start, end);
            result.append("- ").append(message).append("\n");
            pos = end + 1;
        }
        return result.length() > 0 ? result.toString() : null;
    }
}