/* "Classic" extend */

/* while the way comparing creating a new object and use the new object as the prototype, the benefist of this method is that you don't need to create a new object each time, you just pass (tag) the prototype along */



function extend(Parent, Child) {
	// function F() { }
	var F = function() { }
	F.prototype = Parent.prototype;
	Child.prototype = new F();
}


/* two samll tings to adde to the extend mehtod */
function extend(Parent, Child) {
	var F = function() { }
	F.prototype = Parent.prototype;
	Child.prototype = new F();
	// a reference to parent, if required. 
	Child.prototype.parent = Parent;
	// in case this is needed for introspection
	Child.prototype.constructor = Child;

}


function NormalObject() {
	this.name = "default";
	this.getName = function() { 
		return this.name;
	}
}

function PreciousObject()  {

	this.shiny = true;
	this.round = true;
}


extend(NormalObject, PreciousObject);
var preciousObject = new PreciousObject();
NormalObject.prototype.family = "bear";

preciousObject.name; // undefined.. - that is because the 
preciousObject.family;