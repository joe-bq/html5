/***********************************************************************


	Abstract Factories

	Herew e will introduce some of abstract factories, the usage of the abstract factories is when 

	the system must be independent from the way the objects it creates are generated or it needs to work with
	multiple types of objects.



**************************************************************************/


/* ==================== 

for preparation we can create the following classses for Car and Truck


======================= */ 

function Car(options) {
	this.color = options.color || "red";
	this.doors = options.doors || 6;
	this.state = options.state || "brand new";
}


function Truck(options) { 
	this.state = options.state || "used";
	this.wheelSize = options.wheelSize || "large";
	this.color = options.color || "blue";
}

function VehicleProto() {
	this.drive = function() { };
	this.breakDown = function() { };
}

var protoType = new VehicleProto();
Car.prototype = protoType;
Truck.prototype = protoType;

var abstractVehicleFactory = (function() { 

	var types = [];

	return {
		getVehicle: function ( type, customization ) {
			var Vehicle = types[type];
			return (Vehicle ? new Vehicle(customization) : null);
		},

		registerVehicle : function ( type, Vehicle ) { 
			// check the vehicle that meets our Vehicle contract
			var proto = Vehicle.prototype;

			// only register classes that fullfill the Vehicle hierarchy
			if (proto.drive && proto.breakDown) {
				types[type] = Vehicle;
			}
			// return back the abstractVehicleFactory that will enable us to chain the call of registerVehicle.
			return abstractVehicleFactory;
		}
	};
})();


// Usage:
abstractVehicleFactory.registerVehicle( "car", Car );
abstractVehicleFactory.registerVehicle( "truck", Truck );


// Instantiate a new Car based on the abstract vehicle type 
var car = abstractVehicleFactory.getVehicle( "car", { 
	color: "lime green",
	state: "like new"
});


// Instantiate a new turck in a similar manner
var truck = abstractVehicleFactory.getVehicle( "truck", { 
	wheelSize: "medium",
	color: "neon yellow"
});