/********************************************************

HANDLE: $(html) -> $(array)


document.createElement()... 

Here we will use an example to show you that how to use/create the builder pattern in order to ...



user of this pattern can be found in the following code (exemplified)


$( '<div class="foo">bar</div>' );
 
$( '<p id="test">foo <em>bar</em></p>').appendTo("body");
 
var newParagraph = $( "<p />" ).text( "Hello world" );
 
$( "<input />" )
      .attr({ "type": "text", "id":"sample"})
      .appendTo("#container");


**********************************************************/


// HANDLE: $(html) -> $(array)
  if ( match[1] ) {
    context = context instanceof jQuery ? context[0] : context;
    doc = ( context ? context.ownerDocument || context : document );
 
    // If a single string is passed in and it's a single tag
    // just do a createElement and skip the rest
    ret = rsingleTag.exec( selector );
 
    if ( ret ) {
      if ( jQuery.isPlainObject( context ) ) {
        selector = [ document.createElement( ret[1] ) ];
        jQuery.fn.attr.call( selector, context, true );
 
      } else {
        selector = [ doc.createElement( ret[1] ) ];
      }
 
    } else {
      ret = jQuery.buildFragment( [ match[1] ], [ doc ] );
      selector = ( ret.cacheable ? jQuery.clone(ret.fragment) : ret.fragment ).childNodes;
    }
 
    return jQuery.merge( this, selector );