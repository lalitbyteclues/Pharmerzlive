<?php session_start(); 
include('include/dbconnection.php');
if($_SESSION['user_id'] == ''){
    header('Location: ../index.php');
 }

if(isset($_POST['blog_add']))
{
    //unset($_SESSION['site2']);
    if($_POST['blog_title']!='' && $_POST['blog_tag']!='' && $_POST['descr']!='')
    {
        $blog_title = $_POST['blog_title'];
        //$blog_image = $_POST['blog_image'];
        $blog_tag = $_POST['blog_tag'];
        $descr = $_POST['descr'];
        $user_id = $_SESSION['user_id'];
        $user_email = $_SESSION['user_email'];

    if($_FILES['file']['name']!='')
    {      
        $file=$_FILES['file']['tmp_name'];
       
        $image=$_FILES["file"]["name"];
            
        $time=date('dmyims');
        $image2=$time.$image;
            
        move_uploaded_file($_FILES["file"]["tmp_name"],"./less/".$image2);
        $blog_image="less/".$image2;
    }
    else
    {
         $blog_image="";
    }
        $q = "INSERT INTO `blog` (`user_id`,`user_email`,`blog_title`,`blog_tag`,`descr`,`blog_image`) VALUES('$user_id','$user_email','$blog_title','$blog_tag','$descr','$blog_image')";
        if(mysqli_query($conn,$q))
        {
            $status = '0';
        }
    }
    else
    {
        $status = '1';
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
                            <h3>Write Blog</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content bs-example-popovers">

                               
                                <?php if($status == '1'){?>
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onclick="destr()">×</span>
                                    </button>
                                    <?php echo 'Please fill all fields.';?>
                                </div>
                                <?php }
                                elseif($status == '0')
                                {
                                ?>
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <?php echo "Blog successfully added, Wait for admin approval."; ?>
                                </div>
                              <?php  } 
                                ?>

                            </div>
                        <div class="x_panel">
                           <!--  <div class="x_title">
                                <h2>Text areas<small>Sessions</small></h2>
                               
                                <div class="clearfix"></div>
                            </div> -->
                            <div class="x_panel">
                                
                               <!--  <div class="x_content"> -->
                                    <br />
                                    <form id="blog_form" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blog Title 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name"  name="blog_title" max="48" value="<?php if(!empty($_POST['blog_title'])){ echo $_POST['blog_title']; } ?>" class="form-control col-md-7 col-xs-12">
                                           
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Image 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" name="file"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tag</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="middle-name" name="blog_tag"  class="form-control col-md-7 col-xs-12" value="<?php if(!empty($_POST['blog_tag'])){ echo $_POST['blog_tag']; } ?>" type="text" >
                                                
                                            </div>
                                        </div>
                                   <!--  </div> -->

                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Blog Content</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="descr" name="blog_desc"  id="descr" style="width: 100%;" rows="10"><?php if(!empty($_POST['descr'])){ echo $_POST['descr']; } ?></textarea>
                                            </div><br />
                                    </div>
                            </div>
                           
                             <!-- <div class="ln_solid"></div> -->
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="blog_add" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </div>

                    </div>
                        </form>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">
                            <span class="lead"> <i class="fa fa-paw"></i> SpiderG </span>
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


     
        <!-- /form validation -->
        <!-- editor -->
        
        <!-- /editor -->
<?php  include('loader.php');?>
</body>

</html>
