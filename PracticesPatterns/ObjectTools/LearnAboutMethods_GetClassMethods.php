<?php 

// Learn aobut the Methods 
class CdProduct {
	private $title;
	private $author;
	private $category;
	private $price;
	private $discount;

	function __construct($title, $author, $category, $price, $discount) {
		$this->title = $title;
		$this->author = $author;
		$this->category = $category;
		$this->price = $price;
		$this->discount = $discount;
	}

	function getTitle() {
		return $this->title;
	}

	function setTitle($title) { 
		$this->title = $title;
	}


	function getDiscount() {
		return $this->discount;
	}

	function setDiscount($discount) { 
		$this->discount = $discount;
	}
}

function getProduct() {
	return new CdProduct( "Exile on Coldharbour Lane",
		"The", "Alabama 3", 10.99, 60.33 );
}

// get list of methods 
print_r( get_class_methods( 'CdProduct') );

// you can store the method name in a variable and then call it. 
$product = getProduct();
$method = "getTitle";
print $product->$method();

// to test if the methods exists
if ( in_array( $method, get_class_methods($product))) {
	print $product->$method();
}


// is_callable more sophisticate 
if ( is_callable( array( $product, $method ) ) ) { 
	print $product->$method(); // invoke the method 
}

// method_exists() function 

if ( method_exists( $product, $method )) { 
	print $product->$method(); // invoke the method 
}

?>