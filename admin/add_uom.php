<!DOCTYPE html>
<?php 
session_start();
include('include/dbconnection.php');
if($_SESSION['admin_id'] == '')
 {
    header('Location:index.php');
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

    <title>SpiderG | Admin</title>

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

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                   
                    <div class="clearfix"></div>
                   

                   


                    <div class="row">
                        
                                
                               

                        <div class="col-md-offset-2 col-md-8 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add UOM</h2>
                                   
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input required type="text" required class="form-control" id="uom_name" placeholder="Uom Name">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Symbol</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="symbol" placeholder="Symbol">
                                            </div>
                                        </div>

                                       
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Standard Precision</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="stdprecision" placeholder="stdprecision">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <button type="reset" class="btn btn-primary">Cancel</button>
                                                <button type="button" onclick="adduom('<?php echo $_SESSION['admin_email']; ?>','<?php echo $_COOKIE['password']; ?>')" class="btn btn-success">Submit</button>
                                               
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
        <script type="text/javascript" src="js/ankcustom.js"></script>
        <script type="text/javascript" src="js/admincustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script>
       

   
</body>

</html>