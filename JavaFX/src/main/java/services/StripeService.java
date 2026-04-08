package services;

import com.stripe.Stripe;
import com.stripe.exception.StripeException;
import com.stripe.model.PaymentIntent;
import com.stripe.model.Charge;
import com.stripe.model.Refund;
import com.stripe.param.PaymentIntentCreateParams;
import com.stripe.param.ChargeCreateParams;
import com.stripe.param.RefundCreateParams;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;
import java.util.HashMap;
import java.util.Map;

/**
 * Service pour gérer les paiements Stripe
 * ⚠️ NOTE: Stripe ne supporte PAS TND (Dinar Tunisien).
 *    Les montants TND doivent être convertis en EUR avant l'appel Stripe.
 *    Taux indicatif : 1 EUR ≈ 3.30 TND
 */
@Service
public class StripeService {

    @Value("${stripe.api.key}")
    private String stripeApiKey;

    // Taux de conversion TND → EUR
    private static final double TAUX_TND_TO_EUR = 3.30;

    // ============================================
    // PAYMENT INTENT (Nouvelle méthode recommandée)
    // ============================================

    /**
     * Créer un Payment Intent pour un paiement
     * @param montantCentimes montant en centimes EUR (pas TND !)
     * @param devise          doit être "eur", "usd" ou autre devise Stripe valide — PAS "tnd"
     */
    public Map<String, Object> createPaymentIntent(
            Long montantCentimes,
            String devise,
            String email,
            String numeroCommande) throws StripeException {

        Stripe.apiKey = stripeApiKey;

        // ✅ Sécurité : forcer EUR si TND est passé par erreur
        String deviseFinale = "tnd".equalsIgnoreCase(devise) ? "eur" : devise.toLowerCase();

        PaymentIntentCreateParams params = PaymentIntentCreateParams.builder()
                .setAmount(montantCentimes)
                .setCurrency(deviseFinale)
                .setReceiptEmail(email)
                .setDescription("Paiement commande " + numeroCommande)
                .putMetadata("numeroCommande", numeroCommande)
                .putMetadata("email", email)
                .build();

        PaymentIntent intent = PaymentIntent.create(params);

        Map<String, Object> result = new HashMap<>();
        result.put("success", true);
        result.put("paymentIntentId", intent.getId());
        result.put("clientSecret", intent.getClientSecret());
        result.put("status", intent.getStatus());
        result.put("amount", intent.getAmount());
        result.put("currency", intent.getCurrency());

        return result;
    }

    /**
     * Vérifier le statut d'un Payment Intent
     */
    public PaymentIntent getPaymentIntent(String paymentIntentId) throws StripeException {
        Stripe.apiKey = stripeApiKey;
        return PaymentIntent.retrieve(paymentIntentId);
    }

    /**
     * Vérifier si un paiement est réussi
     */
    public boolean isPaymentSucceeded(String paymentIntentId) throws StripeException {
        PaymentIntent intent = getPaymentIntent(paymentIntentId);
        return "succeeded".equals(intent.getStatus());
    }

    // ============================================
    // CHARGES (Ancienne méthode - toujours supportée)
    // ============================================

    /**
     * Charger une carte directement
     */
    public Map<String, Object> chargeCard(
            Long montantCentimes,
            String devise,
            String token,
            String description,
            String email) throws StripeException {

        Stripe.apiKey = stripeApiKey;

        // ✅ Sécurité : forcer EUR si TND est passé par erreur
        String deviseFinale = "tnd".equalsIgnoreCase(devise) ? "eur" : devise.toLowerCase();

        ChargeCreateParams params = ChargeCreateParams.builder()
                .setAmount(montantCentimes)
                .setCurrency(deviseFinale)
                .setSource(token)
                .setDescription(description)
                .setReceiptEmail(email)
                .build();

        Charge charge = Charge.create(params);

        Map<String, Object> result = new HashMap<>();
        result.put("success", charge.getPaid());
        result.put("chargeId", charge.getId());
        result.put("amount", charge.getAmount());
        result.put("currency", charge.getCurrency());
        result.put("status", charge.getStatus());

        return result;
    }

    /**
     * Récupérer une charge
     */
    public Charge getCharge(String chargeId) throws StripeException {
        Stripe.apiKey = stripeApiKey;
        return Charge.retrieve(chargeId);
    }

    // ============================================
    // REMBOURSEMENTS
    // ============================================

    /**
     * Rembourser une charge
     */
    public Map<String, Object> refundCharge(
            String chargeId,
            Long montantCentimes) throws StripeException {

        Stripe.apiKey = stripeApiKey;

        RefundCreateParams.Builder builder = RefundCreateParams.builder()
                .setCharge(chargeId);

        if (montantCentimes != null && montantCentimes > 0) {
            builder.setAmount(montantCentimes);
        }

        Refund refund = Refund.create(builder.build());

        Map<String, Object> result = new HashMap<>();
        result.put("success", true);
        result.put("refundId", refund.getId());
        result.put("chargeId", refund.getCharge());
        result.put("amount", refund.getAmount());
        result.put("status", refund.getStatus());

        return result;
    }

    // ============================================
    // UTILITAIRES
    // ============================================

    /**
     * ✅ Convertir un montant TND en centimes EUR pour Stripe
     * Stripe ne supporte pas TND — on convertit d'abord en EUR
     */
    public Long convertTNDtoCentimesEUR(double montantTND) {
        double montantEUR = montantTND / TAUX_TND_TO_EUR;
        return Math.round(montantEUR * 100);
    }

    /**
     * Convertir un montant EUR en centimes
     */
    public Long convertToCentimes(double montantEUR) {
        return Math.round(montantEUR * 100);
    }

    /**
     * Convertir des centimes en montant EUR
     */
    public double convertFromCentimes(Long centimes) {
        return centimes / 100.0;
    }

    /**
     * Vérifier si un montant est valide
     */
    public boolean isValidAmount(Long montantCentimes) {
        // Stripe minimum: 50 centimes
        return montantCentimes >= 50 && montantCentimes <= 999999;
    }

    /**
     * ✅ Vérifier si une devise est supportée par Stripe
     * TND retiré car non supporté par Stripe
     */
    public boolean isValidCurrency(String devise) {
        return devise != null && (
                devise.equalsIgnoreCase("eur") ||
                        devise.equalsIgnoreCase("usd") ||
                        devise.equalsIgnoreCase("gbp") ||
                        devise.equalsIgnoreCase("jpy")
        );
    }

    /**
     * ✅ Convertir TND en EUR
     */
    public double convertTNDtoEUR(double montantTND) {
        return montantTND / TAUX_TND_TO_EUR;
    }
}