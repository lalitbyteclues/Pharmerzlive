<!DOCTYPE html>
<html lang="en">
<?php   include('include/dbconnection.php');
    session_start();
    if($_SESSION['user_id'] == ''){
    header('Location: ../index.php'); 		 }  	?>
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
                            <div class="x_panel" id="dataTabId">
                                <div class="x_title">
                                    <h2>Received Enquiries</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>S.No. </th>
                                                <th>Received From</th>
                                                <th>Quantity</th>
                                                <th>Product</th>
                                                <th>Email</th>
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
                  <footer>
                    <div class="">
                        <p class="pull-right">
                             <a href="index.php" class="site_title"><img style="width:150px" class="img-responsive" src="/images/pharmerz_logo2 .png"></a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                </div>
                <!-- /page content -->
            </div>

        </div>
		<script src="js/bootstrap.min.js"></script>
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
		$(document).ready(function (e) {
    var tttt = 0;
    notesTable = $('#example').DataTable();
    var username = "<?php echo $_SESSION['user_email']; ?>";
    var password = "<?php echo $_COOKIE['password']; ?>";
    var people = [];
    partnerlist = [];
    productslist = [];
    var loginToken = "";
    var loginTokenTS = "";
    spiderG.getLoginToken(username, function () {
        loginToken = spiderG['loginToken'];
        loginTokenTS = spiderG['loginTokenTS'];
		  setInterval(function () {
            spiderG.getLoginToken(username, function () {
                loginToken = spiderG['loginToken'];
                loginTokenTS = spiderG['loginTokenTS'];
            });
        }, 100000);
        $.ajax({
            type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox?dtype=rfq&limit=9999999", contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                people = data;
                if (people.length > 0) { 
                    saveDataInputs();
                }
            }, error: function (err) { }
        });
    });
    var saveDataInputs = function () {
        customcall(people[tttt], function () {
            tttt++; 
            if (tttt < people.length) {
                saveDataInputs();
            }
            else { $(".se-pre-con").fadeOut("slow"); }
        });
    }
    function customcall(peoplesingle, callback) {
        var flag = 1;  
        if ($.grep(partnerlist, function (category) { return category.id == peoplesingle.senderorg }).length == 0) {
            if (peoplesingle.senderorg) {
                $.ajax({
                    type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org?extensionid=7D6AACFA15614E1CBE3626B7513191F0&orgid=" + peoplesingle.senderorg, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                        mydata = data;
                        partnerlist.push(mydata);
                        var partnername = mydata.name;
                        $.ajax({
                            type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/rfq/" + peoplesingle.documentid, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (rfqresponseparsed) {
                                if (rfqresponseparsed.lineitems.length > 0) {
                                    if ($.grep(productslist, function (category) { return category.id == rfqresponseparsed.lineitems[0].product }).length == 0) {
                                        $.ajax({
                                            type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/" + rfqresponseparsed.lineitems[0].product, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (productresponseparsed) {
                                                productslist.push(productresponseparsed);
                                                notesTable.row.add([tttt + 1, partnername, rfqresponseparsed.lineitems[0].quantity, productresponseparsed.name, peoplesingle.senderemail, "<a href='view_recieve_enquiry.php?id=" + peoplesingle.documentid + "'>View</a>"]).draw();
                                                callback();
                                            }
                                        });
                                    } else {
                                        productresponseparsed = $.grep(productslist, function (category) { return category.id == rfqresponseparsed.lineitems[0].product })[0];
                                        notesTable.row.add([tttt + 1, partnername, rfqresponseparsed.lineitems[0].quantity, productresponseparsed.name, peoplesingle.senderemail, "<a href='view_recieve_enquiry.php?id=" + peoplesingle.documentid + "'>View</a>"]).draw();
                                        callback();

                                    }
                                } else {
                                    notesTable.row.add([tttt + 1, partnername, "", "", peoplesingle.senderemail, "<a href='view_recieve_enquiry.php?id=" + peoplesingle.documentid + "'>View</a>"]).draw();
                                    callback();
                                }
                            }
                        });
                    }, error: function (err) { }
                });
            }
            else {
                notesTable.row.add([tttt + 1, "", "", "", peoplesingle.senderemail, "<a href='view_recieve_enquiry.php?id=" + peoplesingle.documentid + "'>View</a>"]).draw();
                callback();
            }
        } else {
            if (peoplesingle.senderorg) {
                mydata = $.grep(partnerlist, function (category) { return category.id == peoplesingle.senderorg })[0];
                var partnername = mydata.name;
                $.ajax({
                    type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/rfq/" + peoplesingle.documentid, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (rfqresponseparsed) {
                        if (rfqresponseparsed.lineitems.length > 0) {
                            if ($.grep(productslist, function (category) { return category.id == rfqresponseparsed.lineitems[0].product }).length == 0) {
                                $.ajax({
                                    type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/" + rfqresponseparsed.lineitems[0].product, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (productresponseparsed) {
                                        productslist.push(productresponseparsed);
                                        notesTable.row.add([tttt + 1, partnername, rfqresponseparsed.lineitems[0].quantity, productresponseparsed.name, peoplesingle.senderemail, "<a href='view_recieve_enquiry.php?id=" + peoplesingle.documentid + "'>View</a>"]).draw();
                                        callback();
                                    }
                                });
                            } else {
                                productresponseparsed = $.grep(productslist, function (category) { return category.id == rfqresponseparsed.lineitems[0].product })[0];
                                notesTable.row.add([tttt + 1, partnername, rfqresponseparsed.lineitems[0].quantity, productresponseparsed.name, peoplesingle.senderemail, "<a href='view_recieve_enquiry.php?id=" + peoplesingle.documentid + "'>View</a>"]).draw();
                                callback();
                            }
                        } else {
                            notesTable.row.add([tttt + 1, partnername, "", "", peoplesingle.senderemail, "<a href='view_recieve_enquiry.php?id=" + peoplesingle.documentid + "'>View</a>"]).draw();
                            callback();
                        }
                    }
                });


            }
            else {
                notesTable.row.add([tttt + 1, "", "", "", peoplesingle.senderemail, "<a href='view_recieve_enquiry.php?id=" + peoplesingle.documentid + "'>View</a>"]).draw();
                callback();
            }
        }
    }
});
function mySetTableData(param_flag)
{
  if(param_flag == 1)
  {
    location.reload();
    flag = 2;
  }
 }

/*function myfun(sender_org)
{
  notesTable =   $('#example').DataTable();
  var username = "<?php echo $_SESSION['user_email']; ?>";
  var password = "<?php echo $_COOKIE['password']; ?>";
  spiderG.getLoginToken(username, function()
  {
      var loginToken = spiderG['loginToken'];
      var loginTokenTS = spiderG['loginTokenTS'];
      $.ajax({
        type: "GET",
        url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org?extensionid=7D6AACFA15614E1CBE3626B7513191F0&orgid="+sender_org,
        contentType:'application/json',
        headers: { 
                'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
            },
        success: function (data)
        {
         
          people = data; 
          for(var j=0; j< people.length; j++)
          {
            notesTable.row.add(['',people[j].name,'','']).draw();
          }
        },
        error: function (err)
        {
          console.log(err);
          
        }
      });
   });
}*/
        </script>
        <script type="text/javascript">
       /* function deletepro(id)
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
        }*/

        var flag = 1;

        </script>
        
 
<?php  include('loader.php');?>      
</body>

</html>