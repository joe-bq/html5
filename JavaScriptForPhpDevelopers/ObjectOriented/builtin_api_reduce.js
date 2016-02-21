/* map and reduce method */

function sum(running_sum, value, index, array) {
	console.log(arguments);
	return running_sum + value;
}



[1, 2, 3].reduce(sum, 100); // 106