i// constructor function - enforce constructor

function Dog() {
	
	// ccheck if the called forget the `new`
	if (!(this instanceof Dog)) {
		return new Dog();
	} // re-cal properly

	// real work starts...
	this.thisIsTheName = "Fido";

	// implicit at the end 
	// return this;


}


var newFido = new Dog();
var fido = Dog();

newFido.thisIsTheName;
fido.thisIsTheName;