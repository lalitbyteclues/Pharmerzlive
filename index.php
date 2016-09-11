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
<html lang="en"  ng-app="pharmerz">
  <?php include('head.php'); ?> 
   <body>
    <?php include('inner_menu.php'); ?>  
	<section class="container-fluid">
		<!-- <div class="container"> -->
			<div class="row">
				<div id="crousel" data-ride="carousel" class="carousel slide slider">
					<ol class="carousel-indicators">
						<li data-target="#crousel" data-slide-to="0" class="active"></li>
						<li data-target="#crousel" data-slide-to="1"></li>
						<li data-target="#crousel" data-slide-to="2"></li>
						<li data-target="#crousel" data-slide-to="3"></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active" style="background-image:url('images/slider_1.png')">
							<!-- <img class="img-responsive" src="images/banner.jpg"> 
							<p>Number of category on your Fingertips</p>-->
						</div>
						<div class="item" style="background-image:url('images/slider_2.png')">
							<!-- <img class="img-responsive" src="images/banner.jpg"> 
							<p>Number of category on your Fingertips </p>-->
						</div>
						<div class="item" style="background-image:url('images/slider_3.png')">
							<!-- <img class="img-responsive" src="images/banner.jpg"> 
							<p>text 1</p>-->
						</div>
						<div class="item" style="background-image:url('images/slider_4.png')">
							<!-- <img class="img-responsive" src="images/banner.jpg"> 
							<p>text 2</p>-->
						</div>
					</div>
					<a class="left carousel-control" href="#crousel" role="button" data-slide="prev">
						<img src="images/left.png">					      		
			    </a>
			   	<a class="right carousel-control" href="#crousel" role="button" data-slide="next">
			      <img src="images/right_40.png">
			    </a>
				</div>
			</div>
		<!-- </div> -->
	</section>
	<section class="container hero-section">
		<div class="row">
			<div class="col-sm-8">
				<h2>JOIN US ON THE PATH TO <br>
					<strong>Simplify your business with the <br>
						strategy they deserve.
					</strong>
				</h2>
				<p>
					Pharmerz provides best decision making tool for Pharmaceutical Industry with vision to organize global pharmaceutical market.
				</p>
				<p>
					Our Online Trade Marketplace will help you to connect & reach your
					maximum vitality.
				</p>
			</div>
			<div class="col-sm-4">
				<img class="img-responsive" src="images/Untitled-2.png">
			</div>
		</div>
	</section>
	<section class="container push-bottom soft-bottom-45">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center lines-effects"><span>Featured <strong>Categories</strong></span></h2> 
        <div class="flexslider carousel"  > 
          <ul class="slides"> 
		<?php  
		 $headers = array("Content-Type: application/json","SPIDERG-API-Key:" . 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',"SPIDERG-Authorization: " .'SPIDERGAUTH register');  
		 $objectData = '{}';  
		 $rest = curl_init();  
		 curl_setopt($rest,CURLOPT_URL,'http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/category');  
		 curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);  
		 curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		 curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		 $response = json_decode(curl_exec($rest)); 
		 foreach ($response as $data)
		 { ?> 
		 <li>
		 <a href="products.php?categoryid=<?php echo $data->id; ?>"> 
			<img src="<?php echo $data->name=='Fine Chemicals'?'images/fine chemicals.png':($data->name=='Intermediates Excipients'?'images/Intermediates Excipients.png':($data->name=='Lab Equipment'?'images/Lab Equipments.png':( $data->name=='Nutraceuticals'?'images/Nutraceuticals.png':($data->name=='Herbals'?'images/Herbals.png':($data->name=='Services'?'images/Services.png':($data->name=='PCD Companies'?'images/PCD Companies.png':($data->name=='Regulatory'?'images/Regulatory.png':($data->name=='Plant Machinery'?'images/Plant Machinary.png':($data->name=='Brand'?'images/Regulatory.png':($data->name=='Packaging'?'images/Packging.png':($data->name=='Active Pharmaceutical Ingredients (API)'?'images/api.png':($data->name=='Finished Formulation'?'images/finishedFormulation.png':($data->name=='Wholesale Dealers'?'images/Wholsale Dealers.png':($data->name=='Veterinary'?'images/Veternary.png':($data->name=='Pellets'?'images/Pellets.png':'')))))))))))))))?>" />   
			<figcaption><?php echo $data->name;?></figcaption></a>
			</li> 
			<?php  } 
		 curl_close($rest);
		 ?> 
		 </ul>
        </div>
			</div>
		</div>
	</section>
	<section class="bg-blue video-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="text-center">An Online <strong>MarketPlace</strong> for <strong>Pharmaceutical</strong> Industry</h1>
					<div class="embed-responsive embed-responsive-16by9">
					  	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/E-3VSZ91Ijs" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="container soft-top-20 intro-section">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<ul class="nav nav-stacked intro-side-nav">
		          <li class="active"><a href="#What" data-toggle="tab">WHAT is Pharmerz</a></li>
		          <li><a href="#Who" data-toggle="tab">Who Can Join Pharmerz?</a></li>
		          <li><a href="#Why" data-toggle="tab">Why Should You Join Pharmerz?</a></li>
		          <li><a href="#When" data-toggle="tab">When Should You Join Pharmerz?</a></li>
		          <li><a href="#How" data-toggle="tab">HOW it works?</a></li>
		          <li><a href="#Where" data-toggle="tab">Where is Pharmerz located?</a></li>
				   <li>&nbsp;</li>
     			</ul>
			</div>
			<div class="col-sm-8 col-md-9">
				<div class="tab-content">
	                <div class="tab-pane active" id="What">
	                	<h2 class="push-top">WHAT is <strong>Pharmerz?</strong></h2>
	                	<p>
							Pharmerz is an online marketplace focused on pharmaceutical industry. A platform where all pharmaceutical industry players can connect, transact and collaborate with each other.It focuses on providing a single platform to all kind of industry players ranging from Individual Buyers and Sellers, Small and Medium Enterprises (SMEs) to large Corporate
						</p>
						<p>
							It provides access to wider marketplace and diverse portfolio of products catering to all your business requirements. Pharmerz focus to offer one-stop-shop solution to manufacturers, importers, exporters, traders, suppliers, distributors, dealers, agencies and service providers, where one can meet and engage with global business community
	                	</p>
	                </div>
	                <div class="tab-pane" id="Who">
	                	<h2 class="push-top">Who Can Join <strong>Pharmerz?</strong></h2>
	                	<p> Any Pharmaceutical Industry B2B Player can use this platform for their Business Needs, who can be:
						</p>
						<ul>
						<li>Manufacturers</li>
						<li>Importers</li>
						<li>Exporters</li>
						<li>Traders</li>
						<li>Suppliers</li>
						<li>Distributers</li>
						<li>Dealers</li>
						<li>Agencies</li>
						<li>Service Providers</li>
						</ul>
	                </div>
	                <div class="tab-pane" id="Why">
	                	<h2 class="push-top">Why Should You Join <strong>Pharmerz?</strong></h2>
	                	<p>
							You should join Pharmerz and make
						</p>
						<ul>
						<li>Your Business grow bigger</li>
						<li>Higher Profitability</li>
						<li>Faster Connectivity</li>
						<li>Cheaper transactions</li>
						<li>Smoother processes</li> 
						</ul>
	                </div>
	                <div class="tab-pane" id="When">
	                	<h2 class="push-top">When Should You Join <strong>Pharmerz?</strong></h2>
	                	<p>
						  At any point of time in your business lifecycle, whether its startup, growth, maturity or even decline, you can join us. Pharmerz provides you an ample amount of resources and connections, which can help you in your business needs irrespective of the stages of your business life cycle.
						</p> 
	                </div>
	                <div class="tab-pane" id="How">
	                	<h2 class="push-top">How <strong>Pharmerz</strong> Works?</h2>
	                	<p>
							Pharmerz Simplifies Your Business through the following Simple task flow.
						</p>
						<p>
						Enter Product Detail ->

