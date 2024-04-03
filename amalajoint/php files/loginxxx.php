<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Establish database connection
$db_conn = mysqli_connect("localhost", "root", "", "amalajoint");

// Check connection
if($db_conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Initialize error message variable
$error = "";

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Query the database to check if the user exists
    $query = "SELECT email FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db_conn, $query);
    
    // Check if the query returned any rows
    if(mysqli_num_rows($result) == 1) {
        // User exists, set session variables or redirect to a new page
        session_start();
        $_SESSION['loggedin'] = true;
        // Redirect the user to a dashboard or another page
        header("Location: Homechef.html");
        exit();
    } else {
        // Display error message for invalid login
        $error = "Invalid email or password.";
    }
}
?>
