/* ***************************************************

    use another example to show you how the JQuery use the Facade to implement the addMyEvent.

***************************************************** */
bindReady: function() {
    ...
    if ( document.addEventListener ) {
      // Use the handy event callback
      document.addEventListener( "DOMContentLoaded", DOMContentLoaded, false );
 
      // A fallback to window.onload, that will always work
      window.addEventListener( "load", jQuery.ready, false );
 
    // If IE event model is used
    } else if ( document.attachEvent ) {
 
      document.attachEvent( "onreadystatechange", DOMContentLoaded );
 
      // A fallback to window.onload, that will always work
      window.attachEvent( "onload", jQuery.ready );
               ...