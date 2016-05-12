var fs = require('fs');
var obj = JSON.parse(fs.readFileSync('newApiData.json', 'utf8'));
var toret = {};
var inc = 0;

for (var key in obj) {
  if (obj.hasOwnProperty(key)) {
    toret[key] = obj[key];
    toret[key]["id"] = inc++;
  }
}

console.log(toret);
fs.writeFileSync('newApiData2.json', JSON.stringify(toret));
