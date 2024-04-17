<?php
// signup_process.php

// Include Firebase PHP SDK and configuration
require 'firebase_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize input (not needed for Firebase)
    // Hash the password (not needed for Firebase)

    // Store user data in Firebase authentication
    try {
        $user = $auth->createUserWithEmailAndPassword($email, $password);

        // Get user ID
        $uid = $user->uid;

        // Add additional user data to Firestore (optional)
        $userData = [
            'username' => $username,
            'email' => $email
            // Add more fields as needed
        ];

        $database->getReference('users/' . $uid)->set($userData);

        echo "User registered successfully!";
    } catch (\Kreait\Firebase\Exception\Auth\EmailExists $e) {
        echo 'Email already exists';
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
