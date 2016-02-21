/* grammer_method_invocation_pattern.js */


/* Method invocation pattern */


/* the method's this reference is bound to an object. if an invocation expression contains a refinement (that is a '.' or a '[subscript]' , it is invoked as a method */



// Create myObject. It has a value and an increment
// method. The increment method takes an optional
// parameter. If the argument is not a number, then 1
// is used as the default.
var myObject = {
	value: 0,
	increment: function (inc) {
	this.value += typeof inc === 'number' ? inc : 1;
	}
};


myObject.increment();
document.writeln(myObject.value);

myObject.increment(2);
document.writeln(myObject.value);