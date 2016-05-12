<?php session_start(); 
include('include/dbconnection.php'); ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Pharmerz | Panel</title> 
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <!-- editor -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/editor/index.css" rel="stylesheet">
    <!-- select2 -->
    <link href="css/select/select2.min.css" rel="stylesheet">
    <!-- switchery -->
    <link rel="stylesheet" href="css/switchery/switchery.min.css" /> 
    <script src="js/jquery.min.js"></script> 
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]--> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		 
</head> 
<body class="nav-md"> 
    <div class="container body"> 
        <div class="main_container"> 
           <?php include('sidebar.php'); ?> 
            <!-- /top navigation --> 
            <!-- page content -->
            <div class="right_col" role="main">
                <div class=""> 
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Edit profile</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <br />
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <form id="personneldetails" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                 <div class="title_left">
                                    <h3>General Info</h3>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control"  pattern=".{3,}" required title="3 characters minimum" name="name" id="name" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">firstname 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control"  pattern=".{3,}" required  title="3 characters minimum" name="firstname" id="firstname" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">lastname 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control"  pattern=".{3,}" required  title="3 characters minimum" name="lastname" id="lastname" type="text" value="">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">username 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control"  pattern=".{4,}" required  title="4 characters minimum" name="username" id="username" type="text" value="">
                                   </div>
                                </div> 
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">email 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control"  pattern=".{6,}" required title="6 characters minimum"  name="email" id="email" type="email" value="">
                                   </div>
                                </div> 
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">phone 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control" name="phone"  pattern=".{10,}" required title="10 Numbers minimum"  id="phone" type="text" value="">
                                   </div>
                                </div>  <input class="form-control" readonly name="password" id="password" type="hidden" value="<?php echo $_COOKIE['password']; ?>">
								<div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">gsid 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control" readonly name="gsid" id="gsid" type="text" value="">
                                   </div>
                                </div> 
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">active 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control" readonly name="active" id="active" type="text" value="">
                                   </div>
                                </div>  
                               <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control" name="id" id="id_usr" type="hidden" value="">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="submit"  class="btn btn-primary" value="Save">
                                    </div>
                                </div>
                            </form>
                         </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
						 <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" >
                                <div class="title_left">
                                    <h3>Profile Image</h3>
                                </div> 
                                <div class="form-group">
								<img src="" id="profileimage" class="img-responsive"> 
                                </div><div class="col-md-6">
								 <div class="form-group">   
								 <input type="file" required class="form-control  input-sm" name="file_profileimage"/> </div> </div> <div class="col-md-6">
								 <div class="form-group">   
									   <input type="submit" name="submit"   class="btn btn-primary" value="Submit" />
                                    </div>  
                                    </div>
						</form> 
                    </div>
                </div>
                    <div class="clearfix"></div>                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <br />
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <form id="addressdetails" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                 <div class="title_left">
                                    <h3>Address Details</h3>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address line 1 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
									 <input   name="id" id="id" type="hidden" value="">
									 <input   name="orgid" id="orgid" type="hidden" value="">
                                        <input class="form-control"   name="addln_1" id="addln_1" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address line 2 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control"    name="addln_2" id="addln_2" type="text" value="">
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control" name="city" id="city" type="text" value="">
                                   </div>
                                </div> -->  
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pincode 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control" name="pincode"    id="pincode" type="text" value="">
                                   </div>
                                </div>

                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control"  required  onchange="getregionslist(this.value);"  id="country"></select>
                                    </div>
                                </div> 
								<div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Region</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select     class="form-control" onchange="getcitylist(this.value);"   id="region"></select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select    class="form-control" id="city"></select>
                                    </div>
                                </div> 
                                <div id="ano_add" >  
                                </div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="submit"   class="btn btn-primary" value="Save">
                                    </div>
                                </div>
                            </form>
                         </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="title_left">
                                    <h3>Change Password</h3>
                                </div> 
                                <div class="form-group" id="login-form">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="button" name="" onclick="changepassword('<?php echo $_SESSION['user_email']; ?>','<?php echo $_COOKIE['password']; ?>')" class="btn btn-primary" value="Reset Password">
                                    </div>
                                </div>
								  <form id="resetpass" method="get" role="form" style="display: none;">
						  <BR>
						  <BR> 
                            <div class="form-group">
                              <input type="text" name="resetcode" id="resetcode" tabindex="1" class="form-control"  pattern=".{6,}" required   placeholder="Enter Reset Code" value="">
                            </div> 
							<div class="form-group">
                              <input type="password" name="password" id="password" tabindex="1" class="form-control"   pattern=".{6,}" required   placeholder="Enter New Password" value="">
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                  <input type="button" name="login-submit" id="login-submit"
								  tabindex="4"  class="btn btn-primary"  value="Reset Password" onClick="resetpassword()">
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
                <div class="clearfix"></div>
            </div>
                <!-- /page content -->

                <!-- footer content -->
               
             <footer>
                    <div class="">
                        <p class="pull-right">
                             <a href="index.php" class="site_title"><img style="width:150px" class="img-responsive" src="/images/pharmerz_logo2 .png"></a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>

        </div>
    </div>

       
        <script src="js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
    
        <!-- richtext editor -->
        <script src="js/editor/bootstrap-wysiwyg.js"></script>
        <script src="js/editor/external/jquery.hotkeys.js"></script>
        <script src="js/editor/external/google-code-prettify/prettify.js"></script>
        <!-- select2 -->
       
        
        <script src="js/custom.js"></script>
 <script type="text/javascript" src="../js/application/custom.js"></script>
        <script type="text/javascript" src="../js/application/ankcustm.js"></script>
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>

