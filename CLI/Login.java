import java.util.*;
import java.io.*;

public class Login {
    public void login() throws FileNotFoundException,IOException{
       
       
        Scanner scan = new Scanner(System.in);
        System.out.println("enter your name and password");
        String username = scan.next();
        String pass = scan.next();

        File myFile=new File("./ANKA/storage/registration.csv");
        BufferedReader bu = new BufferedReader(new FileReader(myFile));
        Object[] lines2 = bu.lines().toArray();
        int loggedin=0;
        for(int i=0; i<lines2.length; i++){
            String line = lines2[i].toString().trim();
            String[] column =  line.split(",");
            
            if(username.equals(column[0])&&pass.equals(column[1])){
                loggedin = 1; 
            }
           
        }
        scan.close();
        bu.close();
        
        if(loggedin==1){
            
            System.out.println("Successfully logged in"); 
           

        }  
        else{
            System.out.println("Login Failed");
        }
        
    }
    public static void main(String[] args) throws FileNotFoundException, IOException {
        Login g = new Login();
        g.login();
    }
}
