/* javascript_function_curry.js */


/* this method will show you how to use the curry in javascript */

/* curry is the way that used in most functional programming language that from a lower-order function to form a higher-order function */

/* NOTE: this function has not been fully tested */



/* to test the function, you will need to use the global method that we used to define method is */


Function.prototype.method = function (name, func) {
	this.prototype[name] = func;
	return this;
};



Function.method('curry', function ( ) {
	var slice = Array.prototype.slice,
	args = slice.apply(arguments),
	that = this;
	return function ( ) {
		return that.apply(null, args.concat(slice.apply(arguments)));
	};
});


/* to test the code, we wrote a add function */
function add(a, b)  {
	return a + b;
}

var add1 = add.curry(1);
document.writeln(add1(6));




/* Below is what I have for the Function.curry method */
Function.method('curry', function() { 
	var slice = Array.prototype.slice;

	var args = slice.apply(arguments);
	var that = this;

	return function() { 
		return that.apply(null, args.concat(slice.apply(arguments)));
	};
});