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
  <?php 

  include('head.php'); ?>

   <body class="cms-index-index" bgcolor="#E6E6FA">
      <div class="page">
          <!--===header start===-->
        <div class="container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="imageo">
                        <a href="/"><img src="/images/pharmerz_logo2 .png" class="img-responsive" width="100%"></a> 
                  </div>
            </div>
             
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 gg1">
                  <div class="coco">
                     <div class="input-group wer">
                       <input type="text" class="form-control" placeholder="Search Product" aria-describedby="basic-addon2" id="search"> 
                       <span class="input-group-addon" onclick="searchproduct();" id="basic-addon2">&nbsp;&nbsp;&nbsp;<i class="fa fa-search">&nbsp;&nbsp;</i></span>
                     </div>
                  </div>      
            </div>
                               
           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="line">
                     <ul class="list-inline text-right">
                         <li class="active"><a href="#"><i class="fa fa-question"></i>
                         <br />FAQ</a></li> 
                         <?php if($_SESSION['user_id'] != ''){ ?>
                          <li><a href="/home/index.php"><i class="fa fa-user"></i><br />Account</a></li>
						  <li><a href="/home/logout.php"><i class="fa fa-sign-out"></i><br />Log Out</a></li>
                           <?php }else{?>
                        <li><a href="/signup.php"><i class="fa fa-user"></i>
                          <br />Account</a></li>
                          <?php } ?> 
                     </ul> 
                </div>
           </div>  
             <div class="clearfix"></div>
        </div> 
        <nav>
            <div class="container">
               <div class="nav-inner">
                  <!-- mobile-menu -->
                  <div class="hidden-desktop" id="mobile-menu">

                     <ul class="navmenu nom1">
                      <li><a href="javascript:void(0);" class="pull-right" id="nomo"><i class="fa fa-bars"><span>Categories</span></i></a></li>
                        <li>
                           <div class="menutop" >
                              <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                              <h2>Menu</h2>
                           </div>
                           <ul style="display:none;" class="submenu">
                              <li>
                                 <ul class="topnav">
                                    <li class="level0 nav-6 level-top first parent">
                                       <a class="level-top" href="/"> <span>Home</span> </a>
                                    </li>
                                    <li class="level0 nav-7 level-top parent"> <a class="level-top" href="/about_us.php"> <span>About Us</span> </a> </li>
                                    <li class="level0 nav-6 level-top">
                                       <a class="level-top" href="/products.php" id="apiLink"> <span>Products</span> </a>
                                      
                                    </li>
                                    <li class="level0 nav-7 level-top parent"> <a class="level-top" href="#"> <span>Support</span> </a> </li>
                                   
                                    <li class="level0 parent drop-menu">
                                       <a href="/blog.php"><span>Blog</span> </a></li>
                                    <li class="level0 nav-9 level-top last parent "> <a class="level-top" href="/contact_us.php"> <span>Contact Us</span> </a> </li>
                                    <?php if($_SESSION['user_id'] == ''){ ?>
                                    <li class="level0 parent drop-menu"><a href="/signup.php" ><span>LogIn</span></a></li> 
                                    <?php }?>
                                 </ul>
                                 <!--menu-right end--> 
                              </li>
                           </ul>
                        </li>
                     </ul>
                     <!--navmenu-->
                  </div>
                  <!--End mobile-menu -->
                 <ul id="nav" class="hidden-xs pull-left nom">
                     <li><a href="javascript:void(0);" id="nomo1"><i class="fa fa-bars"><span>Categories</span></i></a></li>
                 </ul>     
                  <ul id="nav" class="hidden-xs pull-right n1" style="display:block;">
                     <li class="level0 parent drop-menu">
                        <a href="/" class="active"><span>Home</span> </a>
                     </li>
                       <li class="level0 parent drop-menu"> <a href="/about_us.php" class="level-top"> <span>About Us</span> </a></li>
                     <li class="level0 parent drop-menu">
                        <a href="/products.php"><span>Products</span> </a>
                       
                     </li>
                     <li class="level0 parent drop-menu"> <a href="#" class="level-top"> <span>Support</span> </a></li>
                     <li class="level0 parent drop-menu"> <a href="/contact_us.php" class="level-top"> <span>Contact Us</span> </a>
                     <li class="level0 parent drop-menu"><a href="/blog.php"><span>Blog</span> </a></li>
                    <?php if($_SESSION['user_id'] == ''){ ?>
                    <li class="level0 parent drop-menu"><a href="/signup.php"><span>LogIn</span></a></li> 
                    <?php } ?>
                  </ul>
               </div>
            </div>
         </nav> 
<!--==section start==-->
<div class="container addo">
  <?PHP	$footerpages= mysqli_query($conn,"SELECT * FROM `pages` WHERE Slug='".$_GET["slug"]."'");
	 if(mysqli_num_rows($footerpages)>0){ while($queRow = mysqli_fetch_array($footerpages)){ 
	 echo $queRow['Description']; 
							}} 
							?>  
</div>
<?php include('footer.php');?> 
      <script type="text/javascript" src="/js/jquery.min.js"></script>
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>
      <!-- <script type="text/javascript" src="/js/application/spidergcon.js"></script> -->
      <script type="text/javascript" src="/js/common.js"></script>
      <script type="text/javascript" src="/js/revslider.js"></script>
      <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="/js/wow.min.js"></scrip>
      <script type="text/javascript" src="/js/application/search_proank.js"></script>
      <script type="text/javascript" src="/js/application/custom.js"></script>
        <script type="text/javascript" src="/js/application/ankcustm.js"></script>
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
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