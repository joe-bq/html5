/*********************************
	
	Flyweight_prep_duckImplementsFor.js

***********************************/



Function.prototype.implementsFor = function ( parentClassOrObject ) {

	if ( parentClassOrObject.constructor == Function ) { 
		// Normal nheritance 
		this.prototype = new parentClassOrObject();
		this.prototype.constructor =  this;
		this.prototype.parent = parentClassOrObject.prototype;
	} else {
		// Pure virtual inheritance 
		this.prototype = parentClassOrObject;
		this.prototype.constructor = this;
		this.prototype.parent = parentClassOrObject;
	}
}