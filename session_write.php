<?php 
include('home/include/dbconnection.php'); 
session_start();
if(isset($_GET['username']))
{
  $get_user = mysqli_query($conn,"SELECT * FROM `user` WHERE `email`= '".$_GET['username']."'");
  if(mysqli_num_rows($get_user)>0)
  {
    $queRow = mysqli_fetch_array($get_user);
    $_SESSION['user_id'] = $queRow['id'];
    $_SESSION['user_email'] = $queRow['email'];
  }
  else
  { 

   // $q = "INSERT INTO `user`(email,password,loginToken,loginTokenTS) VALUES ('".$_GET['username']."','".$_COOKIE['password']."','".$_GET['lt']."','".$_GET['lts']."')";
    $q = "INSERT INTO `user`(email,password) VALUES ('".$_GET['username']."','".$_COOKIE['password']."')";
    
    $insdata = mysqli_query($conn,$q);
    $user_id = mysqli_insert_id($conn);
    
    $get_user = mysqli_query($conn,"SELECT * FROM `user` WHERE `id`= '$user_id'");
    if(mysqli_num_rows($get_user)>0)
    {
      $queRow = mysqli_fetch_array($get_user);
      $_SESSION['user_id'] = $queRow['id'];
      $_SESSION['user_email'] = $queRow['email'];
     
    }
  }
} 
?>