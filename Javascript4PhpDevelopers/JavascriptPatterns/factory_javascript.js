/* in this file, we will examine the factory pattern in javascript */

var Polygon = {
	factory: function(name) { 
		var constr = name.charAt(0).toUpperCase() + name.slice(1).toLowerCase();
		if (Polygon[constr]) { 
			return new Polygon[constr]();
		}

		throw new Error("Polygon." + name + "doesn't exist");
	}
};

// Specfic implementation 
Polygon.Triangle = function() { };
Polygon.Circle = function() { };
Polygon.Square = function() { };

// Usage 
var tri = Polygon.factory("Triangle");
tri instanceof Polygon.Triangle; // true
new Polygon.factory('Rectangle');