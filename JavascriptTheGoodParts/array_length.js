/* array_length.js */


/* this file demonstrate the use of the array length property.  */


/* NOTE: the length is not the up-bound of the array */


var myArray = [];
myArray.length // 0
myArray[1000000] = true;
myArray.length // 1000001
// myArray contains one property.


numbers.length = 3;
// numbers is ['zero', 'one', 'two']


numbers[numbers.length] = 'shi';
// numbers is ['zero', 'one', 'two', 'shi']


/* it is sometime more convenient to use the push method to ahieve the same thing */
numbers.push('go');
// numbers is ['zero', 'one', 'two', 'shi', 'go']
