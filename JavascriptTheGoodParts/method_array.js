/* methods_array.js */


/* to demonstrate the common methods that are supported by different common data types */

/* it is the methods which makes the data types different */

// Function by takes a member name string and returns
// a comparison function that can be used to sort an
// array of objects that contain that member.


var by = function(name) { 
	return function(o, p) { 
		if (typeof o === 'object' && typeof p === 'object' && o && p) {
			a = o[name];
			b = o[name];

			if (a === b) { 
				return 0;
			}

			if (typeof a === typeof b) { 
				return a < b ? -1 : 1;
			}

			return typeof a < typeof b ? -1 : 1;
		} else {
			throw {
				name: "Error",
				message: 'Expected an object hwere sorting by ' + name
			};
		}
	};
};


var s = [
{first: 'Joe', last: 'Besser'},
{first: 'Moe', last: 'Howard'},
{first: 'Joe', last: 'DeRita'},
{first: 'Shemp', last: 'Howard'},
{first: 'Larry', last: 'Fine'},
{first: 'Curly', last: 'Howard'}
];

s.sort(by('first')); // s is [
// {first: 'Curly', last: 'Howard'},
// {first: 'Joe', last: 'DeRita'},
// {first: 'Joe', last: 'Besser'},
// {first: 'Larry', last: 'Fine'},
// {first: 'Moe', last: 'Howard'},
// {first: 'Shemp', last: 'Howard'}
// ]
