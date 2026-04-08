package utils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class MyConnection {

    private String url="jdbc:mysql://localhost:3306/markethub_db2";
    private String login="root";
    private String pwd="";
    private Connection cnx;
    private static MyConnection instance;

    private MyConnection() {
        try {
            cnx = DriverManager.getConnection(url, login, pwd);
            System.out.println("Connexion etablie !");
        } catch (SQLException e) {
            System.err.println(e.getMessage());
        }
    }

    public static MyConnection getInstance() {
        if(instance == null) {
            instance = new MyConnection();
        }
        return instance;
    }

    public Connection getConnection() {
        try {
            if (cnx == null || cnx.isClosed()) {
                System.out.println("Connexion fermée ou nulle, re-connexion...");
                cnx = DriverManager.getConnection(url, login, pwd);
            }
        } catch (SQLException e) {
            System.err.println("Erreur lors de la vérification/réouverture de la connexion : " + e.getMessage());
        }
        return cnx;
    }
}
