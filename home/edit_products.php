<!DOCTYPE html>
<?php 
session_start();
include('include/dbconnection.php');
if($_SESSION['user_id'] == ''){
    header('Location: ../index.php');
 }
?>
<html lang="en">
<head>
<!-- <input type="text" id="lt" value="">
<input type="text" id="lts" value="">
<input type="text" id="user_email" value="<?php //echo $_SESSION['user_email']; ?>">
<input type="text" id="password" value="<?php //echo $_COOKIE['password']; ?>"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmerz | Panel</title>
    <!-- Bootstrap core CSS -->
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
    <link rel="stylesheet" href="../css/parsley_validation.css" />
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
  <!-- page content -->
     <div class="right_col" role="main">
  <div class="">
      <div class="clearfix"></div>
   <div class="row">
   <div class="col-md-offset-2 col-md-8 col-xs-12">
       <div class="x_panel">
    <div class="x_title">
        <h2>Edit Product</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />
        <form class="form-horizontal form-label-left"  enctype="multipart/form-data"  method="post" id="edit_product">
     <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="text" class="form-control" label="Product Name" parsley-required="true" id="p_name"  name="p_name" required placeholder="Product Name">
      <input type="hidden"   id="p_nameold"  name="p_nameold" >
         </div>
     </div>
     <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
        <select id="drpdwn" class="form-control"    name="drpdwn"></select>
            <!--  <input type="text" class="form-control" id="uom" placeholder="UOM"> -->
         </div>
     </div>
     <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Category</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
        <select id="catdrpdwn"  class="form-control" required name="catdrpdwn"></select>

            <!--  <input type="text" class="form-control" id="uom" placeholder="UOM"> -->
         </div>
     </div>
      <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">SKU</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="text"   class="form-control" id="sku" name="sku" placeholder="sku">
         </div>
     </div>
           <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">UPC</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="text"   class="form-control" id="upc"  name="upc" placeholder="upc">
         </div>
     </div>
     <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">Notes</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="text"   class="form-control" id="notes" name="notes" placeholder="Notes">
         </div>
     </div>
           	 <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">is purchased</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="radio"  value="Y" name="ispurchased"   id="purchas_y"> Yes
      <input type="radio" value="N" name="ispurchased" id="purchas_n"> No
         </div>
     </div>
       <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">issold</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
       <input type="radio" value="Y" name="issold"  id="sold_y"> Yes
      <input type="radio" value="N" name="issold" checked id="sold_n"> No
         
         </div>
     </div>
       <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">ispublic</label>
         <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="radio" value="Y" name="ispublic" checked id="public_y"> Yes
      <input type="radio" value="N" name="ispublic" id="public_n"> No
         
         </div>
     </div>
										 <div class="form-group">Select Image<div class="col-md-7 col-sm-7 col-xs-12">
								<img src="" id="profileimage"  class="img-responsive"> </div>
         <div class="col-md-5 col-sm-5 col-xs-12">  
									<input type="file"   class="form-control  input-sm" name="file_profileimage"/> 
								 </div>  
								 </div>  
     <div class="ln_solid"></div>
     <div class="form-group">
         <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
      <button type="reset" class="btn btn-primary">Cancel</button>
      <button type="submit" name="submit"  class="btn btn-success">Save</button>
         </div>
     </div>
        </form>
    </div>
       </div>
   </div>
      </div>
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
 <input type="hidden" class="form-control" id="uom_id" ><br>
  <input type="text" class="form-control" id="pro_cat" >
  <input type="hidden" id="uom_name">
<div id="custom_notifications" class="custom-notifications dsp_none">
<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
</ul>
<div class="clearfix"></div>
 <div id="notif-group" class="tabbed_notifications"></div>
 </div>
 <script src="js/bootstrap.min.js"></script> 
 <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- richtext editor -->
 <script src="js/editor/bootstrap-wysiwyg.js"></script>
 <script src="js/editor/external/jquery.hotkeys.js"></script>
 <script src="js/editor/external/google-code-prettify/prettify.js"></script>
 <!-- select2 --> 
 <!-- form validation -->
 <script type="text/javascript" src="js/parsley/parsley.min.js"></script>
 <!-- textarea resize -->
 <script src="js/textarea/autosize.min.js"></script>
 <script>
     autosize($('.resizable_textarea'));
 </script>
 <!-- Autocomplete -->
 <script type="text/javascript" src="js/autocomplete/countries.js"></script>
 <script src="js/autocomplete/jquery.autocomplete.js"></script> 
 <script src="js/custom.js"></script>
 <script type="text/javascript" src="../js/application/custom.js"></script>
 <script type="text/javascript" src="../js/application/ankcustm.js"></script>
 <script type="text/javascript" src="../js/parsley.js"></script>
 <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
 <script type="text/javascript"> 
 var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
     var pro_id = "<?php echo $_GET['id']; ?>";
	
