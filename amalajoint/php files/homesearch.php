<?php
include('connection.php');

if (isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Perform a search based on the provided recipe name
    $sql = "SELECT * FROM recipemethod WHERE RecipeName like'$search_query'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Output search results
        echo "Search results for: " . htmlspecialchars($search_query);
        // Output search results details if needed
    } else {
        echo "No results found for: " . htmlspecialchars($search_query);
    }
} else {
    echo "No search query provided.";
}
?>