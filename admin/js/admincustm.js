/*var loginToken = 1234;
var loginTokenTS = 7890;*/
var csecret = 'PHARMERZPSECRET';
var authheader = '';

function createAuthenticationHeader(username, password, loginToken, loginTokenTS) {
  if(password)
  {
    var passwordmd5 = CryptoJS.MD5(password);
    var b64string = btoa(passwordmd5+":"+csecret+":"+loginTokenTS);
   
    // console.log("authHeader: "+username+":"+b64string+":"+loginToken);
    return username+":"+b64string+":"+loginToken;
  }
  else 
  {
    // console.log("authHeader: "+username);
    return username;
  }
 
}

function adminlogin() {
  var username =atob('amFpZGVlcEBwaGFybWVyei5jb20=');  
  localStorage.setItem('username', username);
  var password = $('input[name="loginPassword"]').val();
  localStorage.setItem('password', password);

  /* get login token from spiderg server */
  spiderG.getLoginToken(username, function(err, authheader){
   // alert(spiderG['loginToken']);
    $.ajax({
      url: 'http://vpn.spiderg.com:8081/SpiderGAPIServer/api/login',
      headers: {
        'SPIDERG-API-Key' : 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
        'SPIDERG-Authorization' : "SPIDERGAUTH "+ createAuthenticationHeader(username, password, spiderG['loginToken'], spiderG['loginTokenTS'])
      },
      success: function(data){
        alert("You are logged in.");
        var username = localStorage.getItem('username'); 
        var password = localStorage.getItem('password'); 
        document.cookie = 'password='+password;
        window.location.href = "/admin/dashboard.php?username="+username;
     },
      error: function(){
		   alert("Enter Correct Password");
        console.log("There was an error. Please try again.");
      }
    });   
  });
};



function updateprofile(username,password)
{

  var id_usr = $('#id_usr').val();
  var name =$('#name').val();
  var firstname = $('#firstname').val();
  var lastname =$('#lastname').val();

  var  email=$('#email').val();
  var username=$('#username').val();
  var phone=$('#phone').val();
  var password=$('#password').val();
  var gsid=$('#gsid').val();
  var active=$('#active').val();

  var user_data = {
        "id":id_usr,
        "name":name,
        "firstname":firstname,
        "lastname":lastname,
        "email":email,
        "username":username,
        "phone":phone,
        "password":password,
        "gsid":gsid,
        "active":active,
        };

    var objectDataString = JSON.stringify(user_data);
   // alert(objectDataString);
    spiderG.getLoginToken(username, function()
    {
          var loginToken = spiderG['loginToken'];
          var loginTokenTS = spiderG['loginTokenTS'];
          $.ajax({
              type: "PUT",
              url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user",
              contentType:'application/json',
              contentLength:objectDataString.length,
              headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                         'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                    },
            data : objectDataString,
            success: function (data ,textStatus) 
            {
              //console.log(JSON.stringify(data));
              //console.log(data);
              alert('Success');
            },
            error: function (err) {
              console.log(err);
               
              }
          });

        });

}    

          /*********************Super ADMIN*****************/

function adduom(username,password)
{
  //alert('uom js');
    var uom_name = $('#uom_name').val();
    var symbol =$('#symbol').val();
  
    var stdprecision =$('#stdprecision').val();
   
    var uomdata = {
        "name":uom_name,
        "symbol":symbol,
        "stdprecision":stdprecision,
      };

    var objectDataString = JSON.stringify(uomdata);
      //alert(objectDataString);
      spiderG.getLoginToken(username, function()
      {
          var loginToken = spiderG['loginToken'];
          var loginTokenTS = spiderG['loginTokenTS'];
          $.ajax({
              type: "POST",
              url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/uom",
              contentType:'application/json',
              contentLength:objectDataString.length,
              headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                         'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                    },
            data : objectDataString,
            success: function (data ,textStatus) 
            {
              //console.log(data);
               window.location.href = "/admin/view_uom.php";
              alert('Success');
              //window.location.href = "http://base3.engineerbabu.com/pharma_spiderg/admin/view_uom.php";

            },
            error: function (err) {
              console.log(err);
               
              }
          });

        });
}
function addprocategory(username,password)
{
  //alert(username);
  var cat_name = $('#cat_name').val();
  var isdefault =  $("input[name='isdefault']:checked").val();
    var product_category = {
        "name":cat_name,
        "isdefault":isdefault
       };

    var objectDataString = JSON.stringify(product_category);
        //console.log(product);
    //alert(objectDataString);
      spiderG.getLoginToken(username, function()
      {
          var loginToken = spiderG['loginToken'];
          var loginTokenTS = spiderG['loginTokenTS'];
          $.ajax({
              type: "POST",
              url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/category",
              contentType:'application/json',
              contentLength:objectDataString.length,
              headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb',
                         'SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)
                    },
            data : objectDataString,
            success: function (data ,textStatus) 
            {
              //console.log(data);
              window.location.href = "/admin/view_category.php";
              alert('Success');
            },
            error: function (err) {
              console.log(err);
               
              }
          });

        });


}