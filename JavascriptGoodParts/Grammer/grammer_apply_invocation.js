/* grammer_apply_invocation.js */


/* Apply invocation pattern */


/* the Apply Invocation Pattern - well, the call pattern is also an apply pattern */

// Make an array of 2 numbers and add them.

var array = [3. 4];

var add = function (a, b) {
	return a + b;
};

var sum = add.apply(null, array);