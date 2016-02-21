/* methods_apply.js */


/* Apply method is a very useful utility function which can aids in many ways. */

/* we show how to defines a bind method with the help from the apply methods - NOTE, this bind is to bind a function to an object, unlike bind/fix one parameters. */


Function.prototype.method = function(name, func) { 
	this.prototype[name] = func;
	return this;
};


Function.method('bind', function(that) { 

	// Return a function that will call this function as
	// though it is a method of that object.

	var method = this,
		slice = Array.prototype.slice,
		args = slice.apply(arguments, [1]);

	return function() {
		return method.apply(that, args.concat(slice.apply(arguments, [0])));
	};
});


var x = function() { 
	return this.value;
}.bind({value: 666});

alert(x ());
