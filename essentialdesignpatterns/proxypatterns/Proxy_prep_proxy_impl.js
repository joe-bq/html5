/**************************************************


Proxy_prep_proxy_impl.js



here we will show you an example of how the proxy pattern are implemented in teh jQuery libraries to give you some 
insight into the jQuery libraries


****************************************************/

proxy: function( fn, context ) { 
	if ( typeof context === "string" ) {
		var tmp = fn[ context ];
		context = fn;
		fn = tmp;
	}

	// Quick check to determine if a target is callable, in the spec
	// this throws a TypeError, but we will just return undefined 
	if ( !jQuery.isFunction( fn ) ) {
		return undefined;
	}

	// Simulated bind 
	var args = slice.call( arguments, 2 ) ,
		proxy = function()  {
			return fn.apply( context, args.concat ( slice.call ( arguments ) ) );
		};

	// set the guid of the unique handler to the same of the original handlers
	proxy.guid = fn.guid = fn.guid || proxy.guid || jQuery.guid++;

	return proxy;
};