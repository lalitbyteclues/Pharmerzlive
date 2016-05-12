/*var loginToken = 1234;
var loginTokenTS = 7890;*/
var csecret = 'PHARMERZPSECRET';
var authheader = '';
categorylistparsed=[];
var counter = 0;
function createAuthenticationHeader(username, password, loginToken, loginTokenTS) {
    if (password) {
        var passwordmd5 = CryptoJS.MD5(password);
        var b64string = btoa(passwordmd5 + ":" + csecret + ":" + loginTokenTS);
        // console.log("authHeader: "+username+":"+b64string+":"+loginToken);
        return username + ":" + b64string + ":" + loginToken;
    }
    else {
        // console.log("authHeader: "+username);
        return username;
    }
} 
function submitLoginMyData() {
 $("#danger").css("display", "none");
$(".se-pre-con").fadeIn("slow");
var username = $('input[name="loginUsername"]').val();
var password = $('input[name="loginPassword"]').val();
$.ajax({url: loginAddress,headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization':"SPIDERGAUTH " + spiderG.createAuthenticationHeader(username,null,"","")},success:function(response){
spiderG.getLoginToken(username, function (err, authheader) {
                $.ajax({url: 'http://vpn.spiderg.com:8081/SpiderGAPIServer/api/login',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, spiderG['loginToken'], spiderG['loginTokenTS'])},success:function(data){
                      localStorage.setItem('username', username);
					  localStorage.setItem('password', password); 
                        document.cookie = 'password=' + password; 
							$(".se-pre-con").fadeOut("slow");
						alert("You are logged in."); 
						window.location.href = "/index.php?username=" + username;
                    },
                    error: function (err) {
							$(".se-pre-con").fadeOut("slow");
                        if (err.responseText == "Organization Inactive") {
                            $.ajax({url:resendaddress + "?email=" + username + "&tokenvia=SMS",type:"POST",dataType: 'text',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization':"SPIDERGAUTH " + "register"}, success:function(rsverify){
                                getRegistrationToken(username, password, "SMS");
                            },error: function (err) {  }
                            });
                        }else if( err.responseText == "User Inactive")
						{ 	 $(".alert-danger").html("User Inactive. Please mail to  <a href='mailto:support@pharmerz.com?subject=To activate My User "+username+" | Pharmerz.com&body=please review my account my mail id is inactive '>support@pharmerz.com</a>"); 
							$("#danger").css("display", "block");
						}
						else{ 
						
						$(".alert-danger").html("Check Your User Name and Password."); 
                        $("#danger").css("display", "block");
						}
                       
                    }
                });
            });

        }, error: function (err) {
			$(".se-pre-con").fadeOut("slow");
            $(".alert-danger").html("Check Your User Name and Password.");
            $("#danger").css("display", "block");
        }
    });
    /* get login token from spiderg server */

};

$(document).ready(function () {
    var username = localStorage.getItem('username');
    var password = localStorage.getItem('password');  
   $.ajax({type:"GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/category",contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + "register"}, success: function (data) {
			categorylistparsed = data;
                for (var j = 0; j < categorylistparsed.length; j++) {
                    $('#mycate').append("<li><a href=\"/products.php?categoryid=" + categorylistparsed[j].id + "\" class=\"apiLink\" id=\"link-"
               + categorylistparsed[j].id + "\" onClick=\"_addapi('" + categorylistparsed[j].name + "','" + categorylistparsed[j].id + "','" + categorylistparsed[j].spg_org_id + "')\">" + categorylistparsed[j].name + "</a></li>");
                };
            }, error: function (err) {   }
        }); 
});

function addproduct(username, password) {
    var p_name = $('#p_name').val(); var uom = $('#drpdwn').val(); var category = $('#catdrpdwn').val(); var sku = $('#sku').val(); var upc = $('#upc').val(); var notes = $('#notes').val();
    var purchase = $("input[name='ispurchased']:checked").val(); var sold = $("input[name='issold']:checked").val(); var ispublic = $("input[name='ispublic']:checked").val();
    if ($('#addproduct').parsley('validate')) {
        if (p_name != '' && category !== '') {
            var product = { "ispurchased": purchase, "issold": sold, "ispublic": ispublic, "name": p_name, "uom": uom, "category_id": category, "sku": sku, "upc": upc, "notes": notes, };
            var objectDataString = JSON.stringify(product);
           // console.log(objectDataString);
            spiderG.getLoginToken(username, function () {
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
                $.ajax({
                    type: "POST",
                    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product",
                    contentType: 'application/json',
                    contentLength: objectDataString.length,
                    headers: {
                        'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                        'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)
                    },
                    data: objectDataString,
                    success: function (data) {
                        alert('Success');
                    },
                    error: function (err) {
                       // console.log(err);
                        
                    }
                });
            });
        }
        else {
            alert('Product name is required.');
        }
    }
}

