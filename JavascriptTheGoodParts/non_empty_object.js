/* non_empty_object.js */

/* to show that javascript object are never truely empty because you can pick up numbers from the prototype chain. */


var i;
var word;
var text =  "This oracle of comfort has so pleased me, " +
			"That when I am in heaven I shall desire " +
			"To see what this child does, " +
			"and praise my Constructor.";

var words = text.toLowerCase().split(/[\s,.]+/);
var count = {};

for (i = 0; i < words.length; i += 1) {
	word = words[i];
	if (count[word]) { // you would expect that count['this'] is undefined, however, object always have an 'constructor' property, which is not undefined
		count[word] += 1;
	} else {
		count[word] = 1;
	}
}


/* it has strange output if you try to get the value of count['constructor'] */


for (i = 0; i < words.length; i += 1) { 
	word = words[i];
	if (typeof(count[word] === 'number')) { // this is a far more precise test that you can trust.
		count[word] += 1;
	} else { 
		count[word] = 0;
	}
}