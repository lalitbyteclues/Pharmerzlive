 <?php 
   include('home/include/dbconnection.php'); 
?>
<div class="container">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
      <div class="imageo">
            <a href="/"><img src="/images/pharmerz_logo2 .png" class="img-responsive" width="100%"></a> 
      </div>
  </div>
                               
  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 gg1">
    <div class="coco">
       <div class="input-group wer">
         <input type="text" class="form-control" id="search" placeholder="Search Product" aria-describedby="basic-addon2">
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
<!--===header end===-->
<!-- Navbar -->
<nav>
  <div class="container">
     <div class="nav-inner">
        <!-- mobile-menu -->
        <div class="hidden-desktop" id="mobile-menu"> 
           <ul class="navmenu nom1">
            <li><a href="javascript:void(0);" class="pull-right" id="nomo"><i class="fa fa-bars"><span>Categories</span></i></a></li>
              <li> <div class="menutop" >
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
                          <li class="level0 parent drop-menu"> <a href="/blog.php"><span>Blog</span> </a> </li>
                          <li class="level0 nav-9 level-top last parent "> <a class="level-top" href="/contact_us.php"> <span>Contact Us</span> </a> </li>
                          <?php if($_SESSION['user_id'] == ''){ ?>
                          <li class="level0 parent drop-menu"><a     href="/signup.php"><span>LogIn</span></a></li> 
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
            <li  class="level0 parent drop-menu"><a href="/signup.php" id="loginanchortag" ><span>LogIn</span></a></li> 
          <?php }?>
        </ul>
        
     </div>
  </div>
</nav>
         <!-- Navbar -->
         <!-- end nav -->
 <div class="container">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="sido1" id="sido1" style="display:none;">
       <ul id="mycate">
                                 </ul>  
</div>
      
<div class="offer-banner-section">
 <div class="container">
 </div>
</div>