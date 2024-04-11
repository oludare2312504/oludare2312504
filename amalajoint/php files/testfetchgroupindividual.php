<?php
include('connection.php');

// Check if 'recipename' parameter exists in the URL
if(isset($_GET['recipename'])) {
    // Get the value of 'recipename' parameter from the URL
    $recipename = $_GET['recipename'];

    // Fetch the row from the recipemethod table based on the 'recipename'
    $sql = "SELECT * FROM recipemethod WHERE recipename = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $recipename);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // Output the row data
        $row = $result->fetch_assoc();
        echo "<h2>Recipe Details</h2>";
        echo "<p>Chef Name: " . $row['chefname'] . "</p>";
        echo "<p>Category: " . $row['category'] . "</p>";
        echo "<p>Ingredients: " . $row['Ingredients'] . "</p>";
        echo "<p>Directions: " . $row['Directions'] . "</p>";
    } else {
        echo "<p>No recipe found for '{$recipename}'</p>";
    }
} else {
    echo "<p>Recipe name parameter is missing in the URL</p>";
}

$stmt->close();
$db->close();
?>
