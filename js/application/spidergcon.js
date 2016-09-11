var apis = {};
var selectedApis = [];
var selectedValues = {};
var suppliersTemplate = "<h3>##APINAME##</h3><ul>##SUPPLIERS##</ul>";
var counter = 0;
var deliverylocation = "";
var supplierIndex = 0;
var locationObjects = [];
var locationIds = [];
var rfqObject = [];
var xxx = 1;
var aaa = 1;
var yyy = 1;
var zzz = 1;
var ppp = 1;
var ooo = 1;

var app = angular.module('pharmerz', ['infinite-scroll']);
app.constant('RESOURCES', (function () {
    return {API_BASE_PATH: 'http://vpn.spiderg.com:8081/SpiderGAPIServer/api/',APIKey:'e5e3b300-31e9-4ad2-a705-4f8935218fcb' }
	})())
app.controller("productscontroller", function ($scope, $http, RESOURCES,$q) {
$scope.locationid="";
$scope.uomid="";
$scope.character='a'; $scope.isbusy=true; $scope.sortby="name";$scope.products=[];$scope.supplierslist=[];
$scope.categorylistparsed=[];	$scope.pageno=1;	$scope.limit=12;
	$scope.tabstatus=1; 
	
	$scope.changesortorder=function(order){
		$scope.sortby=order;
	}
	$scope.searchdata=function(){
    $scope.locations=[];
	$scope.uom=[];
	$scope.isbusy=true;  
	var param=location.search.substring(1).split("="); 
	var pro_url =""; 	
	$scope.product={};   
	if(param.length>0){ 
		if(param[0]=='categoryid'){
			pro_url =RESOURCES.API_BASE_PATH + "product?category_id=" +param[1]+ "&namelike=" + $scope.character + "&offset="+(($scope.pageno-1)*$scope.limit)+"&public=Y&limit="+$scope.limit+"&unique=Y";
		 }
		else
		if(param[0]=='namelike')
		{ 
	$scope.character=param[1].substring(0,1);
	pro_url = RESOURCES.API_BASE_PATH + "product?namelike=" + param[1] + '&public=Y&offset='+(($scope.pageno-1)*$scope.limit)+'&limit='+$scope.limit+'&unique=Y';
		}else{
		  pro_url = RESOURCES.API_BASE_PATH + "product?namelike=" + $scope.character + '&offset='+(($scope.pageno-1)*$scope.limit)+'&public=Y&limit='+$scope.limit+'&unique=Y';
		}
	}
	else{
		  pro_url = RESOURCES.API_BASE_PATH + "product?namelike=" + $scope.character + '&offset='+(($scope.pageno-1)*$scope.limit)+'&public=Y&limit='+$scope.limit+'&unique=Y';
		}   
    $("#slider").css('visibility', 'hidden');
    document.getElementById("error1").style.display = 'none';
    $(".se-pre-con").fadeIn("slow");
	$(".se-pre-con").fadeIn("slow");
console.log(pro_url);	
$http.get(pro_url, {headers: {'SPIDERG-API-Key':RESOURCES.APIKey,'SPIDERG-Authorization': "SPIDERGAUTH " + "register" }
}).then(processFile); 
	}
	 function processFile(response) {  
	 if(response.data.length==0){
		 $scope.isbusy=false; 
		  document.getElementById("error1").style.display = 'block';
	 }
	 return $q.all(response.data.map(function (file) {
                return getNumber(file);
            })); 
	 }
	  function getNumber(file) {
		  $http.get(RESOURCES.API_BASE_PATH + "product?namelike=" + file.name + '&public=Y&limit=500', {headers: {'SPIDERG-API-Key':RESOURCES.APIKey,'SPIDERG-Authorization': "SPIDERGAUTH " + "register" }
}).then(processFilesuppl);  
	  }
	   function processFilesuppl(response) { 
	     return $q.all(response.data.map(function (file) {
                return getNumbersupply(file);
            }));
	   }
function getNumbersupply(file) {
			$http.get(RESOURCES.API_BASE_PATH+"org?orgid="+file.spg_org_id, {headers: {'SPIDERG-API-Key':RESOURCES.APIKey,'SPIDERG-Authorization': "SPIDERGAUTH " + "register" }
			}).then(function(supp){  
			if($scope.character.toLowerCase()==file.name.substring(0,1).toLowerCase()){
				$scope.products.push({name:file.name,imgurl:file.imgurl,id:file.id,suppliername:supp.data.name,supplierid:supp.data.id,category_name:$.grep($scope.categorylistparsed, function(b){return b.id == file.category_id;})[0].name}); 
				$scope.isbusy=false;
				}else{ 
					$scope.isbusy=true;
				}
				 
			});
	}
	$scope.searchtext=function(txt){ 
		$scope.pageno=1;
		$scope.character=txt;
		$scope.products=[];
		$scope.searchdata(); 
	}
	$scope.changepageno=function(){
if($scope.isbusy==false && $scope.tabstatus==1){
		$scope.pageno=$scope.pageno+1; 
		$scope.searchdata(); }		
	}
	 $.ajax({type:"GET",url:RESOURCES.API_BASE_PATH + "product/category",contentType:'application/json',headers:{'SPIDERG-API-Key':RESOURCES.APIKey,'SPIDERG-Authorization': "SPIDERGAUTH " + "register"}, success: function (data) {
			$scope.categorylistparsed = data; 		
            } 
        }); 
	$scope.searchdata();
$scope.sendproductenquiry=function(data){
	var username = localStorage.getItem('username');
	var password = localStorage.getItem('password');
	$scope.product= data; 
	if (username == "" || username == null) {
		$("#login-modal").modal();
		return false;
	}
	$scope.isbusy=true; 
	 spiderG.getLoginToken(username, function () {
        var loginToken = spiderG['loginToken'];
        var loginTokenTS = spiderG['loginTokenTS'];
	$.ajax({ type: "GET", url:RESOURCES.API_BASE_PATH+"location", contentType: 'application/json', headers: { 'SPIDERG-API-Key':RESOURCES.APIKey, 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) },
	success: function (people) { 
		$scope.locations=people;
		 $.ajax({type:"GET",url: RESOURCES.API_BASE_PATH+"uom",contentType:'application/json',headers:{ 'SPIDERG-API-Key':RESOURCES.APIKey, 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) },
		 success: function (peopleuom) {
				$scope.uom=peopleuom; 
				$scope.isbusy=false; 
				$scope.$apply();
		 }});
	 }});});
	$scope.tabstatus=2; 
}
$scope.submitLoginForm =function() {
    $(".se-pre-con").fadeIn("slow");
	$scope.isbusy=true; 
    var username = $('input[name="usernameLogin"]').val();
    var password = $('input[name="password"]').val(); 
    async.series([
        function (callback) { 
            $.ajax({url: loginAddress, headers: { 'SPIDERG-API-Key':RESOURCES.APIKey, 'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, null, "", "")                }, success: function (response) {
                    spiderG.getLoginToken(username, function (err, authheader) {$.ajax({url:RESOURCES.API_BASE_PATH + 'login',                            headers: {                                'SPIDERG-API-Key':RESOURCES.APIKey,                                'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, password, spiderG['loginToken'], spiderG['loginTokenTS']) },
                            success: function (data) {
                                $("#login-modal").hide();
                                localStorage.setItem('username', username);
                                localStorage.setItem('password', password);
                                document.cookie = 'username=' + username;
                                document.cookie = 'password=' + password;
								  $(".modal-backdrop").fadeOut("slow");
                                callback();
								 jQuery("#div_session_write").load("/session_write.php?username=" + username); 
								$scope.sendproductenquiry($scope.product);
                            },
                            error: function () { 
                                $(".se-pre-con").fadeOut("slow");
                              
                                $(".alert-danger").html("Check Your User Name and Password.");
                                $("#danger").css("display", "block");
                                callback('Error');
                            }
                        });
                    });
                }, error: function () { 
                    $(".se-pre-con").fadeOut("slow");
                    $("#danger").css("display", "block");
                    $(".alert-danger").html("Check Your User Name and Password.");
                    callback('Error');
                }
            });
        } 
    ],
      function (err, results) {
          if (err) {  }
          else {
              $("#loginanchortag").hide();
              $(".modal-open").css("overflow", "scroll");
              jQuery("#div_session_write").load("/session_write.php?username=" + username); 
          }
      });
}
$scope.selectproducts=function(){
	$scope.tabstatus=1;
}
$scope.sendenquiry=function(){ 
    var username = localStorage.getItem('username');
    var password = localStorage.getItem('password');    
    var uom = localStorage.getItem('uomtext_1');
    var func = new Date();
    var docNo = "EN/" + func.getDate() + "/" + (func.getMonth() + 1) + "/" + func.getFullYear() + "/" + (func.getTime() + counter);
    counter++;
    var d =parseInt(new Date().getTime() / 1000);
    var product = { "documentno": docNo, "issuedate": d, "currency": "INR", "deliverylocation": $scope.locationid, "bpartner": $scope.product.supplierid, "notes": $scope.message, };
    var str = JSON.stringify(product);
    spiderG.getLoginToken(username, function (err, authheader) {
        var loginToken = spiderG['loginToken'];
        var loginTokenTS = spiderG['loginTokenTS'];
        $.ajax({type:"POST",url:RESOURCES.API_BASE_PATH + "rfq",data:str,contentType:'application/json',dataType: 'text',headers:{'SPIDERG-API-Key':RESOURCES.APIKey,'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS)},success: function (data){
				rfqid = data; 
                    var rfqitem = { "rfqid": rfqid, "lineno": "1", "product": $scope.product.id, "quantity": $scope.quantity, "uom": $scope.uomid, "notes":  $scope.message };
                    var strrfqitem = JSON.stringify(rfqitem);
                    $.ajax({type: "POST", url: RESOURCES.API_BASE_PATH + "rfqlineitem", data: strrfqitem, contentType: 'application/json',dataType: 'text'                    , headers: { 'SPIDERG-API-Key':RESOURCES.APIKey, 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }                    , success: function (data) { 
                            var mail_rfq = { "receiverorg": $scope.product.supplierid, "dtype": "rfq", "documentid": rfqid };
                            var str = JSON.stringify(mail_rfq);
                            $.ajax({type: "POST", url: RESOURCES.API_BASE_PATH + "mailbox", data: str, contentType: 'application/json' ,dataType: 'text'                          , headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) },success: function (mailresponse) { 
									 $(".se-pre-con").fadeOut("slow");
									 alert("Your Enquiry has submitted successfully.");
									$scope.isbusy=false; 
									window.location.href = "/index.php?username=" + username;
                                },
                                error: function (err) {
                                    $(".se-pre-con").fadeOut("slow");
                                    alert("Error in Enquiry."); 
                                }
                            }); 
						},error: function (err) {
                            $(".se-pre-con").fadeOut("slow");
                            alert("Error in Enquiry.");
                        }
                    }); 
                status = 1;
            },error: function (err) { 
				console.log(err);
                $(".se-pre-con").fadeOut("slow");
                alert("Error in Enquiry."); 
            }
        });
    }); 
}
	
});


