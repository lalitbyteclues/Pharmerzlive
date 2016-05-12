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
  var cryptPassword = CryptoJS.MD5(password);
  var registrationData = {};
  var passwordStr = "" + cryptPassword;
  /* Remove space from number */
  userPhone = userPhone.replace(/\s+/g, '');
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
   $(".alert-danger").html(" "+err.responseText+" "); 
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