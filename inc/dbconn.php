<?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="form_02";
$conn = mysqli_connect($host,$dbuser,$dbpass,$db);
    if (!$conn) {
       die("failed!!!".mysqli_connect_error());   
    }
?>