import java.io.File; // Import the File class
import java.io.IOException; // Import the IOException class to handle errors

public class Performance {
    public static void main(String[] args) {

        try {
            File myObj = new File("C:/xampp/htdocs/ANKA/ANKA/storage/performance.csv");
            if (myObj.createNewFile()) {
                System.out.println("File successfully created...");
                System.out.println("File created: " + myObj.getName());
            } else {
                System.out.println("File already exists...");
            }
        } catch (IOException e) {
            System.out.println("An error occurred...");
            e.getMessage();
        }

    }
}
