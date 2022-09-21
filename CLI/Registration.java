import java.util.*;
import java.io.*;
import java.security.Timestamp;
import java.time.*;

public class Registration {
<<<<<<< Updated upstream
    static String command;

    public static void main(String[] args) throws IOException {

        String filename = "D:/xampp/htdocs/ANKA/ANKA/storage/registration.csv";
        // PrintWriter p=null;
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your details in the following order 'command name password product date_of_birth'");
        String command = sc.next();
        String name = sc.next();
        String password = sc.next();
        String product = sc.next();
        String date_of_birth = sc.next();
        PrintWriter p = new PrintWriter(new FileWriter(filename, true), true);
        p.print(name + "," + password + "," + product + "," + date_of_birth + ",0");
        p.close();

=======
    public static void menu(){
        System.out.println("register- adds you to participants");
        System.out.println("exit-takes you to the menu");
        System.out.println("post");

    }
    static  String command;
    
    public static void main(String[] args) throws IOException {
        
            String filename = "D:/xampp/htdocs/ANKA/ANKA/storage/registration.csv";
            //PrintWriter p=null;
            Scanner sc = new Scanner(System.in);
            System.out.println("Enter your details in the following order 'command name password product date_of_birth'");
            String command = sc.next();
            //Timestamp t = new Timestamp(null, null);

            if(command.equalsIgnoreCase("register")&&!command.equalsIgnoreCase("exit")){
                int update=0;
                String name = sc.next();
                String password = sc.next();
                String product = sc.next();
                String date_of_birth=sc.next();
            PrintWriter p  = new PrintWriter(new FileWriter(filename,true),true);
            p.println(name+","+password+","+product+","+date_of_birth+","+update);
            p.close();            
            }else{
                menu();
            }
  
>>>>>>> Stashed changes
    }

}

// converting string to an array
// String [] blocked=details.split(" ");
// for (String bk : blocked) {
// System.out.println(" ");
// System.out.println(bk);
// }