/* appendix_function_statement_expression.js */

/* The function statement versus the function expression */

/* there are two types of function delcaration, one is the function statement and the other is the function expression */

function foo( ) {}

var foo = function foo( ) {};

/* some gothas about the function statement, one is that 

1. function statement is subject to varialbe hoisting 
2. functon statement cannot be a function expression because the official grammmer assumes that a statement that starts with the words function is a function statement , the workaround is to wrap the function expression in parenthesis.


(function() { 
	var hidden_variable;

	// this function can have some impact on 
	// the environment, but introduces no new global variables.
})();


*/

/* conclusion:

the conclusion is to use the function expression as much as possible, avoid using the function statement */

