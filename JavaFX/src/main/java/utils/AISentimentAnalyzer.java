package utils;

import ai.djl.Application;
import ai.djl.ModelException;
import ai.djl.inference.Predictor;
import ai.djl.modality.Classifications;
import ai.djl.repository.zoo.Criteria;
import ai.djl.repository.zoo.ModelZoo;
import ai.djl.repository.zoo.ZooModel;
import ai.djl.training.util.ProgressBar;
import ai.djl.translate.TranslateException;

import java.io.IOException;

public class AISentimentAnalyzer {
    private static ZooModel<String, Classifications> model;
    private static Predictor<String, Classifications> predictor;

    static {
        try {
            System.out.println("🔄 Chargement du modèle de sentiment IA...");
            Criteria<String, Classifications> criteria =
                    Criteria.builder()
                            .optApplication(Application.NLP.TEXT_CLASSIFICATION)
                            .setTypes(String.class, Classifications.class)
                            .optModelUrls("djl://ai.djl.huggingface.pytorch/cardiffnlp/twitter-xlm-roberta-base-sentiment")
                            .optProgress(new ProgressBar())
                            .build();  // plus de .optTranslator(...)
            model = ModelZoo.loadModel(criteria);
            predictor = model.newPredictor();
            System.out.println("✅ Modèle de sentiment IA chargé avec succès !");
        } catch (IOException | ModelException e) {
            System.err.println("❌ Erreur lors du chargement du modèle IA : " + e.getMessage());
            e.printStackTrace();
        }
    }

    public static String analyze(String text) {
        if (text == null || text.trim().isEmpty()) return "NEUTRE";
        if (predictor == null) {
            System.out.println("⚠️ Modèle IA non disponible, utilisation de l'analyseur basique.");
            return SentimentAnalyzer.analyze(text);
        }
        try {
            Classifications classifications = predictor.predict(text);
            String className = classifications.best().getClassName();
            switch (className.toLowerCase()) {
                case "positive": return "POSITIF";
                case "negative": return "NEGATIF";
                case "neutral": return "NEUTRE";
                default: return "NEUTRE";
            }
        } catch (TranslateException e) {
            System.err.println("Erreur de prédiction : " + e.getMessage());
            e.printStackTrace();
            return SentimentAnalyzer.analyze(text);
        }
    }
}