/* array_and_object.js */


/* array is an object and is not an object.  */


/* NOTE: javascript itself sometimes can be confused about the identity of the style. */



var is_array = function(value) { 
	return value && typeof value === 'object' &&
		value.constructor === Array;
};


/* Unfortunately, it fails to identify arrays that were constructed in a different window or frame. If we want to
accurately detect those foreign arrays, we have to work a little harder:  */


var is_array = function(value) { 
	return value && 
		typeof value === 'object' && 
		typeof value.length === 'number' &&
		typeof value.splice === 'function' &&
		!(value.propertyIsEnumerable('length'));
};

/* last test test if the length property is produced by a for in loop */

