  /* International number flag dropdown */
  $("#demo").intlTelInput({
    defaultCountry: "auto",
    geoIpLookup: function(callback) {
      $.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
      });
    },
    //preferredCountries: [ "india" ],
    utilsScript: "js/application/utils.js" // just for formatting/placeholders etc
  });
function Ischeckspacefromstring(e)
{  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
            var ret =!(keyCode==32 ); 
            return ret;
}
function IsAlphaNumeric(e)
{document.getElementById("error1").style.display='none';	
document.getElementById("error").style.display='none';   
 var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right
    var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
	console.log(keyCode);
            var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode)|| keyCode == 32) ;
            document.getElementById("error").style.display = ret ? "none" : "inline";
           console.log(ret);
		   return ret;
} 
function IsAlphaNumericwithnumeric(e)
{
document.getElementById("error1").style.display='none';	
document.getElementById("error").style.display='none';	
 var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right
    var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
            var ret = ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error1").style.display = ret ? "none" : "inline";
            return ret;
} 
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
/* Collect registration form data for Suppliers */
function getRegistrationData(){
 $("#danger").css("display", "none");
  var company = $('input[name="userCompany"]').val();
  var password = $('input[name="password"]').val();
  var userFirstName = $('input[name="userFirstName"]').val();
  var userLastName = $('input[name="userLastName"]').val();
  var userEmail = $('input[name="userEmail"]').val();
  var userPhone ="+"+$('input[name="userPhone"]').intlTelInput("getSelectedCountryData").dialCode+ $('input[name="userPhone"]').val(); 
  var reg_token = "";
   if( company=="") {
	   $(".alert-danger").html("Company Name Required"); 
       $("#danger").css("display", "block");
	   return;
  }if( userFirstName=="") {
	   $(".alert-danger").html(" First Name Name Required"); 
       $("#danger").css("display", "block");
	   return;
  }if( userLastName=="") {
	   $(".alert-danger").html(" Last Name Name Required"); 
       $("#danger").css("display", "block");
	   return;
  }
  if( userEmail=="") {
	   $(".alert-danger").html("Email Required"); 
       $("#danger").css("display", "block");
	   return;
  }
  userPhone = userPhone.replace(/\s+/g, '');
  if( userPhone=="") {
	   $(".alert-danger").html("Phone no Required"); 
       $("#danger").css("display", "block");
	   return;
  }
  if( !isValidEmailAddress( userEmail ) ) {
	   $(".alert-danger").html("Invalid Email Address "); 
       $("#danger").css("display", "block");
	   return;
  }
 if( password=="") {
	   $(".alert-danger").html("password Required"); 
       $("#danger").css("display", "block");
	   return;
  }
  var cryptPassword = CryptoJS.MD5(password);
  var registrationData = {};
  var passwordStr = "" + cryptPassword;
  /* Remove space from number */

  /* Make Registration data Object */
  registrationData ={"company": company,"firstname": userFirstName,"lastname": userLastName,"email": userEmail,"password": password,"phone": userPhone,"tokenvia": "SMS"};  
//alert(registrationData);
  // console.log(registrationData.password);
   //console.log(JSON.stringify(registrationData));
   //var objectDataString = JSON.stringify(registrationData);
   //console.log(registrationData);
  //makeRegistrationRequest(registrationData, function(err, res){
  	makeRegistrationRequest(registrationData, function(err, res){
	if(err){
var error='<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';	
var passcheck=1; 
	if(err.responseText=="Phone Number is not correct, Please provide correct Mobile mumber " || err.responseText=="User with email already exists")
	{
		error+=err.responseText;
	} 
	else
	{
		var er=JSON.parse( err.responseText);  
			for(i=0;i<er.messages.length;i++)
			{
				if(er.messages[i]=="{newregister.email.notnull}"){
					error+= "<br> Email Required";
				}
				if(er.messages[i]=="{newregister.password.notnull}"){
					passcheck=0;
					error+= "<br> Password Required";
				}else if(passcheck && er.messages[i]=="password should be more than 6 characters and not more than 20 characters"){
					error+= "<br> password should be more than 6 characters and not more than 20 characters.";
				}
				if(er.messages[i]=="{newregister.phone.maxlength}"){
					error+= "<br> Phine No Required";
				}if(er.messages[i]=="firstname Name should not be empty or only sapce"){
					error+= "<br> First Name Required";
				}if(er.messages[i]=="{newregister.lastname.maxlength}"){
					error+= "<br> Last Name Required";
				} 
			}
	}
   $(".alert-danger").html(" "+error+" "); 
                        $("#danger").css("display", "block");
	  } 
   //else
      //console.log("Request send successfully!!!");
     
  });  
};

