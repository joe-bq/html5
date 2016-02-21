/* function_memoization.js */


/* this method will show how to make use of the memoization */

/* memoization is a way to boost performance */

/* NOTE: this function has not been fully tested */


Function.prototype.method = function (name, func) {
	this.prototype[name] = func;
	return this;
};



function fibonacci (n) { 
	return n < 2 ? n : fibonacci(n - 1) + fibonacci(n - 2);
}



var fibonacci = function()  {
	var memo = [0, 1];
	var fib = function(n) { 
		var result = memo[n];
		if (typeof result !== 'number') {
			result = fib(n - 1) + fib(n - 2);
			memo[n] = result;
		}

		return result;
	};

	return fib;
}();