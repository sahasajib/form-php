<?php
    include_once("./inc/header.php");
    include_once("./inc/dbconn.php");
?>
    <div class="container">
        <?php
            include_once("./inc/manu.php");
        ?>
        <div class="row">
            <div class="col-lg-6">
                <!--form-->
                <div class="card text-center">
                    <div class="card-header bg-info text-white" >
                      Creat  Your Profile
                    </div>
                    <div class="card-body">
                       <form id="register" method="POST" enctype="multipart/form-data" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>  
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>  
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>  
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>  
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>  
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="CPassword" required>  
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="age" name="age" placeholder="Age" required>  
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control">
                                    <option>Select Gender</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="">image</label>
                                <input type="file" class="form-control" id="image" name="image" placeholder="image" required>
                            </div>
                            <div class="form-group">
                               <label for="">file</label>
                                <input type="file" class="form-control" id="file" name="file" placeholder="file" required>
                            </div>
                            <div class="text-center">
                                <button type="submit"  name="submit" value="submitted" class="btn btn-success">Submit</button>
                            </div>
                       </form>  
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header bg-warning " >
                        Profile Information
                    </div>
                    <div class="card-body">
                        <?php
                             $errors= [];
                             if (isset($_POST['submit'])){
                                 /*file upload */
                                $file = $_FILES["file"];
                                $file_name = $file['name'];
                                $file_size = $file['size'];
                                $tmp_name = $file['tmp_name'];
                                $extensions_file = array('pdf','docs');
                                $cv_ext = explode('.',$file_name);
                                $file_ext =strtolower(end($cv_ext));
                                $new_file_name = time()."_".$file_name;
                                $target = "uploads/file/" .$new_file_name;
                                if(!in_array($file_ext,$extensions_file)){
                                    echo "No";
                                }else if($file_size > 1024*1024*5){
                                    echo "Max Upload 2MB";
                                }else{
                                     if(move_uploaded_file($tmp_name,$target)){
                                         echo "file uploaded!!!";
                                     }else{
                                         echo "No";
                                     }
                                }
                                  /*image file start */ 
                                $image = $_FILES["image"];  
                                $image_name = $image['name'];
                                $image_size = $image['size'];
                                $tmp_name = $image['tmp_name'];
                                $extensions = array('jpg','png','jpeg');
                                $ext = explode('.',$image_name);
                                $img_ext =strtolower(end($ext));
                                $new_image_name = time()."_".$image_name;
                                $target = "uploads/" .$new_image_name;
                                if(!in_array($img_ext,$extensions)){
                                    echo "No";
                                }else if($image_size > 1024*1024*2){
                                    echo "Max Upload 2MB";
                                }else{
                                     if(move_uploaded_file($tmp_name,$target)){
                                         echo "image uploaded!!!";
                                     }else{
                                         echo "No";
                                     }
                                }
                                 /*image file end */ 
                                 $name = $_POST['name'];
                                 $phone = $_POST['phone'];
                                 $email = $_POST['email'];
                                 $username = $_POST['username'];
                                 $password = $_POST['password'];
                                 $new_password = password_hash($password,PASSWORD_BCRYPT);
                                 $age = $_POST['age'];
                                 $gender = $_POST['gender'];
                                 $created_at = date('Y-m-d H:i:s');
                                 if ($name =="") {
                                     $errors[] ="Name field is required";
                                 }
                                 if ($phone =="") {
                                    $errors[] ="Phone field is required";
                                }
                                if ($email =="") {
                                    $errors[] ="Email field is required";
                                }
                                if ($username =="") {
                                    $errors[] ="Username field is required";
                                }
                                if ($password =="") {
                                    $errors[] ="Password field is required";
                                }
                                if ($age =="") {
                                    $errors[] ="Age field is required";
                                }  
                         if ($errors) {
                            foreach($errors as $errors){
                                ?>
                                <div class="alert alert-danger">
                                    <?=$errors;?>
                                </div>
                                <?php
                            }
                         }else{
                                $sql = "INSERT INTO user 
                                (customer_name,customer_phone,customer_email,customer_username,customer_password,customer_age,customer_gender,customer_created_at,customer_image,customer_file)
                                VALUES ('$name', '$phone', '$email','$username','$new_password', '$age', '$gender', '$created_at','$new_image_name','$new_file_name')";
                                $query = mysqli_query($conn,$sql);
                                if($query){
                                 ?>
                                <div class="alert alert-success">
                                    <h2>Data added successfully!!!!</h2>
                                    <span style="color:blue; font-size:20px" class="fa fa-smile-o "></span>
                                </div>
                                <?php }
                         }
                        } 
                       ?>
                      
                    </div>
                </div>
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
                    password:{
                        required:true,
                        minlength:5,
                        maxlength:10,
                        
                    },
                    cpassword:{
                        required:true,
                        minlength:5,
                        maxlength:10,
                        equalTo:"#password"
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
                password:{
                    required:"Password field is required",
                    minlength:"Min Length 5",
                    maxlength:"Max Length 10"
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