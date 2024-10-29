<?php
require_once("./inc/top.php");

if(isset($_POST["btn_del"])){
    $id =  $_POST["del_id"];
  $sql_del = "delete from spark_tbl where id = '$id'";
  $res = mysqli_query($conn, $sql_del);
//IF ELSE SHOW MESSAGE SUCCESS OR ERROR
if($res){
    echo '<div class="alert alert-success msg">
    <strong>Success</strong> Data Deleted Successfully.
</div>';
}else{
    echo '<div class="alert alert-danger msg">
    <strong>Success</strong> Data Not Deleted.
</div>';
}
}
if(isset($_SESSION["msg"])){
    echo $_SESSION["msg"];
    unset($_SESSION["msg"]);
}
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

            <!-- Page content-->
            <div class="container-fluid py-5">
                <div class="">
                    <h2 class="my-3 text-center">Users</h2>
                    <table class="table table-responsive table-hover table-striped table-bordered text-capitalize text-center">
                        <tr class="text-uppercase">
                            <th>#sr</th>
                            <th>id</th>
                            <th>username</th>
                            <th>Email</th>
                            <th>password</th>
                        </tr>
                        <?php
                        $sr = 1;
                        $sql = "select * from `spark_tbl`";
                        $res = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_array($res)){
                                ?>
                                 <tr>
                            <td><?php echo $sr?></td>
                            <td><?php echo $row["id"]?></td>
                            <td><?php echo $row["username"]?></td>
                            <td><?php echo $row["email"]?></td>
                            <td><?php echo $row["password"]?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="del_id" value="<?php echo $row["id"]?>">
                                    <button class="btn btn-sm btn-danger" name="btn_del" class="btn-del">Del</button>
                                </form>
                                <!-- <form action="edit-tasks.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                </form> -->
                            </td>
                        </tr>



                        <?php
                        $sr++;
                            }
                        }else{
                            echo "No Record Found.";
                        }
                        ?>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <?php
    require_once("./inc/bottom.php");
    ?>
    <script>

    </script>