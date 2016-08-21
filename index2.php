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
   <script src="/js/twitterFetcher_min.js"></script>
<script>
var LatestTweets = {
    init: function () {
        twitterFetcher.fetch({
            id: '702087656033812480', 
            domId: 'latest-tweets'
        });
    }
}; 
LatestTweets.init();
</script> 
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
	 <form class="input-group wer"  method="get" id="searchproduct" action="/products.php"> 
         <input type="text" required  class="form-control" name="namelike" id="search" placeholder="Search Product" aria-describedby="basic-addon2">
         <span class="input-group-addon" onclick="document.getElementById('searchproduct').submit();" id="basic-addon2">&nbsp;&nbsp;&nbsp;<i class="fa fa-search">&nbsp;&nbsp;</i></span>
       </form>
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
         <!-- Navbar -->
         <!-- end nav -->
          <div class="ooop">  
            <div class="container">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gg">
                    <div class="sido" id="sido1"> 
                          <ul id="mycate">
                                 </ul>  
                      </div>
                  </div> 
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gg1">
                  </div>        
               </div>   
            </div>
            <div class="clearfix"></div>
          </div>
          <!--===header end===-->
      <!-- Navbar --> 
<main> 
    <section class="well bg1"> 
      <div class="container" >  <h3>See What's Trending</h3> 
	 <div class="row">
          <div class="grid_4">
            <div class="box">
              <div class="box_aside">
                <img alt="" src="http://pharmerz.com/images/API.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Active Pharmaceutical Ingredients</h5>
                <p>Lorem ipsum dolor sit amet, constetuer adipiscing elit. Praesent vestim molestie lacus. Aenean nonummy.</p>
              </div>
            </div>
          </div>
          <div class="grid_4">
            <div class="box">
              <div class="box_aside">
                <img alt="" src="http://pharmerz.com/images/Pellets.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Pellets</h5>
                <p>Lorem ipsum dolor sit amet, constetuer adipiscing elit. Praesent vestim molestie lacus. Aenean nonummy.</p>
              </div>
            </div>
          </div>  
		  <div class="grid_4">
            <div class="box">
              <div class="box_aside">
                <img alt="" src="http://pharmerz.com/images/Pellets.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Pellets</h5>
                <p>Lorem ipsum dolor sit amet, constetuer adipiscing elit. Praesent vestim molestie lacus. Aenean nonummy.</p>
              </div>
            </div>
          </div>
          </div>  <div class="row">
          <div class="grid_4">
            <div class="box">
              <div class="box_aside">
                <img alt="" src="http://pharmerz.com/images/Lab.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Lab Equipment</h5>
                <p>Lorem ipsum dolor sit amet, constetuer adipiscing elit. Praesent vestim molestie lacus. Aenean nonummy.</p>
              </div>
            </div>
          </div> 
          <div class="grid_4">
            <div class="box">
              <div class="box_aside">
                <img alt="" src="http://pharmerz.com/images/Packaging.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Packaging Material</h5>
                <p>Lorem ipsum dolor sit amet, constetuer adipiscing elit. Praesent vestim molestie lacus. Aenean nonummy.</p>
              </div>
            </div>
          </div>   
		  <div class="grid_4">
            <div class="box">
              <div class="box_aside">
                <img alt="" src="http://pharmerz.com/images/Packaging.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Packaging Material</h5>
                <p>Lorem ipsum dolor sit amet, constetuer adipiscing elit. Praesent vestim molestie lacus. Aenean nonummy.</p>
              </div>
            </div>
          </div> 
        </div> 
        </div> 
    </section>
    <section>
      <div class="container">   <h3>An Online Marketplace For Pharmaceutical Industry</h3> 
	  <div class="row"> 
          <div class="col-md-12">
		  <div class="embed-responsive embed-responsive-16by9">
          	<iframe  class="embed-responsive-item" type="text/html"     src="http://www.youtube.com/embed/E-3VSZ91Ijs?autoplay=0&rel=0" >
		  </iframe>  
        </div> 
        </div> 
        </div>  
      </div>     
  </section> 
    <section class="well6 bg2">
      <div class="container">
      <h3>Our Partners</h3> 
      <div class="owl-carousel">
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
 <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>

        </div>  

      </div>
    </section>
 <section class="well6 bg2 twitter">
      <div class="container">
      <h3>Latest from #pharma</h3> 
      <div class="row">
			<section id="latest-tweets" >Loading...</section>
	    </div>
	     </div>
    </section>  
  </main>
	  
