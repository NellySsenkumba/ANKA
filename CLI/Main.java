import java.io.IOException;
import java.util.*;

public class Main {
     public static void exit(){
        System.out.println("there are 3 commands");
        System.out.println("Register");
        System.out.println("Post_product");
        System.out.println("Register");
        System.out.println("Exit-stops the program");
        System.out.println("Enter the one you want to run");
     }
    public static void main(String[] args) throws IOException {
        String command;
        Scanner s = new Scanner(System.in);
        Participant r = new Participant();
        Post p = new Post();
        command=s.nextLine();
        do{
        if(command.equalsIgnoreCase("register")&&!command.equalsIgnoreCase("exit")){
            r.register();
        }
        else if(command.equalsIgnoreCase("post_product")&&!command.equalsIgnoreCase("exit")){
            p.post();
        }
        else{
            exit();
        }
    }
    while(!command.equalsIgnoreCase("exit"));
      
    }
}

