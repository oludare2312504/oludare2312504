<?php
include('../php files/connection.php'); // Include your database connection file

// Query to fetch recipes from the database
$query = "SELECT * FROM grouprecipe";
$result = mysqli_query($db, $query);

// Check if there are any recipes in the database
if(mysqli_num_rows($result) > 0) {
    // Loop through each recipe and display them
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>{$row['Grouprecipename']}</h3>";
        // Display the image if 'image_name' is set
        if(!empty($row['image_name'])) {
            echo "<img src='test_upload/{$row['image_name']}' alt='Recipe Image'style='max-width: 350px; max-height: 350px;'>";
        }
        echo "<h4><a href='{$row['Recipe1']}'>{$row['Recipe1']}</a></h4>";
        echo "<h4>{$row['Recipe2']}</h4>";
        echo "<h4>{$row['Recipe3']}</h4>";
        
        echo "<hr>";
    }
} else {
    // If no recipes are found in the database
    echo "No recipes found.";
}
?>
