<?php 
include('../home/include/dbconnection.php');  
 session_start();
if($_SESSION['admin_id'] == '')
 {
    header('Location:index.php');
 } 
$id = $_GET['id'];
$sel_catedata= mysqli_query($conn,"SELECT * FROM `home_advert` WHERE `id`='$id'");
$sel_data=mysqli_fetch_array($sel_catedata);
if(isset($_POST['submit']))
{
    
    if($_FILES['ad_img']['name']!='')
    {   
      //echo  pathinfo($_FILES['ad_img']['name'],PATHINFO_EXTENSION);exit;
        $img_name = $_FILES['ad_img']['name'];  
        $time=date('dmyims');
        $image2=$time.$img_name;
        move_uploaded_file($_FILES["ad_img"]["tmp_name"],"uploads/".$image2);
        $ad_image="admin/uploads/".$image2; 
    }
    else
    {
        
        if(mysqli_num_rows($sel_catedata)>0)
        { 
          $ad_image=$sel_data['image'];
        }
        //$ad_image="images/default.png";
    }
	$title=$_POST['Title'];
    if(mysqli_query($conn,"UPDATE `home_advert` SET `image` = '$ad_image',`Title` = '$title' WHERE `id`= '$id'"))
    {
        header('Location:advertisement.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
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
                                Change Image 
                            </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                   <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
								   <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control"  required name="Title" value="<?php echo $sel_data['Title'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="file" class="form-control" id=""   name="ad_img">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <input type="submit" class="btn btn-success" name="submit" value="Update">
                                            </div>
                                        </div>
                                   </form>
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