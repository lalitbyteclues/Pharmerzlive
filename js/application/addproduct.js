function addproduct()
{    var p_name = $('#p_name').val();
    var uom =$('#drpdwn').val();
    var sku =$('#sku').val();
    var upc =$('#upc').val();
    var notes =$('#notes').val(); 
    var product = {"name":p_name,"uom":uom,"sku":sku,"upc":upc,"notes":notes,}; 
 var objectDataString = JSON.stringify(product);
 alert(objectDataString);
$.ajax({type:"POST",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product",contentType:'application/json',headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': 'SPIDERGAUTH parima.jain@ebabu.co:ZGY2ZjU4ODA4ZWJmZDNlNjA5YzIzNGNmMjI4M2E5ODk6VEVTVFNFQ1JFVDoxNDQzMDg3MTQxNjUz:cd72bd7536524f9191224a23ca6e1f3f'},
        data : objectDataString,
		success: function (data) { 
               alert('Success');

            },
            error: function (err) { 
            }
        });  
}
