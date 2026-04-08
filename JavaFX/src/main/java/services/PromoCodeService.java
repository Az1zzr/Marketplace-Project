package services;

import java.util.HashMap;
import java.util.Map;

/**
 * Service de gestion des codes promo
 * Codes configurés directement ici — modifiable facilement
 */
public class PromoCodeService {

    public enum TypeReduction {
        POURCENTAGE,   // Ex: -10%
        MONTANT_FIXE   // Ex: -5 EUR
    }

    public static class CodePromo {
        public final String code;
        public final TypeReduction type;
        public final double valeur;
        public final String description;
        public final boolean actif;

        public CodePromo(String code, TypeReduction type, double valeur, String description, boolean actif) {
            this.code = code;
            this.type = type;
            this.valeur = valeur;
            this.description = description;
            this.actif = actif;
        }
    }

    public static class ResultatPromo {
        public final boolean valide;
        public final String message;
        public final double montantOriginalTND;
        public final double reductionTND;
        public final double montantFinalTND;
        public final double montantFinalEUR;
        public final CodePromo codePromo;

        public ResultatPromo(boolean valide, String message, double montantOriginalTND,
                             double reductionTND, double montantFinalTND,
                             double montantFinalEUR, CodePromo codePromo) {
            this.valide = valide;
            this.message = message;
            this.montantOriginalTND = montantOriginalTND;
            this.reductionTND = reductionTND;
            this.montantFinalTND = montantFinalTND;
            this.montantFinalEUR = montantFinalEUR;
            this.codePromo = codePromo;
        }
    }

    private static final double TAUX_TND_TO_EUR = 3.30;

    // =====================================================
    // 🎟️ LISTE DES CODES PROMO — À MODIFIER ICI
    // =====================================================
    private static final Map<String, CodePromo> CODES_PROMO = new HashMap<>();

    static {
        CODES_PROMO.put("WELCOME10",  new CodePromo("WELCOME10",  TypeReduction.POURCENTAGE,  10.0, "10% de réduction",        true));
        CODES_PROMO.put("PROMO20",    new CodePromo("PROMO20",    TypeReduction.POURCENTAGE,  20.0, "20% de réduction",        true));
        CODES_PROMO.put("SOLDES50",   new CodePromo("SOLDES50",   TypeReduction.POURCENTAGE,  50.0, "50% de réduction soldes", true));
        CODES_PROMO.put("REDUC5EUR",  new CodePromo("REDUC5EUR",  TypeReduction.MONTANT_FIXE,  5.0, "-5 EUR sur votre commande",true));
        CODES_PROMO.put("REDUC10EUR", new CodePromo("REDUC10EUR", TypeReduction.MONTANT_FIXE, 10.0, "-10 EUR sur votre commande",true));
        CODES_PROMO.put("VIP",        new CodePromo("VIP",        TypeReduction.POURCENTAGE,  30.0, "Réduction VIP 30%",       true));
        CODES_PROMO.put("EXPIREDCODE",new CodePromo("EXPIREDCODE",TypeReduction.POURCENTAGE,  15.0, "Code expiré",             false)); // exemple code désactivé
    }

    /**
     * Valider et appliquer un code promo sur un montant TND
     */
    public ResultatPromo appliquerCodePromo(String code, double montantTND) {
        if (code == null || code.trim().isEmpty()) {
            return new ResultatPromo(false, "Veuillez entrer un code promo.",
                    montantTND, 0, montantTND, montantTND / TAUX_TND_TO_EUR, null);
        }

        String codeUpper = code.trim().toUpperCase();
        CodePromo promo = CODES_PROMO.get(codeUpper);

        if (promo == null) {
            return new ResultatPromo(false, "❌ Code promo invalide : « " + code + " »",
                    montantTND, 0, montantTND, montantTND / TAUX_TND_TO_EUR, null);
        }

        if (!promo.actif) {
            return new ResultatPromo(false, "❌ Ce code promo est expiré ou désactivé.",
                    montantTND, 0, montantTND, montantTND / TAUX_TND_TO_EUR, null);
        }

        double reductionTND;
        if (promo.type == TypeReduction.POURCENTAGE) {
            reductionTND = montantTND * (promo.valeur / 100.0);
        } else {
            // Montant fixe en EUR → convertir en TND
            reductionTND = promo.valeur * TAUX_TND_TO_EUR;
        }

        // Sécurité : la réduction ne peut pas dépasser le montant
        reductionTND = Math.min(reductionTND, montantTND);

        double montantFinalTND = montantTND - reductionTND;
        double montantFinalEUR = montantFinalTND / TAUX_TND_TO_EUR;

        String msg = "✅ Code « " + promo.code + " » appliqué ! " + promo.description +
                " → Économie : " + String.format("%.2f TND", reductionTND);

        return new ResultatPromo(true, msg, montantTND, reductionTND,
                montantFinalTND, montantFinalEUR, promo);
    }
}
