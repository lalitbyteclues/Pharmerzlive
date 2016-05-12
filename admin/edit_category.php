<!DOCTYPE html>
<?php 
    session_start();
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

    <title>Pharmerz  | Admin Panel</title>

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
                                    <h2>Edit Category</h2>
                                   
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="cat_name" required placeholder="Name">
                                            </div>
                                        </div>
                                       
                                       <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is default</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="radio" value="Y" name="isdefault" checked id="default_y"> Yes
                                                <input type="radio" value="N" name="isdefault" id="default_n"> No
                                            
                                            </div>
                                        </div>

                                       <!--  <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is default</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="symbol" placeholder="Symbol">
                                            </div>
                                        </div> -->

                                       <!-- <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Stdprecision</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="stdprecision" placeholder="Stdprecision">
                                            </div>
                                        </div> -->
                                       
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <button type="reset" class="btn btn-primary">Cancel</button>
                                                <button type="button" onclick="updateuom('<?php echo $_SESSION['email']; ?>','<?php echo $_COOKIE['password']; ?>')" class="btn btn-success">Save</button>
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
 <input type="text" class="form-control" id="uom_id" ><br>
  <input type="text" class="form-control" id="pro_cat" >
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
        <script type="text/javascript">

        $( document ).ready(function() 
        {   var username = "<?php echo $_SESSION['admin_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";
            var cat_id = "<?php echo $_GET['id']; ?>";
            spiderG.getLoginToken(username, function()
            {
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({
                  type: "GET",
                  url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/category/"+cat_id,
                 
                  headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                             'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                        },
                //data : objectDataString,
                success: function (people) 
                {
                  
                   $('#cat_name').val(people.name);
                  
                    if(people.ispurchased == 'Y' )
                    {
                        $('#purchas_y').attr('checked',true); 
                    }
                    else
                    {
                        $('#purchas_n').attr('checked',true); 
                    }
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

            });
       
    });

       

function updateuom(username,password)
{
    var username = "<?php echo $_SESSION['admin_email']; ?>";
    var password = "<?php echo $_COOKIE['password']; ?>";
    var p_id = "<?php echo $_GET['id']; ?>";
    var symbol = $('#symbol').val();
    var upc = $('#upc').val();
    var stdprecision = $('#stdprecision').val();
        
    var uom_pro = {
        "id":p_id,
        "name":symbol,
        "symbol":upc,
        "stdprecision":stdprecision,
       };

    var objectDataString = JSON.stringify(uom_pro);
        //console.log(product);
    //alert(objectDataString);
      spiderG.getLoginToken(username, function()
      {
          var loginToken = spiderG['loginToken'];
          var loginTokenTS = spiderG['loginTokenTS'];
          $.ajax({
              type: "PUT",
              url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom",
              contentType:'application/json',
              contentLength:objectDataString.length,
              headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                         'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                    },
            data : objectDataString,
            success: function (data ,textStatus) 
            {
                //console.log(data);
                alert('Success');
                window.location = "view_uom.php";    
            },
            error: function (err) {
              console.log(err);
               
              }
          });

        });
}

</script>

    <script>
           /* function deletemain(id)
            {
                var r = confirm('Are you really want to delete this user ?');
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
            }*/
       
        </script>
</body>

</html>