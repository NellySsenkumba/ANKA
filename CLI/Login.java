import java.util.*;
import java.io.*;

public class Login {
    public String login() throws FileNotFoundException,IOException{
        Scanner sc = new Scanner(System.in);
        System.out.println("enter your name and password");
        String name = sc.nextLine();
        String password = sc.nextLine();
        File myFile=new File("D:/xampp/htdocs/ANKA/ANKA/storage/registration.csv");
        BufferedReader br = new BufferedReader(new FileReader(myFile));
        String s = br.readLine();
        System.out.println(s);




        return "Successfully logged in";
        
    }
    public static void main(String[] args) throws FileNotFoundException, IOException {
        Login l = new Login();
        l.login();
    }
}
