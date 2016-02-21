<?php

// Method Invocation.
// here for this topic we will introduce something related to the Method invocation
// what will be covered as lised as below.
// 
//   * call_user_func_array - more impressive
//   * call_user_func

function myFunction(){ 
	return "dummy return value";
}

$returnVal = call_user_func("myFunction");

class ShopProduct {

	function __construct($name, $category, $subcategory, $price) {
		$this->name = $name;
		$this->category = $category;
		$this->subcategory = $subcategory;
		$this->price = $price;
	}
}


class CdProduct { 
	function __construct($name, $category, $subcategory, $price) {
		
	} 

	function setDiscount($discount) {
		$this->discount = $discount;
	}
}


function getProduct() {
	return new CdProduct( "Exile on Coldharbour Lane",
			"The", "Alabama 3", 10.99, 60.33 );
}

$product = getProduct();// acquire an object 
call_user_func( array($product, 'setDiscount'), 20); // where array passes in the product and the method name, while the '20' is the value of argument


// why the hell the call_user_func_array (call_user_func ... )

class Interceptor { 
	function __call($method, $args) { 
		if ( method_exists( $this->third, method_name)) {
			return call_user_func_array( array( $this->thirdpartyShop, $method), $args);		
		}
	}
}

?>