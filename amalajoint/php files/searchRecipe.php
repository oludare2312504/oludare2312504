<?php
include('connection.php');
$Grouprecipename = $_POST['Grouprecipename'];

$sql = "SELECT * FROM grouprecipe WHERE Grouprecipename LIKE '%$Grouprecipename%'";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<html><body><table width=80% height=90%><tr><td>Chef Name:</td><td>" . $row['Chefname'] . "</td></tr> " .
            "<tr><td>Grouprecipename:</td><td> " . $row["Grouprecipename"] . "</td></tr> " .
            "<tr><td>Recipe1:</td><td> " . $row["Recipe1"] . "</td></tr> " .
            "<tr><td>Recipe2:</td><td> " . $row["Recipe2"] . "</td></tr> " .
            "<tr><td>Recipe3:</td><td> " . $row["Recipe3"] . "</td></tr> ";

        
        if (!empty($row["image_name"])) {
            $imagePath = 'path_to_your_images/' . $row["image_name"]; 
            echo "<tr><td>Image:</td><td><img src='" . $imagePath . "' alt='Recipe Image'></td></tr>";
        }

        echo "</table>";
    }
    echo "<h2><a href='Homechef.html'>Click here to go back to home</a></h2>";
} else {
    echo "0 results";
    echo "<h2><a href='Homechef.html'>Click here to go back to home</a></h2>";
}
$db->close();
?>