function makeRegistrationRequest(registrationData, _cb){
    //console.log(registrationData);
 // alert(registrationData);
  $.ajax({
    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/register",type:"POST",headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization':"SPIDERGAUTH " + "register"},
    contentType: 'application/json',dataType: 'text',data:JSON.stringify(registrationData),success:function(data){alert("Success");  
	alert('Enter the token in textbox : ' +data )
      getRegistrationToken(registrationData.email, registrationData.password, registrationData.tokenvia);
      _cb();
    },
    error: function(err){
    	//alert('err');
      //console.log(err);
      _cb(err);
    }
  });
};

function getRegistrationToken(email, password, tokenvia) {
 
  swal({title: "",text: "Please enter the token:",type: "input",showCancelButton: false,closeOnConfirm: false,animation: "slide-from-top",inputPlaceholder: "Enter token...",},
	function(inputValue){
	if (inputValue === false) return false;      
      if (inputValue === "") {   
            swal.showInputError("You need to write something!");     return false  
    }  
	submitRegistrationToken(email, password, inputValue, function(err, res){
        if (err) {
          //Display error on popup
          return false;
        }
        else
          return true;
      });  
  });
}; 
function makeAnotherTokenRequest(){
  alert('j');
  /*$.ajax({
    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/register/resendverify?username=" + email + "&tokenvia=" + tokenvia,
    type: "POST",
    headers: {
      'SPIDERG-API-Key' : 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
      'SPIDERG-Authorization' : "SPIDERGAUTH " + "register"
    },
    success: function(data){
      console.log(data);
    },
    error: function(err){
      console.log(err);
    }*/
    //console.log("Clicked call again button");
  }

function submitRegistrationToken(email, password, token, cb) {
 // alert(email+password+token);
 // spiderG.getLoginToken(email, function (err, authheader) {
 // var auth= createAuthenticationHeader(email, password, spiderG['loginToken'], spiderG['loginTokenTS']);
   
  $.ajax({
    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/register/verify?token=" + token + "&email=" + email,
    type: "POST",dataType: 'text',
    headers: {
      'SPIDERG-API-Key' : 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
 'SPIDERG-Authorization' : "SPIDERGAUTH " + "register"
    },
    success: function(data){
      //redirect to /login
      swal("Nice!", "You wrote: " + token, "success"); 
     // console.log(data);
      //console.log("Token accepted !!!");
	  localStorage.setItem('username', email);
	 localStorage.setItem('password', password);
		document.cookie = 'username=' + email;
		document.cookie = 'password=' + password; 
      window.location.href = "http://pharmerz.com/index.php?username=" + email; 
      cb(null);
    },
    error: function(err){
      //SHow error

      swal("Oops!", "Something went wrong: " + token, "error"); 
     // alert('Please try again !!');
      //console.log(err);
      cb(err);
    }
  });
 // });
};

function submitLoginData() {
  var username = $('input[name="loginUsername"]').val();  
   localStorage.setItem('username', username);
  var password = $('input[name="loginPassword"]').val();

  /* get login token from spiderg server */
  spiderG.getLoginToken(username, function(err, authheader){
    $.ajax({
      url: 'http://vpn.spiderg.com:8081/SpiderGAPIServer/api/login',
      headers: {
        'SPIDERG-API-Key' : 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
        'SPIDERG-Authorization' : "SPIDERGAUTH "+ spiderG.createAuthenticationHeader(username, password, spiderG['loginToken'], spiderG['loginTokenTS'])
      },
      success: function(data){



var productIds = localStorage.getItem('username'); 
alert(productIds);
        alert("You are logged in.");
     /*  document.cookie = 'username='+username;
      document.cookie = 'password='+password;
      document.cookie = 'loginToken='+spiderG['loginToken'];
      document.cookie = 'loginTokenTS='+spiderG['loginTokenTS'];*/
      //window.open("http://app.spiderg.com/#/login?username=" + username + "&password=" + password); 
        //window.open(" http://base3.engineerbabu.com/spiderg/index.php?username=" + username);   
        //window.open("http://base3.engineerbabu.com/pharma_spiderg/home/index.php?username="+username);   
     // window.open("http://base3.engineerbabu.com/pharma_spiderg/index.php");
      //      window.location.href = "http://base3.engineerbabu.com/pharma_spiderg/index.php";
      
      },
      error: function(){
        //console.log("There was an error. Please try again.");
      }
    });   
  });
};
  


/*function getProduts() {
    $.ajax({
        url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product",
        type: "GET",
        success: function(data) {
            console.log(data);
        },
        error: function(err) {
            console.log(err);
        }
    });
};*/