<!--<script>
function showhide()
{
   var a = document.getElementById('').value;

}

</script>-->


 <script type="text/javascript">
    $("#same_add").change(function () {
   $("#ano_add").toggle();
});
    </script> 


<script type="text/javascript">
 $('#personneldetails').submit(function(e) {
updateprofile('<?php echo $_SESSION['user_email']; ?>','<?php echo $_COOKIE['password']; ?>');		 
		 return false;
 } );
  $('#addressdetails').submit(function(e) {
updatadd('<?php echo $_SESSION['user_email']; ?>','<?php echo $_COOKIE['password']; ?>');		 
		 return false;
  } );
function getregionslist(id){
	 console.log("test by lalit 2");
	 if(id.length>0){
	  var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/region?country="+id,headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) {
                    people = data; 
					 $('#region').html('');
					 $('#region').append('<option value="">Select Region</option>'); 
                   for(var j=0; j< people.length; j++)
                   {
                     $('#region').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   }
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

	 }); }else{ $('#region').html('');
					 $('#region').append('<option value="">Select Region</option>'); }	 
 }
 	function resetpassword()
	{  
	var username="<?php echo $_SESSION['user_email']; ?>";
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
				window.location.href = "/home/profile.php";
			},
            error: function (err) {
			alert('Password Could not be Updated, Please Try Again');
			window.location.href = "/home/profile.php";
              console.log(err);
               
              }
        });
	}
 function getcitylist(id){
	 console.log("test by lalit");
	 if(id.length>0){
	  var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/city?regionid="+id,headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) {
                    people = data; 
					 $('#city').html('');
					 $('#city').append('<option value="">Select City</option>'); 
                   for(var j=0; j< people.length; j++)
                   {
                     $('#city').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   } 
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

	 }); }else{ $('#city').html('');
					 $('#city').append('<option value="">Select City</option>'); }	 
 }
        $( document ).ready(function() 
        {  
		
 function getregionslistnew(id,regionid,cityid){ 
	 if(id.length>0){
	  var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/region?country="+id,headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) {
                    people = data; 
					 $('#region').html('');
					 $('#region').append('<option value="">Select Region</option>'); 
                   for(var j=0; j< people.length; j++)
                   {
                     $('#region').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   }
				   
$("#region option").filter(function() {return $(this).text() == regionid;}).prop('selected', true);
getcitylist($("#region").val(),cityid);   
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

	 }); }else{ $('#region').html('');
					 $('#region').append('<option value="">Select Region</option>'); }	 
 }

 function getcitylist(id,cityid){
	 if(id.length>0){
	  var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/city?regionid="+id,headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) {
                    people = data; 
					 $('#city').html('');
					 $('#city').append('<option  value="">Select City</option>'); 
					
                   for(var j=0; j< people.length; j++)
                   {
					   var selected=(people[j].id==cityid);
                     $('#city').append('<option selected="'+selected+'" value="'+ people[j].id +'">'+ people[j].name +'</option>');  
					 
                   }  
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

	 }); }else{ $('#city').html('');
					 $('#city').append('<option value="">Select City</option>'); }	 
 }
 
 
         	var username = "<?php echo $_SESSION['user_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";
			  
            spiderG.getLoginToken(username, function()
            {
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
			   $.ajax({type: "GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/country",headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},
                success: function (data) 
                {
                  people = data;
				 $('#country').html('<option value="">Select Country</option>');  
				   $('#region').html('<option value="">Select Region</option>'); 
				   $('#city').html('<option value="">Select City</option>'); 	  
                   for(var j=0; j< people.length; j++)
                   {
                     $('#country').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   } 
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user/me",headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                             'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                        }, 
                success: function (data) 
                { 
                   people = data; 
                   $('#name').val(people.name);
                    $('#firstname').val(people.firstname);
                    $('#lastname').val(people.lastname);
                    $('#id_usr').val(people.id);
                    $('#email').val(people.email);
                    $('#username').val(people.username);
                    $('#phone').val(people.phone);
					$('#profileimage').attr('src', people.imgurl); 
					if( people.imgurl=="null" || people.imgurl=="" || people.imgurl==null){
						$('#profileimage').css("visibility","hidden");
					}
                    //$('#password').val(people.password);
                    $('#gsid').val(people.gsid);
                    $('#active').val(people.active);
					$.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org/me",contentType:'application/json',headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (orgforlocation){
					   $("#orgid").val(orgforlocation.id);  
					 if (!(orgforlocation.location =="" || orgforlocation.location =="null" || orgforlocation.location ==null)){
					$.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location/"+orgforlocation.location,contentType: 'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},
            success: function (singlelocation) {   
$("#addln_1").val(singlelocation.addressline1);
$("#addln_2").val(singlelocation.addressline2);
$("#pincode").val(singlelocation.postalcode);
$("#country option").filter(function() {return $(this).text() == singlelocation.country;}).prop('selected', true); 
getregionslistnew($("#country").val(),singlelocation.region,singlelocation.city);
$("#id").val(singlelocation.id);  
                    },error: function (err) { console.log(err);$(".se-pre-con").fadeOut("slow"); }
					 });}
					
					}});
					
