package services;

import com.twilio.Twilio;
import com.twilio.rest.api.v2010.account.Message;
import com.twilio.type.PhoneNumber;

public class SmsService {

    private static final String ACCOUNT_SID = System.getenv("TWILIO_ACCOUNT_SID");
    private static final String AUTH_TOKEN   = System.getenv("TWILIO_AUTH_TOKEN");
    private static final String FROM_NUMBER  = System.getenv("TWILIO_PHONE");

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
            System.out.println("✅ SMS envoyé — SID : " + message.getSid());
        } catch (Exception e) {
            throw new Exception("❌ Erreur Twilio : " + e.getMessage());
        }
    }

    private static String normalizeToE164(String raw) {
        String digits = raw.replaceAll("[^0-9+]", "");
        if (digits.startsWith("+216")) return digits;
        if (digits.startsWith("216"))  return "+" + digits;
        if (digits.matches("[2459][0-9]{7}")) return "+216" + digits;
        if (digits.startsWith("+"))    return digits;
        return "+" + digits;
    }
}