var loginTokenTS = "";
var loginToken = "";
$(document).ready(function () { 
    spiderG.getLoginToken(username, function () { 
        loginToken = spiderG['loginToken'];
        loginTokenTS = spiderG['loginTokenTS'];
        $.ajax({
            type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/" + pro_id, headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data, textStatus) {
                people = data;
                $('#p_name').val(people.name);
                $('#p_nameold').val(people.name);
                $('#sku').val(people.sku);
                $('#upc').val(people.upc);
                $('#notes').val(people.notes);
                if (people.imgurl == "null" || people.imgurl == "" || people.imgurl == null) {
                    $('#profileimage').css("visibility", "hidden");
                } 
		       for (var j = 0; j < categorylistparsed.length; j++) {
                 $('#catdrpdwn').append('<option value="' + categorylistparsed[j].id + '"> ' + categorylistparsed[j].name + '</option>'); 
                }
                $('#profileimage').attr('src', people.imgurl);
                $('#catdrpdwn').val(people.category_id);
                if (people.ispurchased == 'Y') { $('#purchas_y').attr('checked', true); } else { $('#purchas_n').attr('checked', true); }
                if (people.ispublic == 'Y') { $('#sold_y').attr('checked', true); } else { $('#sold_n').attr('checked', true); }
                if (people.issold == 'Y') { $('#public_y').attr('checked', true); } else { $('#public_n').attr('checked', true); }
                get_uomname(people.uom);
            },
            error: function (err) { console.log(err); }
        });
    }); 
    function get_uomname(id) {
        $.ajax({
            type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom/" + id, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                people = data;
                get_uom(people.name);
            }, error: function (err) { console.log(err); }
        });
    }
    function get_uom(uom_name) {
        $.ajax({
            type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom", contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                people = data;
                for (var j = 0; j < people.length; j++) {
                    $("#drpdwn option:selected").text(uom_name);
                    $('#drpdwn').append('<option value="' + people[j].id + '">' + people[j].name + '</option>');
                }
            },
            error: function (err) {
                console.log(err);

            }
        });
    } 
    function updateproduct(username, password) {
        var p_id = "<?php echo $_GET['id']; ?>";
        var p_name = $('#p_name').val();
        var p_nameold = $('#p_nameold').val();
        var uom = $('#drpdwn').val();
        var category = $('#catdrpdwn').val();
        var sku = $('#sku').val();
        var upc = $('#upc').val();
        var notes = $('#notes').val();
        if ($('#edit_product').parsley('validate')) {
            if (p_name != '' && category !== '') {
                var product = {
                    "id": p_id,
                    "name": p_name,
                    "uom": uom,
                    "category_id": category,
                    "sku": sku,
                    "upc": upc,
                    "notes": notes,
                }; 
                var objectDataString = JSON.stringify(product); 
                spiderG.getLoginToken(username, function () {
                    var loginToken = spiderG['loginToken'];
                    var loginTokenTS = spiderG['loginTokenTS'];
                    $.ajax({
                        type: "PUT",
                        url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product",
                        contentType: 'application/json',
                        contentLength: objectDataString.length,
                        headers: {
                            'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                            'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)
                        },
                        data: objectDataString,
                        success: function (data, textStatus) {
                            //console.log(data);
                            alert('Success');
                            window.location = "show_product.php";
                        },
                        error: function (err) {
                            console.log(err);

                        }
                    });

                });
            }
        }
    }
}); 
<?php  include 'src/Cloudinary.php';
 include 'src/Uploader.php'; 
 include 'src/settings.php'; 
