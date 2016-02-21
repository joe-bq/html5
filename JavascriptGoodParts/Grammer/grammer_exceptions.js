/* gram mer_exceptions.js.js */


/* javascripto exceptions **/

var add = function(a, b) {
	if (typeof a != 'number' || typeof b != 'number') {
		throw { 
			name: 'TypeError',
			message: 'add needs numbers'
		};
	}

	return a + b;
}


// Make a try_it fun ction that calls tghe new add 
// function incorrectly 
var try_it = function() { 
	try { 
		add("seven");
	} catch (e) { 
		document.writeln(e.name + ": " + e.message);
	}
}


try_it();