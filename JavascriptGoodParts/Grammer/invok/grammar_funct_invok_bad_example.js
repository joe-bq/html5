
/* this is to demonstrate the use of the function invocation the grammer_function_invocation.js 

to check what is available besides the use of helper function */

function sum(a , b) { return a + b; }

var myObj = {
	
	value : 0,
	increment: function (inc) { 
		this.value += typeof inc === 'number' ? inc : 1;
	}
};


myObj.increment();
console.info(myObj.value);


myObj.increment();
console.info(myObj.value);



myObj.double = function() { 
	this.value = sum(this.value, this.value);
}

/* when you call this, you get 'undefined', this is because global object does not have a 'value' 
variable defined */

myObj.double();

console.info(myObj.value);


myObj.double = function() { 
	/* leverage the use of lexical scope - or more accurately , the closure, you can get workaround 
	this limitation */
	var that = this;

	var helper = function() { 
		that.value = sum(that.value, that.value);
	}

	return helper(); // we returned the closure (to be accurate, we actually return the wrapper object which has the closure) instead
}


/*
Sometimes, you would want to nest innner function inside another function, that gives better encapsulation 
and good code reuse.

However, the inner function does not share the same access to 'this'. the inner function may treat
'this' inner as the global object, and this is causing a lots of confusion. 


 though you would expect that the this in the function should bounds to the myObj instance, but 
since that the myObj.double points to a function which is defined outside the myObj's scope. 
and 'this' implicitly refers to the global object. you may get an unexpected result */



myObj.double = function() { 

	var helper = function() { 
		this.value = sum(this.value, this.value); /* here the 'this' referes to global object */
	}

	return helper(); // we returned the closure (to be accurate, we actually return the wrapper object which has the closure) instead
}

/* to test: 

this.value = 1;
myObj.double();

// this.value  now should be 2
*/