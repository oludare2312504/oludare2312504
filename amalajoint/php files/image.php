<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Read the uploaded file
        $image_data = file_get_contents($_FILES["image"]["tmp_name"]);

        // Connect to database (Replace with your database credentials)
        $conn = new mysqli("localhost", "username", "password", "database_name");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO images (image_data) VALUES (?)");
        $stmt->bind_param("b", $image_data);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "Image uploaded successfully";
        } else {
            echo "Error uploading image: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Error: No file uploaded";
    }
}
?>
