import java.util.*;
import java.io.*;
import java.time.*;

public class Try{
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

    

public void command() throws IOException, FileNotFoundException{
        menu();   
        Scanner sc = new Scanner(System.in);
        
        

        

        //Register User.....
        String command =sc.next();
    if(command.equalsIgnoreCase("register")&&!command.equalsIgnoreCase("exit")){
        register(sc);
    }
    
    //Post Product.....
    else if(command.equalsIgnoreCase("post_product")&&!command.equalsIgnoreCase("exit")){
        product(sc);
    }
    
    //Performance.....
    else if(command.equalsIgnoreCase("performance")&&!command.equalsIgnoreCase("exit")){
       performance(sc);
    }

    sc.close();
   
}
public void performance(Scanner sc) throws IOException{
    LocalTime myObj = LocalTime.now();        
    System.out.println("Your results will be displayed in 2 minute");
    
    // //showing results
    // System.out.println("this is the information requested");
    // //File myFile=new File("./ANKA/storage/results.csv");
    // String myfile="./ANKA/storage/results.csv";
    // BufferedReader br = new BufferedReader(new FileReader(myfile));
    // Object[] line = br.lines().toArray();
    // br.close();
   
    // for(int i=0; i<line.length; i++){
    //     String lines = line[i].toString().trim();
    //     String[] column =  lines.split(",");
    //     //if()
    //    System.out.println(lines);
            
    //     }




    // String filename3="./ANKA/storage/time.csv";
    File myFile=new File("./ANKA/storage/results.csv");

     PrintWriter w = new PrintWriter(new FileWriter(myFile, true), true);
     
     w.println(myObj+",");
    
     w.close();
    command();
}
public void register(Scanner sc) throws FileNotFoundException, IOException{
    String name = sc.next();
    String password = sc.next();
    String product = sc.next();
    String date_of_birth=sc.next(); 
    int update=0;  
    String filename="./ANKA/storage/registration.csv";
    
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

    PrintWriter p  = new PrintWriter(new FileWriter(filename,true),true);
    
    p.println(name+","+password+","+product+","+date_of_birth+","+update);
    p.close(); 
    command();

   }  
    
}
public void product(Scanner sc) throws IOException{
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
        
        if(pro_name.equals(column[0])){
            exist = 1; 
            System.out.println("product already posted");
            command();
        }
       
    }
    if(exist==0){

    PrintWriter w = new PrintWriter(new FileWriter(filename2, true), true);
    w.println(pro_name + ", " + pro_qt + ", " + pro_px + ", " + pro_desc + ", " + Updated);
    
    w.close();
    command();
    }

}

public static void main(String[] args) throws FileNotFoundException, IOException {
    Main m = new Main();
     m.command(); 
  }

}