package services;

import dao.FeedbackDAO;
import models.Feedback;
import utils.ProfanityFilter; // <-- IMPORTANT

import java.util.List;

public class FeedbackService {

    private final FeedbackDAO dao = new FeedbackDAO();

    public boolean ajouter(Feedback feedback) {
        if (feedback.getCommentaire() == null || feedback.getCommentaire().trim().isEmpty()) {
            throw new IllegalArgumentException("Le commentaire est obligatoire.");
        }
        if (feedback.getNote() == null || feedback.getNote().trim().isEmpty()) {
            throw new IllegalArgumentException("La note est obligatoire.");
        }

        // Nouvelle validation : gros mots
        if (ProfanityFilter.containsProfanity(feedback.getCommentaire())) {
            throw new IllegalArgumentException("Le commentaire contient des mots interdits.");
        }

        return dao.ajouter(feedback);
    }

    public List<Feedback> getAll() {
        return dao.getAll();
    }

    public boolean supprimer(int id) {
        return dao.supprimer(id);
    }

    public boolean update(Feedback feedback) {
        if (feedback.getId() <= 0) {
            throw new IllegalArgumentException("ID invalide pour modification.");
        }
        if (feedback.getCommentaire() == null || feedback.getCommentaire().trim().isEmpty()) {
            throw new IllegalArgumentException("Le commentaire est obligatoire.");
        }

        // Validation gros mots aussi pour la modification
        if (ProfanityFilter.containsProfanity(feedback.getCommentaire())) {
            throw new IllegalArgumentException("Le commentaire contient des mots interdits.");
        }

        return dao.update(feedback);
    }

    public Feedback getById(int id) {
        return dao.getById(id);
    }
}