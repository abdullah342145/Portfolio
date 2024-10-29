<?php
if (isset($_GET['comment']) && isset($_GET['rating'])) {
    $comment = $_GET['comment'];
    $rating = $_GET['rating'];

    // Sanitize input
    $comment = htmlspecialchars($comment);
    $rating = intval($rating);

    // Prepare the string to save
    $entry = "$rating/5 - $comment\n";

    // Save to comments.txt
    file_put_contents('comments.txt', $entry, FILE_APPEND);
    
    echo "Comment saved: $entry";
} else {
    echo "Invalid input.";
}
?>
