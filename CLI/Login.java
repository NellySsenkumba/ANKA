import java.util.*;
import java.io.*;


public class Login {
    static Scanner scan = new Scanner(System.in);
    String username;
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
        scan.close();
        bu.close();
        
        if(loggedin==1){
            
 System.out.println("Successfully logged in"); 
 File perf=new File("./ANKA/storage/performance.csv");
 PrintWriter pwd = new PrintWriter(new FileWriter(perf, true), true);
 pwd.println(username+","+0);
  pwd.close();       
 //---------------------------------------------------------------------
 
//  File myFile2=new File("./ANKA/storage/results.csv");
//  BufferedReader buf = new BufferedReader(new FileReader(myFile2));
//  Object[] lines = buf.lines().toArray();
//  int counter = 0;
//         for(int count=0; count<lines.length;count++){
//             counter++;
            
//         }
 
//  for(int i=0; i<lines.length; i++){
//      String line = lines[i].toString().trim();
//      String[] column =  line.split(",");
     
//     if(column[0].equalsIgnoreCase(username)){
//      Main ma = new Main();
//      System.out.println("your information will be available at ");
//      System.out.println("");
//      System.out.println("THIS IS YOUR INFORMATION");
//      System.out.println("----------------------------------");
//      System.out.println("| name          | "+column[0]+"            |");
//      System.out.println("----------------------------------");
//      System.out.println("| points        | "+column[1]+"              |");
//      System.out.println("----------------------------------");
//      System.out.println("| rank          | "+column[2]+" outof "+counter+"      |");
//      System.out.println("----------------------------------");
//      System.out.println("| buyers        | "+column[3]+"|");
//      System.out.println("----------------------------------");
//      System.out.println("| products left | "+column[4]+"|");
//      System.out.println("----------------------------------");
     
//     }
//  }
 
 //---------------------------------------------------------------------------------
 
        }  
        else{
            System.out.println("Login Failed");
            System.exit(0);
        }
        Main m = new Main();
         
    }
    
}
