<!DOCTYPE html>
<html lang="en">
<?php
include('../home/include/dbconnection.php'); 
 session_start(); ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SpiderG </title>

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

            <?php include('sidebar.php'); ?>

            <!-- top navigation -->
            
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                Contacts 
                            </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                               <!--  <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>S.no </th>
                                                <th>Name </th>
                                                <th>Email </th>
                                                <th>Company </th>
                                                <th>Phone </th>
                                                <th>Street Address1 </th>
                                                <th>Street Address2 </th>
                                                <th>Comment </th>
                                                <th class=" no-link last"><span class="nobr">Contact At</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $sql = mysqli_query($conn,"SELECT * FROM `contact_us` ");      
                                            if(mysqli_num_rows($sql)>0)
                                            {   $i = 1;
                                                while($result = mysqli_fetch_array($sql))
                                                {
                                        ?>                      
                                        <tbody>
                                            <tr class="even pointer">
                                                <td class=" "><?php echo $i;?></td>
                                                <td class=" "><?php echo $result['first_name'];?> </td>
                                                <td class=" "><?php echo $result['email'];?></td>
                                                <td class=" "><?php echo $result['comany'];?></td>
                                                <td class=" "><?php echo $result['phone'];?></td>
                                                <td class=" "><?php echo $result['street1'];?></td>
                                                <td class=" "><?php echo $result['street2'];?></td>
                                                <td class=" "><?php echo $result['comment'];?></td>
                                                <td class=" "><?php echo $result['create_at'];?></td>
                                               
                                            </tr>
                                          </tbody>
                                        <?php $i++;
                                                }
                                       
                                        }?>
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

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
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
        <script src="js/datatables/js/jquery.dataTables.js"></script>
        <script src="js/datatables/tools/js/dataTables.tableTools.js"></script>
       
       
        
</body>

</html>