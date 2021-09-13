<?php 
include_once("./inc/dbconn.php");
$id= $_POST['sajib'];
/*image and file query */
$sql2 = "SELECT customer_image,customer_file FROM user WHERE customer_id =$id";
$quary2 = mysqli_query($conn,$sql2);
$result = mysqli_fetch_assoc($quary2);
/*image */
$image = $result['customer_image'];
$image_url = "uploads/$image";
/* file */

$file = $result['customer_file'];
$file_url = "uploads/file/$file";

/* user id delete query */
$sql = "DELETE FROM user WHERE customer_id=$id";
$delete = mysqli_query($conn,$sql);

if($delete){
    if($image!="" || $file!="" ){
        unlink($image_url); 
        unlink($file_url);
    }
    echo "deleted";   
}
?>