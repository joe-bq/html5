/* grammer_constructor_invocation.js */


/* Constructor invocation pattern */


/* the method's this reference is bound to an object. if an invocation expression contains a refinement (that is a '.' or a '[subscript]' , it is invoked as a method */


// Create a constructor function called Quo.
// It makes an object with a status property.

var Quo = function(string) { 
	this.status = string;
}

// gives all instances of Quot a public method called get_status 

Quo.prototype.get_status = function() { 
	return this.status;
};

// makes an instances of Quo.

var myQuo = new Quo("confused");
document.writeln(myQuo.get_status());