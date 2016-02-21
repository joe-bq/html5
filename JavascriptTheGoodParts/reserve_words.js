/* reserve_words.js */

/* Reserve words, the words may not be used by the Javascript language its self, but cannot be used as the identifiers.. */

/* the list of reserve words include the following. */


/* 

abstract boolean break byte case catch char class const continue
debugger default delete do double else enum export extends false final
finally float for
function goto if implements import in instanceof int interface long native new null
package private protected public return short static super switch synchronized this
throw throws transient true try typeof var volatile void while with

*/


/* They cannot be used to name variables or parameters. When reserved words are used as keys in object literals,
they must be quoted. They cannot be used with the dot notation, so it is sometimes necessary to use the
bracket notation instead: 

*/


var method; // ok
var class; // illegal
object = {box: value}; // ok
object = {case: value}; // illegal
object = {'case': value}; // ok
object.box = value; // ok
object.case = value; // illegal
object['case'] = value; // ok
