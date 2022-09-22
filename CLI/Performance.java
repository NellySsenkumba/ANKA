//for participant ID, participant name, points
import java.io.File; // Import the File class
import java.io.IOException; // Import the IOException class to handle errors
import java.time.LocalDateTime; // Import the LocalDateTime class
import java.time.format.DateTimeFormatter; // Import the DateTimeFormatter class

public class Performance {
    public void performance() {
        
        LocalDateTime t = LocalDateTime.now();
        DateTimeFormatter tm = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss");
        String time = t.format(tm);

        try {
            File myObj = new File("./ANKA/storage/results.csv");
            if (myObj.createNewFile()) {
                System.out.println("File successfully created at " + time);
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
