import java.util.*;
import java.io.*;

public class Registration {
    static String command;
    public void register() throws IOException {

        do{
            String filename = "participant.txt";
            //PrintWriter p=null;
            System.out.println("Enter a command");
            BufferedReader b = new BufferedReader(new InputStreamReader(System.in));
            command=b.readLine();
            System.out.println("Enter your details in the following order 'name password product date_of_birth'");
            String details = b.readLine();
            String [] blocked=details.split(" ");
            PrintWriter p  = new PrintWriter(new FileWriter(filename,true),true);
            p.print(command+" ");

            for (String bk : blocked) {
                System.out.println(" ");
                System.out.println(bk);
            }

            
            p.print(details);
            p.close();            
        }while(command!="exit");
  
    }
       
}


