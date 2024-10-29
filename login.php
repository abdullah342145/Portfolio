<?php
require_once("./inc/top.php");

// Check if username is passed via URL (from signup page) or session
$username_display = "";
if (isset($_GET['username'])) {
    $username_display = $_GET['username']; // Get username from the signup redirect
} elseif (isset($_SESSION['username'])) {
    $username_display = $_SESSION['username']; // For logged-in users
}

// BTN CLICK VALUE GET for Login
if (isset($_POST["btn_submit"])) {
    // VARIABLES FROM FORM
    $username = $_POST["username"];
    $password = $_POST["password"];

    // QUERY TO CHECK IF USERNAME AND PASSWORD MATCH IN DATABASE
    $login_query = "SELECT * FROM spark_tbl WHERE username = '$username' AND password = '$password'";
    $login_res = mysqli_query($conn, $login_query);

    // CHECK IF USER EXISTS AND PASSWORD MATCHES
    if (mysqli_num_rows($login_res) > 0) {
        // LOGIN SUCCESSFUL
        $user_data = mysqli_fetch_assoc($login_res); // Get user data

        // Set session variables to track logged-in user
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['email'] = $user_data['email'];

        header("Location: rate-this1.php"); // Redirect to a protected page after successful login
        exit();
    } else {
        // LOGIN FAILED
        echo "Invalid username or password. Please try again.";
    }
}
?>

<style>
.welcome-message {
    margin-bottom: 20px; /* Space between the message and the form */
    font-size: 16px;
    font-weight: bold;
    color: #333;
    text-align: left; /* Align the message to the left */
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
    width: fit-content; /* Adjust width to fit the text */
}
</style>

<body>
<!-- Page content -->
<div class="container">
    <!-- Circles Animation Container -->
    <div class="circle" id="circle1"></div>
    <div class="circle" id="circle2"></div>
    <div class="circle" id="circle3"></div>
    <div class="circle" id="circle4"></div>

    <!-- Login Form -->
    <div class="form-container">
    <?php if ($username_display): ?>
        <div class="welcome-message">
            <h3>Hello, <?php echo htmlspecialchars($username_display); ?>! Please log in to enter the website.</h3>
        </div>
    <?php endif; ?>
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="btn_submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</div>

<?php
require_once("./inc/bottom.php");
?>
