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
        $mail->Username = 'abdullahsajjad057@gmail.com';  // Your email
        $mail->Password = 'yslnlogfugheqtpv';        // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipient details
        $mail->setFrom('abdullahsajjad057@gmail.com', 'Sparkweb');
        $mail->addAddress('abdullahsajjad057@gmail.com');  // Receiver's email

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
        echo 'Comment and rating have been submitted and an email sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
