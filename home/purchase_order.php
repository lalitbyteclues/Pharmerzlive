<!DOCTYPE html>
<?php session_start();
include('include/dbconnection.php');
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
   <div class="right_col" role="main">
       <div class="">
  <div class="clearfix"></div>
      <div class="row"> 
	  <div class="col-md-offset-1 col-md-9 col-xs-12">
 <div class="x_panel">
     <div class="x_title">
<h2>Generate Purchase Order</h2>
<div class="clearfix"></div>
     </div>
     <div class="x_content">
<br />
<form class="form-horizontal form-label-left" id="po">
  <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Compnay Email</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
				<input type="text" readonly class="form-control" id="remail" /> 
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Compnay Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
   <label  id="compnayname" ></label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Ordered</label>
        <div class="col-md-3" id="dateordered" >  
        </div>
		<label class="control-label col-md-3 col-sm-3 col-xs-3">Date Promised</label>
        <div class="col-md-3" id="datepromised1"> 
        </div>
    </div> 
     <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Product Name</label>
        <div  class="col-md-3"  id="p_name"> 
        </div>
		 <label class="control-label col-md-3 col-sm-3 col-xs-3">Category Name</label>
        <div  class="col-md-3"  id="category_name"> 
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">UOM</label>
        <div class="col-md-3 col-sm-9 col-xs-9">
        <label id="uom"></label> 
        </div>    <label class="control-label col-md-3 col-sm-3 col-xs-3">Tax Applicapable</label>
        <div class="col-md-3 col-sm-9 col-xs-9" id="taxdata">
   
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Quantity *</label>
        <div class="col-md-3 col-sm-9 col-xs-9"> 
   <input type="text" label="Quantity" parsley-required="true"  onkeypress='javascript:return isNumber(event)'  class="form-control" id="quantity" placeholder="Enter Quantity" > 
        </div>  <label class="control-label col-md-3 col-sm-3 col-xs-3">Price *</label>
        <div class="col-md-3 col-sm-9 col-xs-9">  
				<input type="text" label="Price" parsley-required="true" class="form-control" id="price" placeholder="Enter Price" > 
        </div>
    </div>  
		 <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Gross Total</label>
        <div class="col-md-3 col-sm-9 col-xs-9">
		<input type="hidden" id="linegrossamount" />
					<input type="text" label="Grand Total" parsley-required="true" readonly class="form-control" id="linenetamount" placeholder="Grand Total" />
        </div>
		  <label class="control-label col-md-3 col-sm-3 col-xs-3">Tax Amount *</label>
        <div class="col-md-3 col-sm-9 col-xs-9"> 
				<input type="text" label="taxamt" parsley-required="true" readonly class="form-control" id="taxamt" placeholder="Enter Tax Amount" /> 
        </div>
    </div> 
	 <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Total Lines</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
   <input type="text" label="Total Lines" parsley-required="true" class="form-control" readonly id="totallines" placeholder="Total Lines" >
        </div>
    </div>
	<div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Grand Total</label>
       <div class="col-md-3 col-sm-9 col-xs-9">
		<input type="text" label="Grand Total" readonly parsley-required="true" class="form-control" id="grandtotal" placeholder="Grand Total" >
        </div>  <label class="control-label col-md-3 col-sm-3 col-xs-3">Currency</label>
        <div class="col-md-3 col-sm-9 col-xs-9" id="currency"> 
        </div>
    </div>  
  <!--   <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Promised *</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
   <input type="text" label="Date Promised" parsley-required="true" class="date-picker form-control" id="datepromised" >
        </div>
    </div> -->
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Delivery Location</label>
        <div class="col-md-3 col-sm-3 col-xs-3">
 <span><strong>Address Line 1</strong></span><br>
 <span id="deliveryloc1"></span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
 <span><strong>Address Line 2</strong></span><br>
 <span id="deliveryloc2"></span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
 <span><strong>postalcode</strong></span><br>
 <span id="deliveryloc3"></span>
        </div>
    </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Delivery Location</label>
        <div class="col-md-3 col-sm-3 col-xs-3">
 <span><strong>City</strong></span><br>
 <span id="deliveryloc4"></span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
 <span><strong>Region</strong></span><br>
 <span id="deliveryloc5"></span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
 <span><strong>City</strong></span><br>
 <span id="deliveryloc6"></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Notes</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
   <input type="text" class="form-control" id="notes" placeholder="Notes" >
        </div>
    </div> 
     <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Delivery Terms</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
   <input type="text" class="form-control" id="deliveryterms" placeholder="Delivery Terms" >
        </div>
    </div> 
   <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
   <button type="reset" class="btn btn-primary">Cancel</button>
   <button type="button" onclick="sendpo('<?php echo $_SESSION['user_email']; ?>','<?php echo $_COOKIE['password']; ?>')" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
     </div>
 </div>
