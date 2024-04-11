<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$con = mysqli_connect("localhost", "root", "", "amalajoint");

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Check if the file input exists and if a file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Retrieve form data
        $chefname = $_POST['chefname'];
        $category = $_POST['category'];
        $RecipeName = $_POST['RecipeName'];
        $Ingredients = $_POST['Ingredients'];
        $Directions = $_POST['Directions'];

        // File upload handling
        $target_dir = "test_upload/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Check if file was successfully moved
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $_FILES['image']['name'];

            // Insert data into recipemethod table
            $query = "INSERT INTO recipemethod (chefname, category, RecipeName, Ingredients, Directions,image_name) VALUES ('$chefname', '$category', '$RecipeName', '$Ingredients', '$Directions','$image_path')";
            
            // Execute query and handle result
            if (mysqli_query($con, $query)) {
                echo "Individual recipe added successfully";
                echo "<a href='Homechef.html'>Return to Home Page</a>";
            } else {
                echo "Error adding Individual Recipe: " . mysqli_error($con);
            }
        } else {
            echo "Error uploading image";
        }
    } else {
        echo "No file uploaded or file upload error";
    }
}

// Close connection
mysqli_close($con);
?>
