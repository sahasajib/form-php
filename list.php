<?php
    include_once("./inc/header.php");
    include_once("./inc/dbconn.php");
    $sql = "SELECT * FROM user";

    $query = mysqli_query($conn,$sql);


 $user = mysqli_fetch_all($query,MYSQLI_ASSOC);
       

 $count = count ($user);

?>
    <div class="container">
        <?php
            include_once("./inc/manu.php");
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-center">
                    <div class="card-header bg-secondary text-white " >
                        customer table
                    </div>
                    <div class="card-body">
                    <?php
                    if(isset($_GET['deleted'])){
                        ?>
                        <div class="alert alert-danger">
                            <?=$_GET['customer_id']; ?>
                        </div>
                        <?php
                    }
                    ?>
                     <?php
                        if (isset($_GET['update'])) {
                            ?>
                            <div class="alert alert-success">
                                <?=$_GET['customer_id']; ?>
                            </div>
                            <?php
                        }
                     ?>
                    <div id="ajaxResponse"></div>
                      <table class="table table-bordered table-striped" id="customertable">
                         <thead>
                             <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>File</th>
                                <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php
                               if($count > 0){
                                foreach($user as $user){
                                   ?>
                                    <tr>
                                        <td><?=$user['customer_id']; ?></td>
                                        <td><img src="./uploads/<?=$user['customer_image']; ?>" width="50px"></td>
                                        <td><?=$user['customer_name']; ?></td>
                                        <td><?=$user['customer_phone']; ?></td>
                                        <td><?=$user['customer_email']; ?></td>
                                        <td><?=$user['customer_username']; ?></td>
                                        <td><?=$user['customer_age']; ?></td>
                                        <td><?=$user['customer_gender']; ?></td>
                                        <td><a href="./uploads/<?=$user['customer_file']; ?>">Download CV</a></td>
                                        
                                        <td>
                                            <a href="detailes.php?cus_id=<?=$user['customer_id'];?>" class="btn btn-sm btn-success btn-circle ">
                                                <i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="edit.php?cus_id=<?=$user['customer_id'];?>" class="btn btn-sm btn-info btn-circle">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="delete.php?cus_id=<?=$user['customer_id'];?>" 
                                            class="btn btn-sm btn-danger btn-circle">
                                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                
                                                <a href="#" class="btn btn-warning btn-sm btn-circle delete" data-cid="<?=$user['customer_id'];?>" ><i
                                                class="fa fa-trash"></i></a>    
                                          </td>
                                    </tr>
                                    <?php
                                   }
                               }
                            ?>
                         </tbody>
                         <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>File</th>
                                <th>Action</th>
                             </tr>
                         </tfoot>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
        $(".delete").on('click',function(e){
          e.preventDefault();
          ele = $(this);
          id = ele.data('cid');
          //console.log(id);
          m = confirm('are you sure?');
            if(m==true){
                $.ajax({
                    type : "POST",
                    url :"ajax_delete.php",
                    data : {sajib:id},
                    success:function(response){
                        //console.log(response + "ajax")
                        if(response==="deleted"){
                            ele.closest('tr').css('background','tometo');
                            ele.closest('tr').hide('slow');
                        }
                        
                    }
                })
            }else{
                alert('I have changed my mind!');
            }
        })
    });
    </script>
<?php
    include_once("./inc/footer.php");
?>
