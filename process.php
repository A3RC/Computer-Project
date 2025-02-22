<?php
session_start();  // Start session to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $errors = [];

    // Username Validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    } elseif (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters.";
    }

    // Password Validation
    if (empty($password)) {  // Fixed $$password issue
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    // If errors exist, redirect back with errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;  // Store errors in session
        header("Location: login.php");  // Redirect back to login page
        exit();
    }

    // If no errors, process login (Add DB authentication logic here)
    header("Location: home.php");
}
?>
