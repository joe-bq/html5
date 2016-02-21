/*************************************************



Flyweight_jquery_performanceOptimization.js


This shows that James Padolsey suggested an optimization to jqeury which saves one warpping against this in $() or jQuery(). which means tha a new instqance of jQuery is unnecessarily constructed every time, rather than simply doing this:

requirement: 

	jQuery.js

you will need to use the jQuery.js in order to use the optiamization that James is proposing.

****************************************************/

$("div").on("click", function() {
	console.log( "you Clicked: " + $(this).attr( "id" ));
});


// we should avoid using the DOM element to create a
// jQuery object (with the overhead that comes with it)
// and just use the DOM element itself like this: QUESTION: is the following code possible or something that we want to achieve?

$( "div" ).on( "click", function() { 
	console.log( "You clicked: " + this.id);
});


// James had wantted to use jQuery's jQuery.text in the following context, however he diagree with the notion that a new jQeury object had to be created on each iteration
$( "a" ).map( function() { 
	return $( this ).text();
} );

// well to illustrate the idea of what Jame shas proposed, here is the code
jQuery.single = (function ( o ) {
	var collection = jQuery([1]);
	return function ( element ) { 
		// Give collection the element
		collection[0] = element;

		// return the collection
		return collection;
	}
})();

// NOW that James is able to do the following without creating a new jQeury query object
$( "div" ).on( "click", function() {
	var html = jQuery.single( this ).next().html();
	console.log( html );
});