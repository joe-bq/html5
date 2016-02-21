/* function_recursion_dom_walk.js */


/* Function recursion pattern */

// Make a factorial function with tail
// recursion. It is tail recursive because
// it returns the result of calling itself.
// JavaScript does not currently optimize this form.

var factorial = function factorial(i, a) { 
	a = a || 1;
	if (i < 2) { 
		return a;
	}

	return factorial(i - 1, a * i);
};


document.writeln(factorial(4));