<!--==section start== 
<div class="container addo">

	<div class="col-md-3">
		<a class="twitter-timeline" href="https://twitter.com/search?q=pharma" height="500px" data-widget-id="702087656033812480">Tweets about pharma</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	 </div>
   <!--==section-1 end== 
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
		$get_user = mysqli_query($conn,"SELECT * FROM `home_advert` WHERE CATID in(SELECT ID FROM `homecategory` WHERE istop=1)");
             if(mysqli_num_rows($get_user)>0)
             { while($queRow = mysqli_fetch_array($get_user))
				{ $base_url = '/';  ?>
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="adva">
                   <a href="#"> <img src="<?php echo $base_url.$queRow['image']?>" class="img-responsive" width="100%;"></a> 
               </div>
           </div>
        <?php  }}?> 
      </div>
   <!--==section-1 end== 

   <!--==section-2 start== 
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="auuiu">
               <p>See What's Trending</p>
           </div> 
           <div class="sect-1_slider">
               <div class="main">
            <div id="mi-slider" class="mi-slider">
			 <?php $magesfooter = mysqli_query($conn,"SELECT * FROM `home_advert` WHERE CATID in(SELECT ID FROM `homecategory` WHERE istop=0)");
             if(mysqli_num_rows($magesfooter)>0){ 
			 echo "<ul>";
			 $catid=2;  
			 while($queRow = mysqli_fetch_array($magesfooter)){
			 if($catid != $queRow['CATID'])
			 {
			 $catid =$queRow['CATID'];
			 echo "</ul><ul>";
			 }
			 ?> <li><a title="<?php echo $queRow['Title']; ?>" href="#"><img title="<?php echo $queRow['Title']; ?>" src="<?php echo $base_url.$queRow['image']?>" alt="<?php echo $queRow['Title']; ?>"><h4><?php echo $queRow['Title']; ?></h4></a></li>
				<?php }
			   echo "</ul>";
			   } ?>
                
               <nav class="hu">
			    <?php $categories = mysqli_query($conn,"SELECT * FROM `homecategory` WHERE istop=0");if(mysqli_num_rows($categories)>0){ while($queRow = mysqli_fetch_array($categories)){ ?> <a href="#"><?php echo $queRow['Name']; ?></a> <?php  } } ?></nav>
            </div>
         </div>
           </div>
       </div>  
   <!--==section-2 end== 
</div> -->

<?php include('footer.php');?>



   <!-- Footer -
      <footer class="footer">
         <!-- End of brand-logo -
         <div class="footer-middle container">
            <div class="col-md-4 col-sm-4">
               <div class="footer-logo"><a href="_index.html" title="Logo"><img src="/images/Picture1.png" width="50%" alt="logo"></a></div>
               <div class="payment-accept">
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 jki text-center">
              
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 text-center">  
                  <span><a style="color:#000;font-weight:bold;" href="#">Payment</a></span>
               </div>
               <!-- <a href="#" title="How to buy" style="padding-right: 40px;">How to buy</a>
                  <a href="#" title="Payment">Payment</a> -
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <h4>Contact us</h4>
               <div class="contacts-info">
                  <address>
                     <i class="add-icon">&nbsp;</i> C – 609, 6th Floor, Raga Building, Shell Colony Road<br>
                     &nbsp;Chembur Mumbai – 400071
                  </address>
                  <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +91 766661980</div>
                  <div class="email-footer"><i class="email-icon">&nbsp;</i><a href="mailto:support@pharmerz.com" style="font-size: 14px;color:#000;">support@pharmerz.com</a> </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom container">
            <div class="col-sm-6 col-xs-12 coppyright"> &copy; 2015 Pharmerz. All Rights Reserved.</div>
            <div class="col-sm-6 col-xs-12 copy text-center"> 
              <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
         </div>
      </footer>
      <!-- End Footer -->
  
     <!--  <div class="social">
         <ul>
            <li class="fb"><a href="#"></a></li>
            <li class="tw"><a href="#"></a></li>
            <li class="googleplus"><a href="#"></a></li>
            <li class="rss"><a href="#"></a></li>
            <li class="pintrest"><a href="#"></a></li>
            <li class="linkedin"><a href="#"></a></li>
            <li class="youtube"><a href="#"></a></li>
         </ul>
      </div> -->
      <!-- JavaScript -->
      <script type="text/javascript" src="/js/jquery.min.js"></script>
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/application/spidergcon.js"></script> <script type="text/javascript" src="/js/application/jquery.steps.js"></script>
    
