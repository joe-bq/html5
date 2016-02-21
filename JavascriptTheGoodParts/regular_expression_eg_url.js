/* regular_expression_eg_url.js */


/* to demonstrate the use of regular expression with an example of url parse */


/* NOTE:  to parse an url.... Javascript's regular expression has to be on the single line.*/


var parse_url = /^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/;
var url = "http://www.ora.com:80/goodparts?q#fragment";


var result = parse_url.exec(url);
var names = ['url', 'scheme', 'slash', 'host', 'port', 'path', 'query', 'hash'];

var blanks = '            ';
var i ;


for (i = 0; i < names.length; i += 1) { 
	document.writeln(names[i] + ":" + blanks.substring(names[i].length), result[i]);
}
