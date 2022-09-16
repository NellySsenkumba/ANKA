import java.io.*;
public class Post {
    public void post() throws IOException {
String command;
        
            String filename = "products.txt";
            //PrintWriter p=null;
            System.out.println("Enter a command");
            BufferedReader b = new BufferedReader(new InputStreamReader(System.in));
            command=b.readLine();
            System.out.println("Post_product product_name description");
            String details = b.readLine();
            PrintWriter p  = new PrintWriter(new FileWriter(filename,true),true);
            p.print(command+" ");

            // String[] blocked=details.split(" ");
            // for (String bk : blocked) {
            //     System.out.println(" ");
            //     System.out.println(bk);
            //     System.out.println(blocked[0]);
            // }
            p.print(details);
            p.close();            
        }
    }