function updateprofile(username, password) {

    var id_usr = $('#id_usr').val();
    var name = $('#name').val();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();

    var email = $('#email').val();
    var username = $('#username').val();
    var phone = $('#phone').val();
    var password = $('#password').val();
    var gsid = $('#gsid').val();
    var active = $('#active').val();
    var user_data = {        "id": id_usr,        "name": name,        "firstname": firstname,        "lastname": lastname,        "email": email,        "username": username,        "phone": phone,        "password": password,        "gsid": gsid,        "active": active,    };
    var objectDataString = JSON.stringify(user_data); 
    spiderG.getLoginToken(username, function () {
        var loginToken = spiderG['loginToken'];
        var loginTokenTS = spiderG['loginTokenTS'];
        $.ajax({type: "PUT",url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user",contentType: 'application/json',contentLength: objectDataString.length,headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data: objectDataString,success: function (data, textStatus) {
			alert('SuccessFully Updated');
            },
            error: function (err) {}}); });}

function updatadd(username, password) {

    var addln_1 = $('#addln_1').val();
    var addln_2 = $('#addln_2').val();
    var city = $('#city').val();
    var region = $('#region').val();
    var pincode = $('#pincode').val();
    var country = $('#country').val();
    var id = $('#id').val(); 
	var orgid=$("#orgid").val();
	var user_data={};
	if(id.length>0){
   user_data = {"addressline1": addln_1,"addressline2": addln_2,"postalcode": pincode,"city": city,"region": region,"country": country,"id":id,"isinvoicelocation":'Y'};
	}else{ user_data = {"addressline1": addln_1,"addressline2": addln_2,"postalcode": pincode,"city": city,"region": region,"country": country,"isinvoicelocation":'Y'};} 
    var objectDataString = JSON.stringify(user_data); 
    spiderG.getLoginToken(username, function () {
        var loginToken = spiderG['loginToken'];
        var loginTokenTS = spiderG['loginTokenTS'];
			if(id.length>0){
        $.ajax({type:"PUT",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location",contentType: 'application/json',contentLength: objectDataString.length,headers: {
                'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)
            },
            data: objectDataString,
            success: function (data, textStatus) { 
                alert('Updated SuccessFully'); 
            },
            error: function (err) {
                //console.log(err);
                
            }
        });
		}else{
		   $.ajax({type:"POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location",contentType: 'application/json',contentLength: objectDataString.length,headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data: objectDataString,success: function (data, textStatus) { 
              var orgupdate={"id":orgid,"location":data};
			   var orgjson = JSON.stringify(orgupdate); 
				$.ajax({type:"PUT",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org/me",contentType: 'application/json',contentLength: orgjson.length,headers: {'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data: orgjson,success: function (responseorg) { 
				
				}});
			 // console.log(data);
			   alert('Created SuccessFully'); 
            },
            error: function (err) {
               // console.log(err);
                
            }
        });
		
	}

    });
}

$(document).ready(function () {
    var username = localStorage.getItem('username');
    var password = localStorage.getItem('password');
    spiderG.getLoginToken(username, function () {
        var loginToken = spiderG['loginToken'];
        var loginTokenTS = spiderG['loginTokenTS'];
        $.ajax({type: "GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user/me",contentType: 'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},success: function (people) {
				  localStorage.setItem('imgurl', people.imgurl); 
            },
            error: function (err) {            
            }
        });
    });
});

