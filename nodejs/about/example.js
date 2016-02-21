/**

Author: wangboqi

description:
this page will show you how to use node js sever and how to run it 

	step 1: 
		$ node example.js
	step 2:
		open an chrome
	step 3:
		type the address in: 
			127.0.0.1:1337
	you can see from the "hello world" from the chrome browser 
*/


var http = require('http');

http.createServer(function (req, res)  {
	res.writeHead(200, {'Content-Type': 'text/plain'});
	res.end('Hello World\n');
}).listen(1337, "127.0.0.1");

console.log('Server running at http://127.0.0.1:1337');