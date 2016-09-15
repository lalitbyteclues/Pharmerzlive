<!DOCTYPE html>
<html lang="en">
<?php
include('../home/include/dbconnection.php');  
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
                                Trending Images 
                            </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                             <div>API</div>
                            <div class="x_panel">
                                  <input type="hidden" id="myHidDivId" value="1">
                                <div class="x_content">
                                    <div class="form-group" >
                                      <label for="upload" class="col-md-3 control-label" style="font-size: 15px;">Upload Image</label>
                                      <input type="file" name="upload[]" id="myCountID">
                                    </div>
                                    <a href="javascript:void(0)" onClick="appendImages()" style="float:right;margin-top:-37px;" class="btn btn-info">Add More</a>
                                    <div id="showImageDiv"></div>
                                    <span id="showImageerrDiv"></span>
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
       
       <script type="text/javascript">

 function appendImages()
 { 
    var value = $("#myHidDivId").val();
    //myCountID
    var myCOUNT = $("[id=myCountID]").length;
    //alert(myCOUNT);
    if(myCOUNT<=3){
    $("#showImageDiv").append("<div class='form-group' id='imgDivRemoveID"+value+"'><label for='upload' class='col-md-3 control-label'>Upload Image</label><input type='file' name='upload[]' id='myCountID'><span style='float:right;margin-top:-22px;'><a href='javascript:void(0)' onclick='remAppdImages("+value+")' class='btn btn-danger'>Remove</a></span></div>");
        $("#myHidDivId").val(value);
    }
    else{
          $("#showImageerrDiv").html("<span style='color:red;margin-left: 25%;'>Sorry.!! Images limit size exceed than 4</span>");
    }

 }
 
 function remAppdImages(deleteID)
 {  
     if(deleteID<=3){
          $("#imgDivRemoveID"+deleteID).remove();
          $("#showImageerrDiv").html("");
         $("#myHidDivId").val(deleteID);
     }
    
 }

</script>
        
</body>

</html>