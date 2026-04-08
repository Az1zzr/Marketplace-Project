package utils;

import java.util.Set;

public class ProfanityFilter {

    // Liste noire de mots (à compléter selon vos besoins)
    private static final Set<String> BAD_WORDS = Set.of(
            "merde", "putain", "connard", "salope", "enculé", "bâtard",
            "fuck", "shit", "damn", "bitch", "asshole", "piss"
            // Ajoutez d'autres mots si nécessaire
    );

    /**
     * Vérifie si le texte contient un mot interdit (insensible à la casse).
     * @param text le texte à analyser
     * @return true si un gros mot est présent, false sinon
     */
    public static boolean containsProfanity(String text) {
        if (text == null || text.isEmpty()) {
            return false;
        }
        String lowerText = text.toLowerCase();
        // On vérifie chaque mot interdit
        return BAD_WORDS.stream().anyMatch(lowerText::contains);
    }
}