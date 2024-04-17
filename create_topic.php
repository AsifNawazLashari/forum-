<?php
// Include Firebase configuration
require 'firebase_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $topic_title = $_POST['topic_title'];

    // Store topic data in Firebase database
    $newTopic = $database->getReference('topics')->push([
        'title' => $topic_title,
        'created_at' => date('Y-m-d H:i:s')
    ]);

    echo "Topic created successfully!";
}
?>
