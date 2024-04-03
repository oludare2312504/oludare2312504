<?php


// Create connection
$db = new mysqli("localhost", "root", "", "amalajoint");


// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
