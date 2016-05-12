  <?php
 
$output=array();
if(!empty($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
if(move_uploaded_file($sourcePath,"uploads/".$_FILES['userImage']['name'])) {
$targetPath = getcwd() . "/uploads/".$_FILES['userImage']['name'];    
set_include_path(getcwd() . '/Classes/');
include getcwd() .'/Classes/PHPExcel/IOFactory.php'; 
try { $objPHPExcel = PHPExcel_IOFactory::load($targetPath);
} catch(Exception $e) {
echo  $e.getMessage();

    die('Error loading file "'.pathinfo($targetPath,PATHINFO_BASENAME).'": '.$e->getMessage());
} 
  $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  

for($i=2;$i<=$arrayCount;$i++){
array_push($output,array("name"=>trim(str_replace("'","",$allDataInSheet[$i]["A"])) ,"uom"=>trim($allDataInSheet[$i]["B"])
,"category_id"=>trim($allDataInSheet[$i]["C"]),"sku"=>trim($allDataInSheet[$i]["D"]),"upc"=>trim($allDataInSheet[$i]["E"])
,"notes"=>trim($allDataInSheet[$i]["F"]),"ispurchased"=>trim($allDataInSheet[$i]["G"]),"issold"=>trim($allDataInSheet[$i]["H"])
,"ispublic"=>trim($allDataInSheet[$i]["I"])));

}?> <input type="hidden" id="productlist"     value='<?php echo json_encode($output);?>'/>

<?php }}} 
 
 

