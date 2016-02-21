/* hasOwnProperty.js */

/* tell you how to respond to the hasOwnProperty.js call */


/* hasOwnProperty is the method which was offered as a filter to work around a problem with the for in statement */

var name;


another_stooge.hasOwnProperty = null; // trouble
for (name in another_stooge) {
	if (another_stooge.hasOwnProperty(name)) {  // boom
		document.writeln(name + ': ' + another_stooge[name]);
	}
}


