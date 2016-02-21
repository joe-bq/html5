/* array_extension.js */


/* array can be extended to have more and useful methods  */


/* NOTE: we can augument the array's functionality */

Object.prototype.method = function(name, func) {
	this[name] = func;
	return this;
};


Array.method('reduce', function(f, value) { 
	var i;
	for (i = 0; i < this.length; i += 1) {
		value = f(this[i], value);
	}

	return value;
});


// Create an array of numbers.
var data = [4, 8, 15, 16, 23, 42];
// Define two simple functions. One will add two
// numbers. The other will multiply two numbers.
var add = function (a, b) {
	return a + b;
};
var mult = function (a, b) {
	return a * b;
};



// Invoke the data's reduce method, passing in the
// add function.
var sum = data.reduce(add, 0); // sum is 108
// Invoke the reduce method again, this time passing
// in the multiply function.
var product = data.reduce(mult, 1);
// product is 7418880