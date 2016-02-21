/* singleton pattern in Javascript */

var Single = (function() { 

	var instance;

	function Single() { 
		this.say_what = "Hi";
	}


	Single.prototype.say = function() { return this.say_what; };

	return function() { 
		if (!instance) { 
			instance = new Single();
		}
		return instance;
	};
}());


// get an instance 
var a = new Single();
a.say(); // "hi"