$(function () {
    makeCustomUOM();
    sessnamea = localStorage.getItem('sess_name');
    sessida = localStorage.getItem('sess_id');
    sessorgida = localStorage.getItem('sess_orgid');
    var mydaa = localStorage.getItem('myCustData');
    if (sessnamea != '' || sessida != '' || sessorgida != '') {
        localStorage.setItem('sess_name', '');
        localStorage.setItem('sess_id', '');
        localStorage.setItem('sess_orgid', '');
    }
    if (mydaa != '') {
        localStorage.setItem('myCustData', '');
    }
    var wizard = $("#wizard").steps({
        enableFinishButton: false,
        // enableAllSteps: true,
        onStepChanging: function (event, currentIndex, newIndex) {
            var noError = true;
            if ((currentIndex == 0) && !checkForSelectedApis()) {    // Check if api is selected or not
                //show alert
                alert("Select atleast one api");
                //cancel step
                return false;
            }
            if (currentIndex == 0) { }
            var username = localStorage.getItem('username');
            var password = localStorage.getItem('password');
            if (newIndex == 2 && (username == "" || username == null)) {
                $("#login-modal").modal();
                return false;
            }
            if (currentIndex == 1 && newIndex == 2) {
                var productcount = 0;
                var supplierscount = 0; 
                for (property in selectedValues) {
                    if (selectedValues[property]["suppliers"].length !== 0) {
                        if (supplierscount == 0) {
                            supplierscount = 1;
                        }
                        productcount++;
                    }
                }
                if (supplierscount == 0) {
                    alert("Please select at least one supplier for Suppliers");
                    $(".se-pre-con").fadeOut("slow");
                    return false;

                }
                if (productcount > 1) {
                    alert("Please select Only one Product for All Products");
                    $(".se-pre-con").fadeOut("slow");
                    return false;
                }
            }

            if (currentIndex == 1 && newIndex == 2) {
                makeRFQDataTemplate();
                return true;
            }
            if (currentIndex == 2) {
                if (currentIndex == 2 && newIndex == 1) {
                    return true;
                }
                //checkForInputs
                $('#valuesForm input[type="text"]').each(function (index, element) {
                    if (element.value.trim() == "") {
                        // currentPageIndex--;
                        noError = false;
                        alert("All inputs must be filled.");
                        return false;
                    }
                });

                if (noError) {
                    saveInputs();
                }
            }

            return noError;
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            if (currentIndex == 1 && priorIndex == 0) {
                supplierIndex = 0;
				$("#selectedApi1").html("");
				$("#selectedApi2").html("");
				$("#selectedApi3").html("");
				$("#selectedApi4").html(""); 
                localStorage.setItem('sess_orgid', ''); $(".se-pre-con").fadeIn("slow");
                async.eachSeries(selectedApis, getSuppliers, function (err, result) {
                    $('.tick').on('click', addSupplier);
                    $(".se-pre-con").fadeOut("slow");
                    counter++;
                });
            }
            if (currentIndex == 2) {
            }
            if (currentIndex == 3) {
                saveDataInputs();
            }
        }
    });
    /* International number flag dropdown */
    $("#demo").intlTelInput({
        defaultCountry: "auto",
        geoIpLookup: function (callback) {
            $.get('http://ipinfo.io', function () { }, "jsonp").always(function (resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        //preferredCountries: [ "india" ],
        utilsScript: "js/application/utils.js" // just for formatting/placeholders etc
    });
});

/* Make GET request for API's List */
function getAPIs(searchitem, categoryid, username, password) {
	
}

var _addapi = function (name, id, org_id) {
    var sessname = localStorage.getItem('sess_name');
    var sessid = localStorage.getItem('sess_id');
    var sessorgid = localStorage.getItem('sess_orgid');
    if (sessname == null || sessid == null || sessorgid == null || sessname == '' || sessid == '' || sessorgid == '') {
        localStorage.setItem('sess_name', name);
        localStorage.setItem('sess_id', id);
        localStorage.setItem('sess_orgid', org_id);
    }
    else {
        if (sessid.indexOf(id) == -1) {
			if (selectedApis.length < 1) 
			{
				localStorage.setItem('sess_name', (sessname + ',' + name));
				localStorage.setItem('sess_id', (sessid + ',' + id));
				localStorage.setItem('sess_orgid', (sessorgid + ',' + org_id));
			}
		}
    }
    var index = selectedApis.indexOf(name);
    if (index == -1) {
		 if (selectedApis.length < 1) 
		 {
        selectedApis[name] = apis[name];
        selectedApis.push(name);
        $('#link-' + id).css('background-color', "#8e8e8e");
        $('#link-' + id).css('color', "#ffffff");
		 selectedValues[name] = { "suppliers": [] };
		 }else{
			  alert("You can not select more than one API.Please select the Suppliers");
		 }
    }
    else {
        selectedApis.splice(index, 1);
        $('#link-' + id).css('background-color', "#ffffff");
        $('#link-' + id).css('color', "#131110");
    }
    /* allow only four apis to add */
    //if (selectedApis.length == 5) {
        //selectedApis.splice(4, 1);
        //alert("You can not select more than Four APIs.Please select the Suppliers");
        /* trigger click event after selecting four apis */
        //$('a[href="#next"]').trigger('click');
    //}
}
function sortResults(prop, asc) {
    people = people.sort(function(a, b) {
        if (asc) return (a[prop] > b[prop]) ? 1 : ((a[prop] < b[prop]) ? -1 : 0);
        else return (b[prop] > a[prop]) ? 1 : ((b[prop] < a[prop]) ? -1 : 0);
    }); 
}
function checkForSelectedApis() {
    return (selectedApis.length != 0);
}; 
getSuppliers = function (name, callback) {
    $.ajax({
        type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product?namelike=" + name + '&public=Y&limit=500', contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + "register" }
    , success: function (data) { 
        people = data;
		sortResults('spg_org_id', true);
        var org_id = "";
        var supplierList = "";
        var counternoofcalls = 0;
        var newTemplate = suppliersTemplate.replace("##APINAME##", name);
        for (var j = 0; j < people.length; j++) {
            if (org_id != people[j].spg_org_id) {
                $.ajax({
                    type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org?orgid=" + people[j].spg_org_id, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + "register" }, success: function (suppliers) {
                        var supplierTemplate = "<li><input id='" + suppliers.id + "' type='checkbox' name='##NAME##' class='tick' style='margin-right: 10px;'>##NAMEATTR##</li>";
                        supplierList += supplierTemplate.replace("##NAMEATTR##", suppliers.name).replace("##NAME##", suppliers.name);
                        xxx++;
                        counternoofcalls++;
                    }
                });
                org_id = people[j].spg_org_id;
            } else { counternoofcalls++; }
        }

        var checkertime = setInterval(function () {
            if (counternoofcalls == people.length) {
                newTemplate = newTemplate.replace("##SUPPLIERS##", supplierList);
                $("#selectedApi" + (supplierIndex + 1)).html(newTemplate);
                supplierIndex++;
                clearTimeout(checkertime);
                callback();
            }
        }, 50);
    }
    });
}
function makeCustomUOM() {
    var username = localStorage.getItem('username');
    var password = localStorage.getItem('password');
    spiderG.getLoginToken(username, function () {
        var loginToken = spiderG['loginToken'];
        var loginTokenTS = spiderG['loginTokenTS'];
        $.ajax({
            type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom", contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) },
            success: function (peopleuom) {
                localStorage.removeItem('myUOMDataID');
                localStorage.removeItem('myUOMDataVal');
                for (var j = 0; j < peopleuom.length; j++) {
                    var myuomid = localStorage.getItem('myUOMDataID');
                    var myuomval = localStorage.getItem('myUOMDataVal');
                    if (myuomid == '' || myuomid == null) {
                        localStorage.setItem('myUOMDataID', peopleuom[j].id);
                        localStorage.setItem('myUOMDataVal', peopleuom[j].name);
                    }
                    else {
                        localStorage.setItem('myUOMDataID', myuomid + ',' + peopleuom[j].id);
                        localStorage.setItem('myUOMDataVal', myuomval + ',' + peopleuom[j].name);
                    }
                }
            }
        });
        //End
    });
}
function sleep(miliseconds) {
    var currentTime = new Date().getTime();
    while (currentTime + miliseconds >= new Date().getTime()) {
    }
}
function makeRFQDataTemplate() {
    makeCustomUOM();
    var username = localStorage.getItem('username');
    var password = localStorage.getItem('password');
    spiderG.getLoginToken(username, function () {
        var loginToken = spiderG['loginToken'];
        var loginTokenTS = spiderG['loginTokenTS'];
        $.ajax({
            type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location", contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) },
            success: function (people) {
                var final_loc = ' ';
                if (people.length > 0) {
                    final_loc += "<span style='margin-top: 10px;' class='col-md-2'>Address</span><div class='col-md-10'><select name='deliveryLocation[]' data-type='deliveryLocation' style='margin-top: 10px;' class='col-md-10  form-control'>";
                    for (var j = 0; j < people.length; j++) {
                        var loc = "<option value='" + people[j].id + "'>" + people[j].addressline1 + " " + people[j].addressline2 + " " + people[j].city + " " + people[j].region + " " + people[j].postalcode + "</option>";
                        var final_loc = final_loc + loc;
                    } final_loc += "</select></div>";
                }
                var final_uom = '';
                var myuomid = localStorage.getItem('myUOMDataID');
                var myuomval = localStorage.getItem('myUOMDataVal');
                if (myuomid != null || myuomval != null) {
                    final_uom += "<span style='margin-top: 10px;' class='col-md-2'>Unit Of Measurement</span><div class='col-md-10'><select name='uompro[]' data-type='uompro' style='margin-top: 10px;' class='form-control'>";
                    myuomid1 = myuomid.split(',');
                    myuomval1 = myuomval.split(',');
                    for (var i = 0; i < myuomid1.length; i++) {
                        myuomid11 = myuomid1[i]; // Product id
                        myuomval11 = myuomval1[i];
                        var uom = "<option value='" + myuomid1[i] + "'>" + myuomval1[i] + "</option>";
                        var final_uom = final_uom + uom;
                    }
                    final_uom += "</select></div>";
                }
                var suppliersSelectTemplate = "<span>##NAME##</span>";
                var apiFormTemplate =
                "<div class='col-md-12'><label class='col-md-12'>Product :##APINAME##</label>" +
                    "<p><b>Send TO</b>:##SUPPLIERS##</p>" +
                    "<span  class='col-md-2'>Quantity</span><div class='col-md-10'> <input type='text' onkeypress='javascript:return isNumber(event)' class='form-control' data-type='quantity' style='margin-top: 10px;' name='quantity[]' placeholder='Enter Quantity...' required /></div>" +
                    "<span class='col-md-2'>Your Message</span><div class='col-md-10'><textarea  class='form-control' data-type='notes' style='margin-top: 10px;' name='notes[]' placeholder='Delivery notes...'></textarea></div>" +
                    "" + final_loc + "" + "" + final_uom + "<span  class='col-md-2'>&nbsp;</span><div class='col-md-10'> <a href='#' style='margin-top: 10px;' class='btn btn-primary' onclick='saveDataInputs()'>Send Inquiry</a></div></div>";
                var allApis = Object.keys(selectedValues);

                var formHtml = "";
                i = 1;
                allApis.forEach(function (api) {
                    var seldivlen = $('.tick').length;
                    document.cookie = 'cookie_count=' + $('.tick').length;
                    document.cookie = 'titlename_' + i + '=' + api;
                    localStorage.setItem('cart_total', seldivlen);
                    var currentTemplate = apiFormTemplate.replace("##APINAME##", api);
                    var suppliersTemplate = "";
                    var checksuppliers = 0;
                    selectedValues[api]["suppliers"].forEach(function (supplier) {
                        document.cookie = 'textname_' + i + '=' + supplier
                        suppliersTemplate += suppliersSelectTemplate.replace("##NAME##", supplier);
                        checksuppliers++;
                    })
                    if (checksuppliers > 0) {
                        currentTemplate = currentTemplate.replace("##SUPPLIERS##", suppliersTemplate);
                        currentTemplate = currentTemplate.replace("###VALUE###", generateDocumentNumber());
                        formHtml += currentTemplate;
                        i++;
                    } else {
                        delete selectedValues[api];
                        var sessname = localStorage.getItem('sess_name');
                        var sessid = localStorage.getItem('sess_id');
                        myprodarr = sessname.split(',');
                        sessionarr = sessid.split(',');
                        for (var i = 0; i < myprodarr.length; i++) {
                            if (myprodarr[i] == api) {
                                sessname = sessname.replace(myprodarr[i] + '', '').replace(',', ''); sessid = sessid.replace(sessionarr[i], '').replace(',', '');
                                localStorage.setItem('sess_name', sessname);
                                localStorage.setItem('sess_id', sessid);
                            }
                        }
                    }
                });

                $("#valuesForm").html(formHtml);
                $(".se-pre-con").fadeOut("slow");
            },
            error: function (err) {
                //console.log(err); 
            }
        });
    });

}
function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}
generateDocumentNumber = function () {
    var func = new Date();
    var docNo = "rfq/" + func.getDate() + "/" + (func.getMonth() + 1) + "/" + func.getFullYear() + "/" + (func.getTime() + counter);
    counter++;
    //alert(docNo);
    // console.log(docNo);
    return docNo;
}

function checkForInputs() {
    $('#valuesForm input[type="text"]').each(function (index, element) {
        if (element.value.trim() == "") {
            // currentPageIndex--;
            noError = false;
            alert("All inputs must be filled.");
            return false;
        }
    });
}
// i = 1; j=1; k=1;
function saveInputs() {
    var allApis = Object.keys(selectedValues);

    allApis.forEach(function (api) {
        $('#valuesForm input[data-type="notes"]').each(function (index, element) {
            var divlen = $("#valuesForm select").length;
            localStorage.setItem('centertext_' + aaa, element.value);
            selectedValues[api]["deliveryNotes"] = element.value;
            aaa++;
        });
        $('#valuesForm input[data-type="quantity"]').each(function (index, element) {
            localStorage.setItem('starttext_' + yyy, element.value);
            selectedValues[api]["quantity"] = element.value;
            yyy++;
        });
        $('#valuesForm select[data-type="deliveryLocation"]').each(function (index, element) {
            localStorage.setItem('endtext_' + zzz, element.value);
            selectedValues[api]["deliveryLocation"] = element.value;
            zzz++;
        });
        $('#valuesForm select[data-type="uompro"]').each(function (index, element) {
            localStorage.setItem('uomtext_' + ppp, element.value);
            selectedValues[api]["uompro"] = element.value;
            ppp++;
        });
    });

    var cart_total = localStorage.getItem('cart_total');
    var rfq_id = localStorage.getItem('rfq_id');
    xxx++;
}  
function getProducts(username, password, loginToken, loginTokenTS, cb) {
    $.ajax({
        url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product",
        type: "GET",
        // contentType: 'application/json',
        //data: convertObject(locationObjects[index]),
        headers: {
            'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
            'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS)
        },
        success: function (data) {

            compareProducts(data, username, password, loginToken, loginTokenTS, cb);
        },
        error: function (err) {
            //console.log(err);
            cb(err);
        }
    });
}

function compareProducts(data, username, password, loginToken, loginTokenTS, cb) {
    var dObj;

    if (typeof data != 'object')
        dObj = JSON.parse(data);
    else
        dObj = data;

    var notexists = [];

    var apiNames = Object.keys(selectedValues);

    $.each(apiNames, function (index, apiName) {
        $.each(dObj, function (i, value) {
            if (apiNames[index] == dObj[i]['name']) {
                //productId.push(data[i].['id'])
                selectedValues[apiNames[index]]['productid'] = dObj[i]['id'];
            }
            else if (notexists.indexOf(apiNames[index]) == -1) {
                //add product to array
                notexists.push(apiNames[index]);
            }
        })
    });

    async.map(notexists, function (item, _cb) {
        $.ajax({
            url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product", type: "POST", contentType: 'application/json',
            data: convertObject(makeProductObject(item)),
            headers: {
                'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS)
            },
            success: function (data) {
                selectedValues[item]['productid'] = data;
                _cb(null);
            },
            error: function (err) {
                //console.log(err);
                _cb(err);
            }
        });
    }, function (err, results) {
        cb(err, results);
    });
}
function makeProductObject(ProductName) {
    var productObject = { "id": "", "name": ProductName, "uom": "0", "sku": null, "upc": null, "notes": "" }
    return productObject;
}
function getLocationID(username, password, loginToken, loginTokenTS, cb) {
    getUniqueLocationId();
    async.map(locationObjects, function (item, callback) {
        $.ajax({
            url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location", type: "POST", contentType: 'application/json', data: convertObject(item), headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                var apiArray = Object.keys(selectedValues);
                $.each(apiArray, function (index, apiName) {
                    selectedValues[apiName]["locationId"] = data;
                    makeRfqDataObject(selectedValues[apiName]['documentno'], selectedValues[apiName]['locationId'], selectedValues[apiName]['deliveryNotes'], selectedValues[apiName]['id'])
                });
                callback(null);
            },
            error: function (err) {
                callback(err);
            }
        });
    }, cb);
}

