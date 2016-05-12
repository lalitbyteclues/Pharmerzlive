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
                            <h3>Locations</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <br />
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <form id="taxadd" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                 <div class="title_left">
                                    <h3>Create  Location</h3>
                                </div>
								 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="addressline1">Name 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control" name="name"   id="name" type="text" value="">
                                        <input class="form-control" name="namenew"   id="namenew" type="hidden" value="">
                                        <input   name="id" id="id" type="hidden" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="addressline1">Address Line1 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control" name="add1"   id="add1" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="addressline2">Address Line2 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control" name="add2"   id="add2" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="postalcode">Postal Code 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input class="form-control" name="postalcode" maxlength="8"  id="postalcode" type="text" value="">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" required onchange="getregionslist(this.value);" name="Country" id="country"> 
									</select> 
                                   </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="region">Region 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control"   name="region"  onchange="getcitylist(this.value);"  id="region"> 
									</select>  
                                   </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                   <select class="form-control"   name="city" id="city"> 
									</select>  
                                   </div>
                                </div>  
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="submit"  class="btn btn-primary" value="Save">
                                    </div>
                                </div>
                            </form>
                         </div>
                         
                </div>
                 <div class="clearfix"></div>                    
                   <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Locations List</h2> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings"> 
                                                <th style="width:50px">S.No.</th>
                                                <th>Name</th>
                                                <th>Address Line1</th>
                                                <th>Address Line2</th>
                                                <th>Postal Code </th>
                                                <th>City</th> 
                                                <th>Region</th> 
                                                <th>Country</th> 
                                                <th>Is Active</th> 
                                                <th style="width:205px">Action</th> 
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
  <script src="http://pharmerz.com/admin/js/md5.js"></script>
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
		spiderG.getLoginToken(username, function () {
			$(".se-pre-con").fadeIn("slow");
			var loginToken = spiderG['loginToken'];
			var loginTokenTS = spiderG['loginTokenTS'];  
        $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location",contentType: 'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},
            success: function (data) {  
			 notesTable =   $('#example').DataTable();
                people = data;   
				  var i = 1;
                   for(var j=0; j< people.length; j++)
                   {  
					clickfunction="<a href='javascript:void(0)'  class='btn btn-danger'  onclick='deletelocation(\""+people[j].id+"\")'><i class='fa fa-trash-o fa-lg'></i>Delete</a>";
				    notesTable.row.add([i,people[j].name,people[j].addressline1,people[j].addressline2,people[j].postalcode,people[j].city,people[j].region,people[j].country,people[j].isactive,"<a  class='btn btn-success' href='locations.php?id="+people[j].id+"'><i class='fa fa-pencil fa-fw'></i>Edit</a> "+clickfunction+""]).draw();
                     i++; 
					
                   }},error: function (err) { console.log(err);$(".se-pre-con").fadeOut("slow"); }
        });
    });  
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/country",headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) 
                {
                  people = data; 
				   $('#country').append('<option value="">Select Country</option>');  
				   $('#region').append('<option value="">Select Region</option>'); 
				   $('#city').append('<option value="">Select City</option>'); 
                   for(var j=0; j< people.length; j++)
                   {
                     $('#country').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   }
				   if(location.search.length>0){
var locationid=	location.search.replace("?id=","");
 $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location/"+locationid,contentType: 'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},
            success: function (singlelocation) {   
 $("#name").val(singlelocation.name);
 $("#namenew").val(singlelocation.name);
$("#add1").val(singlelocation.addressline1);
$("#add2").val(singlelocation.addressline2);
$("#postalcode").val(singlelocation.postalcode);
$("#country option").filter(function() {return $(this).text() == singlelocation.country;}).prop('selected', true);
getregionslist($("#country").val(),singlelocation.region,singlelocation.city);
$("#id").val(singlelocation.id); 
				
				  console.log(singlelocation);
                    },error: function (err) { console.log(err);$(".se-pre-con").fadeOut("slow"); }
        });



	 $(".se-pre-con").fadeOut("slow");
	console.log(locationid);
}else{ $(".se-pre-con").fadeOut("slow");}
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

            });	
    });
 function getregionslist(id){
	 if(id.length>0){
	  var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/region?country="+id,headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) {
                    people = data; 
					 $('#region').html('');
					 $('#region').append('<option value="">Select Region</option>'); 
                   for(var j=0; j< people.length; j++)
                   {
                     $('#region').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   }
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

	 }); }else{ $('#region').html('');
					 $('#region').append('<option value="">Select Region</option>'); }	 
 }
 function getregionslist(id,regionid,cityid){
	 if(id.length>0){
	  var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/region?country="+id,headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) {
                    people = data; 
					 $('#region').html('');
					 $('#region').append('<option value="">Select Region</option>'); 
                   for(var j=0; j< people.length; j++)
                   {
                     $('#region').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   }
				   
					$("#region option").filter(function() {return $(this).text() == regionid;}).prop('selected', true);
							getcitylist($("#region").val(),cityid);   
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

	 }); }else{ $('#region').html('');
					 $('#region').append('<option value="">Select Region</option>'); }	 
 }
 function getcitylist(id){
	 if(id.length>0){
	  var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/city?regionid="+id,headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) {
                    people = data; 
					 $('#city').html('');
					 $('#city').append('<option value="">Select City</option>'); 
                   for(var j=0; j< people.length; j++)
                   {
                     $('#city').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>'); 
                   } 
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

	 }); }else{ $('#city').html('');
					 $('#city').append('<option value="">Select City</option>'); }	 
 }
 function getcitylist(id,cityid){
	 if(id.length>0){
	  var username = "<?php echo $_SESSION['user_email']; ?>";
     var password = "<?php echo $_COOKIE['password']; ?>";
	spiderG.getLoginToken(username, function(){
              var loginToken = spiderG['loginToken'];
              var loginTokenTS = spiderG['loginTokenTS'];
              $.ajax({type: "GET",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/city?regionid="+id,headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data) {
                    people = data; 
					 $('#city').html('');
					 $('#city').append('<option  value="">Select City</option>'); 
					
                   for(var j=0; j< people.length; j++)
                   {
					   var selected=(people[j].id==cityid);
                     $('#city').append('<option selected="'+selected+'" value="'+ people[j].id +'">'+ people[j].name +'</option>');  
					 
                   }  
                },
                error: function (err) {
                  console.log(err);
                   
                  }
              });

	 }); }else{ $('#city').html('');
					 $('#city').append('<option value="">Select City</option>'); }	 
 }
 function deletelocation(id)
     {    var r = confirm('Are you really want to delete this ?');
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
                      url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location/"+id,
                      headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                                 'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                            },
                    success: function (data) 
                    {
                        alert('Success');
                        location.reload();
                    },
                    error: function (err) {
                      console.log(err);
                       alert("Location in Use. Can't delete.");
                      }
                  });

                });
            }
        } 	