</div> 
  </div>
  </div>
<input type="hidden" id="hidden_date">
<input type="hidden" id="baprtid">
<input type="hidden" id="dloctaion">
<input type="hidden" id="qtnlineid" value="">
<input type="hidden" id="qtnid" value="">
<input type="hidden" id="uom_id">
<input type="hidden" id="pro_id"> 
<input type="hidden" id="tax">
<input type="hidden" id="taxrate"> 
<input type="hidden" id="lineno"> 
       <footer>
  <div class="">
      <p class="pull-right">
  <a href="index.php" class="site_title"><img style="width:150px" class="img-responsive" src="/images/pharmerz_logo2 .png"></a>
      </p>
  </div>
  <div class="clearfix"></div>
       </footer>
   </div>
</div>
   </div>
<div id="custom_notifications" class="custom-notifications dsp_none">
   <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
   </ul>
   <div class="clearfix"></div>
   <div id="notif-group" class="tabbed_notifications"></div>
   </div>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- richtext editor -->
       <script src="js/input_mask/jquery.inputmask.js"></script> <!-- select2 -->
        <script type="text/javascript">
      $(document).ready(function () {
$("#price").on("keyup", function() {
 var quantity=$("#quantity").val();
	var price=$("#price").val();
	var taxrate=$("#taxrate").val();
	var totalamount=price * quantity;
	$("#linenetamount").val(totalamount);  
	 var taxamountcalculated=(totalamount*(taxrate/100)).toFixed(2);
	$("#taxamt").val(taxamountcalculated); 
	var amountaftertax=parseFloat(totalamount) + parseFloat(taxamountcalculated);
	$("#grandtotal").val(amountaftertax);  
	  $("#totallines").val(totalamount);
	$("#linegrossamount").val(amountaftertax);  
});
$( "#quantity" ).on("keyup", function() {
 var quantity=$("#quantity").val();
	var price=$("#price").val();
	var taxrate=$("#taxrate").val();
	var totalamount=price * quantity;
	$("#linenetamount").val(totalamount);  
	 var taxamountcalculated=(totalamount*(taxrate/100)).toFixed(2);
	$("#taxamt").val(taxamountcalculated); 
	var amountaftertax=parseFloat(totalamount) + parseFloat(taxamountcalculated);
	$("#grandtotal").val(amountaftertax);  
	$("#linegrossamount").val(amountaftertax);  
	 $("#totallines").val(totalamount);
});
 
 $('#datepromised').daterangepicker({
     singleDatePicker: true,
     calender_style: "picker_4"
 }, function (start, end, label) {
      
 });
});
  </script>
