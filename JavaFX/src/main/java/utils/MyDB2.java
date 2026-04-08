package utils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class MyDB2 {

    // ✅ Nom de la base corrigé : markethub_db
    private static final String URL      = "jdbc:mysql://localhost:3306/markethub_db";
    private static final String USER     = "root";
    private static final String PASSWORD = "";  // laisse vide si pas de mot de passe

    private static Connection connection = null;

    public static Connection getConnection() {
        try {
            if (connection == null || connection.isClosed()) {
                Class.forName("com.mysql.cj.jdbc.Driver");
                connection = DriverManager.getConnection(URL, USER, PASSWORD);
                System.out.println("✓ Connexion MySQL établie → markethub_db");
            }
        } catch (ClassNotFoundException e) {
            System.err.println("✗ Driver MySQL introuvable!");
            e.printStackTrace();
            throw new RuntimeException("Driver MySQL manquant", e);
        } catch (SQLException e) {
            System.err.println("✗ Connexion échouée: " + e.getMessage());
            e.printStackTrace();
            throw new RuntimeException("Connexion BD échouée: " + e.getMessage(), e);
        }
        return connection;
    }

    public static void closeConnection() {
        try {
            if (connection != null && !connection.isClosed()) {
                connection.close();
                connection = null;
                System.out.println("✓ Connexion fermée.");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