function savelocation()
{               var username = "<?php echo $_SESSION['user_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
				var locationname=$("#name").val();
				var locationnamenew=$("#namenew").val();
				var addressline1=$("#add1").val();
				var addressline2=$("#add2").val();
				var postalcode=$("#postalcode").val();
				var countryid=$("#country").val();
				var regionid=$("#region").val();
				var cityid=$("#city").val();
				var id=$("#id").val(); 
				if(id.length>0){
				spiderG.getLoginToken(username, function()
                {
                  var loginToken = spiderG['loginToken'];
                  var loginTokenTS = spiderG['loginTokenTS'];
				  var user_data={};
				  if(locationname==locationnamenew)
				  { 
					 var user_data = {"addressline1": addressline1,"addressline2": addressline2,"postalcode": postalcode,"city": cityid,"region": regionid,"country": countryid,"id":id}; 
				  }else{
					  var user_data = {"name":locationname,"addressline1": addressline1,"addressline2": addressline2,"postalcode": postalcode,"city": cityid,"region": regionid,"country": countryid,"id":id};
					  }
				   
				   var objectDataString = JSON.stringify(user_data); 
                 $.ajax({type: "PUT",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location",contentType: 'application/json',contentLength: objectDataString.length,headers: {
                'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)
            },
            data: objectDataString,dataType: 'text',
            success: function (data, textStatus) { 
                console.log(data);
                alert('Success Updated');
				location="/home/locations.php";

            },
            error: function (err) {
                console.log(err);
				 alert("Location already Exists"); 
				 location="/home/locations.php";
            }
        });

                });}else{  
				     var user_data = {"name":locationname,"addressline1": addressline1,"addressline2": addressline2,"postalcode": postalcode,"city": cityid,"region": regionid,"country": countryid};
				   var objectDataString = JSON.stringify(user_data); 
		spiderG.getLoginToken(username, function () {
						var loginToken = spiderG['loginToken'];
						var loginTokenTS = spiderG['loginTokenTS'];
$.ajax({type: "POST",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location",contentType: 'application/json',dataType: 'text',contentLength: objectDataString.length,headers: {
                'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)
            },
            data: objectDataString,
            success: function (data, textStatus) { 
             
                alert('Success Created');
				location="/home/locations.php";

            },
            error: function (err) {
                console.log(err);
				 alert("Location already Exists"); 
				 location="/home/locations.php";
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
