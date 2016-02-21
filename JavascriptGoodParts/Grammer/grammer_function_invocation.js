/* the function Invocation Pattern */


/* this file is about the rule of scope, when a function is invoked through the function invocation pattern, then 'this' is bound to the global object. this was a mistake in the design of the language  */




// Augument myObject with double method 
myObject = {
	value: 1

};
myObject.double = function() { 
	var that = this;

	var helper = function() {
		that.value = add(that.value, that.value);
	}


	function add(a, b) { 
		return a + b;
	}
	helper();
}


// invoke double as method 

myObject.double();
// document.writeln(myObject.value);
// if you are running from the chrome debugger 
console.log(myObject.value);