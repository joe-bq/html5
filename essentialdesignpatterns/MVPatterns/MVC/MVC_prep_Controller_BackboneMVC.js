/***********************************************************************


MVC_Controller

	here we introduce the Controller part of the MVC pattern

MVC_prep_Controller_BackboneMVC.js
	

this show that how the Backbone can be used for the Controller coding.

In Backbone, one shares the responsibility of a controller with both the Backbone.View and Backbone.Router. Some time ago Backbone did once come with its own Backbone.Controller - the namig of Backbone.Controller does not make sense in which it was used.

**************************************************************************/

var PhotoRouter = Backbone.Router.extend({
	routes: {"photo/:id", "route"},
	route: function(id ) { 
		var item = photoCollection.get( id );
		var view = new PhotoView( { model : item } );

		$('.content').html( view.render().el );
	}
});