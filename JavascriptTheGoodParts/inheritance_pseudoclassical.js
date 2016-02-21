/* pseudo_classical.js */


/* this file is used to define the global function prototype members, such as the 'method' one  */


/* first we will need to define the method beget.. */


if (typeof Object.beget !== 'function') { 
	Object.beget = function(object) { 
		var F = function() { };
		F.prototype = object;
		return new F();
	};

}


/* define a constructor and auguments its prototypes */

var Mammal = function(name) { 
	this.name = name;
};

Mammal.prototype.get_name = function() { 
	return this.name;
};


Mammal.prototype.says = function() { 
	return this.saying || '';
};


/* We can make another pseudoclass that inherits from Mammal by defining its constructor function and
replacing its prototype with an instance of Mammal: */

var Cat = function(name) { 
	this.name = name;
	this.saying = 'meow';
};


// Augment the new prototype with
// purr and get_name methods.

Cat.prototype = new Mammal();

Cat.prototype.purr = function(n) { 
	var i, s = '';
	for (i = 0; i < n; i += 1) {
		if (s) { 
			s += '-';
		}

		s += 'r';
	}

	return s;
};


Cat.prototype.get_name = function() { 
	return this.says() + ' ' + this.name + ' ' + this.says();
};

var myCat =new Cat('Henrietta');
var says =myCat.says(); // 'meow'
var purr = myCat.purr(5); // 'r-r-r-r-r'
var name = myCat.get_name(); // 'meow Henrietta meow'



/* now we include the function's meta function to extend the function */

Function.method = function(name, func) { 
	this.Funciton.prototype[name] = func;
	return this;
}


Function.method ('inherits', function(Parent) {
	this.prototype = new Parent();
	return this;
});


var Cat = function(name) { 
	this.name = name;
	this.saying = 'meow';
}.inherits(Mammal).method('purr', function(n) { 
	var i, s = '';
	for (i = 0; i < n; i += 1) {
		if (s) { 
			s += '-';
		}

		s += 'r';
	}

	return s;
}).method('get_name', function() { 
	return this.says() + ' ' + this.name + ' '  + this.says();
});