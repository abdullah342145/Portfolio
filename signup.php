<?php
require_once("./inc/top.php");

//BTN CLICK VALUE GET
if (isset($_POST["btn_submit"])) {
    // VARIABLES FROM FORM
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // QUERY TO CHECK IF USERNAME OR EMAIL ALREADY EXISTS
    $check_query = "SELECT * FROM spark_tbl WHERE username = '$username' OR email = '$email'";
    $check_res = mysqli_query($conn, $check_query);

    // CHECK IF ANY ROWS RETURNED (i.e. duplicate exists)
    if (mysqli_num_rows($check_res) > 0) {
        // DUPLICATE USERNAME OR EMAIL FOUND
        echo "Username or Email already exists. Please choose a different one.";
    } else {
        // IF NO DUPLICATE, INSERT THE DATA
        $sql = "INSERT INTO spark_tbl (username, email, password) VALUES ('$username', '$email', '$password')";
        $res = mysqli_query($conn, $sql);

        // IF ELSE SHOW MESSAGE SUCCESS OR ERROR
        if ($res) {
            echo "Data Inserted";
            header("location:login.php");
        } else {
            echo "Data Not Inserted";
        }
    }
}
?>


<body>

            <!-- Page content-->
            <div class="container">
        <!-- Circles Animation Container -->
        <div class="circle" id="circle1"></div>
        <div class="circle" id="circle2"></div>
        <div class="circle" id="circle3"></div>
        <div class="circle" id="circle4"></div>

        <!-- Sign-Up Form -->
        <div class="form-container">
            <h2>Sign Up</h2>
            <form method="POST" enctype="multipart/form-data" action="">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="btn_submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
        </div>
    <?php
    require_once("./inc/bottom.php");
    ?>