<?php 
session_start(); 
include('include/dbconnection.php');

echo $username =$_POST['username'];
echo $loginToken =$_POST['loginToken'];
echo $loginTokenTS =$_POST['loginTokenTS'];

$get_user = mysqli_query($conn,"SELECT * FROM `user` WHERE `email`= '$username'");
  if(mysqli_num_rows($get_user)>0)
  {
    $queRow = mysqli_fetch_array($get_user);
    //echo "UPDATE `user` SET `loginToken` = '$loginToken',`loginTokenTS` = '$loginTokenTS' WHERE `email`= '$username'"; exit;
    $updt_user = mysqli_query($conn,"UPDATE `user` SET `loginToken` = '$loginToken',`loginTokenTS` = '$loginTokenTS' WHERE `email`= '$username'");
    if($updt_user)
    {
        echo "Success";    exit;    
    }
  }



?>