/*Quoatation Send*/
function sendquotation(username, password) {
	$(".se-pre-con").fadeIn("slow");
    var func = new Date();
    var docNo = "QT/" + func.getDate() + "/" + (func.getMonth() + 1) + "/" + func.getFullYear() + "/" + (func.getTime() + counter+"");
    counter++;	
    var totallines =1;
    var grandtotal = $("#excludetaxes").val();
    var offerdate = $("#offerdate").val();
    var baprtid = $("#baprtid").val();
    var senderorgid = $("#senderorgid").val(); 
    var dloctaion = $("#dloctaion").val();
    var notes = $("#notes").val();
    var receiveremail = $("#remail").val();
    var datepromised = $("#offerdate").val();
    var datepromissed = new Date(datepromised); // some mock date
    var milliseconds = datepromissed.getTime()/1000;
    var rfqlineid = $("#rfqlineid").val();
    var rfqid = $("#rfqid").val();
    var uom = $("#uom").val(); 
    var tax = $("#taxes").val(); 
	  currenttimestamp=Math.floor(Date.now() / 1000); 
    var pro_id = $("#pro_id").val();
    var price = $("#price").val();
    var quantity = $("#quantity_hidden").val();
    var includetaxes = $("#includetaxes").val();
    var linegrossamount = $("#includetaxes").val();
    var linenetamount = $("#includetaxes").val();   
    spiderG.getLoginToken(username, function () {
    if ($('#sendqutn').parsley('validate')) {
if (totallines != '' && grandtotal != '' && offerdate != '' && baprtid != '' && dloctaion != '' && datepromised != '' && includetaxes != '' && linegrossamount != '' && linenetamount != '' && price != '') {
var qut_data ={"documentno":docNo,"receiveremail":receiveremail,"bpartner":senderorgid,"rfqreferenceno":rfqid,"dateordered":currenttimestamp,"datepromised":milliseconds,"validity":currenttimestamp,"currency":"INR","totallines":grandtotal,"deliverylocation":dloctaion,"grandtotal":includetaxes,"notes":notes,"freightamt":grandtotal};
var loginToken=spiderG['loginToken'];
var loginTokenTS=spiderG['loginTokenTS'];
$.ajax({type:"POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/quotation",contentType:'application/json',dataType: 'text',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " +createAuthenticationHeader(username,password,loginToken,loginTokenTS)},data:JSON.stringify(qut_data),success:function (data, textStatus) {
var documentid=data; 
var qutline_data ={"quotationid":data,"lineno":1,"product":pro_id,"rfqlineid":rfqlineid,"quantity":quantity,"uom":uom,"price": price,"tax":tax,"taxamt": parseFloat((includetaxes-grandtotal).toFixed(2)),"linenetamount":grandtotal,"linegrossamount": linegrossamount};

$.ajax({type:"POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/quotationline",contentType: 'application/json',dataType: 'text',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data:JSON.stringify(qutline_data),success:function(dataline,textStatus) {
 
var qutmail_data = {"receiverorg":senderorgid,"dtype": "quotation","documentid": documentid ,"senderorg":baprtid}; 
$.ajax({type:"POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox",contentType:'application/json',dataType: 'text',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization':"SPIDERGAUTH "+createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data:JSON.stringify(qutmail_data),success: function (data, textStatus) {
											alert('Quotation Sent Successfully');
											 window.location.href = "show_quotation.php";
										},
										error: function (err) { $(".se-pre-con").fadeOut("slow");  }
								    }); 
							},error: function (err) { $(".se-pre-con").fadeOut("slow");  } 
						});  
                },
                error: function (err) {$(".se-pre-con").fadeOut("slow");
                  // console.log(err); 
                } });}
        else {
            alert('Please fill all required fields.');
			$(".se-pre-con").fadeOut("slow");
            return false;
	} }});
}  
function sendpo(username, password) {
	$(".se-pre-con").fadeIn("slow");
    var func = new Date();
    var docNo = "PO/" + func.getDate() + "/" + (func.getMonth() + 1) + "/" + func.getFullYear() + "/" + (func.getTime() + counter);
    counter++;
    var date_ordered = $("#hidden_date").val();
    var baprtid = $("#baprtid").val();
    var dloctaion = $("#dloctaion").val();
    var notes = $("#notes").val();
    var deliveryterms = $("#deliveryterms").val();
    var currency = $("#currency").html();
    var grandtotal = $("#grandtotal").val();
    var totallines = $("#totallines").val();
    var remail = $("#remail").val();
    var quantity = $("#quantity").val(); 
    var price = $("#price").val();
    var tax = $("#tax").val();
    var taxamt = $("#taxamt").val();
    var linenetamount = $("#linenetamount").val();
    var linegrossamount = $("#linegrossamount").val();
    var qtnlineid = $("#qtnlineid").val();
    var qtnid = $("#qtnid").val();
    var uom_id = $("#uom_id").val();
    var pro_id = $("#pro_id").val();
    var lineno = $("#lineno").val(); 
    if ($('#po').parsley('validate')) {
        if (totallines != '' && grandtotal != '' && quantity != '' && price != '' && tax != '' && taxamt != '' && docNo != '' && date_ordered != '' && taxamt != '') {
			var qut_data = {"documentno":docNo,"issuedate":date_ordered,"currency":"INR","deliverylocation":dloctaion,"deliveryterms":deliveryterms,"notes":notes,"receiveremail":remail,"bpartner":baprtid,"grandtotal":parseFloat(grandtotal),"totallines":parseFloat(linenetamount),"quotereferenceno":qtnid};
		   var objectDataString = JSON.stringify(qut_data);
      spiderG.getLoginToken(username, function () {
var loginToken = spiderG['loginToken'];
var loginTokenTS = spiderG['loginTokenTS'];
$.ajax({type: "POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/purchaseorder",contentType: 'application/json',dataType: 'text',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data:objectDataString,success:function(data, textStatus){
var poid=data;
var qutline_data = {"lineno":1,"product":pro_id,"quantity":parseFloat(quantity),"taxamt":parseFloat(taxamt),"tax":tax,"poid":data,"price":parseFloat(price),"linenetamount":parseFloat(linenetamount),"uom":uom_id,"linegrossamount":parseFloat(linegrossamount)};
 var objectDataString = JSON.stringify(qutline_data); 
    $.ajax({type: "POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/purchaseorderline",contentType:'application/json',dataType: 'text',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data: objectDataString,success: function (data, textStatus){
		var qutmail_data = {"receiverorg": baprtid,"dtype": "po","documentid": poid};
		var objectDataString = JSON.stringify(qutmail_data);  
		$.ajax({type:"POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox",contentType:'application/json',dataType: 'text',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data: objectDataString,success: function (data, textStatus) {
			alert('PO Sent SuccessFully');
			 window.location.href = "show_po.php";
        },error: function (err) {$(".se-pre-con").fadeOut("slow");
                 alert('Error while po sending'); } 
    }); 
        } ,error: function (err) {$(".se-pre-con").fadeOut("slow");
                 alert('Error while po sending'); } 
    });
	},error: function (err) {$(".se-pre-con").fadeOut("slow");
                 alert('Error while po sending'); }    });
            });
        }
        else {$(".se-pre-con").fadeOut("slow");
            alert('Please fill all required fields.');
            return false;
        }
    }
}   
function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
 } 
