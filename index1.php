<?php 
include('home/include/dbconnection.php');
session_start();

if(isset($_GET['username']))
{

  $get_user = mysqli_query($conn,"SELECT * FROM `user` WHERE `email`= '".$_GET['username']."'");
  if(mysqli_num_rows($get_user)>0)
  {
    $queRow = mysqli_fetch_array($get_user);
    // $updt_user = mysqli_query($conn,"UPDATE `user` SET `loginToken` = '".$_GET['lt']."',`loginTokenTS` = '".$_GET['lts']."' WHERE `email`= '".$queRow['email']."'");
    $_SESSION['user_id'] = $queRow['id'];
    $_SESSION['user_email'] = $queRow['email'];
   // $_SESSION['password'] = $queRow['password'];
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
      <?php include('menu.php'); ?>
          <!-- ********************** -->
<!-- end nav -->
<!-- Slider -->
<div id="magik-slideshow" class="magik-slideshow">
  <div class="wow">
    <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
      <ul>
        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/Picture5.jpg'><img src='images/Picture5.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
          <!-- <div    class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='15'  data-y='80'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The Spring!</div> -->
          <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='15'  data-y='135'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>Collaborate
          </div>
          
          <!-- <div    class='tp-caption sfb  tp-resizeme ' data-x='15'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="view-more">View More</a> <a href='#' class="buy-btn">Buy Now</a></div> -->
          <!-- <div class='tp-caption Title sft  tp-resizeme ' data-x='15'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap; top: 244px; left: 77px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</div> -->
          <!-- <div    class='tp-caption Title sft  tp-resizeme ' data-x='15'  data-y='400'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
        </li>
        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/discover1.jpg' class="black-text"><img src='images/discover1.jpg'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
          <!-- <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='15'  data-y='80'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>New launch</div> -->
          <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='15'  data-y='135'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;color:#131110'>Discover</div>
          <!-- <div    class='tp-caption sfb  tp-resizeme ' data-x='15'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="view-more">View More</a> <a href='#' class="buy-btn">Buy Now</a></div> -->
          <!-- <div class='tp-caption Title sft  tp-resizeme ' data-x='15'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap; top: 240px;'>In augue urna, nunc, tincidunt, augue,
            augue facilisis facilisis.</div> -->
            <!-- <div    class='tp-caption Title sft  tp-resizeme ' data-x='15'  data-y='400'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
          </li>
          <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/connect1.jpg'><img src='images/connect1.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            <!-- <div    class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='15'  data-y='80'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The Spring!</div> -->
            <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='15'  data-y='135'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>Connect</div>
            <!-- <div    class='tp-caption sfb  tp-resizeme ' data-x='15'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="view-more">View More</a> <a href='#' class="buy-btn">Buy Now</a></div> -->
            <!-- <div class='tp-caption Title sft  tp-resizeme ' data-x='15'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap; top: 244px; left: 77px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</div> -->
            <!-- <div    class='tp-caption Title sft  tp-resizeme ' data-x='15'  data-y='400'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
          </li>
          <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/transact1.jpg'><img src='images/transact1.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            <!-- <div    class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='15'  data-y='80'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The Spring!</div> -->
            <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='15'  data-y='135'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap; color: #131110;'>Transact</div>
            <!-- <div    class='tp-caption sfb  tp-resizeme ' data-x='15'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="view-more">View More</a> <a href='#' class="buy-btn">Buy Now</a></div> -->
            <!-- <div class='tp-caption Title sft  tp-resizeme ' data-x='15'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap; top: 244px; left: 77px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</div> -->
            <!-- <div    class='tp-caption Title sft  tp-resizeme ' data-x='15'  data-y='400'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
          </li>
        </ul>
        <div class="tp-bannertimer"></div>
      </div>
    </div>
  </div>
</div>
<!-- end Slider -->
<!-- header service -->
<div class="header-service">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="content">
          <div class="icon-truck">&nbsp;</div>
          <span><strong>FREE SHIPPING</strong> on product basis</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-support">&nbsp;</div>
            <span><strong>Customer Support</strong> Service</span></div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="content">
              <div class="icon-money">&nbsp;</div>
              <span><strong>Single User </strong>Free Subscription</span></div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
              <div class="content">
                <div class="icon-dis">&nbsp;</div>
                <span><strong class="orange">Discounts</strong> on order</span></div>
              </div>
            </div>
          </div>
        </div>
        <!-- end header service -->
        <!-- offer banner section -->
        <div class="offer-banner-section">
          <div class="container">
            <!-- What is Pharmerz Section -->
<!-- <div class="row">
<div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="/images/promo-banner1.jpg"></a></div>
<div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="/images/promo-banner1.jpg"></a></div>
<div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="/images/promo-banner1.jpg"></a></div>
</div> -->
</div>
</div>
<!-- end offer banner section -->
<!-- main container -->
<!-- <section class="main-container col1-layout home-content-container">
  <div class="container"> -->
    <!-- Why should I join Pharmerze Section -->
    <div class="main-container col2-right-layout">
      <div class="main container">
        <div class="row">
          <section class="col-main col-sm-9 wow">
            <div class="page-title">
              <h2 class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s" style="color:black" id="WhatIsPharmerz">WHAT is Pharmerz?</h2>
            </div>
            <div class="static-contain wow" >
              <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Pharmerz is an online marketplace focused on pharmaceutical industry. A platform where all pharmaceutical industry players can connect, transact and collaborate with each other.It focuses on providing a single platform to all kind of industry players ranging from Individual Buyers and Sellers, Small and Medium Enterprises (SMEs) to large Corporate</p>
              <!-- <br> -->
              <!-- <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s"></p> -->
              <!-- <br> -->
              <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">It provides access to wider marketplace and diverse portfolio of products catering to all your business requirements. Pharmerz focus to offer one-stop-shop solution to manufacturers, importers, exporters, traders, suppliers, distributors, dealers, agencies and service providers, where one can meet and engage with global business community</p>
              <!-- <br> -->
              <!-- <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s"></p> -->
            </div>
          </section>

</div>
</div>
</div>

<!-- End main container -->
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9 wow" style="color:#131110">
        <div class="page-title">
          <h2 class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s" style="color:#131110" id="WhoCanJoinPharmerz">WHO can join Pharmerz</h2>
        </div>
        <div class="static-contain">
          <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Any pharmaceutical industry B2B player can use this platform for their business needs&comma; who can be:</p>
          <div class="col-sm-3 col-md-4">
            <ul style="padding-left: 0px" class="listStyle">
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s" style="list-style-type: disc;">Manufacturers</li>
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Importers</li>
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Exporters</li>
            </ul>
          </div>
          <div class="col-sm-3 col-md-4" class="listStyle">
            <ul style="padding-left: 0px">
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Traders</li>
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Suppliers</li>
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Distributors</li>
            </ul>
          </div>
          <div class="col-sm-3 col-md-4" class="listStyle">
            <ul style="padding-left: 0px">
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Dealers</li>
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Agencies</li>
              <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Service providers</li>
            </ul>
          </div>
        </div>
      </section>
     
    </div>
  </div>
</div>

<!-- End banner section -->
<!-- Third section -->
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9 wow" style="color:#131110">
        <div class="page-title">
          <h2 class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s" style="color:#131110" id="WhyShouldYouJoinPharmerz"> WHY should you join Pharmerz</h2>
        </div>
        <div class="static-contain" >
          <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">To make</p>
          <ul style="padding-left: 0px;">
            <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Business Bigger</li>
            <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Profitability Higher</li>
            <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Connectivity Faster</li>
            <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Transactions Cheaper</li>
            <li class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s">Processes Smoother</li>
          </ul>
        </div>
      </section>

</div>
</div>
</div>

<!-- Fourth Section -->
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9 wow" style="color:#131110">
        <div class="page-title">
          <h2 class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s" style="color:#131110" id="WhenShouldYouJoinPharmerz">When should you join Pharmerz</h2>
        </div>
        <div class="static-contain" >
          <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s"> At any point of time in your business lifecycle, whether its startup, growth, maturity or even decline, you can join us. Pharmerz provides you an ample amount of resources and connections, which can help you in your business needs irrespective of the stages of your business life cycle.</p>
        </div>
      </section>

</div>
</div>
</div>

<!-- Sixth Section -->
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9 wow" style="color:#131110">
        <div class="page-title">
          <h2 class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s" style="color:#131110" id="WhereIsPharmerz">WHERE is Pharmerz located</h2>
        </div>
        <div class="static-contain wow" >
          <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s"> Pharmerz is an online market place that can be accessed anytime and from anywhere. Although we have currently two offices</p>
          <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s"><strong>Mumbai</strong> – C – 609, 6th Floor, Raga Building, Shell Colony Road, Chembur, Mumbai – 400071 </p>
          <p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1.5s"><strong>Pune</strong> – Office No. 7, Bldg A-8, Meera Nagar CHS Ltd., Lane 7, Koregaon Park, Pune – 411001 </p>
        </div>
      </section>

</div>
</div>
</div>
<!-- Footer -->
<footer class="footer">
         <!-- End of brand-logo -->
<div class="footer-middle container">
  <div class="col-md-4 col-sm-4">
    <div class="footer-logo"><a href="/" title="Logo"><img src="/images/logo_pharmerz.jpg" alt="logo"></a></div>
    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu. </p> -->
    <div class="payment-accept">
      <!-- <div><img src="/images/payment-1.png" alt="payment"> <img src="/images/payment-2.png" alt="payment"> <img src="/images/payment-3.png" alt="payment"> <img src="/images/payment-4.png" alt="payment"></div> -->
    </div>
  </div>
  <div class="col-md-4 col-sm-4" style="padding-top: 43px; padding-left: 26px;">
 
      <a href="#" title="How to buy" style="padding-right: 40px;">How to buy</a><!-- <li class="first"></li> -->
    
      <a href="#" title="Payment">Payment</a><!-- <li></li> -->
     
  </div>
  
  <div class="col-md-4 col-sm-4">
    <h4>Contact us</h4>
    <div class="contacts-info">
      <address>
        <i class="add-icon">&nbsp;</i> C – 609, 6th Floor, Raga Building, Shell Colony Road<br>
        &nbsp;Chembur Mumbai – 400071
      </address>
      <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +91 766661980</div>
      <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="mailto:support@pharmerz.com" style="font-size: 14px;">support@pharmerz.com</a> </div>
    </div>
  </div>
</div>
<div class="footer-bottom container">
  <div class="col-sm-5 col-xs-12 coppyright"> &copy; 2015 Pharmerz. All Rights Reserved.</div>
  <!-- <div class="col-sm-6 col-xs-12 coppyright" style="text-align= right;">Powered by <img src="/images/Spider4.png" style="margin-bottom: 10px;"> </div> -->
<!-- <div class="col-sm-7 col-xs-12 company-links">
<ul class="links">
<li><a href="#" title="Magento Themes">Magento Themes</a></li>
<li><a href="#" title="Premium Themes">Premium Themes</a></li>
<li><a href="#" title="Responsive Themes">Responsive Themes</a></li>
<li class="last"><a href="#" title="Magento Extensions">Magento Extensions</a></li>
</ul>
</div> -->
</div>
</footer>
<!-- End Footer -->
</div>
<div class="social">
         <ul>
            <li class="fb"><a href="https://www.facebook.com/pharmerzz" target="_blank" ></a></li>
            <li class="tw"><a href="https://twitter.com/PharmerzT" target="_blank" ></a></li>
            <li class="googleplus"><a href="#" target="_blank" ></a></li>
            <li class="rss"><a href="#" target="_blank" ></a></li>
            <li class="pintrest"><a href="#" target="_blank" ></a></li>
            <li class="linkedin"><a href="https://www.linkedin.com/company/pharmerz" target="_blank" ></a></li>
            <li class="youtube"><a href="https://www.youtube.com/channel/UC6C1uwIbZEziq8rfN-qW0-A" target="_blank" ></a></li>
         </ul>
      </div>
<!-- JavaScript -->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/myjsscript.js"></script>
<!-- <script type="text/javascript" src="/js/application/spidergcon.js"></script> -->
<script type="text/javascript" src="/js/common.js"></script>
<script type="text/javascript" src="/js/revslider.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/wow.min.js"></script>
 <script type="text/javascript" src="/js/application/search_proank.js"></script>
  <script type="text/javascript" src="/js/application/custom.js"></script>
        <script type="text/javascript" src="/js/application/ankcustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script>
        
       
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

</body>
</html>