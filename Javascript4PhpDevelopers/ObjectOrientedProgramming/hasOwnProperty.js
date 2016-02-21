/* hasOwnProperty.js */

var literal = {
mine: "I pwn you"
};
literal.mine; // "I pwn you"
var assigned = {};
assigned.mine = "I pwn you";


function Builder(what) {
	
	this.mine = what;
}

var constructed = new Builder("pwned");

constructed.mine;

literal.hasOwnProperty("mine");
constructed.hasOwnProperty('mine');
literal.hasOwnProperty('toString');
constructed.hasOwnProperty('toString');

literal.hasOwnProperty('hasOwnProperty');