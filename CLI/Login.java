import java.util.*;
import java.io.*;


public class Login {
    static String username;
    public  void login(Scanner scan) throws FileNotFoundException,IOException{
   
        System.out.println("enter your name and password");
        username = scan.next();
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

        bu.close();       
        if(loggedin==1){
  
//participant requests for results and is added into a file
 System.out.println("Successfully logged in"); 
 File perf=new File("./ANKA/storage/performance.csv");
 PrintWriter pwd = new PrintWriter(new FileWriter(perf, true), true);
 pwd.println(username+","+0);
 pwd.close();       

 
        }  
        else{
            System.out.println("Login Failed");
            System.exit(0);
        }

         
    }
    
}
