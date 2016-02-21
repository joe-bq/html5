// prototypes.js


function Dog(name) { // Constructor
	this.name = name;	
}

// add a memember to 'prototype' pproperty
Dog.prototype.sayName = function() {
	return this.name;
}

var fido = new Dog("hello");
fido.sayName();