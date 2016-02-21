var myCar = {
	
	name: "Ford Escort",
	drive: function() { 
		console.log("Weeeee, I'm driving!");
	},

	panic: function() { 
		console.log("Wait, How do you stop this thing?");
	}
};

var yourCar = Object.create(myCar);

console.log(yourCar.name);