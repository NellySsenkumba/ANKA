//for participant ID, participant name, points
import java.io.File; // Import the File class
import java.io.IOException; // Import the IOException class to handle errors

public class Performance {
    public void performance() {

        try {
            File myObj = new File("./ANKA/storage/performance.csv");
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
