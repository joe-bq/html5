/***********************************************************************


Mixin

	In Javascript:  we can look at inheriting from Mixins as a means of collecting functionality through extension.

**************************************************************************/



var myMixins = {
	moveUp: function(){ 
		console.log("move up");
	},

	moveDown: function() { 
		console.log("move down");
	},

	stop: function() { 
		console.log("Stop! in the name of love!");
	}
};

