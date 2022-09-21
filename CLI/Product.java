import java.util.Scanner;
import java.io.File; // Import the File class
import java.io.FileWriter; // Import the FileWriter class
import java.io.IOException; // Import the IOException class to handle errors
import java.io.BufferedReader;
import java.io.PrintWriter;
import java.io.InputStreamReader;
import java.time.LocalDateTime; // Import the LocalDateTime class
import java.time.format.DateTimeFormatter; // Import the DateTimeFormatter class

public class Product {

    public static String choice;
    String menu;

    public void show() throws IOException {

        // Scanner s = new Scanner(System.in);
        System.out.println("\n--------Enter your choice--------");
        System.out.println("Add Product");
        System.out.println("View Performance");
        System.out.println("Edit Quantity");
        System.out.println("Exit");
        System.out.println("-------------------------------\n");

        BufferedReader reader1 = new BufferedReader(new InputStreamReader(System.in));
        choice = reader1.readLine();

    }

    public static void main(String[] args) throws IOException {
        String filename = "C:/xampp/htdocs/ANKA/ANKA/storage/product.csv";
        PrintWriter w = new PrintWriter(new FileWriter(filename, true), true);

        LocalDateTime ts = LocalDateTime.now();
        DateTimeFormatter ty = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss");
        String formattedDate = ts.format(ty);

        Product wr = new Product();
        wr.show();

        if (choice.equalsIgnoreCase("Add Product")) {
            Scanner m = new Scanner(System.in);

            System.out.print("Enter Product Details in the order below \n");
            System.out.print("Product_Name\tProduct_Quantity\tProduct_Price\tProduct_Description\ttime\tUpdated \n");

            int Updated = 0;
            String pro_name = m.next();
            String pro_qt = m.next();
            String pro_px = m.next();
            String pro_desc = m.next();
            // String product = pro_name + ", " + pro_qt + ", " + pro_px + ", " + pro_desc +
            // ", " + Updated;

            w.println("Post product_" + pro_name + ", " + pro_qt + ", " + pro_px + ", " + pro_desc + ", "
                    + formattedDate + ", " + Updated);
            wr.show();

        } else if (choice.equalsIgnoreCase("View Performance")) {
            System.out.println("you have 0 points");
            wr.show();

        } else if (choice.equalsIgnoreCase("Edit Quantity")) {
            System.out.println("Available stock before is ");
            wr.show();

        } else if (choice.equalsIgnoreCase("Exit")) {
            System.out.println("Exiting.....");
            System.out.println("Bye....");
            System.exit(0); // exit the program

        } else {
            System.out.println("Wrong choice, try again!");
            wr.show();
        }

        try {
            // File myObj = new File("filename.txt");
            File myObj = new File("C:/xampp/htdocs/ANKA/ANKA/storage/product.csv");
            if (myObj.createNewFile()) {
                System.out.println("File created: " + myObj.getName());
            } else {
                System.out.println("File already exists.");
            }
        } catch (IOException e) {
            System.out.println("An error occurred.");
            e.printStackTrace();
        }

        w.close();
        System.out.println("Successfully wrote to the file.");

    }

}
