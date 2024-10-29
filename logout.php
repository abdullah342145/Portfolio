<?php
if(isset($_GET["action"]) && $_GET["action"]=="logout"){
session_destroy();

if(!isset($_SESSION["username"])){
    header("location:admin.php");
}
}
?>