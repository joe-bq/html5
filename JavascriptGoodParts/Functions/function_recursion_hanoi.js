/* function_recursion.js */


/* Function recursion pattern */


/* The recursion pattern which  */

// Make an array of 2 numbers and add them.


function hanoi(disc, src, aux, dst) { 
	if (disc > 0) {
		hanoi(disc - 1, src, dst, aux);
		document.writeln("Moving disc" + disc + " from " + src + " to " + dst);
		hanoi(disc - 1, aux, src, dst);
	}
};


hanoi(3, "Src", "Aux", "Dst");


// then let's we do the test now 

hanoi(3, 'Src', 'Aux', 'Dst');