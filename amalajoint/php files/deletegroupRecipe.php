
<?php
include('connection.php');

$Grouprecipename = $_POST['Grouprecipename'];

$sql = "DELETE FROM grouprecipe WHERE Grouprecipename like'%$Grouprecipename%'";
$result = $db->query($sql);

if ($result) {
    echo "Recipe '$Grouprecipename' successfully deleted.";
} else {
    echo "Error deleting recipe: " . $db->error;
}

$db->close();
?>

