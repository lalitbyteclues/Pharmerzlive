<!DOCTYPE html>
<html lang="en">
<?php 
 
    session_start();
if($_SESSION['admin_id'] == '')
 {
    header('Location:index.php');
 }

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pharmerz | Admin Panel</title>

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
                                    <h2>Unit of Measure</h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                
                                                <th>S.No. </th>
                                                <th>Name</th>
                                                <th>Symbol </th>
                                                <th>stdprecision </th>
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

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>
         <!-- Datatables -->
      <script type="text/javascript" src="js/ankcustom.js"></script>
        <script type="text/javascript" src="js/admincustm.js"></script>
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>

        <script>
          $(document).ready(function() {
          notesTable =   $('#example').DataTable();
            var username = "<?php echo $_SESSION['admin_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";
            spiderG.getLoginToken(username, function()
            {
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
            $.ajax({
                type: "GET",
                url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom",
                contentType:'application/json',
                headers: { 
                        'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                        'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                    },
                success: function (people)
                {
                   // console.log(data); 
                    var i = 1;
                   for(var j=0; j< people.length; j++)
                   {
                    // notesTable.row.add([i,people[j].name,people[j].sku,people[j].upc,people[j].notes,"<a href='edit_products.php?id="+people[j].id+"'>Edit</a> <a href='javascript:void(0)' onclick='deletepro(\""+people[j].id+"\")'>Delete</a>"]).draw();
                     notesTable.row.add([i,people[j].name,people[j].symbol,people[j].stdprecision,"<a href='edit_uom.php?id="+people[j].id+"'>Edit</a> <a href='javascript:void(0)' onclick='deletepro(\""+people[j].id+"\")'>Delete</a>"]).draw();
                     
                     i++; 
                   }
                 
                },
            error: function (err) {
            console.log(err);
             
            }
        });
        });

        });
        </script>
        <script type="text/javascript">
        function deletepro(id)
        {
            //alert(id);
           var r = confirm('Are you really want to delete this ?');
            if(r==true)
            {
                var username = "<?php echo $_SESSION['admin_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
                spiderG.getLoginToken(username, function()
                {
                  var loginToken = spiderG['loginToken'];
                  var loginTokenTS = spiderG['loginTokenTS'];
                  //alert(username+'-'+password+'-'+loginToken+'-'+loginTokenTS);
                  $.ajax({
                      type: "DELETE",
                      url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom/"+id,
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
        
       
</body>

</html>