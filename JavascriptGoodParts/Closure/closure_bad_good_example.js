/* bad_and_good_example.js */


/* in this example I would like to inspire you to think one bug in the javascript language and its 
implication on how to write a good javascript code with leveraging the closure */

// -- the bad example
var add_the_handler = function(nodes) {
	var i;
	for (i = 0; i < nodes.length; i+=1) { 
		nodes[i].onclick = function(e) { 
			alert(i);
		}
	}

};

/* because after the add_the_handler call, each of the anonymous function will points to the same i */

// -- the good example -recreate another closure...
var add_the_handler = function(nodes) { 
	var helper = function(i) { 
		return function(e) {
			alert(i);
		}
	}

	var i;

	for (i = 0; i < nodes.length; i += 1) { 
		nodes[i].onclick = helper(i);
	}
};


// -- still a bad example, you might be tempted to do the following. 

var add_the_handler = function(nodes) {

	var i ;

	for (i = 0; i < nodes.length; i++) { 
		nodes[i].onclick = function(e) { 
			var j = i;
			alert(j);
		}
	}
};

// -- might be a improvded one, TESTED, RESULT: BAD ONE
var add_the_handler = function(nodes) {

	var i ;

	for (i = 0; i < nodes.length; i++) { 
		var j = i;
		nodes[i].onclick = function(e) { 
			alert(j);
		}
	}
};

/* to test the above code */

var add_the_handler = function(nodes) {

	var i ;

	for (i = 0; i < nodes.length; i++) { 
		var j = i;
		nodes[i].onclick = function(e) { 
			console.log(j);
		}
	}
};

var nodes = [{raiseOnClick: function(){  this.onclick()}}, {raiseOnClick: function() { this.onclick()}}, {raiseOnClick: function() { this.onclick()}}];

add_the_handler(nodes);

var i;
for (i = 0; i < nodes.length; i++) {

	nodes[i].raiseOnClick();
}