/* inheritance_functional.js */


/*functional pattern in JS */


/* the upside of functional pattern:

1. no need to do duplicate work in Cat for Mammal constructor
2. it has better private supports


the main characteristic of the functional pattern is that 

1. it has a spec object
2. that which acts as the holder of private fields and methods
 */


var mammal = function(spec) { 
	var that = { };

	that.get_name = function() { 
		return spec.name;
	};

	that.says = function() { 
		return spec.saying || '';
	};

	return that;
};

var myMammal = mammal({name: 'Herb'});

 var cat = function(spec) { 
 	spec.saying = spec.saying || 'meow';
 	var that = mammal(spec); /* this is analogy to call the parent's constructor */
 	that.purr = function (n) { 
		var i, s = '';

		for (i = 0; i < n; i += 1) {
		if (s) {
			s += '-';
		}
			s += 'r';
		}

		return s;
 	};

 	that.get_name = function()  {
 		return that.says() + ' ' + spec.name + ' ' + that.says();
 	};


 	return that;

 };

var myCat = cat({name: 'Henrietta'});

myCat.name; // undefined
myCat.get_name(); // ... 



/* also, it is possible to call super method */

Object.method('superior', function (name) { 
	var that = this,
		method = that[name];
		return function() { 
			method.apply(that, arguments);
		};
});

/* following shows how to use it */

var coolcat = function (spec) { 
	var that = cat(spec);
	var superior_say_name = that.superior('get_name'); // cann not use that.get_name because it create loops.
	that.say_name = function(n) {
		return 'like ' + superior_say_name() + ' baby';

	};

	return that;
};


/* to test it how it is used */
var myCoolCat = coolcat({name: 'Bix'});
var name = myCoolCat.get_name();
//       'like meow Bix meow baby';