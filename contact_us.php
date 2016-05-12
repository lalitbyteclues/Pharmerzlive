<!DOCTYPE html>
<html lang="en">
<?php 
include('home/include/dbconnection.php');
session_start();
$status = '1';
if(isset($_POST['submit']))
{
   //unset($_SESSION['site2']);
   if($_POST['firstname']!='' && $_POST['email']!='' && $_POST['phone']!='' && $_POST['street1']!='' && $_POST['comment']!='')
   {
      $firstname = $_POST['firstname'];
      $email = $_POST['email'];
      $company = $_POST['company'];
      $phone = $_POST['phone'];
      $street1 = $_POST['street1'];
      $street2 = $_POST['street2'];
      $comment = $_POST['comment'];
      
      $q = "INSERT INTO `contact_us` (`first_name`,`email`,`comany`,`phone`,`street1`,`street2`,`comment`) VALUES('$firstname','$email','$company','$phone','$street1','$street2','$comment')";
      if(mysqli_query($conn,$q))
      { 
         $subject = 'Contact Us';
         $message = 'User First Name :'.$firstname.'<br> User Email :'.$email.'<br> Comapny Name :'.$company.'<br> Phone :'.$phone.'<br> Street Address1 :'.$street1.'<br> Street Address2 :'.$street2.'<br> Comment :'.$comment;
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
      <?php include('inner_menu.php'); ?>
      
         <div class="main-container col2-right-layout">
            <div class="main container">
               <div class="row">
                  <section class="col-main col-sm-9 wow rtr">
                     <div class="page-title">
                        <h2>Contact Us</h2>
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
                                             <label for="billing:company">Company</label>
                                             <br>
                                             <input type="text" id="billing:company"  name="company" value="" title="Company" class="input-text">
                                          </div>
                                          <div class="input-box">
                                             <label for="billing:email">Telephone <span class="required">*</span></label>
                                             <br>
                                             <input type="text" required name="phone" id="billing:email" value="" title="Email Address" class="input-text validate-email">
                                          </div>
                                       </li>
                                       <li>
                                          <label for="billing:street1">Address <span class="required">*</span></label>
                                          <br>
                                          <input type="text" required title="Street Address" name="street1" id="billing:street1  street1" value="" class="input-text required-entry">
                                       </li>
                                       <li>
                                          <input type="text" title="Street Address 2" name="street2" id="billing:street2 street2" value="" class="input-text required-entry">
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
                                  <p><strong>Pharmerz.com</strong><br />Email : sales@pharmerz.com<br />Phone : 180030007213<br /></p>
                           </address>
                       </div>
                     </div>
                  </aside>
               </div>
            </div>
         </div>

      </div>
         </div>
       <?php include('footer.php'); ?>



      <!-- JavaScript --> 
      <script type="text/javascript" src="/js/jquery.min.js"></script> 
      <script type="text/javascript" src="/js/bootstrap.min.js"></script> 
       <script type="text/javascript" src="/js/common.js"></script>


      <script type="text/javascript" src="/js/application/search_proank.js"></script>
         <script type="text/javascript" src="/js/revslider.js"></script>
      <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="/js/wow.min.js"></script>
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
   </body>
</html>