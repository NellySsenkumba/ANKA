import java.util.*;
import java.io.*;

public class Login {
    public void login() throws FileNotFoundException,IOException{
        File myFile=new File("./ANKA/storage/registration.csv");
        BufferedReader br = new BufferedReader(new FileReader(myFile));
        Object[] lines = br.lines().toArray();
       
        Scanner sc = new Scanner(System.in);
        System.out.println("enter your name and password");
        String name = sc.nextLine();
        String password = sc.nextLine();
        int exist = 0;
        for(int i=0; i<lines.length; i++){
            String line = lines[i].toString().trim();
            String[] column =  line.split(",");
            
            if(name.equals(column[0])&&password.equals(column[1])){
                exist = 1; 
            }
           
        }
        sc.close();
        br.close();
        
        if(exist==1){
            System.out.println("Successfully logged in"); 
            //run performance method
            Scanner s = new Scanner(System.in);
            System.out.println("to view your performance type 'performance'");
            System.out.println("to post a product type 'post_product;");
            String choice = s.nextLine();
            if(choice.equalsIgnoreCase("Performance")){
                Performance p = new Performance();
                p.performance();
            }else if(choice.equalsIgnoreCase("post_product")){
                Product pd = new Product();
                pd.show();
                pd.post();
            }

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
