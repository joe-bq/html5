/*********************************************


"Complete" Widget Factory Pattern



the basica the lightweight start plugin authoring does not help obscure away the plugin plumbing tasks that we have to deal with on a regular basis.

heer we show an common weiget factory that does the jQuery UI repository on GitHub....

*********************************************/



/*!
 * jQuery UI Widget-factory plugin boilerplate (for 1.8/9+)
 * Author: @addyosmani
 * Further changes: @peolanha
 * Licensed under the MIT license
 */
 


 ;(function ( $, window, document, undefined ) { 
 	 // define our widget under a namespace of your choice
    // with additional parameters e.g.
    // $.widget( "namespace.widgetname", (optional) - an
    // existing widget prototype to inherit from, an object
    // literal to become the widget's prototype );


 	$.widget ( "namespace.widgetname", { 
 		// Options to be used as defaults 
 		options: { 
 			someValue: null
 		},

 		// Setup widget (e.g. element creation, apply theming,
 	    // , bind events etc..  )

 		_create: function() { 
 			// _create will automatically run the first time
            // this widget is called. Put the initial widget
            // setup code here, then we can access the element
            // on which the widget was called via this.element.
            // The options defined above can be accessed
            // via this.options this.element.addStuff();
 		},

 		// Destroy an instantiated plugin and clean pu 
 		// modification that has made to the DOM
 		destroy: function() { 
 			// this.element.removeStuff();
 			// for UI 1.8, destroy must be invoked from the 
 			// base widget
 			$.Widget.prototype.destroy.call( this );
 			// For UI 1.9, define _destroy instead and don't
            // worry about
            // calling the base widget
 		},
 		methodB: function ( event ) { 
 			// _trigger dispatches callback the plugin user 
 			// can subscribe to 
 			// signature: _trigger( "callbackName", [eventObject],
 		    // [uiObject] )
			// e.g. this._trigger( "hover", e /* where e.type == mouseenter" 8? { hovered: $(e.target) });
			this._trigger( "methodA", event, { 
					key: value
			});
 		},

 		methodA: function ( event ) { 
 			this._trigger( "dataChanged", event, { 
 				key: value
 			});
 		},

 		// Respond to any changes the user makes to the options method
 		_setOption: function ( key, value ) { 
 			switch ( key ) { 
 				case "someValue":
 				// this.options.someValue = doSomethingWith( value );
 				break;
 			default:
 				// this.options[ key ] = value;
 				break;
 			}

 			// For UI 1.8 _setOption must be manually invoked
 			// from the base widget
 			$.Widget.prototype._setOption.apply( this, arguments );
 			// For UI 1.9 the _super method can be used instead 
 			// this._super("_setOption", key, value);
 		}
 	});
 })( jQuery, window, document );


 /** below shows you how this can be used */

 var collection = $("#elem").widgetName({
 	foo: false
 });

 collection.widgetName("methodB");