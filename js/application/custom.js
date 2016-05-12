// var username = "ashwani.rathore";
// var password = "ashwani@786";
//var username = "ingale.harshal";
//var password = "abcde12345";
//var username = "GOD";
//var password = "GOD";
password = "";
var loginToken = '';
var loginTokenTS = -1;
var regStep = -1;
var basepath = '/SpiderGAPIServer/api';
//host: 'localhost',
var host = 'http://vpn.spiderg.com:';
var spiderGEndpoint = "/login";
var port = 8081;
var loginAddress = host + port + basepath + spiderGEndpoint;
var resendaddress = host + port + basepath + "/register/resendverify";
//port: 8080,
var path = '';
// var authheader = 'a';

var spiderG = {};
spiderG.csecret = 'PHARMERZPSECRET';

spiderG.createAuthenticationHeader = function(username, password, logintoken, logintokents) {
    var b64string = "";
    if (password) {
        var passwordmd5 = CryptoJS.MD5(password);
        // console.log(passwordmd5);
        // console.log("creating b64: "+passwordmd5+":"+csecret+":"+logintokents);
        b64string = window.btoa(passwordmd5 + ":" + spiderG.csecret + ":" + logintokents);
        // console.log("authHeader: "+username+":"+b64string+":"+logintoken);
        return username+":"+b64string+":"+logintoken;
    }
    else {
        // console.log("authHeader: "+username);
        return username;
    }
}

spiderG.getLoginToken = function(username, cb) {
  $.ajax({url: loginAddress,   // method: "GET",
    headers: {
        'SPIDERG-API-Key' : 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
        'SPIDERG-Authorization' : "SPIDERGAUTH "+ spiderG.createAuthenticationHeader(username, null, "", "")
        },
    success: function(response){
     people = response; 
    // console.log("Token Request successful"); 
     /* spiderG.loginToken = response['loginToken'];
      spiderG.loginTokenTS = response['loginTokenTS'];*/ 
       spiderG.loginToken = people.loginToken;
      spiderG.loginTokenTS = people.loginTokenTS;   
     // alert(spiderG.loginToken+':'+spiderG.loginTokenTS); 
     

    },
    error: function(err){
      //console.log("Login token request fail...");
	   //console.log(err);
    }
  }).done(function(response) {
    loginToken = response.loginToken;
    loginTokenTS = response.loginTokenTS;
    authheader = spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS);
    // console.log(authheader);
    cb(null, authheader);
  });
}; 
var getAuthHeader = function(){
  spiderG.getLoginToken();
  //console.log("The auth header is :" + authheader);
  return authheader;
}

// spiderG.getLoginToken();
// getAuthHeader();









































// $(function(){
//     // var form = $("wizard").steps();
     
//     $("wizard").steps({
//         headerTag: "h3",
//         bodyTag: "fieldset",
//         transitionEffect: "slideLeft",
//         onStepChanging: function (event, currentIndex, newIndex)
//         {
//             // Allways allow previous action even if the current form is not valid!
//             if (currentIndex > newIndex)
//             {
//                 return true;
//             }
//             // Forbid next action on "Warning" step if the user is to young
//             if (newIndex === 3 && Number($("#age").val()) < 18)
//             {
//                 return false;
//             }
//             // Needed in some cases if the user went back (clean up)
//             if (currentIndex < newIndex)
//             {
//                 // To remove error styles
//                 form.find(".body:eq(" + newIndex + ") label.error").remove();
//                 form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
//             }
//             form.validate().settings.ignore = ":disabled,:hidden";
//             console.log("nextIndex: " + nextIndex);
//             return form.valid();
//         },
//         onStepChanged: function (event, currentIndex, priorIndex)
//         {
//             // Used to skip the "Warning" step if the user is old enough.
//             if (currentIndex === 2 && Number($("#age").val()) >= 18)
//             {
//                 form.steps("next");
//             }
//             // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
//             if (currentIndex === 2 && priorIndex === 3)
//             {
//                 form.steps("previous");
//             }
//         },
//         onFinishing: function (event, currentIndex)
//         {
//             form.validate().settings.ignore = ":disabled";
//             return form.valid();
//         },
//         onFinished: function (event, currentIndex)
//         {
//             alert("Submitted!");
//         }
//     }).validate({
//     errorPlacement: function errorPlacement(error, element) { element.before(error); },
//     rules: {
//         confirm: {
//             equalTo: "#password"
//         }
//     }
// });

// });/**/