function makeLocationDataObject(deliverylocation) {
    var id = "";
    var addressline1 = deliverylocation;
    var addressline2 = "";
    var postalcode = "";
    var city = "0";
    var region = null;
    var country = "IN";
    var locationObject = { "addressline1": addressline1, "addressline2": addressline2, "postalcode": postalcode, "city": city, "region": region, "country": country };
    return locationObject;
}

function getUniqueLocationId() {
    var apiArray = Object.keys(selectedValues);
    $.each(apiArray, function (index, apiName) {
        locationObjects.push(makeLocationDataObject(selectedValues[apiName]['deliveryLocation']));
    });
    return locationObjects;
}


function submitData(username, password, loginToken, loginTokenTS, cb) {
    async.map(rfqObject, function (item, _cb) {
        $.ajax({
            url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/rfq", data: convertObject(item), type: "POST", contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data, textStatus, xhr) {
                if (xhr.status == 200) {
                    //console.log("Data Posted Successfully.");
                    item.id = data;
                    _cb();
                } else {
                    alert("There was a problem. Please try again...");
                    _cb('');
                }
            }
        });
    }, cb);
};

function submitRfq(username, password, loginToken, loginTokenTS, callback) {
    async.map(rfqObject, function (item, cb) {
        $.ajax({
            url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox", data: JSON.stringify({ receiverorg: item.bpartner, dtype: 'rfq', documentid: item.id }), type: "POST", contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data, textStatus, xhr) {
                if (xhr.status == 200) {
                    cb();
                } else {
                    // console.log("There was a problem. Please try again...");
                    cb('');
                }
            }
        });
    }, callback);
};

