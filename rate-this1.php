
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>Rate Our website</title>
    <meta name="description" content="Rate our website and leave your feedback to help us improve. Your opinion matters!">
    <meta name="keywords" content="rating, feedback, review, website, comments">
    <meta name="author" content="sparkweb">
    <meta name="robots" content="home, follow">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Rate Our website">
    <meta property="og:description" content="Rate our website and leave your feedback to help us improve. Your opinion matters!">
    <meta property="og:image" content="URL_TO_IMAGE">
    <meta property="og:url" content="YOUR_PAGE_URL">
    <meta property="og:type" content="website">
  <link href="assets/img/medium.webp" rel="icon">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/rate-this.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.5.1.3.css">
    <link rel="stylesheet" href="font/fonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="font/font awesome 6/css/all.min.css">
    </head>
    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Setup PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration
                      $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'abdullahsa0755066@gmail.com';
                $mail->Password = 'blznimwpdpmafggv';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

        // Recipient details
        $mail->setFrom('abdullahsa0755066@gmail.com', 'Sparkweb');
        $mail->addAddress('abdullahsa0755066@gmail.com');  // Receiver's email

        // Create Accept/Reject links
        $acceptLink = "http://localhost/rate-this/accept.php?comment=" . urlencode($comment) . "&rating=" . urlencode($rating);
        $rejectLink = "http://localhost/rate-this/reject.php?comment=" . urlencode($comment) . "&rating=" . urlencode($rating);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Rating and Comment';
        $mail->Body    = "You received a new rating: $rating/5<br>Comment: $comment<br><br>" .
                         "<a href='$acceptLink'>Accept</a> | <a href='$rejectLink'>Reject</a>";

        // Send email
        $mail->send();
        echo '<div class="msg"><strong>Thank You for Your Feedback!</strong><p>Comment and rating have been submitted</p> <p>Your comment and Rating will show very soon</p></p></div>';
    } catch (Exception $e) {
        echo '<div class="error">Message could not be sent. Mailer Error:' .$mail->ErrorInfo .'</div>';
    }
}
?>
    <style>

    </style>

<body>
<header>
<a href="home.php">
    <h1 class="text-center text-primary">Back to the home page!</h1>
</a>
</header>
<div class="container">

    <!-- Average rating display -->
    <div class="average-rating" style="position: absolute; top: 20px; right: 20px;">
        <h4>Average Rating:
            <?php
                $totalRating = 0;
                $ratingCount = 0;
                $file = 'comments.txt';
                if (file_exists($file)) {
                    $comments = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    foreach ($comments as $comment) {
                        list($rating, ) = explode(' - ', $comment);
                        $totalRating += $rating;
                        $ratingCount++;
                    }
                    echo $ratingCount > 0 ? round($totalRating / $ratingCount, 2) : 'No ratings yet';
                }
            ?>
        </h4>
    </div>

    <div class="card">
        <div class="heading">
            <h3>How would you rate this website?</h3>
            <p>Rate this website, it really motivates us to add new features. Thanks in advance.</p>
        </div>

        <!-- FORM START -->
        <form action="#" method="POST">
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
            <div class="form">
                <textarea name="comment" placeholder="Leave a comment..." required rows="5" cols="0"></textarea>
                <div class="post-button">
                    <button type="submit">Post</button>
                </div>
            </div>
        </form>
        <!-- FORM END -->
    </div>

    <!-- Total comments count -->
    <div class="total-comments">
        <h4>Total Comments:
            <?php echo isset($comments) ? count($comments) : '0'; ?>
        </h4>
    </div>

    <!-- DISPLAY ACCEPTED COMMENTS AND RATINGS -->
    <div class="comment-section">
    <?php
        if (file_exists($file)) {
            foreach ($comments as $comment) {
                list($rating, $text) = explode(' - ', $comment);
                echo '<div class="comment-box">';
                // echo '<h4>Rating: ' . htmlspecialchars($rating) . ' by ' . htmlspecialchars($_SESSION['username']) . '</h4>';
                echo '<textarea readonly rows="5" cols="0" style="resize: none;">' . htmlspecialchars($text) . '</textarea>'; // Adjusted textarea
                echo '<button class="reply-button" onclick="showReplyForm(this)">Reply</button>';
                echo '<div class="reply-form" style="display:none;">';
                echo '<textarea placeholder="Write a reply..." rows="5" cols="0" style="resize: none;"></textarea>'; // Add attributes here too
                echo '<button type="submit" class="post-reply-button">Post Reply</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No comments yet.</p>';
        }
    ?>
</div>



</div>
    <script src="assets/js/jquery.js.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.5.1.3.js"></script>
    <script src="assets/js/rate-this.js"></script>
    <script>
 function showReplyForm(button) {
        const replyForm = button.nextElementSibling;
        if (replyForm.style.display === "none") {
            replyForm.style.display = "block";
        } else {
            replyForm.style.display = "none";
        }
    }
    </script>
</body>
</html>
