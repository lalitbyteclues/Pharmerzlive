<script> 
 $(document).one('ready', function () {
   localStorage.clear();
 });
window.localStorage.clear();
localStorage.setItem('username', ""); 
    localStorage.setItem('password', "");</script>
<?php 
session_start(); 
session_destroy(); 
header("location:index.php"); 

?>

