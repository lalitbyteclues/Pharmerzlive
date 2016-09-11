<ul class="slides"> 
<?php  
 $headers = array("Content-Type: application/json","SPIDERG-API-Key:" . 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',"SPIDERG-Authorization: " .'SPIDERGAUTH register');  
 $objectData = '{}';  
 $rest = curl_init();  
 curl_setopt($rest,CURLOPT_URL,'http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/category');  
 curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);  
 curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
 curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
 $response = json_decode(curl_exec($rest)); 
 foreach ($response as $data)
 { ?> 
 <li>
 <a href="products.php?categoryid=<?php echo $data->id; ?>"> 
	<img src="<?php echo $data->name=='Fine Chemicals'?'images/fine chemicals.png':($data->name=='Intermediates Excipients'?'images/Intermediates Excipients.png':($data->name=='Lab Equipment'?'images/Lab Equipments.png':( $data->name=='Nutraceuticals'?'images/Nutraceuticals.png':($data->name=='Herbals'?'images/Herbals.png':($data->name=='Services'?'images/Services.png':($data->name=='PCD Companies'?'images/PCD Companies.png':($data->name=='Regulatory'?'images/Regulatory.png':($data->name=='Plant Machinery'?'images/Plant Machinary.png':($data->name=='Brand'?'images/Regulatory.png':($data->name=='Packaging'?'images/Packging.png':($data->name=='Active Pharmaceutical Ingredients (API)'?'images/api.png':($data->name=='Finished Formulation'?'images/finishedFormulation.png':($data->name=='Wholesale Dealers'?'images/Wholsale Dealers.png':($data->name=='Veterinary'?'images/Veternary.png':($data->name=='Pellets'?'images/Pellets.png':'')))))))))))))))?>" />   
	<figcaption><?php echo $data->name;?></figcaption></a>
	</li> 
	<?php  } 
 curl_close($rest);
 ?> 
 </ul>