/* **************************************************

	Factory Pattern - this will demonostrate you how to use the Factory pattern to create instances.

**************************************************** */



function Car ( options )  {
	// some defaults
	this.doors = options.doors || 4;
	this.state = options.State || "brand new";
	this.color = options.color || "silver";

}

// a Constructor for defining new trucks
function Truck ( options ) {
	this.state = options.state || "used";
	this.wheelSize = options.wheelSize || "large";
	this.color = options.color || "blue";

}


// FactoryExample.js
// Define a skeleton vehicle factory 
function VehicleFactory () { }

// define the prototype  and utilities for this factory


// our default vehicle Class is Car
VehicleFactory.prototype.vehicleClass = Car;

// Our factory method for creating new Vehicle instances
VehicleFactory.prototype.createVehicle = function ( options ) { 
	switch (options.vehicleClas) {
		case "car":
		this.vehicleClass = Car;
		break;
		case "truck":
		this.vehicleClass = Truck;
		break;
		// default to VehicleFactory.prototype.vehicleClass (Car)
	}

	return new this.vehicleClass (options);
};

var carFactory = new VehicleFactory();
var car = carFactory.createVehicle( { 
	vehicleType: "car",
	color: "yellow",
	doors: 6
});


// Test to confirm our car was created using the vehicleClass/prototype Car
// outs: true
console.log( car instanceof Car);

// Outsputs: Car object of color "yellow", doors: 6 in a "brand new" state
console.log( car );