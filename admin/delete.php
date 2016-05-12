<?php 
include('../home/include/dbconnection.php'); 
 session_start();

    $id = $_GET['id'];
    //echo "DELETE FROM `blog` WHERE `id`='$id'"; exit;
    $del_data = mysqli_query($conn,"DELETE FROM `blog` WHERE `id`='$id'");
    if($del_data)
    {
      echo '1000'; exit;
    }

?>