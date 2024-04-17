<?php
// Include Firebase configuration
require 'firebase_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Store user data in Firebase database
    $newUser = $database->getReference('users')->push([
        'username' => $username,
        'email' => $email,
        'password' => $password
    ]);

    echo "User registered successfully!";
}
?>
