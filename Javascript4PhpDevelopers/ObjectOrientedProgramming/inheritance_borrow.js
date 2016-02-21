/* inheritance_borrwing method *?

/* the key to the borrowing method is really simple, you see a method you likiek, you can temporarily borrow it, passing your own object to bound to this */

var object = { 
	name : "normal",
	sayName: function() { 
		return "My Name  is " + this.name;
	}
};


var precious = {
	
	shiny: true,
	name: true,
};

object.sayName.call(precious);


/* now if we combine thte class inheritance with method borrowing, here is what I can get */

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

function Parent(name) { 
	this.name = name;
}

Parent.prototype.family = "Bear";

extend(Parent, Child)
function Child() { 
	Child.prototype.parent.apply(this, arguments);
}

/* magic: 'this' properties become own properties of the child. */
// show how to use them 
var bear = new Child("Cub");
bear.name; // cub
bear.family; // "Bear"
bear.hasOwnProperty('name'); // true
bear.hasOwnProperty('family'); // false
