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
    $chefname = $_POST['chefname'];
    $Grouprecipename = $_POST['Grouprecipename'];
    $Recipe1 = $_POST['Recipe1'];
    $Recipe2 = $_POST['Recipe2'];
    $Recipe3 = $_POST['Recipe3'];

    // File upload handling
    $target_dir = "test_upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_path = $_FILES['image']['name'];

        // Insert data into grouprecipe table
        $query = "INSERT INTO grouprecipe (chefname, Grouprecipename, Recipe1, Recipe2, Recipe3, image_name) VALUES ('$chefname', '$Grouprecipename', '$Recipe1', '$Recipe2', '$Recipe3', '$image_path')";
        
        if (mysqli_query($con, $query)) {
            echo "Group recipe added successfully";
        } else {
            echo "Error adding group recipe: " . mysqli_error($con);
        }
    } else {
        echo "Error uploading image";
    }
}

// Display uploaded images
$query = mysqli_query($con, "SELECT * FROM grouprecipe");
while ($row = mysqli_fetch_assoc($query)) {
    echo '<img width="300" height="200" src="test_upload/' . $row['image_name'] . '" alt="Uploaded Image">';
}

// Close connection
mysqli_close($con);
?>
