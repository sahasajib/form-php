<?php
    include_once("./inc/header.php");
    include_once("./inc/dbconn.php");

$id = $_GET['cus_id'];
$sql = "SELECT *  FROM user WHERE customer_id=$id"; 

$query = mysqli_query($conn,$sql);
$user  = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$username = $_POST['username'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$sql_update = "UPDATE  user 
                    SET
                    customer_name = '$name',
                    customer_phone = '$phone',
                    customer_email = '$email',
                    customer_username = '$username',
                    customer_age = '$age',
                    customer_gender = '$gender'
                    WHERE customer_id=$id";

$update_query = mysqli_query($conn,$sql_update);
                   
if($update_query){
    header("Location: list.php?updated&customer_id=$id");
}

}
?>

    <div class="container">
        <?php
            include_once("./inc/manu.php");
        ?>
        <div class="row">
            <div class="col-lg-12">
                <!--form-->
                <div class="card text-center">
                    <div class="card-header bg-info text-white" >
                      Creat  Your Profile
                    </div>
                    <div class="card-body">
                       <form id="register" method="POST" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['customer_name']; ?>"  required>  
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['customer_phone']; ?>"  required>  
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['customer_email']; ?>"  required>  
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['customer_username']; ?>"  required>  
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="age" name="age" value="<?php echo $user['customer_age']; ?>"  required>  
                            </div>
                            <div class="form-group">
                               <select name="gender" class="form-control" >
                                    <option value="Male" <?php if($user['customer_gender']=="Male") { echo "selected" ; }  ?>> Male </option>
                                    <option value="Female" <?php if($user['customer_gender']=="Female") { echo "selected" ; }  ?> > Female </option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit"  name="submit" value="submitted" class="btn btn-success">Update</button>
                            </div>
                       </form>  
                    </div>
                </div>
            </div> 
    <script>
        $(document).ready(function () {
            $("#register").validate({
                rules:{
                    name:{
                        required:true,
                        minlength:3,
                        maxlength:25
                    },
                    phone:{
                        required:true,
                    },
                    email:{
                        required:true
                    },
                    username:{
                        required:true
                    },
                    age:{
                        required:true,
                        number:true 
                    }
                },
            errorElement: "em",
            messages:{
                name:{
                    required:"Name field is required"
                },
                phone:{
                    required:"Phone field is required"
                },
                email:{
                    required:"Email field is required"
                },
                username:{
                    required:"Username field is required"
                },
                age:{
                    required:"Age field is required",
                    number:"Wrong!!! Please enter only number of years"
                }
            }
            });
        });
    </script>
<?php
    include_once("./inc/footer.php");
?>