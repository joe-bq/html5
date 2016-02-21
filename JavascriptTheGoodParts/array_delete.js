/* array_delete.js */


/* Delete is a function that can remove an element from an array.  */


/* NOTE: delete is an operator or an function? */


/* numbers are array of elements */

numbers = ['zero', 'one', 'two']

numbers.length = 3;
// numbers is ['zero', 'one', 'two']


numbers[numbers.length] = 'shi';
// numbers is ['zero', 'one', 'two', 'shi']


/* it is sometime more convenient to use the push method to ahieve the same thing */
numbers.push('go');
// numbers is ['zero', 'one', 'two', 'shi', 'go']



/* to delete the element from the array you can do the following */


delete numbers[2];
// numbers is ['zero', 'one', undefined, 'shi', 'go']



/* if you want to decrement the names of each of the elemnets to the right. */
numbers.splice(2, 1);