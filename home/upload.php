<?php $output=array();
if(!empty($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name']; 
if(move_uploaded_file($sourcePath,"uploads/".$_FILES['userImage']['name'])) {
$targetPath = getcwd() . DIRECTORY_SEPARATOR . "uploads". DIRECTORY_SEPARATOR .$_FILES['userImage']['name'];   
print_r($targetPath); 
set_include_path(getcwd() . DIRECTORY_SEPARATOR . 'Classes'. DIRECTORY_SEPARATOR);
include getcwd() .'/Classes/PHPExcel/IOFactory.php';  
try {  $objPHPExcel = PHPExcel_IOFactory::load($targetPath);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($targetPath,PATHINFO_BASENAME).'": '.$e->getMessage());
} 
$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
print_r($allDataInSheet); 
}}} ?>
