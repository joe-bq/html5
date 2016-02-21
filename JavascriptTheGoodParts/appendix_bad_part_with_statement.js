/* appendix_with_statements.js */

/* As you will see later that the with statement is sometimes very confusing. */

/* the with statement is a short-hand and bears a bad name */

with (obj) { 
	a = b;
}



if (obj.a === undefined) {
	a = obj.b === undefined ? b : obj.b;
} else {
	obj.a = obj.b === undefined ? b : obj.b;
}



