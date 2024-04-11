<?php
include('connection.php');

var_dump($_POST);


// Check if form fields are set
if(isset($_POST['chefname']) && isset($_POST['category']) && isset($_POST['cuisine']) && isset($_POST['location'])) {
    $chefname = $_POST['chefname'];
    $category = $_POST['category'];
    $cuisine = $_POST['cuisine'];
    $location = $_POST['location'];

    // Check if form fields are not empty
    if(!empty($chefname) || !empty($category) || !empty($cuisine) || !empty($location)) {
        $sql = "SELECT * FROM users WHERE fname='$fname' OR category='$category' OR cuisine='$cuisine' OR location='$location'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<br> Chef Name: " . $row["chefname"] . " - Category: " . $row["category"] . " - Cuisine: " . $row["cuisine"] . " - Location: " . $row["location"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        echo "Results displayed";
    } else {
        echo "Please fill in at least one search criteria.";
    }
} else {
    echo "Form fields are not set.";
}

$db->close();
?>
