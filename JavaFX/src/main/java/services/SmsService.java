package services;

/*import com.twilio.Twilio;
import com.twilio.rest.api.v2010.account.Message;
import com.twilio.type.PhoneNumber;

public class SmsService {

    // ── Credentials Twilio ────────────────────────────────────────────────────
    private static final String ACCOUNT_SID = "ACa537fcd062fdf1d5d7f931b4b80efa0c";
    private static final String AUTH_TOKEN  = "138cf30e2c270acb490bd5fd02992f0e";

    // ✅ Numéro Twilio expéditeur — à remplacer par ton numéro Twilio acheté
    // Tu le trouves dans : Twilio Console → Phone Numbers → Manage → Active Numbers
    private static final String FROM_NUMBER = "+1 448 334 6784"; // ← remplace par ton numéro Twilio

    // ─────────────────────────────────────────────────────────────────────────

    public static void sendResetCode(String toPhone, String code) throws Exception {

        String normalizedPhone = normalizeToE164(toPhone);

        String body = "[LocalTrade] Votre code de réinitialisation : " + code
                + ". Valable 10 minutes. Ne le partagez pas.";

        try {
            Twilio.init(ACCOUNT_SID, AUTH_TOKEN);

            Message message = Message.creator(
                    new PhoneNumber(normalizedPhone),
                    new PhoneNumber(FROM_NUMBER),
                    body
            ).create();

            System.out.println("✅ SMS Twilio envoyé — SID : " + message.getSid()
                    + " | Statut : " + message.getStatus());

        } catch (Exception e) {
            throw new Exception("❌ Erreur Twilio : " + e.getMessage());
        }
    }

    /**
     * Convertit un numéro tunisien local en format E.164 (+216XXXXXXXX).
     *   "55008227"     → "+21655008227"
     *   "+21655008227" → "+21655008227"
     *   "21655008227"  → "+21655008227"
     */
    /*private static String normalizeToE164(String raw) {
        String digits = raw.replaceAll("[^0-9+]", "");
        if (digits.startsWith("+216")) return digits;
        if (digits.startsWith("216"))  return "+" + digits;
        if (digits.matches("[2459][0-9]{7}")) return "+216" + digits;
        if (digits.startsWith("+"))    return digits;
        return "+" + digits;
    }}*/

import com.twilio.Twilio;
import com.twilio.rest.api.v2010.account.Message;
import com.twilio.type.PhoneNumber;

public class SmsService {

    private static final String ACCOUNT_SID = "AC702ff0c9f35ac380d89384b81454e050";
    private static final String AUTH_TOKEN  = "969da49cd5da9edd0f1a1969322d7fe2";
    private static final String FROM_NUMBER = "+19566633403"; // ton numéro Twilio

    /**
     * Envoie un SMS avec le code OTP via Twilio.
     * @param toPhone numéro destinataire (format local "55008227" ou E.164 "+21655008227")
     * @param code    code à 6 chiffres généré
     */
    public static void sendResetCode(String toPhone, String code) throws Exception {
        String normalizedPhone = normalizeToE164(toPhone);
        String body = "[LocalTrade] Votre code de réinitialisation : " + code
                + ". Valable 10 minutes. Ne le partagez pas.";
        try {
            Twilio.init(ACCOUNT_SID, AUTH_TOKEN);
            Message message = Message.creator(
                    new PhoneNumber(normalizedPhone),
                    new PhoneNumber(FROM_NUMBER),
                    body
            ).create();
            System.out.println("✅ SMS envoyé — SID : " + message.getSid()
                    + " | Statut : " + message.getStatus());
        } catch (Exception e) {
            throw new Exception("❌ Erreur Twilio : " + e.getMessage());
        }
    }

    /**
     * Convertit un numéro tunisien en format E.164.
     * "55008227"     → "+21655008227"
     * "+21655008227" → "+21655008227"
     * "21655008227"  → "+21655008227"
     */
    private static String normalizeToE164(String raw) {
        String digits = raw.replaceAll("[^0-9+]", "");
        if (digits.startsWith("+216")) return digits;
        if (digits.startsWith("216"))  return "+" + digits;
        if (digits.matches("[2459][0-9]{7}")) return "+216" + digits;
        if (digits.startsWith("+"))    return digits;
        return "+" + digits;
    }
}