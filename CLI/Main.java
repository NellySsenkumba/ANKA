import java.util.*;
import java.io.*;
import java.time.*;

public class Main{
public void menu(){
    System.out.println("---------------------------MENU------------------------");
    System.out.println(">To register - Enter your details in the order below ");
    System.out.println("(register name password product date_of_birth )");
    System.out.println(" ");
    System.out.println(">To post a product - Enter your details in the order below");
    System.out.println("                   - use the same command to add a product");
    System.out.println("(post_product productname quantity price description )");
    System.out.println(" ");
    System.out.println(">To view your performance type - Performance");
    System.out.println(" ");
    System.out.println(">To terminate type - Exit");
    System.out.println("----------------------------------------------------------");

    }
    LocalTime response=null;
       
public  void command() throws IOException, FileNotFoundException{
        menu();   
        Scanner sc = new Scanner(System.in);
        String command =sc.next();
        int update=0;
            
    //Register User..... 
   if(command.equalsIgnoreCase("register")&&!command.equalsIgnoreCase("exit")){
            String name = sc.next();
            String password = sc.next();
            String product = sc.next();
            String date_of_birth=sc.next();   
            //String filename="./ANKA/storage/registration.csv";
            
            File myFile=new File("./ANKA/storage/registration.csv");
            BufferedReader br = new BufferedReader(new FileReader(myFile));
            Object[] lines = br.lines().toArray();
            // name.equals(column[0])||
            int exist = 0;
            for(int i=0; i<lines.length; i++){
                String line = lines[i].toString().trim();
                String[] column =  line.split(",");
                if((product.equals(column[2]))){
                    exist=1;
                    System.out.println("user already exists try another name");
                    System.out.println("");


                    command();
                    // if(name.equals(column[0])||product.equals(column[2]))
              }  
                // else{
                //     // exist = 0;         
                //     PrintWriter p  = new PrintWriter(new FileWriter(myFile,true),true);
                //     p.println(name+","+password+","+product+","+date_of_birth+","+update);
                //     p.close(); 
                //     System.out.println("successfully registered!!");
                //     command();
        
                // }
            }
            if(exist==0){

            PrintWriter p  = new PrintWriter(new FileWriter(myFile,true),true);
            p.println(name+","+password+","+product+","+date_of_birth+","+update);
            p.close(); 
            System.out.println("successfully registered!!");
            command();

      }  
    br.close(); 
            
   }
   

   //Post Product.....
   else if(command.equalsIgnoreCase("post_product")&&!command.equalsIgnoreCase("exit")){
            int Updated = 0;
            String pro_name =sc.next();
            String pro_qt = sc.next();
            String pro_px = sc.next();
            String pro_desc = sc.next();

            
            // String filename2 = "./ANKA/storage/product.csv";

            File myFile=new File("./ANKA/storage/registration.csv");
            BufferedReader br = new BufferedReader(new FileReader(myFile));
            Object[] line = br.lines().toArray();
            br.close();
            int exist = 1;
            for(int i=0; i<line.length; i++){
                String lines = line[i].toString().trim();
                String[] column =  lines.split(",");
                if(exist==1){
                    String filename2 = "./ANKA/storage/product.csv";
                
                PrintWriter w = new PrintWriter(new FileWriter(filename2, true), true);
                w.println(pro_name + ", " + pro_qt + ", " + pro_px + ", " + pro_desc + ", " + Updated);
                
                w.close();
                command();
               }
                else if(!pro_name.equals(column[2])){
                    exist = 0; 
                    System.out.println("product cant be posted since its not registered");
                    command();
                }
               
            }
        //     if(exist==1){
        //         String filename2 = "./ANKA/storage/product.csv";
            
        //     PrintWriter w = new PrintWriter(new FileWriter(filename2, true), true);
        //     w.println(pro_name + ", " + pro_qt + ", " + pro_px + ", " + pro_desc + ", " + Updated);
            
        //     w.close();
        //     command();
        //    }
   }
   

   //Performance.....
   else if(command.equalsIgnoreCase("performance")&&!command.equalsIgnoreCase("exit")){
                LocalTime request = LocalTime.now(); //time participant enters perform on cli   
                System.out.println("please login first");
                Login n = new Login();
                n.login(sc);    //call to the login method
                System.out.println("");
                response = request.plusMinutes(1);
     
                System.out.println("your information will be available at "+response);
                System.out.println("");
                System.out.println("To see your information type view");
                String view=sc.next();  

    if(view.equalsIgnoreCase("view")){
 
//counting number of participants
 File myFile2=new File("./ANKA/storage/registration.csv");
 BufferedReader buf = new BufferedReader(new FileReader(myFile2));
 Object[] lines = buf.lines().toArray();
 int counter = 0;
        for(int count=0; count<lines.length;count++){
            counter++;           
        }

//requested results  
File myFilerequest=new File("./ANKA/storage/results.csv");
 BufferedReader buffer = new BufferedReader(new FileReader(myFilerequest));
 Object[] rows = buffer.lines().toArray();  
 for(int i=0; i<rows.length; i++){
     String row = rows[i].toString().trim();
     String[] column =  row.split(",");
    
     
    if(column[0].equalsIgnoreCase(Login.username)){
     response = request.plusMinutes(1);
     
     
     System.out.println("");
     System.out.println("THIS IS YOUR INFORMATION");
     System.out.println("-----------------------------");
     System.out.println("| name          | "+column[0]+"        |");
     System.out.println("-----------------------------");
     System.out.println("| points        | "+column[1]+"          |");
     System.out.println("----------------------------");
     System.out.println("| rank          | "+column[2]+" outof "+counter+" |");
     System.out.println("-----------------------------");
     System.out.println("| buyers        | "+column[3]+"          |");
     System.out.println("-----------------------------");
     System.out.println("| products left | "+column[4]+"         |");
     System.out.println("-----------------------------");

// Reward 
    if((column[2]).equalsIgnoreCase("1")){
        
        System.out.println();
        System.out.println("congratulations you won!!");
        System.out.println(" * * * * * * * * * *");
        System.out.println("*  BEST PARTICIPANT *");
        System.out.println("*       AWARD       *");
        System.out.println(" * * * * * * * * * *");


    }else{System.out.println("yes");} 
    buffer.close();
    buf.close();
    
    
   }
}

 //time
LocalTime seen = LocalTime.now();
File time =new File("./ANKA/storage/time.csv");
PrintWriter op = new PrintWriter(new FileWriter(time, true), true);
op.println(Login.username+","+request+","+seen+","+response+","+0);
op.close();
   }

            }
        }
    
//LocalTime newt = response;
    //main method......
    public static void main(String[] args) throws FileNotFoundException, IOException {
        Main m = new Main();
         m.command(); 
      }
}





