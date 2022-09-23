import java.util.*;
import java.io.*;
import java.time.*;

public class Main{
public void menu(){
    System.out.println("                                                                         ");
    System.out.println("                                                                         ");
    System.out.println("----------------------------------MENU-----------------------------------");
    System.out.println("To register ==> Enter your details in the following order ");
    System.out.println("| register | name | password | product | date_of_birth |");
    System.out.println("-------------------------------------------------------------------------");
    System.out.println("To post a product ==> Enter your details in the following order :");
    System.out.println("| post_product | Product_Name | Quantity | Price | Description |");
    System.out.println("-------------------------------------------------------------------------");
    System.out.println("to view your performance type ===> Performance");
    System.out.println("-------------------------------------------------------------------------");
    System.out.println("Exit terminates the program");
    System.out.println("-------------------------------------------------------------------------");
    }
    LocalTime response=null;
       
public  void command() throws IOException, FileNotFoundException{
        menu();   
        try (Scanner sc = new Scanner(System.in)) {
            int update=0;
            
    //Register User.....
            String command =sc.next();
   if(command.equalsIgnoreCase("register")&&!command.equalsIgnoreCase("exit")){
            String name = sc.next();
            String password = sc.next();
            String product = sc.next();
            String date_of_birth=sc.next();   
            //String filename="./ANKA/storage/registration.csv";
            
            File myFile=new File("./ANKA/storage/registration.csv");
            BufferedReader br = new BufferedReader(new FileReader(myFile));
            Object[] lines = br.lines().toArray();
            br.close();
            int exist = 0;
            for(int i=0; i<lines.length; i++){
                String line = lines[i].toString().trim();
                String[] column =  line.split(",");
                
                if(name.equals(column[0])&&product.equals(column[2])){
                    exist = 1; 
                    System.out.println("user already exists try another name");
                    command();
                }
               
            }
            if(exist==0){

            PrintWriter p  = new PrintWriter(new FileWriter(myFile,true),true);
            p.println(name+","+password+","+product+","+date_of_birth+","+update);
            p.close(); 
            command();

      }  
            
   }
   
   //Post Product.....
   else if(command.equalsIgnoreCase("post_product")&&!command.equalsIgnoreCase("exit")){
            int Updated = 0;
            String pro_name =sc.next();
            String pro_qt = sc.next();
            String pro_px = sc.next();
            String pro_desc = sc.next();

            
            String filename2 = "./ANKA/storage/product.csv";

            File myFile=new File("./ANKA/storage/product.csv");
            BufferedReader br = new BufferedReader(new FileReader(myFile));
            Object[] line = br.lines().toArray();
            br.close();
            int exist = 0;
            for(int i=0; i<line.length; i++){
                String lines = line[i].toString().trim();
                String[] column =  lines.split(",");
                
            //     if(pro_name.equals(column[0])){
            //         exist = 1; 
            //         System.out.println("product already posted");
            //         command();
            //     }
               
            // }
            // if(exist==0){

            PrintWriter w = new PrintWriter(new FileWriter(filename2, true), true);
            w.println(pro_name + ", " + pro_qt + ", " + pro_px + ", " + pro_desc + ", " + Updated);
            
            w.close();
            command();
            }
   }
   
   //Performance.....
   else if(command.equalsIgnoreCase("performance")&&!command.equalsIgnoreCase("exit")){
            LocalTime request = LocalTime.now();    
            Scanner so = new Scanner(System.in);
            System.out.println("To see your results type view");
            String view=so.nextLine();

   if(view.equalsIgnoreCase("view")){
            LocalTime seen = LocalTime.now();
            System.out.println("please login first");
            Login n = new Login();
            n.login(so);
            response = request.plusMinutes(1);


File time =new File("./ANKA/storage/time.csv");
PrintWriter op = new PrintWriter(new FileWriter(time, true), true);
op.println(n.username+","+request+","+seen+","+response);
op.close();



   }

            }
        }
    }
 
    //main method......
    public static void main(String[] args) throws FileNotFoundException, IOException {
        Main m = new Main();
         m.command(); 
      }
}