<script type="text/javascript" src="js/moment.min2.js"></script>
<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="../js/application/custom.js"></script>
<script type="text/javascript" src="../js/application/ankcustm.js"></script>
<script type="text/javascript" src="../js/parsley.js"></script>
<script src="http://pharmerz.com/admin/js/md5.js"></script>
<script type="text/javascript">  
 $(document).ready(function(){
      var org_id = "<?php echo $_GET['id']; ?>";
      var username = "<?php echo $_SESSION['user_email']; ?>";
      var password = "<?php echo $_COOKIE['password']; ?>";
      spiderG.getLoginToken(username, function()
        {
           var loginToken = spiderG['loginToken'];
           var loginTokenTS = spiderG['loginTokenTS'];
           $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/quotation/"+org_id,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization':"SPIDERGAUTH "+createAuthenticationHeader(username,password,loginToken,loginTokenTS)},
		   success: function (data){
      people = data;  
      var hidden_date = $("#hidden_date").val(people.dateordered); 
      var dloctaion = $("#dloctaion").val(people.deliverylocation); 
      getdeliveryloc(people.deliverylocation);
	   $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox/quotation/"+people.id,contentType:'application/json',headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success:function (data){
	   mailboxlist = data; 
	    var baprtid = $("#baprtid").val(mailboxlist.senderorg);
	  $("#remail").val(mailboxlist.senderemail);
  $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org?extensionid=7D6AACFA15614E1CBE3626B7513191F0&orgid="+mailboxlist.senderorg,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (orgparsed){
  $("#compnayname").html(orgparsed.name);
  }});
	   }});
     
      $("#currency").html(people.currency);
      $("#grandtotal").val(people.grandtotal);
      $("#totallines").val(people.totallines);
      var currdate = new Date(people.dateordered * 1000);
      var finl_date = currdate.getDate() + '/' + (currdate.getMonth() + 1) + '/' + currdate.getFullYear();
      $("#dateordered").html(finl_date);   
      var currdate1 = new Date(people.datepromised*1000);
      var finl_date1 = currdate1.getDate() + '/' + (currdate1.getMonth() + 1) + '/' + currdate1.getFullYear();
      $("#datepromised1").html(finl_date1);
      if(people.lineitems[0]){ $("#quantity").val(people.lineitems[0].quantity); 
	  $("#qtnlineid").val(people.lineitems[0].id); 
	  $("#qtnid").val(people.id); 
	  $("#lineno").val(people.lineitems[0].lineno);  $("#price").val(people.lineitems[0].price);  
	   $.ajax({type: "GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/tax/"+people.lineitems[0].tax,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (peopletax){
												 $("#taxdata").html(peopletax.name+"("+peopletax.rate+"%)");
												  $("#taxrate").val(peopletax.rate); 
								}}); 
      $("#tax").val(people.lineitems[0].tax);
	  $("#taxamt").val(people.lineitems[0].taxamt);
	  $("#linenetamount").val(people.totallines); 
	  $("#linegrossamount").val(people.grandtotal);  getproname(people.lineitems[0].product) ; getuom(people.lineitems[0].uom); }
  },
  error: function (err) {
  console.log(err);
   
  }
       });
   });
        });

function getproname(product)
{
   var username = "<?php echo $_SESSION['user_email']; ?>";
   var password = "<?php echo $_COOKIE['password']; ?>";

   var loginToken = spiderG['loginToken'];
   var loginTokenTS = spiderG['loginTokenTS'];
   $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/"+product,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization':"SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){
		people1 = data; 
		$("#p_name").html(people1.name);
		 categoryname=$.grep(categorylistparsed,function (category){return category.id == people1.category_id })[0].name; 
		 
		$("#category_name").html(categoryname);
		$("#pro_id").val(people1.id);
        },error: function (err) {
       console.log(err);
        
       }
   }); }

function getuom(uomid)
{
   var username = "<?php echo $_SESSION['user_email']; ?>";
   var password = "<?php echo $_COOKIE['password']; ?>";
   var loginToken = spiderG['loginToken'];
   var loginTokenTS = spiderG['loginTokenTS'];
   $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom/"+uomid,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){
		people1 = data; 
		$("#uom").html(people1.name);
		$("#uom_id").val(people1.id); 
       },
       error: function (err) { 
       }
   });
  }

function getdeliveryloc(delivryloc)
{      var username = "<?php echo $_SESSION['user_email']; ?>";
       var password = "<?php echo $_COOKIE['password']; ?>";  
       var loginToken = spiderG['loginToken'];
       var loginTokenTS = spiderG['loginTokenTS'];
       $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location/"+delivryloc,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){  
     people1 = data; 
     $("#deliveryloc1").html(people1.addressline1);
     $("#deliveryloc2").html(people1.addressline2);
     $("#deliveryloc3").html(people1.postalcode);
     $("#deliveryloc4").html(people1.city);
     $("#deliveryloc5").html(people1.region);
     $("#deliveryloc6").html(people1.country);
  },
  error: function (err) {
  console.log(err);
   
  }
       });
   }
        </script>

 
<?php  include('loader.php');?>  
</body>
<style>
.form-horizontal .control-label{padding-top:0px;}
</style>
</html>