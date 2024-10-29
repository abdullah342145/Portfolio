<?php
require_once("./inc/top.php");


// Check if the user is already logged in, if yes, redirect to dashboard
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit(); // Stop script execution after redirection
}

// Handle login form submission
if (isset($_POST["btn_enter"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to check if username and password match in the database
    $sql = "SELECT * FROM spark_admin_tbl WHERE username = '$username' AND BINARY password = '$password'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        // Fetch user data
        $row = mysqli_fetch_array($res);
        // Set session variables for the logged-in user
        $_SESSION["username"] = $row["username"];
        $_SESSION["password"] = $row["password"];

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit(); // Stop script execution after redirection
    } else {
        // If login failed, show an alert
        echo "<script>alert('Wrong username or password');</script>";
    }
}
?>

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
        <h2>Login</h2>
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="btn_enter">Login</button>
        </form>
    </div>
</div>

<?php
require_once("./inc/bottom.php");
?>
