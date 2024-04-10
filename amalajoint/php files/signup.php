<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if any of the required fields are empty
if (empty($_POST["ID"]) || empty($_POST["Email"]) || empty($_POST["Firstname"]) || empty($_POST["Lastname"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["password_confirmation"]) || empty($_POST["role"])) {
    die("All fields are required");
}

// Validate email format
if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

// Validate password length
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

// Validate password complexity
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

// Check if passwords match
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

// Hash the password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Change this if you have a password for your database
$dbname = "amalajoint";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO users (id, email, fname, lname, username, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $ID, $email, $Firstname, $Lastname, $username, $password_hash, $role);

// Retrieve user input from the form
$ID = $_POST['ID'];
$email = $_POST['Email'];
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$username = $_POST['username'];
$role = $_POST['role']; // Retrieve the role from the form

// Execute the statement
if ($stmt->execute()) {
    // Redirect to success page
    header("Location: login.html");
    exit(); // Ensure script stops execution after redirection
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
