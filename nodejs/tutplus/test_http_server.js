var sys = require("sys"),
	http = require("http");
/* seems that the api has changed quite a lot, some of the example is not runnable */
http.createServer(function(request, response) {
	// response.sendHeader(200, {'Content-Type': "text/html"});
	response.writeHeader(200, {"Conent-Type": "text/html"});
	response.write("Hello World!");
	// response.close();
	response.end();
}).listen(8080);

sys.puts("Server running at http://localhost:8080");