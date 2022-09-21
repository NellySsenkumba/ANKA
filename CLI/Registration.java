import java.util.*;
import java.io.*;
import java.security.Timestamp;
import java.time.*;

public class Registration {
    public static void menu() {
        System.out.println("register- adds you to participants");
        System.out.println("exit-takes you to the menu");
        System.out.println("post");

    }

    static String command;

    public static void main(String[] args) throws IOException {

        String filename = "./ANKA/storage/registration.csv";
        // PrintWriter p=null;
        LocalTime t = LocalTime.now();
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your details in the following order 'command name password product date_of_birth'");
        String command = sc.next();

        if (command.equalsIgnoreCase("register") && !command.equalsIgnoreCase("exit")) {
            int update = 0;
            String name = sc.next();
            String password = sc.next();
            String product = sc.next();
            String date_of_birth = sc.next();
            PrintWriter p = new PrintWriter(new FileWriter(filename, true), true);
            p.println(name + "," + password + "," + product + "," + date_of_birth + "," + t + "," + update);
            p.close();
        } else {
            menu();
        }

    }

}

// converting string to an array
// String [] blocked=details.split(" ");
// for (String bk : blocked) {
// System.out.println(" ");
// System.out.println(bk);
// }