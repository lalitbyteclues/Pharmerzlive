
<!DOCTYPE html>
<html lang="en" ng-app="pharmerz">
  <?php session_start();
 include('head.php'); ?> 
<body ng-controller="productscontroller"  ng-cloak>
<style type="text/css">.APILIST {height: 200px;overflow: auto;}</style>
<link rel="stylesheet" type="text/css" href="/css/slidernav.css" media="screen, projection" />
<?php include('inner_menu.php'); ?>
<section class="container-fluid hero"></section>
	<section class="product-selections bg-darkblue">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 dots step-item" ng-class="tabstatus==1?'active':''">
					<div ng-click="selectproducts()" class="numbers"  ng-style="tabstatus==2?{'cursor':'pointer'}:''"><span>1</span></div>
					<p  ng-click="selectproducts()" ng-style="tabstatus==2?{'cursor':'pointer'}:''">Select Product</p>
				</div>
				<!--<div class="col-sm-4 dots step-item">
					<div class="numbers"><span>2</span></div>
					<p>Select Supplier</p>
				</div>-->
				<div class="col-sm-6 step-item"  ng-class="tabstatus==2?'active':''"> 
					<div class="sendenquiry">
						<div class="numbersright"><span>2</span></div>
						<p>Send Enquiry</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="sortings bg-lightgrey" ng-show="tabstatus==1">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<span>Sort by</span>
					<ul class="nav nav-pills pull-right">						
						<li ng-class="sortby=='name'?'active':''" ><a ng-click="changesortorder('name')" href="javascript:void(0);">Product</a></li>
						<li ng-class="sortby=='category_name'?'active':''" ><a ng-click="changesortorder('category_name')" href="javascript:void(0);">Category</a></li>
						<li ng-class="sortby=='suppliername'?'active':''" ><a ng-click="changesortorder('suppliername')" href="javascript:void(0);">Suppliers</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<section class="container alphabets" ng-show="tabstatus==1">
		<div class="row">
			<ul class="col-sm-12 nav nav-pills">
				<li ng-class="character=='a'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('a')">A</a></li>
				<li ng-class="character=='b'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('b')">B</a></li>
				<li ng-class="character=='c'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('c')">C</a></li>
				<li ng-class="character=='d'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('d')">D</a></li>
				<li ng-class="character=='e'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('e')">E</a></li>
				<li ng-class="character=='f'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('f')">F</a></li>
				<li ng-class="character=='g'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('g')">G</a></li>
				<li ng-class="character=='h'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('h')">H</a></li>
				<li ng-class="character=='i'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('i')">I</a></li>
				<li ng-class="character=='j'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('j')">J</a></li>
				<li ng-class="character=='k'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('k')">K</a></li>
				<li ng-class="character=='l'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('l')">L</a></li>
				<li ng-class="character=='m'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('m')">M</a></li>
				<li ng-class="character=='n'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('n')">N</a></li>
				<li ng-class="character=='o'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('o')">O</a></li>
				<li ng-class="character=='p'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('p')">P</a></li>
				<li ng-class="character=='q'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('q')">Q</a></li>
				<li ng-class="character=='r'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('r')">R</a></li>
				<li ng-class="character=='s'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('s')">S</a></li>
				<li ng-class="character=='t'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('t')">T</a></li>
				<li ng-class="character=='u'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('u')">U</a></li>
				<li ng-class="character=='v'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('v')">V</a></li>
				<li ng-class="character=='w'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('w')">W</a></li>
				<li ng-class="character=='x'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('x')">X</a></li>
				<li ng-class="character=='y'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('y')">Y</a></li>
				<li ng-class="character=='z'?'active':''"><a href="javascript:void(0);" ng-click="searchtext('z')">Z</a></li>
			</ul>
		</div> 
		<div class="row description" >		
			<div ng-show="products.length>0" class="col-sm-4 description-item" ng-repeat="data in products | orderBy:sortby">
				<article class="border">
					<small>Product</small>
					<img class="img-responsive pull-right" ng-show="data.category_name=='Fine Chemicals' && data.imgurl==null" style="height:60px;width:60px;"  src="images/fine chemicals.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Intermediates Excipients' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Intermediates Excipients.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Lab Equipment' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Lab Equipments.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Nutraceuticals' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Nutraceuticals.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Herbals' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Herbals.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Services' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Services.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='PCD Companies' && data.imgurl==null" style="height:60px;width:60px;"   src="images/PCD Companies.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Regulatory' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Regulatory.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Plant Machinery' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Plant Machinary.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Brand' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Regulatory.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Packaging' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Packging.png" />
	    	    	<img  class="img-responsive pull-right" ng-show="data.category_name=='Active Pharmaceutical Ingredients (API)' && data.imgurl==null" style="height:60px;width:60px;"   src="images/api.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Finished Formulation' && data.imgurl==null" style="height:60px;width:60px;"   src="images/finishedFormulation.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Wholesale Dealers' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Wholsale Dealers.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Veterinary' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Veternary.png" />
	    	    	<img class="img-responsive pull-right" ng-show="data.category_name=='Pellets' && data.imgurl==null" style="height:60px;width:60px;"   src="images/Pellets.png" /> 
					<img src="{{data.imgurl}}" ng-show="data.imgurl!=null"  style="height:60px;width:60px;" class="img-responsive pull-right" />
					<p class="product">{{data.name}}</p> 
					<small>Category</small>
					<p class="category">{{data.category_name}}</p>
					<small>Supplier</small>
					<p class="supplier">{{data.suppliername}}</p>
					<a href="javascript:void(0);" ng-click="sendproductenquiry(data)"> Send Enquiry</a>
				</article>
			</div> 
			<span id="error1" ng-hide="isbusy || products.length > 0" style="color: Red;">* No Records Found</span>
			<img src="/tinymce/skins/lightgray/img/loader.gif" style="margin-left:48%;" ng-show="isbusy">
		</div>

		<div class="row">
			<div class="col-sm-12 hard-right">
				<div infinite-scroll="changepageno()" infinite-scroll-distance="3"></div>
			</div>
		</div>
	</section>  
	<article class="container contact-us" ng-show="tabstatus==2">
		<div class="row">
			<div class="col-sm-12">
				<a href="javascript:void();"  ng-click="selectproducts()">Back</a>
			</div>
			<img src="/tinymce/skins/lightgray/img/loader.gif" ng-show="isbusy">
			<div class="col-sm-6 form-inline" ng-hide="isbusy"   >
		<form class="text-left"   ng-submit="sendenquiry()">
			 <div class="form-group" style="width:100%;"><label> Product: </label>  {{product.name}}  </div>
			  <div style="clear:both;">	&nbsp;		 </div>
			 <div class="form-group" style="width:100%;"><label><b> Send TO: </b> </label> {{product.suppliername}} </div> 
 <div style="clear:both;">	&nbsp;		 </div>			 
			 <div class="form-group" style="width:100%;">
			   <label> Quantity: </label>
				 <input type='number' ng-model="quantity" onkeypress='javascript:return isNumber(event)' class='form-control' 
				 data-type='quantity' style='margin-top: 10px;'   placeholder='Enter Quantity...' required />
			 </div>  
			 <div style="clear:both;">	&nbsp;		 </div>
			 <div class="form-group" style="width:100%;">
			   <label> Location: </label>
			    <select name="location" style="width:100%;" class="form-control input-md" ng-model="locationid" placeholder="Select Location" required="required"   id="typchkk">
					<option value="">Select Location</option>
					<option  ng-repeat="data in locations" value="{{data.id}}">{{data.addressline1}}{{data.addressline2}}{{data.postalcode}}</option> 
				</select> 
			 </div>   <div style="clear:both;">	&nbsp;		 </div>
			  <div class="form-group" style="width:100%;">
			   <label> UOM: </label>
			    <select name="UOM" style="width:100%;" class="form-control input-md" ng-model="uomid" placeholder="Select UOM" required="required"   id="typchkk">
					<option value="">Select UOM</option>
					<option  ng-repeat="data in uom" value="{{data.id}}">{{data.name}}</option> 
				</select> 
			 </div>   <div style="clear:both;">	&nbsp;		 </div>
			  <div class="form-group" style="width:100%;">
			  <label> Your Message: </label>
				 <textarea  class='form-control'  ng-model="message"  data-type='notes' style='margin-top: 10px;'
				 name='notes[]' placeholder='Delivery notes...'></textarea>
			 </div>  <div style="clear:both;">	&nbsp;		 </div>
			 <div class="form-group" style="width:100%;">
			 <button type="submit" class="btn btn-lg pull-right push-top push-bottom" style="color:#fff;">Send Inquiry</button> 
			 </div>
		 </form>
		</div>
		</div>
	</article>
	<section class="contact-us text-center">
	<article  >
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					 
				</div>
			</div>
		</div>
	</article>
	</section>
 <?php include('footer.php'); ?> 
 <div  role="dialog" tabindex="-1" id="login-modal" class="modal modal-login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title text-center" id="loginModalLabel">Login / Sign Up</h4>
      </div>
      <div class="modal-body">
 <div class="login-form-container">  
      <div class="panel panel-login" > 
	  <div class="col-md-12">
                    <div class="col-xs-6">
                      <a href="javascript:void(0);" class="text-primary" class="active" id="login-form-link"><h4 class="modal-title text-center">Login</h4></a>
                    </div>
                    <div class="col-xs-6"> 
                      <a href="/signup.php" class="text-primary" ><h4 class="modal-title text-center">Buyer Registration</h4></a>  </div>
					  </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <form id="login-form" method="get" role="form" style="display: block;">
                        <div class="form-group">
                          <input type="text" name="usernameLogin" id="loginUsername" tabindex="1" class="form-control" placeholder="Username" value="">
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" id="loginPassword" tabindex="2" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group text-center">
                          <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                          <label for="remember"> Remember Me</label>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-6 col-sm-offset-3">
                              <input type="button" name="login-submit" id="login-submit" tabindex="4" class="btn btn-primary" 
							  value="Log In" ng-click="submitLoginForm()">
                         </div>
                        </div>
						 <div class="form-group"> 
                            <div class="col-sm-6 col-sm-offset-3">
                          <div id="danger" style="display:none;" class="alert alert-danger">
								<span class="alert-danger"></span>
							</div>
                         </div>
                        </div>
                      
                      </form> 
                    </div>
                  </div>
                </div>
				</div>  
		    	</div>  
			</div> 
		</div>  
	</div> 
