/* links between constructor and the prototype */


function Builder(what) {
	
	this.mine = what;
}

var constructed = new Builder("pwned");

constructed.prototype; // undefined, objects don't have thyis property
constructed.constructor == Builder; // true, 'who's your consturctor.

// secrete link - exposed 
constructed.constructor.prototype == constructed.__proto__;


// more in-depth of the prototype information 


Object.prototype.hasOwnProperty('toString'); // true

constructed.__proto__.__proto__.hasOwnProperty('toString'); 

literal.__proto__.hasOwnProperty('toString');



/* to give  you a fresh reminder of what a prototype is */

/* when a function is created,  automatically get a property called prototype */


function Dog(name) {  // COnstructor 

	this.name = name;
}

Dog.prototype.sayName = function() { 
	return this.name;
}

var fido = new Dog("Fluffy");
fido.sayName();