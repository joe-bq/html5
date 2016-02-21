/*************************************************************************


Flyweight_eg_DOMStatemanager.js

This shows you that you can leverage the Flyweight to centralize the handling of the DOM events and this is the Javascript that does all the bindings

requirement:

  jQuery.js

you will need to have the jQuery code imported.

*************************************************************************/


var stateManager = {

	fly: function() {
		var self = this;

		$("#container")
			.unbind() // first unbind the event hanlders
			.on( "click", "div.toggle", function(e) {  // check the target which provides a frefernce to the element that was clicked, regardless of its parent. 
				self.handleClick( e.target );		   // then we use this information to handle the click event wihtout actually need to bind to the event to the specific children when our page lods.
			});
	},

	handleClick: function ( elem ) {
		elem.find( "span" ).toggle( "slow" ); // Question? what does the handler doe?
	}
};