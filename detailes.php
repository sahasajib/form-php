<?php 
include_once("./inc/header.php");
include_once("./inc/dbconn.php");
$id = $_GET['cus_id'];
$sql = "SELECT *  FROM user WHERE customer_id=$id";

$query = mysqli_query($conn,$sql);
$user  = mysqli_fetch_assoc($query);

?>


    <div class="container">
        <?php
            include_once("./inc/manu.php");
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Users
                    </div>
                    <div class="card-body">
                    <p><strong>Name</strong>: <?=$user['customer_name'];?></p>
                    <p><strong>Phone</strong>: <?=$user['customer_phone'];?></p>
                    <p><strong>Email</strong>: <?=$user['customer_email'];?></p>
                    <p><strong>Username</strong>: <?=$user['customer_username'];?></p>
                    <p><strong>Age</strong>: <?=$user['customer_age'];?></p>
                    <p><strong>Gender</strong>: <?=$user['customer_gender'];?></p>
                    <p><strong>Create Date</strong>: <?php echo date('M-d, Y',strtotime($user['customer_created_at']));?></p>
                    </div>
                </div>
            </div>

        </div>

    </div>


   <?php 
include_once("./inc/footer.php")
?>