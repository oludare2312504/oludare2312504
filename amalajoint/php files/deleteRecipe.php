
<?php
include('connection.php');

$RecipeName = $_POST['RecipeName'];

$sql = "DELETE FROM recipemethod WHERE RecipeName='$RecipeName'";
$result = $db->query($sql);

if ($result) {
    echo "Recipe '$RecipeName' successfully deleted.";
} else {
    echo "Error deleting recipe: " . $db->error;
}

$db->close();
?>

