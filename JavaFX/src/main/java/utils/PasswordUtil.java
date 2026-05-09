package utils;

import de.mkammerer.argon2.Argon2;
import de.mkammerer.argon2.Argon2Factory;
import org.mindrot.jbcrypt.BCrypt;

import java.util.Arrays;

public class PasswordUtil {

    // ✅ Hasher un mot de passe
    public static String hash(String plainPassword) {
        return BCrypt.hashpw(plainPassword, BCrypt.gensalt(12));
    }

    // ✅ Vérifier mot de passe saisi vs hash en BD
    public static boolean verify(String plainPassword, String hashedPassword) {
        if (hashedPassword == null || hashedPassword.isBlank()) return false;
        try {
        if (hashedPassword.startsWith("$argon2")) {
            char[] password = plainPassword == null ? new char[0] : plainPassword.toCharArray();
            try {
                Argon2 argon2 = Argon2Factory.create();
                return argon2.verify(hashedPassword, password);
            } finally {
                Arrays.fill(password, '\0');
            }
        }
        if (hashedPassword.startsWith("$2y$")) {
            hashedPassword = "$2a$" + hashedPassword.substring(4);
        }
        return BCrypt.checkpw(plainPassword, hashedPassword);
        } catch (IllegalArgumentException e) {
            System.err.println("Hash de mot de passe non compatible: " + e.getMessage());
            return false;
        }
    }
}
