/* phone_array.js */

/* array is an object, by most javascript interpreter. so we have to determine if a object is a truely array */


function isArray(value) {

	return value && 
		typeof value === 'object' &&
		typeof value.length === 'number' && 
		!(value.propertyIsEnumerable('length'));

}