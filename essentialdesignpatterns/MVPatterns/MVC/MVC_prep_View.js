/***********************************************************************

MVC_View

	This covers the view part of the MVC pattern.
	

**************************************************************************/


/* =========================================


here we will define a render() utility within our view which is responsible for rendering the contents  of the pohtomodel using a Javascript template engine. (Underscore templating) and updating the content of our view, referenced by photoEl


the PhotoModel then adds our render() callback as as one of its subscribers so that through the osverver pattern we can trigger the view to update  when the model changes.

============================================ */


var buildPhotoView = function ( photoModel, photoController ) {
	var base = document.createElement( "div" ),
		photoEl = document.createElement( "div" );

		base.appendChild( photoEl );


		var render = function() { 
			// we use a template libarary such as Underscore 
			// templating which generate the HTML for our photo entry 
			photoEl.innerHTML = _.template( "#photoTemplate", {
				src: photoModel.getSrc()
			});
		};

		photoModel.addSubscriber( render ); // add the subscriber the callback render so that the model can notify the view to re-render itself.

		photoEl.addEventListener( "click", function() { 
			photoController.handleEvent( "click", photoModel ); //  the view does not hanle the click event directly, and it delegate the job to the Controller.
		});

		var show = function() { 
			photoEl.style.display = "";
		};

		var hide = function() {
			photoEl.style.display = "none";
		};

		return {
			showView : show,
			hideView: hide
		};

};