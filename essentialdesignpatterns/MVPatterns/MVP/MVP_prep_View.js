/***********************************************************************

MVP_View : or the presenter

	here we will use the Backbone.View to show how the Backbone filt with the MVP pattern.


Requirements:
this requires the following 

	jQuery.js
	Underscore.js
	Backbone.js

One thing that we have to mentioned here is that the Bakbone fit *neither MVC or MVP*. Instead it borrows some of the best concepts from multiple architecutre patterns and creates a flexible framework that just works well.

**************************************************************************/


var PhotoView = Backbone.View.extend({
	// .. this is a list tag
	tagName: "li".

	template: _.template( $("#photo-template").html() ),

	events: {
		"click img": "toggleViewed"
	},

	// the PhotoView listens for changes to 
	// its model, re-redenring, since there is'
	// a one-to-one correspondence between a 
	// **Photo** and a **PhotoView** in this app,
	// we set a direct reference on the model for convenience

	initialize: function() {
		this.model.on( "change", this.render, this );
		this.model.on( "destroy", this.remove, this );
	},

	// Re-render the photo entry 
	render: function() {
		$( this.el ).html( this.template( this.model.toJSON() ));
		return this;
	},

	// Toggle the "#viewed" state of the model
	toggleViewed : function() {
		this.model.viewed();
	}

});