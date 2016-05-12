<?php 
/*$host        =    'localhost';
$user        =    'root';
$password    =    '';
$database    =    'pharmerz';*/ 

$host        =    'localhost';
$user        =    'pharmerz';
$password    =    'pharmerz@123';
$database    =    'pharmerz';
$conn        =    mysqli_connect($host,$user,$password) or die('Server Information is not Correct');
mysqli_select_db($conn, $database) or die('Database Information is not correct');

?>