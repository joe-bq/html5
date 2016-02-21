/* array_dimension.js */


/* arrayw dimension - create array with initialized value of desired dimension */


/* NOTE:  */


Array.dim = function(dimension, initial) { 
	var a = [], i;
	for (i = 0; i < dimension; i += 1) { 
		a[i] = initial;
	}

	return a;
};


// Make an array containing 10 zeros.
var myArray = Array.dim(10, 0);


/* you can create multiple dimension arrays, like the below code */


var matrix = [
	[0, 1, 2],
	[3, 4, 5],
	[6, 7, 8]
];

matrix[2][1]; // 7

/* we can make a matrix function to handle this */

Array.matrix = function(m, n, initial) { 
	var a, i, j, mat = [];

	for (i = 0; i < m; i += 1) { 
		a = [];
		for (j = 0; j < n; j += 1) {
			a[j] = initial;

		}
		mat[i] = a;
	}

	return mat;
};


/* Makes a 4 * 4 matrix filled with zeros */
var myMatrix = Array.matrix(4, 4, 0);

document.writeln(myMatrix[3][3]); // 0


Array.identity = function(n) {
	var i, mat = Array.matrix(n, n, 0);

	for (i = 0; i < n; i += 1) { 
		mat[i][i] = 1;
	}

	return mat;
};


document.writeln(myMatrix[3][3]); // 1