Search For Supplies ->

Get the List of Suppliers ->

Shortlist Suppliers on the basis of location, availability, rating, feedback ->

Send Request for Quotation to selected Suppliers ->

Receive Quotation from Suppliers ->

Negotiate the terms through Chat ->

Generate Purchase Order and share with Supplier ->

Receive Invoice ->

Exchange Payment details, Delivery Receipt, other Transaction related docs ->

Sit back, Relax and Enjoy Seamless Service from PHARMERZ  
	                	</p>
	                </div>
	                <div class="tab-pane" id="Where">
	                	<h2 class="push-top">Where is <strong>Pharmerz</strong> located?</h2>
	                	<p>
							Pharmerz is an online market place that can be accessed anytime and from anywhere. Although we have currently two offices
						<br/><br/><br/>
						<b>MUMBAI</b><br/>
						 C – 609, 6th Floor, Raga Building, Shell Colony Road, Chembur, Mumbai – 400071 
						<br/><br/><br/>
						<b>PUNE</b><br/><br/>
						 Office No. 7, Bldg A-8, Meera Nagar CHS Ltd., Lane 7, Koregaon Park, Pune – 6 
						</p>  
	                </div> 
          		</div>
			</div>
		</div>
	</section> 
<section class="contact-us text-center">
	<article class="bg-lightestblue">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<p>Need help choosing us? Call us <strong>+91-7722074442</strong>
					</p>
				</div>
			</div>
		</div>
	</article>
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
<?php include('footer.php');

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


?>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/libs/angular.min.js"></script>
<script type="text/javascript" src="/js/libs/ng-infinite-scroll.min.js"></script>
<!-- FlexSlider -->
<script defer src="js/jquery.flexslider-min.js"></script> 
<script type="text/javascript" src="/js/application/jquery.steps.js"></script> 
<script type="text/javascript" src="/js/application/intlTelInput.min.js"></script>  
<script type="text/javascript" src="/js/application/search_proank.js"></script>
<script type="text/javascript" src="/js/application/custom.js"></script>
<script type="text/javascript" src="/js/application/ankcustm.js"></script>
<script type="text/javascript" src="/js/application/spidergcon.js"></script>
<script src="http://pharmerz.com/admin/js/md5.js"></script> 
<script type="text/javascript">
     (function() {
    	$('.search a').click(function() {
    		$(this).prev('input').fadeToggle()
    	})

      // store the slider in a local variable
      var $window = $(window),
          flexslider = { vars:{} };
      // tiny helper function to add breakpoints
      function getGridSize() {
        return (window.innerWidth < 767) ? 1 :
               (window.innerWidth < 993) ? 3 : 5;
      }
      $window.load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          animationSpeed: 400,
          animationLoop: true,
          controlNav: false,
          itemWidth: 310,
          itemMargin: 30,
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            $('body').removeClass('loading');
            flexslider = slider;
          }
        });
      });
      // check grid size on resize event
      $window.resize(function() {
        var gridSize = getGridSize();
        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
      });
    }());
	 
  </script> 
  <style>
  .form-inline{margin-left:0px;}
  </style>
   </body>
</html>