function getLocationObject() {
    makeLocationDataObject();
};
var tttt = 0;
var saveDataInputs = function () {
    $('#valuesForm input[data-type="quantity"]').each(function (index, element) {
        if (element.value == "") {
            alert("Enter Quantity");
            return false;
        } else {
            $(".se-pre-con").fadeIn("slow");
            var username = localStorage.getItem('username');
            saveInputs();
            var myorgid = localStorage.getItem('sess_orgid');
            myorgidarr = myorgid.split(',');
            var status = 0;
            var rfqidlist = [];
            customcall(myorgidarr[tttt], function () {
                tttt++;
                status = 1;
                if (tttt < myorgidarr.length) {
                    saveDataInputs();
                } else {
                    $(".se-pre-con").fadeOut("slow");
                    alert("Your Enquiry has submitted successfully.");
                    window.location.href = "/index.php?username=" + username;
                }
            });
        }
    });
} 
function addSupplier(event) {
    var _supplier = event.target.name;
    var _api = event.target.parentElement.parentElement.parentElement.firstChild.textContent;
    var index = selectedValues[_api]["suppliers"].indexOf(_supplier);
    if (index == -1)
        selectedValues[_api]["suppliers"].push(_supplier);
    else
        selectedValues[_api]["suppliers"].splice(index, 1);

    var sessorgid = localStorage.getItem('sess_orgid');
    if (sessorgid == null || sessorgid == '') {
        localStorage.setItem('sess_orgid', event.target.id);
    }
    else {
        var index = sessorgid.indexOf(event.target.id);
        if (index == -1) {
            localStorage.setItem('sess_orgid', (sessorgid + ',' + event.target.id));
        } else {
            myprodarr = sessorgid.split(',');
            var j = 0;
            for (var i = 0; i < myprodarr.length; i++) {
                if (myprodarr[i] != event.target.id) {
                    if (j == 0) {
                        localStorage.setItem('sess_orgid', myprodarr[i]);
                    } else {
                        localStorage.setItem('sess_orgid', (localStorage.getItem('sess_orgid') + ',' + event.target.id));
                    }
                    j++;
                }
            }
        }
    }
}
function generateUUID() {
    var d = new Date().getTime();
    var uuid = 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = (d + Math.random() * 16) % 16 | 0;
        d = Math.floor(d / 16);
        return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(10);
    });
    return uuid;
};

