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
<!DOCTYPE html>
<html lang="en">
 <?php include('head.php'); ?>
   <body class="cms-index-index" bgcolor="#E6E6FA">
      <div class="page">
	   <?php include('inner_menu.php'); ?>
			 <section class="container-fluid hero"></section>
	   <div class="main-container col2-right-layout" id="WhereIsPharmerz">
         <div class="main container" style='color: #464646;line-height: 26px;font-family: "Opificio";'>
          <!--===header start===-->
            
  <?PHP	$footerpages= mysqli_query($conn,"SELECT * FROM `pages` WHERE Slug='".$_GET["slug"]."'");
	 if(mysqli_num_rows($footerpages)>0){ while($queRow = mysqli_fetch_array($footerpages)){ 
	 echo $queRow['Description']; 
							}} 
							?>  
</div>
</div>
</div>
<?php include('footer.php');?> 
      <script type="text/javascript" src="/js/jquery.min.js"></script>
      <script type="text/javascript" src="/js/bootstrap.min.js"></script> 
      <script type="text/javascript" src="/js/common.js"></script>
      <script type="text/javascript" src="/js/revslider.js"></script>
      <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="/js/wow.min.js"></scrip>
      <script type="text/javascript" src="/js/application/search_proank.js"></script>
      <script type="text/javascript" src="/js/application/custom.js"></script>
        <script type="text/javascript" src="/js/application/ankcustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script>
<style>
.addo{font-family:'Raleway',sans-serif;text-transform:uppercase;text-align:justify;font-size:13px;}
.addo ol {font-size:25px;line-height:2.04;padding:0;counter-reset: item;}
.addo ol li ol {padding:0 0 0 10px;}
.addo ol p{font-size:13px;}
.addo h1 {font-size:30px;background-color:#dbdbdb;padding:5px 35px 5px 5px;}
.addo ol li { display: block }
.addo ol li strong{ background-color:#dbdbdb;padding:5px 35px 5px 5px;}
.addo P strong{color:#1a94bd;}
.addo li ol li{font-size:13px;}
.addo ol li:before{content: counters(item,".") ".  "; counter-increment: item ;background-color:#0198cd;padding:5px 5px 5px 14px;margin:0 1px 0 0;color:#fff;width:25px;}
.addo ol li ol li:before{background-color:#fff;color:#333;}
 
</style>
 

   </body>
</html>