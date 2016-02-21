/***********************************************************************

MVC_Model

	this wil shows you what does the Models in MVC patterns looks like.
	

**************************************************************************/

// the concept of a photo would merit its own model as it represents a unique kind of domain-specific data. 
// an example of a very simplistic model implemented using Backbone.

var Photo = Backbone.Model.extend({
	// Default attributes for the Photo
	defaults: { 
		src: "placeholder.jpg",
		caption: "A default image",
		viewed: false
	},

	// Ensure that each photo created has a `src`
	initialize: function() {
		this.set( {src: this.defaults.src} );
	}
});

// It is not uncommon for modern MVC/MV* frameworks to provide a means to group models together (e.g. in Backbone, these groups are referred to as "collections"). 
// Managing models in groups allows us to write application logic based on notifications from the group should any model it contains be changed.
// This avoids the need to manually observe individual model instances.

var PhotoGallery = Backbone.Collection.extend({
	// REference to this collection's model
	model: Photo,

	// Filter down the list of all photos
	// that have been viewed
	viewed: function() {
		return this.filter(function (photo ) {
			return photo.get( "viewed" );
		})
	},

	unviewed: function() { 
		return this.without.apply( this, this.viewed() );
	}
});