function makeRfqDataObject(documentno, deliverylocation, notes, productID) {
    var id = generateUUID();
    var documentno = documentno;
    var issuedate =parseInt( (new Date).getTime()/1000);
    var validity = "";
    var currency = "INR";
    var deliveryterms = "";
    var bpartner = "null for now";
    var deliverylocation = deliverylocation;
    var status = "";
    var notes = notes;
    var lineitems = {};
    lineitems["id"] = "";
    lineitems["lineno"] = "";
    lineitems["product"] = productID;
    lineitems["quantity"] = "";
    lineitems["uom"] = "kg";
    lineitems["notes"] = notes;

    var rfq = {
        "id": id, "documentno": documentno, "issuedate": issuedate, "validity": validity, "currency": currency,
        "deliveryterms": deliveryterms, "receiveremail": bpartner, "deliverylocation": deliverylocation,
        "status": status, "notes": notes, "lineitems": lineitems
    };

    //rfqObject.push(rfq);
    // console.log(rfqObject);
    // return rfqObject;   
};

/*
 $( document ).ready(function() {
            var username = "<?php echo $_SESSION['user_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";
            spiderG.getLoginToken(username, function()
            {
                var loginToken = spiderG['loginToken'];
                var loginTokenTS = spiderG['loginTokenTS'];
       $.ajax({
                type: "GET",
                url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom",
                contentType:'application/json',
                headers: { 
                        'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                        'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                    },
                success: function (data)
                {
                    people = JSON.parse(data); 
                   for(var j=0; j< people.length; j++)
                   {
                     $('#drpdwn').append('<option value="'+ people[j].id +'">'+ people[j].name +'</option>');
                   }
                },
            error: function (err) {
            console.log(err);
             
            }
        });
        });
 });
*/



