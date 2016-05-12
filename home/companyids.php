<?php session_start(); 
if($_SESSION['user_id'] == ''){ header('Location: ../index.php');  }
include('include/dbconnection.php'); ?>
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
                            <h3>Org Identity</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <br />
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <form id="taxadd" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                 <div class="title_left">
                                    <h3>Create  Org Identity</h3>
                                </div>
								   <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Identity Type 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control"  required  name="Country" id="country"> 
									</select> 
                                   </div>
                                </div>  
								<div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="addressline1">value 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control" name="value" id="value" required type="text" value="">
                                        <input   name="id" id="id" type="hidden" value="">
                                        <input   name="named" id="named" type="hidden" value="">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="submit"   class="btn btn-primary" value="Save" />
                                    </div>
                                </div>
                            </form>
                         </div>
                         
                </div>
                 <div class="clearfix"></div>                    
                   <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Org Identity List</h2> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings"> 
                                                <th style="width:50px">S.No.</th> <th>Identity Type </th>  <th>Value</th> <th style="width:205px">Action</th> 
                                            </tr>
                                        </thead> 
                                        <tbody id="get_product">  
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                <div class="clearfix"></div>
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
 <script type="text/javascript" src="../js/application/custom.js"></script>
        <script type="text/javascript" src="../js/application/ankcustm.js"></script>
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
  <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script> 
<script type="text/javascript">
        $( document ).ready(function() 
        {   
		 $('#taxadd').submit(function(e) {
savelocation();
		 
		 return false;
		 });
		var username = "<?php echo $_SESSION['user_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";  
	spiderG.getLoginToken(username, function(){
		$(".se-pre-con").fadeIn("slow"); 
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org/identity/type?extensionid=7D6AACFA15614E1CBE3626B7513191F0",headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) 
                {
                  people = data; 
				   $('#country').append('<option value="">Select Identity Type</option>');  
                   for(var j=0; j< people.length; j++)
                   {  
                     $('#country').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   }
				   $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org/identity",contentType: 'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},
            success: function (data) {  
			 notesTable =   $('#example').DataTable();
                people = data;   
				  var i = 1;
                   for(var j=0; j< people.length; j++)
                   {  
					$('#country').val(people[j].identity_type); 
					clickfunction="<a href='javascript:void(0)' class='btn btn-danger' onclick='deletelocation(\""+people[j].id+"\")'><i class='fa fa-trash-o fa-lg'></i>Delete</a>";
				    notesTable.row.add([i,$("#country option:selected").text(),people[j].value,"<a  class='btn btn-success'  href='companyids.php?id="+people[j].id+"'><i class='fa fa-pencil fa-fw'></i>Edit</a> "+clickfunction+""]).draw();
                     i++;  
                   }
				   $('#country').val(""); 
				   },error: function (err) { console.log(err);$(".se-pre-con").fadeOut("slow"); }
        });
				   if(location.search.length>0){
var taxid=	location.search.replace("?id=","");
 $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org/identity/"+taxid,contentType: 'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},
            success: function (singlelocation) {   
 $("#value").val(singlelocation.value); 
$("#country").val(singlelocation.identity_type); 
$("#id").val(singlelocation.id);  
$("#named").val(singlelocation.value);   
        

                    },error: function (err) { console.log(err);$(".se-pre-con").fadeOut("slow"); }
        }); 

	 $(".se-pre-con").fadeOut("slow");
	 
}else{ $(".se-pre-con").fadeOut("slow");}
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

            });	
    }); 
 function deletelocation(id)
     {    var r = confirm('Are you really want to delete this Org Identity ?');
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
                      url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org/identity/"+id,
                      headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                                 'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                            },dataType: 'text',
                    success: function (data) 
                    {
                        alert('Org Identity  SuccessFully Deleted');
                        location.reload();
                    },
                    error: function (err) {
                      console.log(err);
                       alert("Org Identity in Use. Can't delete.");
                      }
                  });

                });
            }
        } 	
function savelocation()
{               var username = "<?php echo $_SESSION['user_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
				var value=$("#value").val(); 
				var countryid=$("#country").val(); 
				var id=$("#id").val(); 
				if(id.length>0){
				spiderG.getLoginToken(username, function()
                {
                  var loginToken = spiderG['loginToken'];
                  var loginTokenTS = spiderG['loginTokenTS'];
				  var user_data={};
				  if($("#named").val()==locationname)
				  { user_data = {"value": value,"identity_type": countryid,"id":id};
				  }else{ user_data = {"value":value ,"identity_type": countryid,"id":id};
				  } 
				   var objectDataString = JSON.stringify(user_data); 
                 $.ajax({type: "PUT",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org/identity",contentType: 'application/json',contentLength: objectDataString.length,headers: {
                'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)
            },
            data: objectDataString,
            success: function (data, textStatus) { 
               
                alert('Org Identity Successfully Updated');
				location="/home/companyids.php"; 
            },
            error: function (err) {
                console.log(err);
				 alert("Org Identity already Exists"); 
				 location="/home/companyids.php";
            }
        });

                });}else{  
				     var user_data = {"value":value,"identity_type": countryid};
				   var objectDataString = JSON.stringify(user_data); 
		spiderG.getLoginToken(username, function () {
						var loginToken = spiderG['loginToken'];
						var loginTokenTS = spiderG['loginTokenTS'];
$.ajax({type: "POST",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org/identity",contentType: 'application/json',contentLength: objectDataString.length,headers: {
                'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)
            },
            data: objectDataString,dataType: 'text',
            success: function (data, textStatus) { 
                
                alert('Org Identity  Successfully Created');
				location="/home/companyids.php";

            },
            error: function (err) {
                console.log(err);
				 alert("Org Identity already Exists"); 
				 location="/home/companyids.php";
            }
        });

    });
  		
				}
             
        }
</script>
   
<?php  include('loader.php');?>  
        <!-- /form validation -->
        <!-- editor -->
        
        <!-- /editor -->
</body>

</html>
