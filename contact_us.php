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
     // $street2 = $_POST['street2'];
      $comment = $_POST['comment'];      
      $q = "INSERT INTO `contact_us` (`first_name`,`email`,`comany`,`phone`,`street1`,`comment`) VALUES('$firstname','$email','$company','$phone','$street1','$comment')";
      if(mysqli_query($conn,$q))
      { 
         $subject = 'Contact Us';
         $message = 'User First Name :'.$firstname.'<br> User Email :'.$email.'<br> Comapny Name :'.$company.'<br> Phone :'.$phone.'<br> Street Address1 :'.$street1.'<br> Street Address2 :'.$street2.'<br> Comment :'.$comment;
         //$message = 'hi';
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $headers .= 'From: No Reply <no-reply@pharmerz>'; 
         @mail('lalit.sharma@byteclues.com', $subject, $message, $headers);
         $status = '0';
		 echo '<script>alert("Thank you for contact us.");
		 window.location.href = "/index.php";	 
		 </script>';
      }
    }
    else
    {
        $status = '1';
    }
} 
include('head.php'); ?>
  
   <body class="cms-index-index"  >  
      <div class="page"> 
      <?php include('inner_menu.php'); ?>
      <section class="container-fluid hero"></section>
         <div class="main-container col2-right-layout">
            <div class="main container">
               <div class="row">
                  <section class="col-main col-sm-9 wow rtr"> 
                     <?php if($status == '1'){ echo "Please fill all fields." ; } elseif($status == '0'){ echo "Thank you for contact us."; }?>
  <section class="contact-us text-center"> 
	<article class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>How to <strong>Contact us?</strong></h2>
			</div>
			<div class="col-sm-12">
				<form class="form-inline text-left" method="post" action="index.php">
				  <div class="form-group">
					<input type="text" class="form-control" required name="firstname" placeholder="Full Name">
				  </div>
				  <div class="form-group">
					<input type="email" class="form-control" required name="email"  placeholder="Email">
				  </div>
				   <div class="form-group">
					<input type="text" class="form-control" required name="company" placeholder="Company Name">
				  </div>
				  <div class="form-group">
					<input type="tel" class="form-control" required name="phone" placeholder="Contact">
				  </div>

				   <div class="form-group">
					<textarea class="form-control" required row="5" name="street1" placeholder="Address"></textarea>
				  </div>
				  <div class="form-group">
					<textarea class="form-control" required row="5" name="comment" placeholder="Comment"></textarea>
				  </div>
				  <div class="form-group">
					<a href="mailto:sales@pharmerz.com" class="push-top">
						<span><img src="/images/mail.png"></span>
						sales&commat;pharmerz.com</a>
					<a href="tel:+91-7722074442">
						<span><img src="/images/contact-icon-large.png"></span>
						+91-7722074442
					</a>
				  </div>
				  <div class="form-group">
				   <button type="submit" name="submit" class="btn btn-lg pull-right push-top push-bottom">Submit</button>
				  </div>
				</form>
			</div>
		</div>
	</article>
</section>
                  </section> 
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
	    <style>
  .form-inline{margin-left:0px;}
  </style>
   </body>
</html>