if(isset($_POST['submit'])){ 
$files = array(); 
   if($_FILES['file_profileimage']['name']!='')
    {  $img_name = $_FILES['file_profileimage']['name'];  
 $time=date('dmyims');
 $image2=$time.$img_name;
 move_uploaded_file($_FILES["file_profileimage"]["tmp_name"],"uploads/".$image2); 
		 $ad_image= getcwd(). DIRECTORY_SEPARATOR ."uploads". DIRECTORY_SEPARATOR .$image2;   
		$default_upload_options = array("tags" => "basic_sample");
		$eager_params = array("width" => 200, "height" => 150, "crop" => "scale");
		
		global $files,$default_upload_options, $eager_params; 
		$files = \Cloudinary\Uploader::upload($ad_image, array_merge($default_upload_options, array("width" => 200,"height" => 200,"crop" => "fit","effect" => "saturation:0",)));
		 
    }   ?>
	$( document ).ready(function() 
 { 
		var imgurl='<?php if(isset($files["url"])){ echo $files["url"];} else { echo "";} ?>';
			var product={} 
			<?php if($_POST['p_name']==$_POST['p_nameold']){?>
			if(imgurl==""){
			 product = {"id":"<?php echo $_GET['id']; ?>","uom":"<?php if(isset($_POST['drpdwn'])){echo $_POST['drpdwn'];}else{echo '';} ?>","category_id":"<?php echo $_POST['catdrpdwn']; ?>","sku":"<?php echo $_POST['sku']; ?>","upc":"<?php echo $_POST['upc']; ?>","ispurchased":"<?php echo $_POST['ispurchased']; ?>","issold":"<?php echo $_POST['issold']; ?>","ispublic":"<?php echo $_POST['ispublic']; ?>","notes":"<?php echo $_POST['notes']; ?>",};
			}else{  
			  product = {"id":"<?php echo $_GET['id']; ?>","uom":"<?php if(isset($_POST['drpdwn'])){echo $_POST['drpdwn'];}else{echo '';} ?>","category_id":"<?php echo $_POST['catdrpdwn']; ?>","sku":"<?php echo $_POST['sku']; ?>","upc":"<?php echo $_POST['upc']; ?>","ispurchased":"<?php echo $_POST['ispurchased']; ?>","issold":"<?php echo $_POST['issold']; ?>","ispublic":"<?php echo $_POST['ispublic']; ?>","notes":"<?php echo $_POST['notes']; ?>","imgurl":imgurl,}
			} 
			<?php }else{?>
			if(imgurl==""){
			 product = {"id":"<?php echo $_GET['id']; ?>","name":"<?php echo $_POST['p_name']; ?>","uom":"<?php if(isset($_POST['drpdwn'])){echo $_POST['drpdwn'];}else{echo '';} ?>","category_id":"<?php echo $_POST['catdrpdwn']; ?>","sku":"<?php echo $_POST['sku']; ?>","upc":"<?php echo $_POST['upc']; ?>","ispurchased":"<?php echo $_POST['ispurchased']; ?>","issold":"<?php echo $_POST['issold']; ?>","ispublic":"<?php echo $_POST['ispublic']; ?>","notes":"<?php echo $_POST['notes']; ?>",};
			}else{  
			  product = {"id":"<?php echo $_GET['id']; ?>","name":"<?php echo $_POST['p_name']; ?>","uom":"<?php if(isset($_POST['drpdwn'])){echo $_POST['drpdwn'];}else{echo '';} ?>","category_id":"<?php echo $_POST['catdrpdwn']; ?>","sku":"<?php echo $_POST['sku']; ?>","upc":"<?php echo $_POST['upc']; ?>","ispurchased":"<?php echo $_POST['ispurchased']; ?>","issold":"<?php echo $_POST['issold']; ?>","ispublic":"<?php echo $_POST['ispublic']; ?>","notes":"<?php echo $_POST['notes']; ?>","imgurl":imgurl,}
			} <?php } ?>
   var objectDataString = JSON.stringify(product);
    
   var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
       spiderG.getLoginToken(username, function()
       {
    var loginToken = spiderG['loginToken'];
    var loginTokenTS = spiderG['loginTokenTS'];
    $.ajax({
        type: "PUT",
        url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product",
        contentType:'application/json',
        contentLength:objectDataString.length,
        headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
     'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
       },
      data : objectDataString,
      success: function (data ,textStatus) 
      {
   
   alert('Product has been SuccessFully Updated');
   window.location = "show_product.php";    
      },
      error: function (err) {
						  alert('Error while Saving Product');
   window.location = "show_product.php";    
        console.log(err);
         
        }
    });

     }); }); 
		<?php
} ?></script> 
<?php  include('loader.php');?>
</body>

</html>