<script type="text/javascript" src="/js/application/intlTelInput.min.js"></script>  <script type="text/javascript" src="/js/common.js"></script>
      <script type="text/javascript" src="/js/revslider.js"></script> 
      <script type="text/javascript" src="/js/wow.min.js"></script>
      <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="/js/application/search_proank.js"></script>
      <script type="text/javascript" src="/js/application/custom.js"></script>
        <script type="text/javascript" src="/js/application/ankcustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script>
       <script type="text/javascript">
          $(document).ready(function(){
            $('#nomo').click(function(){
               $('#sido1').slideToggle(1000);
             });
             $('#nomo1').click(function(){
               $('#sido1').slideToggle(1000);
             });
          });  
      </script>
      <script src="/js/jquery.catslider.js"></script>
      <script>
         $(function() {
            $( '#mi-slider' ).catslider();
            
         });
      </script>
      <script type='text/javascript'>
         jQuery(document).ready(function(){
           jQuery('#rev_slider_4').show().revolution({
             dottedOverlay: 'none',
             delay: 5000,
             startwidth: 1170,
             startheight: 580,
             hideThumbs: 200,
             thumbWidth: 200,
             thumbHeight: 50,
             thumbAmount: 2,
             navigationType: 'thumb',
             navigationArrows: 'solo',
             navigationStyle: 'round',
             touchenabled: 'on',
             onHoverStop: 'on',
             swipe_velocity: 0.7,
             swipe_min_touches: 1,
             swipe_max_touches: 1,
             drag_block_vertical: false,
             spinner: 'spinner0',
             keyboardNavigation: 'off',
             navigationHAlign: 'center',
             navigationVAlign: 'bottom',
             navigationHOffset: 0,
             navigationVOffset: 20,
             soloArrowLeftHalign: 'left',
             soloArrowLeftValign: 'center',
             soloArrowLeftHOffset: 20,
             soloArrowLeftVOffset: 0,
             soloArrowRightHalign: 'right',
             soloArrowRightValign: 'center',
             soloArrowRightHOffset: 20,
             soloArrowRightVOffset: 0,
             shadow: 0,
             fullWidth: 'on',
             fullScreen: 'off',
             stopLoop: 'off',
             stopAfterLoops: -1,
             stopAtSlide: -1,
             shuffle: 'off',
             autoHeight: 'off',
             forceFullWidth: 'on',
             fullScreenAlignForce: 'off',
             minFullScreenHeight: 0,
             hideNavDelayOnMobile: 1500,
             hideThumbsOnMobile: 'off',
             hideBulletsOnMobile: 'off',
             hideArrowsOnMobile: 'off',
             hideThumbsUnderResolution: 0,
             hideSliderAtLimit: 0,
             hideCaptionAtLimit: 0,
             hideAllCaptionAtLilmit: 0,
             startWithSlide: 0,
             fullScreenOffsetContainer: ''
           });
         });
      </script>
      <!-- Data WOW -->
      <script>
         new WOW().init();
      </script>
      <link rel="stylesheet" href="/css/grid.css" type="text/css">
   </body>
</html>