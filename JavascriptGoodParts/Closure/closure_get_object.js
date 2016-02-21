/* closure_ret_obj */


/* in this example I would like to inspire you to think the difference between 
constructor and a function which just create a normal anonymous object */

// create a marker function called quo, it makes an 

// object with a get_status method and a private status property

var quo = function(status) { 
	return { 
		get_status: function() { 
			return status;
		}

	};
};

// Make an instance of quo
var myQuo =  quo("amazed");

console.log(myQuo.get_status());