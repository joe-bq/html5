/* appendix_eval.js */

/* The evil eval. */

/* eval does eval... */

// consider someone who haven't had complete understanding of the language

eval("myValue = myObject." + myKey + ";");

// instead of 

myvalue = myObject[myKey];