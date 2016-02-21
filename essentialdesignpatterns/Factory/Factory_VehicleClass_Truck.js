/* **************************************************

	Use the VehicleFactory instance to use the Truck class

**************************************************** */

var movingTruck = carFactory.createVehicle( {
	vehicleType: "truck",
	state: "like new",
	wheelSize: "small"
});

// Test to confirm our truck was created with vehicleClass/prototype Truck

// outputs: true
console.log( movingTruck instanceof Truck );


console.log( movingTruck );