 <?php 
   include('home/include/dbconnection.php'); 
?>
 <header class="bg-darkblue">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ul class="nav nav-pills pull-right">
						<li class="search">
						<form  method="get" id="searchproduct" action="/products.php"> 
							<input type="text" class="form-control" required class="form-control" name="namelike"  onkeypress="return IsAlphaNumeric(event);" placeholder="Enter for search">
							<a href="javascript:void(0);" onclick="document.getElementById('searchproduct').submit();" class="hard-top"><img src="images/search.png"></a>
							<input type="submit" style="display:none;" id="submitbtn"  />
						</form>
						</li> 
						<?php if($_SESSION['user_id'] == ''){ ?>
							<li><a href="/signup.php" ><span>Signin</span></a></li> 
							<li><a href="/signup.php" class="no-border hard-right">Signup</a></li>
						<?php }else{?>
						   <li><a href="/home/index.php">Account</a></li>
						  <li><a href="/home/logout.php">Log Out</a></li> 
						<?php } ?>  
					</ul>
				</div>
			</div>
		</div>
</header>
<nav class="navbar navbar-default bg-white no-border flush">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="navbar-header">
						<button type="button" class="collapsed navbar-toggle flush-right" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="/" class="navbar-brand brand-logo">Pharmerz</a>
						<div class="pull-left sub-menu-nav dropdown">
							<a href="javascript:void(0);" class="flush-right dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<small class="text-capitalize" >Catergories</small>&nbsp;
							</a> 
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="mycate">
								 
							</ul>
						</div>
					</div>
					<div class="collapse navbar-collapse hard-right" id="bs-example-navbar-collapse-6">
						<ul class="nav navbar-nav site-nav pull-right">
							<li id="a11"><a href="/">Home</a></li>
							<li id="a12"><a href="/about_us.php">About Us</a></li>
							<li id="a13"><a href="/products.php">Product</a></li>
							<li id="a14"><a href="javascript:void(0);">Pricing</a></li>
							<li id="a15"><a href="/contact_us.php" class="flush-right">Contact Us</a></li>
							<li class="pull-right contact-number"><a  href="tel:+91-7722074442">+91-7722074442</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
   <script type="text/javascript">
        function setMenu(menuId) {
            document.getElementById(menuId).setAttribute("class", "active");
        } 
		var mx = window.location.href;
      //name=mx.match(/\w+\.aspx|html/)
      name = mx.substring(mx.lastIndexOf("/") + 1, mx.length);

      if (name.indexOf("index.php") != -1) {
          setMenu("a11");
      }
      else if (name.indexOf("about_us.php") != -1) {
          setMenu("a12");
      }
      else if (name.indexOf("products.php") != -1) {
          setMenu("a13");
      }
      else if (name.indexOf("contact_us.php") != -1) {
          setMenu("a15");
      }
      else {
          setMenu("a11");
      }
    </script>