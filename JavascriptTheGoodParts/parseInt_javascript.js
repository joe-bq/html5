/* parseInt.js */

/* parseInt is  a function that helps you to parse int out its string representation */

/*  ParseInt is a function that convert a string into an int */




var a = parseInt("08"); // produce 0, because 09 is the prefix of octal numbers - tested from Chrome, the result is 8 instead of 0...
var b = parseInt("08", 10); // return 8 because we have tell the javascript that this is a octal decimal numbers.

