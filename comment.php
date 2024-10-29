<div id="commentsSection">
    <h4>Accepted Comments:</h4>
    <?php
    // Check if comments.txt exists and read the comments
    if (file_exists('comments.txt')) {
        $comments = file('comments.txt');
        foreach ($comments as $comment) {
            echo "<p>$comment</p>";
        }
    } else {
        echo "<p>No comments yet.</p>";
    }
    ?>
</div>
