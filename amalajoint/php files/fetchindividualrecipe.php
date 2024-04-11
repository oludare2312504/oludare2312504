<?php
include('../php files/connection.php'); // Include your database connection file

// Query to fetch recipes from the database
$query = "SELECT * FROM recipemethod";
$result = mysqli_query($db, $query);

// Check if there are any recipes in the database
if(mysqli_num_rows($result) > 0) {
    // Loop through each recipe and display them
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>{$row['RecipeName']}</h3>";
        // Display the image if 'image_name' is set
        if(!empty($row['image_name'])) {
            echo "<img src='test_upload/{$row['image_name']}' alt='Recipe Image' style='max-width: 350px; max-height: 350px;'>";
        }
        // Check if 'Ingredient' key exists before accessing it
        if(isset($row['Ingredients'])) {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>{$row['Ingredients']}</h4>";
        } else {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>No Ingredients provided</h4>";
        }
        // Check if 'Directions' key exists before accessing it
        if(isset($row['Directions'])) {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>{$row['Directions']}</h4>";
        } else {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>No Directions provided</h4>";
        }
        echo "<hr>";
    }
} else {
    // If no recipes are found in the database
    echo "No recipes found.";
}
?>
