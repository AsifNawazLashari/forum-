<?php
// Include Firebase configuration
require 'firebase_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $post_content = $_POST['post_content'];

    // Store post data in Firebase database
    $newPost = $database->getReference('posts')->push([
        'content' => $post_content,
        'created_at' => date('Y-m-d H:i:s')
    ]);

    echo "Post created successfully!";
}
?>
