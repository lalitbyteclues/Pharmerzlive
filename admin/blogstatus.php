<?php 
include('../home/include/dbconnection.php'); 
 session_start();
if($_SESSION['admin_id'] == '')
 {
    header('Location:index.php');
 } 

    $status = $_GET['status'];
    $id = $_GET['id'];
    if($status == 0)
    {
    	$chng = '1';
    }
    elseif($status == 1)
    {
    	$chng = '0';
    }
   	$update_blog_status = mysqli_query($conn,"UPDATE `blog` SET `status`='$chng' WHERE `id`='$id' ");
    if($update_blog_status)
    {
      echo '1000'; exit;
    }

?>