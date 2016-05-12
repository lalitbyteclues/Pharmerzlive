<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(!isset($_SESSION['user_id'])){$_SESSION['user_id']="";}
 if($_SESSION['user_id'] != "")
 {
  header('Location:home/index.php');
 }
?>
  <?php include('head.php'); ?>
 
<body class="cms-index-index" ng-app="pharmerzApp" ng-conroller="suppliersListCtrl">
  <div class="page"> 
  <!-- Header -->
     <?php include('inner_menu.php'); ?>
  
      <div id = "registration">
        <div class="container" style="width: auto;">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                  <div class="panel-heading"> 
                  <div class="panel-body" style="padding-bottom: 0px; padding-top: 0px; margin-top: -41px;">
                    <div class="row"> 
                        <div class="col-lg-12">
						<div class="col-xs-12"> <BR> 
                        <a   class="active" href="#">Reset Password</a> <BR>
						 
                      </div>
                          <form id="login-form" method="get" role="form" style="display: block;">
						 
                            <div class="form-group">
                              <input type="text" name="loginUsername" id="loginUsername" tabindex="1" class="form-control" placeholder="your Email" value="">
                            </div> 
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                  <input type="button" name="login-submit" id="login-submit"
								  tabindex="4" class="form-control btn btn-login" value="Submit" onClick="changepassword()">
                                </div>
                              </div>
                            </div><div class="form-group"> 
                            <div class="col-sm-6 col-sm-offset-3">
							<div id="danger" style="display:none;" class="alert alert-danger">
								<span class="alert-danger"></span>
							</div>
                           
                         </div>
                         </div>
                             
                          </form>  <form id="resetpass" method="get" role="form" style="display: none;">
						  <BR>
						  <BR> 
                            <div class="form-group">
                              <input type="text" name="loginUsername" id="resetcode" tabindex="1" class="form-control" placeholder="Enter Reset Code" value="">
                            </div> 
							<div class="form-group">
                              <input type="password" name="loginUsername" id="password" tabindex="1" class="form-control" placeholder="Enter New Password" value="">
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                  <input type="button" name="login-submit" id="login-submit"
								  tabindex="4" class="form-control btn btn-login" value="Reset Password" onClick="resetpassword()">
                                </div>
                              </div>
                            </div><div class="form-group"> 
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

</div>
</div>
<script>
function changepassword()
	{  var username=$("#loginUsername").val();
		$.ajax({ type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user/resetpassword?username="+username,
            headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                         'SPIDERG-Authorization': "SPIDERGAUTH "+ username
                    },dataType: 'text',
           success: function (data) 
            {
              //console.log(data); 
			  $("#resetpass").css("display","block");
			  $("#login-form").css("display","none");
            	alert('Please check resetcode sent to your Phone/Email');
				
			},
            error: function (err) {
              console.log(err);
               
              }
        });
	}
	function resetpassword()
	{  
	
	var username=$("#loginUsername").val();
	console.log(username);
	var password=$("#password").val();
	var resetcode=$("#resetcode").val();
	var user ={"resetcode":resetcode,"username":username,"newpassword":password}
	   var objectDataString = JSON.stringify(user);
		$.ajax({ type: "POST",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user/resetpassword?resetcode="+resetcode+"&username="+username+"&newpassword="+password,
            headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                         'SPIDERG-Authorization': "SPIDERGAUTH "+ username
                    },dataType: 'text',
           success: function (data) 
            {
               
            	alert('Password Changed SuccessFully');
				window.location.href = "/signup.php";
			},
            error: function (err) {
			alert('Password Could not be Updated, Please Try Again');
			window.location.href = "/forgetpassword.php";
              console.log(err);
               
              }
        });
	}
</script>
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
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
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