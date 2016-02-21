/***********************************************************************

MVVM_prep_Model

	In this example, we will show a simple example on defining a model with the KnockoutJS framework.


Requirements:
this requires the following 

	jQuery.js
	Underscore.js
	Backbone.js
	KnockoutJS

One thing that we have to mentioned here is that the Bakbone fit *neither MVC or MVP*. Instead it borrows some of the best concepts from multiple architecutre patterns and creates a flexible framework that just works well.

**************************************************************************/



var Todo = function( content, done ) { 
	this.content = ko.observable(content); // turn a model to an observable
	this.done = ko.observable(done);
	this.editing = ko.observable(false);
}

