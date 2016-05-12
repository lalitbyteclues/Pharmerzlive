<!DOCTYPE html>
<html lang="en">
<?php 
include('home/include/dbconnection.php');
session_start();
if(isset($_POST['submit']))
{
   //unset($_SESSION['site2']);
   if($_POST['firstname']!='' && $_POST['email']!='' && $_POST['phone']!=''  && $_POST['comment']!='')
   {
      $firstname = $_POST['firstname'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $comment = $_POST['comment'];
      
      $q = "INSERT INTO `medicine_contact` (`first_name`,`email`,`phone`,`comment`) VALUES('$firstname','$email','$phone','$comment')";
      if(mysqli_query($conn,$q))
      { 
         $subject = 'Contact Us';
         $message = 'User First Name :'.$firstname.'<br> User Email :'.$email.'<br> Phone :'.$phone.'<br> Comment :'.$comment;
         //$message = 'hi';
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $headers .= 'From: No Reply <no-reply@pharmerz>';

         @mail('ankit.neema@ebabu.co', $subject, $message, $headers);
         $status = '0';
      }
    }
    else
    {
        $status = '1';
    }
}

include('head.php'); ?>
  
   <body class="cms-index-index" bgcolor="#E6E6FA">
      <div class="page">
         <!-- Header -->
         
         <!-- end header -->
         <!-- Navbar -->
      <?php include('menu.php'); ?>
         
         <!-- ********************** -->
         <!-- end nav -->
         <!-- main-container -->
         <div class="main-container col2-right-layout">
            <div class="main container">
               <div class="row">
                  <section class="col-main col-sm-9 wow rtr">
                     <div class="page-title">
                        <h2>Medicine Us</h2>
                     </div>
                     <?php if($status == '1'){ echo "Please fill all fields." ; } elseif($status == '0'){ echo "Thank you for contact us."; }?>
                     <div class="static-contain">
                        <form method="post" >
                        <fieldset class="group-select">
                           <ul>
                              <li id="billing-new-address-form">
                                 <fieldset>
                                    <legend>New Address</legend>
                                    <input type="hidden" name="billing[address_id]" value="" id="billing:address_id">
                                    <ul>
                                       <li>
                                          <div class="customer-name">
                                             <div class="input-box name-firstname">
                                                <label for="billing:firstname"> First Name<span class="required">*</span></label>
                                                <br>
                                                <input type="text" required id="billing:firstname" name="firstname" value="" title="First Name" class="input-text ">
                                             </div>
                                             <div class="input-box name-lastname">
                                                <label for="billing:lastname"> Email Address <span class="required">*</span> </label>
                                                <br>
                                                <input type="text" required id="billing:lastname" name="email" value="" title="Email" class="input-text">
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          
                                          <div class="input-box">
                                             <label for="billing:email">Telephone <span class="required">*</span></label>
                                             <br>
                                             <input type="text" required name="phone" id="billing:email" value="" title="Telephone" class="input-text validate-email">
                                          </div>
                                       </li>
                                      
                                       <li class="">
                                          <label for="comment">Comment<em class="required">*</em></label>
                                          <br>
                                          <div style="float:none" class="">
                                             <textarea name="comment" required id="comment" title="Comment" class="required-entry input-text" cols="5" rows="3"></textarea>
                                          </div>
                                       </li>
                                    </ul>
                                 </fieldset>
                              </li>
                              <p class="require"><em class="required">* </em>Required Fields</p>
                              <input type="text" name="hideit" id="hideit" value="" style="display:none !important;">
                              <div class="buttons-set" style="padding-bottom: 10px;">
                                 <button type="submit" name="submit" title="Submit" class="button submit"> <span> Submit </span> </button>
                              </div>
                           </ul>
                        </fieldset>
                     </form>
                     </div>
                  </section>
                  <aside class="col-right sidebar col-sm-3 wow">
                     <div class="block block-company">
                        <div class="block-title">Company Address</div>
                        <div class="block-content">
                           <address>
                                  <p><strong>EngineerBabu IT Services Pvt Ltd</strong> <br /> <br /> 108, Trade House, South Tukoganj, Indore, <br />Madhya Pradesh, 452007</p>
                           </address>
                       </div>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
         <!--End main-container --> 
         <!-- start Footer -->
         <footer class="footer">
            <!-- End of brand-logo -->
            <div class="footer-middle container">
               <div class="col-md-4 col-sm-4">
                  <div class="footer-logo"><a href="index.html" title="Logo"><img src="/images/logo_pharmerz.jpg" alt="logo"></a></div>
                  <div class="payment-accept">
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 jki text-center">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
                     <span><a href="#">How to buy</a></span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
                     <span><a href="#">Payment</a></span>
                  </div>
                  <!-- <a href="#" title="How to buy" style="padding-right: 40px;">How to buy</a>
                     <a href="#" title="Payment">Payment</a> -->
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
      <script type="text/javascript" src="/js/common.js"></script> 
      <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
   </body>
</html>