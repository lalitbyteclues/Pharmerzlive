<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(!isset($_SESSION['user_id'])){$_SESSION['user_id']="";}
 if($_SESSION['user_id'] != "")
 {
  header('Location:home/index.php');
 }
?><?php include('head.php'); ?>
 
<body class="cms-index-index" ng-app="pharmerzApp">
  <div class="page"  ng-conroller="suppliersListCtrl"> 
  <!-- Header -->
     <?php include('inner_menu.php'); ?>  
      <div id = "registration">
        <div class="container" style="width: auto;">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                  <div class="panel-heading">
                    <div class="row" style="margin: 0 !important;padding:0;">
                      <div class="col-xs-6">
                        <a href="#" class="active" id="login-form-link">Login</a>
                      </div>
                      <div class="col-xs-6">
                        <a href="#" id="register-form-link">signUp Now</a>
                      </div>
                    </div>
                    <hr>
                  </div>
                  <div class="panel-body" style="padding-bottom: 0px; padding-top: 0px; margin-top: 0px;">
                    <div class="row">
                      <div class="col-lg-12">
                        <!-- Login -->
                        <div class="col-lg-12">
                          <form id="login-form" method="get" role="form" style="display: block;">
                            <div class="form-group">
                              <input type="text" name="loginUsername" id="loginUsername" tabindex="1" class="form-control" placeholder="Username *" value="">
                            </div>
                            <div class="form-group">
                              <input type="password" name="loginPassword" id="loginPassword" tabindex="2" class="form-control" placeholder="Password *">
                            </div>
                            <div class="form-group text-center">
                              <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                              <label for="remember"> Remember Me</label>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                  <input type="button" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In" onClick="submitLoginMyData()">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="text-center">
                                    <a href="forgetpassword.php" tabindex="5" class="forgot-password">Forgot Password?</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        <!-- End Login -->
                        <!-- Register -->
                        <form id="register-form" method="get" role="form" style="display: none;">
						<div class="form-group">
                            <div class="col-sm-8 col-sm-offset-3">
							<div id="danger" style="display:none;" class="alert alert-danger">
								<span class="alert-danger"></span>
							</div> 
<span id="error" style="color: Red; display: none">* Special Characters not allowed</span>							
<span id="error1" style="color: Red; display: none">* Special Characters and numbers not allowed</span>							
                         </div>
                         </div>	
                          <div class="form-group">
                            <input type="text" name="userCompany"  onkeypress="return IsAlphaNumeric(event);" ondrop="return false;"
        onpaste="return false;" id="userCompany" tabindex="1" class="form-control" placeholder="Company Name *" value="">
                          </div>
                          <div class="form-group">
                            <input type="text" onkeypress="return IsAlphaNumericwithnumeric(event);" ondrop="return false;"
        onpaste="return false;"  name="userFirstName" id="userFirstName" tabindex="1" class="form-control" placeholder="First Name *" value="">
                          </div>
                          <div class="form-group">
                            <input type="text"  onkeypress="return IsAlphaNumericwithnumeric(event);" ondrop="return false;"
        onpaste="return false;"  name="userLastName" id="userLastName" tabindex="1" class="form-control" placeholder="Last Name *" value="">
                          </div>
                          <div class="form-group">
                            <input type="text" name="userEmail" id="userEmail" tabindex="1" class="form-control" placeholder="Email *" value="">
                          </div>
                          <div class="form-group">
                            <input type="password"  onkeypress="return Ischeckspacefromstring(event);" ondrop="return false;"
        onpaste="return false;"   name="password" id="password" tabindex="1" class="form-control" placeholder="Password *">
                          </div>
                          <!-- <div class="form-group">
                            <input type="password" name="confirmPassword" id="confirmPassword" tabindex="2" class="form-control" placeholder="Confirm Password">
                          </div> -->
                          <div class="form-group">
                            <input type="tel" name="userPhone" id="demo" tabindex="1" class="form-control" placeholder="Phone Number *" value=""  style="height:43px;">
                            <!-- <input type="tel" id="demo" placeholder=""> -->
                          </div>
                          <!-- <div class="form-group text-center">
                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                            <label for="remember"> Remember Me</label>
                          </div> -->
                          <div class="form-group" style="margin-top: 0px;">
                            <div class="row">
                              <div class="col-sm-6 col-sm-offset-3">
                                <input type="button" name="callMe" id="callMe" tabindex="4" class="btn btn-primary" value="Signup" onClick="getRegistrationData()">
                                <input type="reset"  tabindex="5" class="btn btn-warning" value="Reset" >
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

</div>
</div>
  <!-- Footer -->
  <?php include('footer.php'); ?>
  <!-- End Footer --> 
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
      <link rel="stylesheet" href="/css/jquery.steps.css" type="text/css">
    <link rel="stylesheet" href="/css/intlTelInput.css">
    <link rel="stylesheet" href="/css/application/sweetalert.css" type="text/css">
    <link href="/css/loginForm.css" rel="stylesheet" type="text/css" />
<!-- JavaScript --> 
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/async/1.4.0/async.js"></script>
<script type="text/javascript" src="/js/application/jquery.steps.js"></script>
<script type="text/javascript" src="/js/application/intlTelInput.min.js"></script>
<script type="text/javascript" src="/js/application/sweetalert.min.js"></script>
<script type="text/javascript" src="/js/application/custom.js"></script>
<script type="text/javascript" src="/js/application/ankcustm.js"></script>
<script type="text/javascript" src="/js/application/suppliers.js"></script>
<!--<script type="text/javascript" src="/js/application/spidergcon.js"></script> -->
<script type="text/javascript" src="/js/application/loginForm.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script src="http://pharmerz.com/admin/js/md5.js"></script>
<script type="text/javascript" src="/js/application/modernizr.js"></script> 
<script type="text/javascript" src="/js/common.js"></script> 
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script src="/js/superfish.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/wow.min.js"></script>
<script type="text/javascript" src="/js/application/jquery.validate.js"></script>
<script type="text/javascript" src="/js/application/popup.js"></script> 
<script>
// new WOW().init();
</script>

</body>
</html>