import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
public class ConnectionDB {
    public static Connection getConnnection(){
    Connection connection = null;
        try {
            connection = DriverManager.getConnection("jdbc:mysql://localhost:3308/escolarite", "root", "");
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, "Connection Failed");
        }
        return connection;
    }
    
}
