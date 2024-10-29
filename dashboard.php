<?php
require_once("./inc/top.php");
?>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <?php
require_once("./inc/sidebar.php");
?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php
require_once("./inc/navbar.php");
?>
<?php

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION["username"])) {
    header("Location: admin.php"); // Redirect to login page if not logged in
    exit(); // Stop script execution after redirection
}


require_once("./inc/bottom.php");
?>

                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Simple Sidebar</h1>
                    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                    <p>
                        Make sure to keep all page content within the
                        <code>#page-content-wrapper</code>
                        . The top navbar is optional, and just for demonstration. Just create an element with the
                        <code>#sidebarToggle</code>
                        ID which will toggle the menu when clicked.
                    </p>
                </div>
            </div>
        </div>
        <?php
require_once("./inc/bottom.php");
?>