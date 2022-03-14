/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package librarymanagementsystem;
 
import com.mysql.cj.jdbc.*;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

/**
 *
 * @author kevinwilkosz
 */


public class SQLConnection {

    public static Connection con()
    {
        Connection con = null;
        try{
            Class.forName("com.mysql.cj.jdbc.Driver");
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Library_System", "root", "kwilkosz");
        }catch(Exception e){
            JOptionPane.showMessageDialog(null, e);
        }
        
        return con;
    }

         
    }