function createinvoice(username, password) { 
$(".se-pre-con").fadeIn("slow");
    var docNo = $("#documentno").val();   
    var issuedate =new Date($("#invoicedate").val()).getTime()/1000;
    var invoiceduedate =new Date($("#invoiceduedate").val()).getTime()/1000; 
    var baprtid = $("#baprtid").val();
    var dloctaion = $("#dloctaion").val();
    var notes = $("#notes").val();
    var currency = $("#currency").html();
    var grandtotal = $("#grandtotal").val();
    var totallines = $("#totallines").val();
    var remail = $("#remail").val();
    var quantity = $("#quantity").val(); 
    var price = $("#price").val();
    var tax = $("#tax").val();
    var taxamt = $("#taxamt").val();
    var linenetamount = $("#linenetamount").val();
    var linegrossamount = $("#linegrossamount").val();
    var qtnlineid = $("#qtnlineid").val();
    var uom_id = $("#uom_id").val();
    var pro_id = $("#pro_id").val();
    var lineno = $("#lineno").val();
    var myorgid = $("#myorgid").val(); 
    if ($('#createinvo').parsley('validate')) {
        if (totallines != '' && grandtotal != '' && quantity != '' && price != '' && tax != '' && taxamt != '') {
            var invoice_data ={"id":"","documentno":docNo,"issuedate":issuedate,"paymentduedate":invoiceduedate,"currency":"INR","receiveremail":remail,"bpartner":baprtid,"notes":notes,"grandtotal":parseFloat(grandtotal),"totallines":parseFloat(totallines),"taxamt":parseFloat(taxamt)};
            var objectDataString = JSON.stringify(invoice_data);
            spiderG.getLoginToken(username, function () {
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
                $.ajax({type:"POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/invoice",contentType:'application/json',dataType: 'text',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data:objectDataString,success:function (data, textStatus){
					invoiceid=data;
						var qutline_data ={"id":"","invoiceid":invoiceid,"lineno":"1","product":pro_id,"quantity":quantity,"uom":uom_id,"price":parseFloat(price),"linenetamount":parseFloat(linenetamount),"linegrossamount":parseFloat(linegrossamount),"tax":tax,"taxamt":parseFloat(taxamt)};
			var objectDataString = JSON.stringify(qutline_data); 
			$.ajax({type:"POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/invoiceline",contentType:'application/json',dataType: 'text',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},
				data: objectDataString,
			success: function (data, textStatus) { 
             var invomail_data = {"receiverorg":baprtid,"dtype":"invoice","documentid":invoiceid,"senderorg": myorgid};
				var objectDataString = JSON.stringify(invomail_data); 
				$.ajax({type:"POST",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox",contentType: 'application/json',dataType: 'text',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},data: objectDataString,success: function (data, textStatus){
					alert('Invoice Create SuccessFully');
				    window.location.href = "show_invoice.php";
				},error:function(err){
					$(".se-pre-con").fadeOut("slow");
				alert('Error While Creating Invoice');
				}});},error: function (err) {
					$(".se-pre-con").fadeOut("slow");
				alert('Error While Creating Invoice'); }
    });  
	},error: function (err) {
		$(".se-pre-con").fadeOut("slow");
	alert('Error While Creating Invoice');}
   }); 
   });
 }else{ 
 $(".se-pre-con").fadeOut("slow");
 alert('Please fill all required fields.');
            return false;
        }
    }
} 
