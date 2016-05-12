<!DOCTYPE html>
<html lang="en">
<?php 
 /*if($_SESSION['admin_id'] != '')
 {
    header('Location:dashboard.php');
 }*/
 //include('../home/include/dbconnection.php'); 
 session_start();
 if(!isset($_SESSION['admin_id'])){$_SESSION['admin_id']="";}
 if($_SESSION['admin_id'] != '')
 {
    header('Location:dashboard.php');
 }

/*include('../home/include/dbconnection.php'); 
 session_start();
 if($_SESSION['admin_id'] != '')
 {
    header('Location:dashboard.php');
 }
 if(isset($_POST['login']))
 {   
    //unset($_SESSION['site2']);
    if($_POST['email']!='' && $_POST['password']!='')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $get_user = mysqli_query($conn,"SELECT * FROM `admin` WHERE `email`= '$email' AND `password` ='$password'");
        if(mysqli_num_rows($get_user)>0)
        {
            $queRow = mysqli_fetch_array($get_user);
            $_SESSION['admin_id'] = $queRow['id'];
            $_SESSION['admin_email'] = $queRow['email'];
            header('Location:dashboard.php');
        }
        else
        {
            $status = '0';
        }
    }
    else
    {
        $status = '1';
    }
}    */

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SpiderG | Super Admin</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


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

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form method="post">
                        <h1>Login</h1>
                        <?php //if($status=='0'){ echo 'Credentials not matched.';} elseif($status=='1'){ echo 'Please fill all fields.';}?>
                        <div>
                            <input type="text" class="form-control" name="loginUsername" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="loginPassword" placeholder="Password" required="" />
                        </div>
                        <div>
                            <input type="button" onclick="adminlogin()" name="login" value="login" class="btn btn-default submit">
                         
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <img style="width:150px" class="img-responsive" src="/images/pharmerz_logo2 .png">

                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            
        </div>
    </div>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
<script type="text/javascript" src="js/ankcustom.js"></script>
<script type="text/javascript" src="js/admincustm.js"></script>
<!-- <script type="text/javascript" src="js/suppliers.js"></script> -->
</body>

</html>