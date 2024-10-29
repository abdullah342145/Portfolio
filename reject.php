<?php
if (isset($_GET['comment']) && isset($_GET['rating'])) {
    echo "The comment and rating have been rejected!";
    echo "<br><a href='home.php'>Go back to the main page</a>";
}
?>
