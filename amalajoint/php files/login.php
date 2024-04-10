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

    // Validate input fields
    if (empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["role"])) {
        $error = "All fields are required.";
    } else {
        // Sanitize user input
        $email = mysqli_real_escape_string($db_conn, $_POST['email']);
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Retrieve user's role from the database
        $sql = "SELECT fname, role FROM users WHERE email = '$email'";
        $result = mysqli_query($db_conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user_fname = $row['fname'];
            $user_role = $row['role'];

            // Check if user's role matches the selected role in the login form
            if ($user_role != $role) {
                $error = "You are not registered as a $role.";
            } else {
                // Perform your login authentication logic here
                // For demonstration purposes, let's assume authentication is successful

                // Start session
                session_start();

                // Set session variables
                $_SESSION['logged_in'] = true;
                $_SESSION['fname'] = $user_fname;

                // Redirect users based on their role
                if ($role == 'chef') {
                    header("Location: Homechef.html");
                    exit();
                } elseif ($role == 'recipe_seeker') {
                    header("Location: home1.php");
                    exit();
                }
            }
        } else {
            $error = "Invalid email or role.";
        }
    }
}

// Close database connection
mysqli_close($db_conn);

?>

