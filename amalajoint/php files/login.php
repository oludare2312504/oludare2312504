<?php
// Establish database connection
$db_conn = mysqli_connect("localhost", "root", "", "amalajoint");

// Check connection
if ($db_conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Initialize error message variable
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = trim($_POST['email']); // Trim whitespace
    $password = trim($_POST['password']); // Trim whitespace
    
    // Query the database to check if the user exists
    $query = "SELECT email, password FROM users WHERE email=? LIMIT 1";
    $stmt = $db_conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the query returned any rows
    if ($result->num_rows == 1) {
        // Fetch user data
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables and redirect
            session_start();
            $_SESSION['loggedin'] = true;
            header("Location: Homechef.html");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>