</div>  
<div id="div_session_write"><div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/libs/angular.min.js"></script>
<script type="text/javascript" src="/js/libs/ng-infinite-scroll.min.js"></script>
<script>
 $( document ).ready(function() {
  var searchitem = "<?php if(isset($_GET['namelike'])){ echo $_GET['namelike']; }else{echo "";}?>"
  var categoryid = "<?php if(isset($_GET['categoryid'])){ echo $_GET['categoryid']; }else{echo "";}?>"
  getAPIs(searchitem,categoryid,"<?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email']; }else{echo "";}
   ?>","<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; }else{echo "";}?>");
});
// new WOW().init();
</script> 
<script type="text/javascript" src="/js/application/search_proank.js"></script>
<script type="text/javascript" src="/js/application/ankcustm.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/async/1.4.0/async.js"></script>
<script type="text/javascript" src="/js/application/jquery.steps.js"></script>
<script type="text/javascript" src="/js/application/intlTelInput.min.js"></script>
<script type="text/javascript" src="/js/application/sweetalert.min.js"></script>
<script type="text/javascript" src="/js/application/buyers.js"></script>
<script type="text/javascript" src="/js/application/custom.js"></script>
<script type="text/javascript" src="/js/application/spidergcon.js"></script>
<script type="text/javascript" src="/js/application/loginForm.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script src="http://pharmerz.com/admin/js/md5.js"></script>
<script type="text/javascript" src="/js/application/modernizr.js"></script> 
<script type="text/javascript" src="/js/common.js"></script> 
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script src="/js/superfish.min.js" type="text/javascript"></script>
<!-- <script src="/js/myscript.js" type="text/javascript"></script> -->
<script type="text/javascript" src="/js/wow.min.js"></script>
<script type="text/javascript" src="/js/application/jquery.validate.js"></script>
<script type="text/javascript" src="/js/application/popup.js"></script> 
<script type="text/javascript" src="/js/slidernav.js"></script>
 <script type="text/javascript" src="/js/application/suppliers.js"></script>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#slider').sliderNav();
		$('#transformers').sliderNav({items:['autobots','decepticons'], debug: true, height: '300', arrows: false});
	});
</script>
</body>
</html>
