<?php

// Learn about Methods 
// key here is to use the get_class method to return a string representing the class.
// methods that ca be covered in this situation include the following
//  1) method

// if you add the following namespace above

class CdProduct { 
	// well it is not necessary to declare the variables below, 
	// but we'd recommended that you do this.
	//

	/*
	private $subject;
	private $name;
	private $edition;
	private $discount;
	*/
	function CdProduct($subject, $name, $edition, $price, $discount) { 
		$this->subject= $subject;
		$this->name = $name;
		$this->eidtion = $edition;
		$this->discount = $discount;
	}

	function getTitle() {
		return $this->subject;
	}
}


print_r( get_class_methods('CdProduct'));


// usage : determine if a method exist 
function getProduct() {
	return new CdProduct( "Exile on Coldharbour Lane",
			"The", "Alabama 3", 10.99, 60.33 );
}

$product = getProduct(); // acquire an object
$method = "getTitle"; // define a method name

if ( in_array( $method, get_class_methods( $product ) ) ) {
	print $product->$method(); // invoke the method
}


// while there  is a is_callable and method_exists

if (is_callable ( array ($product, $method )))  {
	print $product->$method(); // invoke the method  (NOTE: CAREFUL THAT YOU DON'T FORGET THE '$' IN FRONT OF THE 'method' NAME)

}

if (method_exists($product, $method)) { 
	print $product->$method(); // invoke the method  (NOTE: CAREFUL THAT YOU DON'T FORGET THE '$' IN FRONT OF THE 'method' NAME)
}

?>