<?php 
		 include 'src/Cloudinary.php';
 include 'src/Uploader.php'; 
 include 'src/settings.php';
if($_SESSION['user_id'] == ''){ header('Location: ../index.php');  } 
if(isset($_POST['submit'])){
   if($_FILES['file_profileimage']['name']!='')
    {   
        $img_name = $_FILES['file_profileimage']['name'];  
        $time=date('dmyims');
        $image2=$time.$img_name;
        move_uploaded_file($_FILES["file_profileimage"]["tmp_name"],"uploads/".$image2); 
		 
		 $ad_image= getcwd(). DIRECTORY_SEPARATOR ."uploads". DIRECTORY_SEPARATOR .$image2;   
		$default_upload_options = array("tags" => "basic_sample");
		$eager_params = array("width" => 200, "height" => 150, "crop" => "scale");
		$files = array(); 
		global $files,$default_upload_options, $eager_params; 
		$files = \Cloudinary\Uploader::upload($ad_image, array_merge($default_upload_options, array("width" => 200,"height" => 200,"crop" => "fit","effect" => "saturation:0",)));
		 ?>
	 
		  $( document ).ready(function() 
        {
			var id_usr = $('#id_usr').val();
			var name = $('#name').val();
			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val(); 
			var email = $('#email').val();
			var username = '<?php echo $_SESSION['user_email']; ?>';
			var phone = $('#phone').val();
			var password = '<?php echo $_COOKIE['password']; ?>';
			var gsid = $('#gsid').val();
			var active = $('#active').val();
			var imgurl='<?php echo $files["url"]?>';
    var user_data = { "id": id_usr,"name": name,"firstname": firstname,"lastname": lastname,"email": email,"username": username,"phone": phone,"password": password,"gsid": gsid,     "active": active,"imgurl":imgurl,   };
    var objectDataString = JSON.stringify(user_data); 
    spiderG.getLoginToken(username, function () {
        var loginToken = spiderG['loginToken'];
        var loginTokenTS = spiderG['loginTokenTS'];
        $.ajax({
            type: "PUT",
            url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user",
            contentType: 'application/json',
            contentLength: objectDataString.length,
            headers: {
                'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)
            },
            data: objectDataString,
            success: function (data, textStatus) { 
					$('#profileimage').attr('src',imgurl); 
					 localStorage.setItem('imgurl', imgurl);
					  $('#profileimg').attr('src',imgurl); 
						 $('#upsideprofileimage').attr('src',imgurl); 
                alert('SuccessFull Changed Your Profile Image');

            },
            error: function (err) {
                console.log(err);
                
            }
        });

    }); }); 
		<?php
    }  
}

		
		?>
				},
                error: function (err) {
                  console.log(err);
                   
                  }
              }); },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

            });  
       
    });

	function changepassword(username)
	{		
		$.ajax({
                
            type: "GET",
            url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user/resetpassword?username="+username,
            headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                         'SPIDERG-Authorization': "SPIDERGAUTH "+ username
                    },dataType: 'text',
           success: function (data) 
            {
               $("#resetpass").css("display","block");
			  $("#login-form").css("display","none");
            	alert('Please check resetcode sent to your Phone/Email');
			},
            error: function (err) {
              console.log(err);
               
              }
        });
	}
</script>
   
<?php  include('loader.php');?>  
        <!-- /form validation -->
        <!-- editor -->
        
        <!-- /editor -->
</body>

</html>
