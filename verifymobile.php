<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(!isset($_SESSION['user_id'])){$_SESSION['user_id']="";}
 if($_SESSION['user_id'] != "")
 {
  header('Location:home/index.php');
 }
?><?php include('head.php'); ?>
 
<body class="cms-index-index" ng-app="pharmerzApp" ng-conroller="suppliersListCtrl">
<?php
if($_POST["mobile"]){?>

 <div class="row">     <div class="col-sm-12">    <div class="col-sm-12">    <div class="col-sm-12">  
   <div class="alert alert-success">   <i class="fa fa-check-circle" style="background:#59b851;font-size:30px;"  ></i>
  <strong>Congratulations!</strong> Your Mobile <?php echo $_POST["mobile"];?> is Successfully verified.
</div>
</div>
</div>
</div>
   </div> 
	<?php
}else{?>
	    <div class="row">     <div class="col-sm-12">    <div class="col-sm-12">    <div class="col-sm-12"> 

<div class="alert alert-danger">
  <strong>Error!</strong> Invalid Mobile.
</div>	 
</div>
</div>
</div>
   </div> 	
   
   
   <?php
}
?>
  
</body>
</html>