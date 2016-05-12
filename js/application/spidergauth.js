var http = require('http');
var spidergcon = require('./spidergcon');
var loginToken = "";
var loginTokenTS = "";
var csecret = 'PHARMERZPSECRET';
var authheader = '';

var createAuthenticationHeader = function(username, password, logintoken, logintokents) {
	var b64string = "";
	if (password) {
		var passwordmd5 = require('crypto').createHash('md5').update(password).digest('hex');
		// console.log("creating b64: "+passwordmd5+":"+csecret+":"+logintokents);
		b64string = new Buffer(passwordmd5+":"+csecret+":"+logintokents).toString('base64');
		// console.log("authHeader: "+username+":"+b64string+":"+logintoken);
		return username+":"+b64string+":"+logintoken;
	}
	else {
		// console.log("authHeader: "+username);
		return username;
	}
}

var callback;

/**
	Login Token Callback
**/
lt_callback = function(response) {
  var str = '';

  //another chunk of data has been recieved, so append it to `str`
  response.on('data', function (chunk) {
    str += chunk;
  });

  //the whole response has been recieved, so we just print it out here
  response.on('end', function () {
    //console.log("/login response: "+str);
    var resp = JSON.parse(str);
    // console.log("Received LT: %j", resp);
	spidergcon.logintoken = resp.loginToken;
	spidergcon.logintokents = resp.loginTokenTS;
	regStep = resp.registrationStep;
	authheader = createAuthenticationHeader(spidergcon.username, spidergcon.password, spidergcon.logintoken, spidergcon.logintokents);
	
	if (callback)
		callback();
  });
}

module.exports.getLoginToken = function(cback) {
	spidergcon.conoptions.path = spidergcon.basepath + "/login";
	spidergcon.conoptions.headers['SPIDERG-Authorization'] = "SPIDERGAUTH "+createAuthenticationHeader(spidergcon.username, null, "", "");
	callback = cback;
	http.request(spidergcon.conoptions, lt_callback).end();
}

var getAuthHeader = function() {
	return authheader;
}
module.exports.getAuthHeader = getAuthHeader;

