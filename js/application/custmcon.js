
var username = "parima.jain@ebabu.co";
var password = "abcde12345";
//var username = "GOD";
//var password = "GOD";

//var username = "ingale.harshal";
//var password = "abcde12345";
//var username = "GOD";
//var password = "GOD";

var LT = '';
var LTTS = -1;
var regStep = -1;
var csecret = 'PHARMERZPSECRET';
var basepath = '/SpiderGAPIServer/api';

var options = {
  host: 'localhost',
  //host: 'vpn.spiderg.com',
  //port: 8081,
  port: 8080,
  path: '',
  method: 'GET',
  headers: {
            'SPIDERG-API-Key' : 'e5e3b300-31e9-4ad2-a705-4f8935218fcb'
            }
};

/**
    Generic HTTP callback
**/
var gen_callback = function(response) {
  var str = '';

  //another chunk of data has been recieved, so append it to `str`
  response.on('data', function (chunk) {
    str += chunk;
  });

  //the whole response has been recieved, so we just print it out here
  response.on('end', function () {
   console.log("HTTP RESPONSE: "+str);
   console.log("HTTP RESPONSE Code: "+response.statusCode);
  });
}

module.exports.basepath = basepath;
module.exports.gen_callback = gen_callback;
module.exports.conoptions = options;
module.exports.username = username;
module.exports.password = password;
module.exports.logintoken = LT;
module.exports.logintokents = LTTS;


