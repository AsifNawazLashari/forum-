<?php
// Include Firebase configuration
require 'firebase_config.php';

// Get existing posts from Firebase database
$postsRef = $database->getReference('posts')->orderByChild('created_at');
$postsSnapshot = $postsRef->getValue();

// Display each post
foreach ($postsSnapshot as $postId => $postData) {
    echo '<div>';
    echo '<strong>Posted on: ' . $postData['created_at'] . '</strong><br>';
    echo $postData['content'];
    echo '</div><br>';
}
?>
