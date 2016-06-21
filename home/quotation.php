<!DOCTYPE html>
<?php 
session_start();
include('include/dbconnection.php'); ?>
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
                                    <h2>Send Quotation</h2> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" id="sendqutn">
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">To</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
											  <span id="tousername" class="form-control"></span> 
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Reciver Email</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" readonly id="remail" placeholder="Reciver Email">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Ordered</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                            <span id="dateordered" class="form-control"></span>
                                                <!-- <input type="date" class="form-control" id="date" data-inputmask="'mask': '99/99/9999'"> -->
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Product Name</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                              <span id="p_name" class="form-control"></span>
                                               <!--  <input type="text" class="form-control" id="p_name" > -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">UOM</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
											  <select id="uom"  class="form-control"    name="uom"></select>  
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Quantity</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <span id="quantity" class="form-control"></span> 
                                            </div>
                                        </div>
									    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Rate *</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" label="Rate"  parsley-required="true" class="form-control" id="price" Placeholder="Rate">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Amount</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" class="form-control" id="excludetaxes" readonly placeholder="Product price(Exclude Taxes)" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Select Taxes</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
											  <select id="taxes"  class="form-control"    name="taxes"></select>   
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Total</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" class="form-control" id="includetaxes" readonly placeholder="Product price(Include Taxes)" >
                                            </div>
                                        </div>
									    <div class="form-group">
                                         <label class="control-label col-md-3 col-sm-3 col-xs-3">Payment Terms</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" class="form-control" id="paymentterms" placeholder="  Payment Terms" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Lead Time</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" class="form-control" id="leadtime" placeholder="  Lead Time" >
                                            </div>
                                        </div> 
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Freight Type</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
											<div class="radio">
												<label><input type="radio" name="freight" id="paid" checked="true"  value="Paid" />Paid</label>
												&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="freight" id="topay" value="To Pay" />To Pay</label>
											</div> 
                                            </div>
                                        </div>  
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Offer valid date</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="test" class="form-control date-picker"  id="offerdate" placeholder="Offer Valid Date" >
                                            </div>
                                        </div> 
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Message</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" class="form-control" id="notes" placeholder="Notes" />
                                            </div>
                                        </div>

                                         <!--  <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Grand Total *</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" label="Grand Total" parsley-required="true" class="form-control" id="grandtotal" placeholder="Grand Total" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Total Of Lines *</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" label="Total Of Lines" parsley-required="true" class="form-control" id="totallines" placeholder="Total Of Lines" >
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Line Gross Amount *</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" label="Line Gross Amount" parsley-required="true" class="form-control" id="linegrossamount" placeholder="Line Gross Amount" >
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Line Amount *</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <input type="text" label="Line Amount" parsley-required="true" class="form-control" id="linenetamount" placeholder="Line Amount" >
                                            </div>
                                        </div>




                                      <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Category</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                           <select id="catdrpdwn"></select>

                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">SKU</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="sku" placeholder="sku">
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UPC</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="upc" placeholder="upc">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Notes</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="notes" placeholder="Notes">
                                            </div>
                                        </div> -->
                                       
                                       


                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <button type="reset" class="btn btn-primary">Cancel</button>
                                                <button type="button" onclick="sendquotation('<?php echo $_SESSION['user_email']; ?>','<?php echo $_COOKIE['password']; ?>')" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>


                        
                    </div>


                   

                </div>
                <!-- /page content -->
<input type="hidden" id="hidden_date">
<input type="hidden" id="baprtid">
<input type="hidden" id="senderorgid">
<input type="hidden" id="dloctaion">
 <!--quotn line oitem-->
