import java.io.File;
import java.io.IOException;
import java.lang.System.Logger;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.Properties;

import javax.mail.Address;
import javax.mail.Authenticator;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.Multipart;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;
import javax.swing.JOptionPane;

public class SendEmail {
    public static void accepter(int id,String path) throws Exception {
    	try {
    	String query="SELECT email FROM etudiants WHERE etudiants.id = (SELECT id_etd FROM demandes WHERE id ="+ id+");";
    	PreparedStatement ps ;
    	ResultSet rs;
    	
        
    	ps = ConnectionDB.getConnnection().prepareStatement(query);
    	rs = ps.executeQuery();
    	rs.next();
    	String email=rs.getString(1);
    	
        Properties properties = new Properties();
        properties.put("mail.smtp.auth",true);
        properties.put("mail.smtp.host","smtp.gmail.com");
        properties.put("mail.smtp.port",587);
        properties.put("mail.smtp.starttls.enable",true);
        properties.put("mail.transport.protocol","smtp");
        Session session = Session.getInstance(properties, new Authenticator() {
            @Override
            //tma l'email mnin ansift l'email
            protected PasswordAuthentication getPasswordAuthentication() {

                return new PasswordAuthentication("youssefabidi929@gmail.com","mudxqggscttzflyo");
            }
        });
        Message message = new MimeMessage(session);
        message.setSubject("Demande");
        //destination
        Address addressTo = new InternetAddress(email);
        message.setRecipient(Message.RecipientType.TO,addressTo);
        //anonymous message
        message.setRecipient(Message.RecipientType.CC,addressTo);
        MimeMultipart multipart = new MimeMultipart();
        MimeBodyPart attachment = new MimeBodyPart();
        attachment.attachFile(new File(path));
        MimeBodyPart messageBodyPart =new MimeBodyPart();
        messageBodyPart.setContent("<h1>voici le fichier demende !</h1>","text/html");
        multipart.addBodyPart(messageBodyPart);
        multipart.addBodyPart(attachment);
        message.setContent(multipart);
        Transport.send(message);
    	} catch (Exception e) {
			// TODO: handle exception
		}

    }
    public static void refuse(int id) throws IOException {
    	
		// Informations d'Admin
		final String password = "mudxqggscttzflyo";
		String fromEmail = "youssefabidi929@gmail.com";

		Properties properties = new Properties();
		properties.put("mail.smtp.auth", "true");
		properties.put("mail.smtp.starttls.enable", "true");
		properties.put("mail.smtp.host", "smtp.gmail.com");
		properties.put("mail.smtp.port", "587");

		Session session = Session.getInstance(properties, new javax.mail.Authenticator() {
			protected PasswordAuthentication getPasswordAuthentication() {
				return new PasswordAuthentication(fromEmail, password);
			}
		});

		try {	
	        	String query="SELECT email FROM etudiants WHERE etudiants.id = (SELECT id_etd FROM demandes WHERE id ="+ id+");";
	        	PreparedStatement ps ;
	        	ResultSet rs;
	        	
	            
	        	ps = ConnectionDB.getConnnection().prepareStatement(query);
	        	rs = ps.executeQuery();
	        	rs.next();
	        	String email=rs.getString(1);
	    	
			MimeMessage msg = new MimeMessage(session);
			msg.setFrom(new InternetAddress(fromEmail));
			msg.addRecipient(Message.RecipientType.TO, new InternetAddress(email));
//			msg.setSubject(doc+" de l'étudiant "+nomComplet); 
			Multipart contenu= new MimeMultipart();
                        MimeBodyPart contneuText = new MimeBodyPart();
                        contneuText.setText(" votre demande est refusée.\nCordialement");
                        contenu.addBodyPart(contneuText);
                        msg.setContent(contenu);
			Transport.send(msg);
			JOptionPane.showMessageDialog(null, "L'email de refus est envoyé à l'étudiant ");
//			System.out.println(email);
		} catch (MessagingException ex) {
			System.out.println(ex.getMessage());
		}
		catch (Exception e) {
			// TODO: handle exception
		}
	}
}