$(function() {     
});

/* International number flag dropdown */
// $("#demo").intlTelInput({
//   defaultCountry: "auto",
//   geoIpLookup: function(callback) {
//     $.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
//         var countryCode = (resp && resp.country) ? resp.country : "";
//         callback(countryCode);
//     });
//   },
//   //preferredCountries: [ "india" ],
//   utilsScript: "js/application/utils.js" // just for formatting/placeholders etc
// });

/* Get Registration Form Data For Buyers */
function getBuyerRegistrationData(){

  var company = $('input[name="companyName"]').val();
  var password = $('input[name="password"]').val();
  var userFirstName = $('input[name="firstName"]').val();
  var userLastName = $('input[name="lastName"]').val();
  var userEmail = $('input[name="email"]').val();
  var userPhone = $('input[name="mobNumber"]').val();
  var reg_token = "";
  var cryptPassword = CryptoJS.MD5(password);
  var registrationData = {};
  var passwordStr = "" + cryptPassword;

  // var pass = cryptPassword.words;
  // // alert(cryptPassword);
  // $.each(pass, function(index, value){
  //  passwordStr = passwordStr + value.toString();
   
  // });
  // console.log(passwordStr);

  /* Remove space from number */
  userPhone = userPhone.replace(/\s+/g, '');

  /* Make Registration data Object */
  registrationData = {
    "company": company, 
    "firstname": userFirstName, 
    "lastname": userLastName, 
    "email": userEmail, 
    "password": passwordStr, 
    "phone": userPhone, 
    "tokenvia": "CALL"
  };  
  // console.log(registrationData.password);
  // console.log(JSON.stringify(registrationData));
  makeRegistrationRequest(registrationData, function(err, res){
    if(err)
      console.log(err);
    else
      console.log("Request send successfully!!!");
  });  
};

/* Collect registration form data for Suppliers */
// function getRegistrationData(){

//   var company = $('input[name="userCompany"]').val();
//   var password = $('input[name="password"]').val();
//   var userFirstName = $('input[name="userFirstName"]').val();
//   var userLastName = $('input[name="userLastName"]').val();
//   var userEmail = $('input[name="userEmail"]').val();
//   var userPhone = $('input[name="userPhone"]').val();
//   var reg_token = "";
//   var cryptPassword = CryptoJS.MD5(password);
//   var registrationData = {};
//   var passwordStr = "" + cryptPassword;

//   // var pass = cryptPassword.words;
//   // // alert(cryptPassword);
//   // $.each(pass, function(index, value){
//   //  passwordStr = passwordStr + value.toString();
   
//   // });
//   // console.log(passwordStr);

//   /* Remove space from number 
//   userPhone = userPhone.replace(/\s+/g, '');

//   /* Make Registration data Object */
//   registrationData = {
//     "company": company, 
//     "firstname": userFirstName, 
//     "lastname": userLastName, 
//     "email": userEmail, 
//     "password": passwordStr, 
//     "phone": userPhone, 
//     "tokenvia": "SMS"
//   };  
//   // console.log(registrationData.password);
//   // console.log(JSON.stringify(registrationData));
//   makeRegistrationRequest(registrationData, function(err, res){
//     if(err)
//       console.log(err);
//     else
//       console.log("Request send successfully!!!");
//   });  
// };*/

function makeRegistrationRequest(registrationData, _cb){
  $.ajax({
    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/register",
    type: "POST",
    headers: {
      'SPIDERG-API-Key' : 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
      'SPIDERG-Authorization' : "SPIDERGAUTH " + "register"
    },
    contentType: 'application/json',
    data: JSON.stringify(registrationData),
    success: function(data){
      // console.log("Success");
      // console.log(data);
      getRegistrationToken(registrationData.email, registrationData.password, registrationData.tokenvia);
      _cb();
    },
    error: function(err){
      console.log(err);
      _cb(err);
    }
  });
};

function getRegistrationToken(email, password, tokenvia) {
  swal({
    title: "",
    text: "Please enter the token:",
    type: "input",
    inputPlaceholder: "Enter token...",
    showCancelButton: true,
    closeOnConfirm: true,
    animation: "slide-from-top",
    inputPlaceholder: "Write something",
    cancelButtonText: "Call Again",
    confirmButtonText: "Verify",
    closeOnCancel: false   
    },
    function(token) {
      // if (token === false){
      //   return false;
      // } 
      // if (token === "") {
      //     swal.showInputError("You need to write something!");
      //     return false;
      // }
      // swal("Nice!", "You wrote: " + token);

      
      

      /*submitRegistrationToken(email, password, token, function(err, res){
        if (err) {
          //Display error on popup
          return false;
        }
        else
          return true;
      });*/
  });
};


function makeAnotherTokenRequest(){
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
    console.log("Clicked call again button");
  };

function submitRegistrationToken(email, password, token, cb) {
  $.ajax({
    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/register/verify?email=" + email + "&token=" + token,
    type: "POST",
    headers: {
      'SPIDERG-API-Key' : 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
      'SPIDERG-Authorization' : "SPIDERGAUTH " + "register"
    },
    success: function(data){
      //redirect to /login
      console.log(data);
      console.log("Token accepted !!!");
      window.open("http://app.spiderg.com/#/login?username=" + email + "&password=" + password);
      cb(null);
    },
    error: function(err){
      //SHow error
      console.log(err);
      cb(err);
    }
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