function generateRfq(data1, xyz, myprid, qty, dnoes, usruom, myordid) {
    var username = localStorage.getItem('username');
    var password = localStorage.getItem('password');
    var product = { "rfqid": data1, "lineno": xyz, "product": myprid, "quantity": qty, "uom": usruom, "notes": dnoes };
    var str = JSON.stringify(product);
    var loginToken = spiderG['loginToken'];
    var loginTokenTS = spiderG['loginTokenTS'];
    $.ajax({
        type: "POST", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/rfqlineitem", data: str, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {

        },
        error: function (err) {
            //console.log(err);
        }
    });
}

function sendmail(rfqid, bpart, loginToken, loginTokenTS, username, password) {
    var mail_rfq = { "receiverorg": bpart, "dtype": "RFQ", "documentid": rfqid };
    var str = JSON.stringify(mail_rfq);
    $.ajax({
        type: "POST", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/mailbox", data: str, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) },
        success: function (data) { },
        error: function (err) {
            // console.log(err); 
        }
    });

}

function convertObject(data) {
    return JSON.stringify(data);
}

//$.post('<?php echo site_url(); ?>home/getProductCount',{'product_ids':productIds},function(respData){});
// function convertJSON() {
//   var toret = {};
//   $.getJSON("js/application/apiData.json", function(data) {

//     //console.log(toret);
//     $.getJSON("js/application/newApiData.json", toret);
//   });

//     /*var file = new File("newApiData.js");
//     file.open("w");
//     file.writeln(JSON.stringify(toret));
//     file.close();*/
// }

// convertJSON();

