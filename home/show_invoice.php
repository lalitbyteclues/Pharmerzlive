<!DOCTYPE html>
<html lang="en">
<?php 
 include('include/dbconnection.php');
    session_start();
    if($_SESSION['user_id'] == ''){
    header('Location: ../index.php');
 }

?>
<head>
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
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

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
 <?php include('sidebar.php');?> 
            <!-- page content -->
            <div class="right_col" role="main">
                <div class=""> 
                    <div class="clearfix"></div> 
                    <div class="row"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Sent Invoices</h2> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings"> 
                                                <th>S.No. </th>
                                                <th>Document No</th>
                                                <th>Sent To</th>  
                                                <th>UOM</th>  
                                                <th>Quantity</th>  
                                                <th>Rate</th>  
                                                <th>Invoice Total</th>  
                                                <th>Product</th>  
                                                <th>Category</th>  
                                                <th>Notes</th>
                                                <th>Issue Date</th>
                                                <th>Payment Date</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead> 
                                        <tbody id="get_product">  
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div> 
                        <br />
                        <br />
                        <br /> 
                    </div>
                </div>
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
                <!-- /page content -->
            </div> 
        </div> 
        <script src="js/bootstrap.min.js"></script>
	    <script src="../js/moment.js"></script>
        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script> 
        <script src="js/custom.js"></script>
         <!-- Datatables -->
        <script type="text/javascript" src="../js/application/custom.js"></script>
        <script type="text/javascript" src="../js/application/ankcustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script> 
        <script>
          $(document).ready(function() {
			      var loginToken = "";
				  var senderorglist=[];
				    var uomlist=[];
                var loginTokenTS = "";
            notesTable =   $('#example').DataTable();
            var username = "<?php echo $_SESSION['user_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";
			var tttt=0; 
			var people={};
            spiderG.getLoginToken(username, function()
            { loginToken = spiderG['loginToken'];
                  loginTokenTS = spiderG['loginTokenTS'];
                $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/invoice",contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){
                   people = data; 
				   if(people.length>0){ 
  $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom",contentType:'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data)
					  { 	uomlist = data; }}); 
		saveDataInputs();  } 
                },
            error: function (err) {
            console.log(err);
             
            }
        });
        });
var saveDataInputs = function() {
	  customcall(people[tttt],function(){  
        tttt++;   
if(tttt< people.length) {
		 saveDataInputs(); 
        }
		else
		{  $(".se-pre-con").fadeOut("slow"); 
		}
	});
 }
  function customcall(peoplesingle,callback) {  
 spiderG.getLoginToken(username, function()
   { 
loginToken = spiderG['loginToken'];
 loginTokenTS = spiderG['loginTokenTS']; 
   if($.grep(senderorglist,function (category){return category.id == peoplesingle.bpartner }).length==0)
					 {
						$.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org?extensionid=7D6AACFA15614E1CBE3626B7513191F0&orgid="+peoplesingle.bpartner,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success:function(data){
						people1 = data; 
						senderorglist.push({id:peoplesingle.bpartner,name:people1.name});
						if(peoplesingle.lineitems.length>0){
							  $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/"+peoplesingle.lineitems[0].product,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (productresponse){
						categoryname="";
						  
						 
							categoryname=$.grep(categorylistparsed,function (category){return category.id == productresponse.category_id })[0].name; 
						 
 uom=$.grep(uomlist,function (uomsingle){return uomsingle.id == peoplesingle.lineitems[0].uom })[0].name; 		 
							notesTable.row.add([tttt+1,peoplesingle.documentno,people1.name,uom,peoplesingle.lineitems[0].quantity,peoplesingle.lineitems[0].price,peoplesingle.grandtotal,productresponse.name,categoryname,peoplesingle.notes,moment(peoplesingle.issuedate*1000).format("DD-MM-YYYY"),moment(peoplesingle.paymentduedate*1000).format("DD-MM-YYYY"),"<a href='view_invoice.php?id="+peoplesingle.id+"'>View</a>"]).draw();
							  callback();}});
						}  
						else{							
							notesTable.row.add([tttt+1,peoplesingle.documentno,people1.name,"","","",peoplesingle.grandtotal,"","",peoplesingle.notes,moment(peoplesingle.issuedate*1000).format("DD-MM-YYYY"),moment(peoplesingle.paymentduedate*1000).format("DD-MM-YYYY"),"<a href='view_invoice.php?id="+peoplesingle.id+"'>View</a>"]).draw();
							callback();
						}            
					 }});
					 }
					 else{
						 	if(peoplesingle.lineitems.length>0)
							{  $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/"+peoplesingle.lineitems[0].product,contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (productresponse){
									  categoryname="";
									 
										categoryname=$.grep(categorylistparsed,function (category){return category.id == productresponse.category_id })[0].name; 
									 
									uom=$.grep(uomlist,function (uomsingle){return uomsingle.id == peoplesingle.lineitems[0].uom })[0].name; 									
									notesTable.row.add([tttt+1,peoplesingle.documentno,$.grep(senderorglist,function (category){return category.id == peoplesingle.bpartner })[0].name,uom,peoplesingle.lineitems[0].quantity,peoplesingle.lineitems[0].price,peoplesingle.grandtotal,productresponse.name,categoryname,peoplesingle.notes,moment(peoplesingle.issuedate*1000).format("DD-MM-YYYY"),moment(peoplesingle.paymentduedate*1000).format("DD-MM-YYYY"),"<a href='view_invoice.php?id="+peoplesingle.id+"'>View</a>"]).draw();
									callback(); 
								}});
							}
							else{
								notesTable.row.add([tttt+1,peoplesingle.documentno,$.grep(senderorglist,function (category){return category.id == peoplesingle.bpartner })[0].name,"","","",peoplesingle.grandtotal,"","",peoplesingle.notes,moment(peoplesingle.issuedate*1000).format("DD-MM-YYYY"),moment(peoplesingle.paymentduedate*1000).format("DD-MM-YYYY"),"<a href='view_invoice.php?id="+peoplesingle.id+"'>View</a>"]).draw();
								callback();
							}
					 } 
 }); 
 }
        });


        </script>
        <script type="text/javascript">
        function deletepro(id)
        {
           var r = confirm('Are you really want to delete this ?');
            if(r==true)
            {
                var username = "<?php echo $_SESSION['user_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
                spiderG.getLoginToken(username, function()
                {
                  var loginToken = spiderG['loginToken'];
                  var loginTokenTS = spiderG['loginTokenTS'];
                  $.ajax({
                      type: "DELETE",
                      url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/"+id,
                      headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                                 'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                            },
                    success: function (data ,textStatus) 
                    {
                        alert('Success');
                        location.reload();
                    },
                    error: function (err) {
                      console.log(err);
                       
                      }
                  });

                });
            }
        }
        </script>
        
 
<?php  include('loader.php');?>      
</body>

</html>