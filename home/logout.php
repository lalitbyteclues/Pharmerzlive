
<script>
localStorage.setItem('imgurl', "");
localStorage.setItem('username', "");
localStorage.setItem('password', "");
</script>


<?php 
session_start(); 
session_destroy(); 
header("location:../index.php"); 

?>
