/* global_function_prototype.js */


/* this file is used to define the global function prototype members, such as the 'method' one  */


/* to test the function, you will need to use the global method that we used to define method is */


Function.method = function(name, func) { 
	this.Funciton.prototype[name] = func;
	return this;
}


Function.method ('inherits', function(Parent) {
	this.prototype = new Parent();
	return this;
});