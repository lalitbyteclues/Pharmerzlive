<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include('include/dbconnection.php'); 
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pharmerz | Panel </title>

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
                               My Blog
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
                                                <th>Blog Title </th>
                                                <th>Tag </th>
                                                <th>Status </th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $sql = mysqli_query($conn,"SELECT * FROM `blog` where `user_id` = '".$_SESSION['user_id']."'");      
                                            if(mysqli_num_rows($sql)>0)
                                            {   $i = 1;
                                                while($result = mysqli_fetch_array($sql))
                                                {
                                        ?>                      
                                        <tbody>
                                            <tr class="even pointer">
                                                <td class=" "><?php echo $i;?></td>
                                               <td class=" "><?php echo $result['blog_title'];?></td>
                                                <td class=" "><?php echo $result['blog_tag'];?></td>
                                                <td class=" "><span class="btn btn-primary"><?php if($result['status']==1){ echo "Activate"; } else{ echo "Deactivate"; } ?></span></td>
                                                <td class=" last"><a id='delete<?php echo $result['id'];?>' onclick='deletemain("<?php echo $result['id'];?>");' class='btn btn-danger' href='javascript:void(0)' title='Delete' data-rel='tooltip' ><i class='fa fa-trash-o '></i> </a></td>
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
        <script>
        function deletemain(id)
        {
            var r = confirm('Are you really want to delete this Part ?');
            if(r==true)
            {
                $.ajax({
                   url:'delete.php?status=1&id='+id,
                   success:function(data)
                   {
                       if(data==1000)
                       {
                            location.reload();
                       }
                   }
                });
            }
        }
       
        </script>
      
        
<?php  include('loader.php');?>
</body>

</html>