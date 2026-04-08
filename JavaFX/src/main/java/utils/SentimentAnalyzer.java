package utils;

import java.util.Arrays;
import java.util.HashSet;
import java.util.Set;

public class SentimentAnalyzer {
    private static final Set<String> POSITIVE_WORDS = new HashSet<>(Arrays.asList(
            "bien", "bon", "excellent", "super", "parfait", "génial", "top",
            "satisfait", "content", "merci", "bravo", "👍", "❤️", "😊", "😄",
            "remarquable", "exceptionnel", "formidable", "magnifique", "incroyable"
    ));
    private static final Set<String> NEGATIVE_WORDS = new HashSet<>(Arrays.asList(
            "mal", "mauvais", "horrible", "déçu", "décevant", "problème", "bug",
            "lent", "cher", "inutile", "nul", "😡", "👎", "😠", "😭",
            "catastrophique", "terrible", "désastreux", "désagréable", "déplorable"
    ));

    public static String analyze(String text) {
        if (text == null || text.trim().isEmpty()) return "NEUTRE";
        String lower = text.toLowerCase();
        long positiveCount = POSITIVE_WORDS.stream().filter(lower::contains).count();
        long negativeCount = NEGATIVE_WORDS.stream().filter(lower::contains).count();
        if (positiveCount > negativeCount) return "POSITIF";
        else if (negativeCount > positiveCount) return "NEGATIF";
        else return "NEUTRE";
    }
}