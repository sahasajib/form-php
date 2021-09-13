<?php 
include_once("./inc/dbconn.php");
$id= $_GET['cus_id'];

// $img_sql = "SELECT * FROM user ";
// $imageq = mysqli_query($conn,$img_sql);
// //($imageq);

// $img = mysqli_fetch_assoc($imageq);
// $image = $img['image'];
// $image_url = "uploads/$image";
/*delete image */
$sql2 = "SELECT customer_image,customer_file FROM user WHERE customer_id =$id";
$quary2 = mysqli_query($conn,$sql2);
$result = mysqli_fetch_assoc($quary2);
$image = $result['customer_image'];
$image_url = "uploads/$image";
/*delete file */

$file = $result['customer_file'];
$file_url = "uploads/file/$file";
// print_r($result);
// die;customer_file


$sql = "DELETE FROM user WHERE customer_id=$id";
$delete = mysqli_query($conn,$sql);

if($delete){
    if($image!="" || $file!="" ){
        unlink($image_url); 
        unlink($file_url);
    }
    // if($file!=""){
    //     unlink($file_url); 
    // }
    
    header("Location: list.php?deleted&customer_id=$id");
}
?>