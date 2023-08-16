<?php
session_start();
include_once "../user/connection.php";
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $mysqli ="DELETE  FROM masterlogin WHERE id = $id";
    $res = mysqli_query($conn,$mysqli);

if($res==true){
    $_SESSION['delete'] = "<div class='success-delete'>user Deleted Successfully</div>";
    header("location:user.php");
    exit();
}
   
}