<input type="hidden" id="rfqlineid" value="">
<input type="hidden" id="rfqid" value="">
<input type="hidden" id="uom_id">
<input type="hidden" id="pro_id">
<input type="hidden" id="quantity_hidden">



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
                            $('#offerdate').daterangepicker({
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
				 $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom",contentType:'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data)
				{ 	uomlist = data; 
					for(var j=0; j< uomlist.length; j++){ $('#uom').append('<option value="'+ uomlist[j].id +'">'+ uomlist[j].name +'</option>');}
                }});
	 $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/tax",contentType: 'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},success:function (taxes) {   
              for(var j=0; j< taxes.length; j++)
            { $('#taxes').append('<option value="'+ taxes[j].id +'">'+ taxes[j].name+"("+taxes[j].rate+"%)" +'</option>'); }}
        });
						$.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/rfq/"+org_id,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success:function(data){
						people1 = data; 					
                        var hidden_date = $("#hidden_date").val(people1.issuedate); 
                        var dloctaion = $("#dloctaion").val(people1.deliverylocation);
                       var currdate = new Date(people1.issuedate*1000);
                        var finl_date = currdate.getDate() + '/' + (currdate.getMonth() + 1) + '/' + currdate.getFullYear();
                        $("#dateordered").html(finl_date);  
                        $("#rfqid").val(people1.id);  
						 $.ajax({type:"GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox/" + people1.mailid, contentType: 'application/json', headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization':"SPIDERGAUTH " + createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (mailbox) {
						   $("#senderorgid").val(mailbox.senderorg);
						    $("#remail").val(mailbox.senderemail);
						  var baprtid = $("#baprtid").val(mailbox.receiverorg);
						
						  $.ajax({type:"GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org?extensionid=7D6AACFA15614E1CBE3626B7513191F0&orgid=" + mailbox.senderorg, contentType: 'application/json', headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization':"SPIDERGAUTH " + createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (supplier) {
						   $("#tousername").html(supplier.name);  }}); 
						   if(people1.lineitems[0]){ getproname(people1.lineitems[0].product) }
						   if(people1.lineitems[0]){
						   if(people1.lineitems[0].uom=="0"){$("select#uom").prop('selectedIndex', 0);}else{$("#uom").val(people1.lineitems[0].uom);}  
						   } 
						 }}); 
                        if(people1.lineitems[0]){ $("#quantity").html(people1.lineitems[0].quantity);  $("#quantity_hidden").val(people1.lineitems[0].quantity);}
                        //if(people1.lineitems[0]){  $("#notes").html(people1.lineitems[0].notes); }
                        if(people1.lineitems[0]){ $("#rfqlineid").val(people1.lineitems[0].id); }
                      /*  getorgname(people1.bpartner);
                        getdeliveryloc(people1.deliverylocation);*/
                      
                     
                    },
                    error: function (err) {
                    console.log(err);
                     
                    }
                });
            });
       
$("#price").on("keyup", function() {
	var quantity=$("#quantity").html();
	var price=$("#price").val();
	var totalamount=price * quantity;
	$("#excludetaxes").val(totalamount); 
var taxselectedtext=$("#taxes").children("option:selected").text(); 
var rate=taxselectedtext.substr(taxselectedtext.indexOf("(")+1);
rate=rate.replace("%)",""); 
	var amountaftertax=(totalamount+(totalamount*(rate/100))).toFixed(2);
	$("#includetaxes").val(amountaftertax);  
});
$( "#taxes" ).change(function() {
 var totalamount= 	parseFloat($("#excludetaxes").val()); 
var taxselectedtext=$("#taxes").children("option:selected").text(); 
var rate=taxselectedtext.substr(taxselectedtext.indexOf("(")+1);
rate=rate.replace("%)",""); 
	var amountaftertax=(totalamount+(totalamount*(rate/100))).toFixed(2);
	$("#includetaxes").val(amountaftertax);  
});
   });      function getproname(product)
        {
            var username = "<?php echo $_SESSION['user_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";

            var loginToken = spiderG['loginToken'];
            var loginTokenTS = spiderG['loginTokenTS'];
            $.ajax({
                type: "GET",
                url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/"+product,
                contentType:'application/json',
                headers: { 
                        'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                        'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                    },
                success: function (data)
                {
                   people1 = data; 
                   $("#p_name").html(people1.name);
                   $("#pro_id").val(people1.id);
				       
                },
                error: function (err) {
                console.log(err);
                 
                }
            });
        } 
        </script>

 
<?php  include('loader.php');?>  
</body>

</html>