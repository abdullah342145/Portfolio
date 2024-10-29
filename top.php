<?php
session_start();
require_once("config.php");

$pageName = basename($_SERVER["PHP_SELF"], ".php");
$fullPageName =  ucwords(str_replace("-"," ",$pageName));
// add-tasks
// Add Tasks
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $fullPageName?></title>
        <!-- Favicon-->
        <link href="assets/img/medium.webp" rel="icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <link href="assets/css/signup.css" rel="stylesheet" />
    </head>
