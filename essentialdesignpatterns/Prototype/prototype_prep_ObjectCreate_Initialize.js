var vehicle = {
	getModel: function() { 
		console.log("The model of this vehicle is ..." + this.model);
	}
};

var car = Object.create(vehicle, {
	"id": { 
		// NOTE: the symbl "MY_GLOBAL" is missing
		value: My_GLOBAL.nextId(),
		// writable: false, configurable: false by default
		enumerable: true
	},
	"model": { 
		value: "Ford",
		enumerable: true
	}
});