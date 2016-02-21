/***********************************************************************


MVC_Controller

	here we introduce the Controller part of the MVC pattern

MVC_prep_Controller_SpineMVC.js
	

this file provide a ten-foot view of what the controller can do:
**************************************************************************/

// Controllers are an intermediary between models and views which are classically responsible for updating the model when the user manipulates the view.


var PhotosController = Spine.Controller.sub({
	init: function() { 
		this.item.bind( "update", this.proxy( this.render )); // set up listeners in the update and destroy events using the render() and remove() method.
		this.item.bind( "destroy", this.proxy( this.remove ));
	},

	render: function() { 
		// Handle templating
		this.replace( $( "#photoTemplate" ).templ( this.item ));
		return this;
	},

	remove: function() {
		this.el.remove();
		this.release();
	}
});