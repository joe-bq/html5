/* object_beget.js */


/* this file has the beget method from the Object class.  */


/* beget is a usge of the prototype pattern in Javascript */


if (typeof Object.beget !== 'function') { 
	Object.beget = function(object) { 
		var F = function() { };
		F.prototype = object;
		return new F();
	};

}