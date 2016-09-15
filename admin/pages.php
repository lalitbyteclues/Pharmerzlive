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
<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});</script>
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
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Pages</h3>
<?php
 $slug="";$Description="";$Comment="";
 if(isset($_GET["id"]) and isset($_GET["action"])=="delete")
{
 if(mysqli_query($conn,"DELETE FROM `pages` WHERE `id`=".$_GET['id']))
											{  echo '<script>alert("Page Deleted Successfully");			   
			  				window.location.href = "pages.php";	 
			 </script>';
											}
}
if(isset($_GET["id"]))
{
$sql = mysqli_query($conn,"SELECT * FROM pages WHERE ID=".$_GET["id"]);      
if(mysqli_num_rows($sql)>0)
{ $i = 1;
 while($result = mysqli_fetch_array($sql))
 {
 $slug=$result["Slug"];
 $Description=$result["Description"];
 $Comment=$result["ShortDescription"];
 }}}
if(isset($_POST["submit"])) {    $slug= $_POST["Slug"];
									    $Description= $_POST["description"];
									 
									    $Comment= $_POST["Comment"];
										if(isset($_GET["id"]))
										{	
if(mysqli_query($conn,"UPDATE `pages` SET `Slug` = '".$slug."',`Description` = '".str_replace("'","`",$Description)."',`ShortDescription` = '".$Comment."' WHERE `id`=".$_GET['id']))
											{  echo '<script>alert("Page Updated Successfully");			   
			  				window.location.href = "pages.php";	 
			 </script>';
											}
										}else
										{
$query="INSERT INTO pages(Slug,Description,ShortDescription,addby) VALUES('".$slug."','".str_replace("'","`",$Description)."','".$Comment."','".$_SESSION['admin_id']."')";	
 $res=mysqli_query($conn,$query); 
if($res) {  echo '<script>alert("Page Created Successfully");			   
			  				window.location.href = "pages.php";	 
			 </script>';
											}
											
										}   
									} 
									?>
                        </div>
                    </div>
                    <div class="clearfix"></div> 
                    <div class="row"> 
					<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
							<form class="form-horizontal form-label-left" method="post"> 
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Slug</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="Slug" value="<?php echo $slug;?>" name="Slug" required placeholder="Slug">
                                            </div>
                                        </div> 
                                       <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Comment</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                  <input type="text" class="form-control" id="Comment"  value="<?php echo $Comment;?>"  name="Comment" required placeholder="Comment">                                            
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Page Content</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                  <textarea   class="form-control" id="description" name="description"   placeholder="description"><?php echo $Description;?></textarea>                                            
                                            </div>
                                        </div>
										<div class="form-group"  style="float:right"> 
                                            <div class="col-md-5 col-sm-5 col-xs-12" >
                                                  <input type="Submit" class="btn btn-info btn-success" value="Save"  name="submit" >                                 
                                            </div>
											 <div class="col-md-5 col-sm-5 col-xs-12" >                                           
                                                  <a  href="pages.php" class="btn btn-info btn-warning">Cancel</a>                                
                                            </div>
                                        </div>
								</form>
							</div>
					 </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings"><th>S.no</th><th>Slug </th><th>Short Description</th><th>Add By </th><th>Add Date</th> <th>Edit</th></tr>
                                        </thead>
                                        <?php 
                                            $sql = mysqli_query($conn,"SELECT  pages.*,case when admin.username IS NULL or admin.username = ''
            then admin.email
            else admin.username
       end as username  FROM pages INNER JOIN admin ON pages.addby=admin.id");      
                                            if(mysqli_num_rows($sql)>0)
                                            {   $i = 1;
                                                while($result = mysqli_fetch_array($sql))
                                                { ?>                      
											<tbody>
												<tr class="even pointer">
                                                <td class=" "><?php echo $i;?></td><td class=" "><a href="pages.php?id=<?php echo $result['ID'];?>"><?php echo $result['Slug'];?>
												</a></td> 
											   <td class=""><?php echo $result['ShortDescription'];?></td>
											   <td class=""><?php echo $result['username'];?></td>
											   <td class=""><?php echo $result['adddate'];?></td>
											   <td class="">
											   <a href="pages.php?id=<?php echo $result['ID'];?>" class="btn btn-info btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
											   <a href="pages.php?id=<?php echo $result['ID'];?>&action=delete" class="btn btn-info btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
											   </td>
                                            </tr>
                                          </tbody>
                                        <?php $i++; } }?>
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