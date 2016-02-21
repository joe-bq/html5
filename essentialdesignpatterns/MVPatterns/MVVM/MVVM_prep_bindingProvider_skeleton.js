/***********************************************************************

MVVM_prep_bindingProvider_skeleton.js
	In this example, we will show you an sleketon when you define a custom binding provider.,


Requirements:
this requires the following 

	jQuery.js
	Underscore.js
	Backbone.js
	KnockoutJS

well the MVVM by default provided by the KnockoutJS does not provude the true separation of concenrs, the KnockoutJS provides a way to implements custom data provider.
**************************************************************************/

var ourBindingProvider = {
	nodeHasBindings: function( node ) {
		// return true/false
	},

	getBindings: function( node, bindingContext ) { 
		// return a binding object
	}
};


// we can implements something like CS classes to assign bindigns by name to elemnts. 
// one suggestion is to use data-class for this to avoid confusing presentation classes with dta classes.


// does an element have any bindgins? -- one of the above mentioned method can be implemented as follow.

function nodeHasBinings ( node ) { 
	return node.getAttribute ? node.getAttribute("data-class") : false;
};