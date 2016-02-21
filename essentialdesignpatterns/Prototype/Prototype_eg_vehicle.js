var beget = (function() {
	function F() { 
	}

	return function ( proto ) {
		F.prototype = proto;
		return new F();
	}
})();

// this example wil use the Prototype to rewrite the example of the Beget..

var vehiclePrototype = {
 
  init: function ( carModel ) {
    this.model = carModel;
  },
 
  getModel: function () {
    console.log( "The model of this vehicle is.." + this.model);
  }
};

function vehicle( model  ) { 
	var car = beget(vehiclePrototype);
	car.init( model );
	return car;
}
 
var car = vehicle( "Ford Escort" );
car.getModel();
