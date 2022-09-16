import java.util.*;
import java.io.*;

public class Participant {
    static  String command;
    
    public void register() throws IOException {
        
            String filename = "participant.txt";
            //PrintWriter p=null;
            BufferedReader b = new BufferedReader(new InputStreamReader(System.in));
            System.out.println("Enter your details in the following order 'command name password product date_of_birth'");
            String details = b.readLine();
            PrintWriter p  = new PrintWriter(new FileWriter(filename,true),true);
            p.print(details);

            //converting string to an array
            //String [] blocked=details.split(" ");
            // for (String bk : blocked) {
            //     System.out.println(" ");
            //     System.out.println(bk);
            // }
            p.close();            
       
  
    }
       
}


