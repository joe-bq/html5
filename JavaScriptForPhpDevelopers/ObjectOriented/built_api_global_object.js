/* the Built-in API we will revisit the global variables and etc... */

// Create a global variable
var john = "Jo";
john; // "Jo"
window.john; // "Jo", works as a property too

// Create a property of the global object
window.jane = "JJ";
jane; // "JJ", works as a variable too
window.jane; // "JJ"

// Delete them
delete window.john; // false
delete window.jane; // true

john; // "Jo"
jane; // undefined
this === window; // true