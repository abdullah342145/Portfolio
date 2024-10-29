<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "spark_web";

$conn = mysqli_connect($server, $username, $password, $database);
if($conn){
    // echo "Connected";
}else{
    echo "Not Connected";
}
?>



