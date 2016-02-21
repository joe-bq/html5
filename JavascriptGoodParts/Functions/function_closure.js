/* function_recursion_dom_walk.js */


/* Function recursion pattern */


/* The recursion pattern which  */

// Make an array of 2 numbers and add them.

var myObject = (function() { 
	var value = 0;
	return { 
		increment: function(inc) { 
			value += typeof inc === 'number' ? inc : 1;
		},
		getValue: function() { 
			return value;
		}
	};
}());

// Create a maker function called quo. It makes an
// object with a get_status method and a private
// status property.

var quo = function(status) { 
	return { 
		get_status: function() {
			return status;
		}
	};
}


// Make an instance of quo.
var myQuo = quo("amazed");
document.writeln(myQuo.get_status());



// Define a function that sets a DOM node's color
// to yellow and then fades it to white.
var fade = function (node) {
	var level = 1;
	var step = function() { 
		var hex = level.toString(16);
		node.style.backgroundColor = '#FFFF' + hex + hex;
		if (level < 15) { 
			level += 1;
			setTimeout(step, 100);
		}
	};
	setTimeout(step, 100);
};

fade(document.body);

// CLOSURE BAD EXAMPLE

// BAD EXAMPLE
// Make a function that assigns event handler functions to an array of nodes the wrong way.
// When you click on a node, an alert box is supposed to display the ordinal of the node.
// But it always displays the number of nodes instead.

var add_the_handlers = function(nodes) {
	var i = 0;
	for (; i < nodes.length; i++) { 
		nodes[i].onclick = function(e) { 
			alert(i);
		}
	}
};

// END BAD EXAMPLE


// BETTER EXAMPLE

// Make a function that assigns event handler functions to an array of nodes.
// When you click on a node, an alert box will display the ordinal of the node.

var add_the_handlers = function(nodes) { 
	var helper = function(i) { 
		return i;
	}
}