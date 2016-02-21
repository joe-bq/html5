/*********************************
	
	Flyweight_eg_coffee.js

***********************************/

// Flyweight object

var CoffeeOrder =  { 
	// interfaces
	serveCoffee: function(context) { },
	getFlavor : function() {}
};


// ConcreteFLyweight ob ject that creates ConcreteFLyweight
// implements CoffeeOrder

function CoffeeFlavor ( newFlavor ) { 

	var flavor = newFlavor;

	// if an interface has been defined for a feature 
	// implements the feature 
	if (typeof this.getFlavor == "function") { 
		this.getFlavor  = function() { 
			return flavor;
		};
	}

	if ( typeof this.serveCoffee == "function" ) { 
		this.serveCoffee = function ( context ) { 
			console.log("Serving Coffee flavor " + flavor + "to table number " + context.getTable());
		};
	}
}

// Implement interface for CoffeeOrder 
CoffeeFlavor.implementsFor ( CoffeeOrder ) ;

// Handle table numbers for a coffee order 
function CoffeeOrderContext ( tableNumber ) { 
	return { 
		getTable : function() { 
			return tableNumber;
		}
	};
}


function CoffeeFlavorFactory() { 
	var flavors = {},
		length = 0;

	return {
		getCoffeeFlavor : function ( flavorName ) {
			var flavor  = flavors[flavorName];
			if (typeof flavor == "undefined" ) { 
				flavor = new CoffeeFlavor(flavorName);
				flavors[flavorName] = flavor;
				length++;
			}
			return flavor;
		},

		getTotalCoffeeFlavorsMade : function() { 
			return length;
		}
	};
}

// Sample usage:
// TestFlyweight()

function testFlyWeight() { 
	// the flavors ordered
	var flavors = new CoffeeFlavor(),

	// the table for the orders 
	tables = new CoffeeOrderContext(),

	// Number of orders made
	ordersMade = 0,

	// The CoffeeFlavorFactory instance 
	flavorFactory;

	function takeOrders ( flavorIn, table ) { 
		flavors[ordersMade] = flavorFactory.getCoffeeFlavor( flavorIn );
		tables[ordersMade++] = new CoffeeOrderContext( table );

	}

	flavorFactory = new CoffeeFlavorFactory();

	takeOrders("Cappuccino", 2);
   takeOrders("Cappuccino", 2);
   takeOrders("Frappe", 1);
   takeOrders("Frappe", 1);
   takeOrders("Xpresso", 1);
   takeOrders("Frappe", 897);
   takeOrders("Cappuccino", 97);
   takeOrders("Cappuccino", 97);
   takeOrders("Frappe", 3);
   takeOrders("Xpresso", 3);
   takeOrders("Cappuccino", 3);
   takeOrders("Xpresso", 96);
   takeOrders("Frappe", 552);
   takeOrders("Cappuccino", 121);
   takeOrders("Xpresso", 121);
 
 	for (var i = 0; i < ordersMade; ++i ) { 
 		flavors[i].serveCoffee (tables[i]);
 	}

 	console.log(" ")
 	console.log("total CoffeeFlavor objects made: " + flavorFactory.getTotalCoffeeFlavorsMade());

}