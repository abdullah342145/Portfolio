   <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><?php echo $_SESSION["username"];?></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php
                    if($pageName == "dashboard"){
                        echo "active-menus";
                        }else{
                            echo '';
                        }
                        ?>" href="dashboard.php">Dashboard</a>

                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php
                    if($pageName == "tasks"){
                        echo "active-menus";
                        }else{
                            echo '';
                        }
                        ?>" href="tasks.php">Tasks</a>
                </div>
            </div>