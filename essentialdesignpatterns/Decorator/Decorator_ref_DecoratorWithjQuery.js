/***********************************************************************

Decorator

	Decorator with jQuery

In the following example, we define three objects: defaults, options and settings. The aim of the task is to decorate the defaults object with additional functionality found in optionssettings. We must:



NOTE: 
  to try this out, you will need to first load the jQuery source code.

**************************************************************************/

var decoratorApp = decoratorApp || {};

// define the object we're going to use 

decoratorApp = {
	defaults: { 
		validate: false,
		limit: 5,
		name: "foo",
		welcome: function() { 
			console.log("welcome!");
		}
	},

	options: { 

		validate: true,
		name: "bar",
		helloWorld: function() { 
			console.log("Hello world");
		}
	},

	settings: {},

	printObj: function(obj){ 
		var arr = [],
			next;
		$.each (obj, function (key, val) {
			next = key + ": ";
			next += $.isPlainObject(val) ? printObj( val ) : val;
			arr.push( next );
		});

		return "{ " + arr.join(", ") + "}";
	}
};

// merge defaults and options, without modifying defaults explicitly
decoratorApp.settings = $.extend({}, decoratorApp.defaults, decoratorApp.options);
 
// what we have done here is decorated defaults in a way that provides
// access to the properties and functionality it has to offer (as well as
// that of the decorator "options"). defaults itself is left unchanged

#("#log").append( decoratorApp.printObj(decoratorApp.settings) + 
	decoratorApp.printObj(decoratorApp.options) + 
	decoratorApp.printObj(decoratorApp.defalts));