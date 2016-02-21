/* numbers_NaN.js */

/* NaN is a special quantity defined by IEEEE 754...  */

/* NaN is not a number, and there are something special about the NaN */

typeof NaN === 'number';

/* how to get the value of NaN ? */

+'0';
+'oops';


/* NaN is not equal to itself. */

NaN === NaN;
NaN !== NaN;

/* isNaN function */

isNaN(NaN); // true
isNaN(0); // true
isNaN('oops'); // true
isNaN('0'); // true

/* isFinite function */

function isNumber(value) { 
	return typeof value === 'number' && isFinite(value);
}