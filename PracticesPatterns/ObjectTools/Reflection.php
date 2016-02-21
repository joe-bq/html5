<?php

// reflection APIs
// it mainly because of the following classes 
// 1. Reflection 
// 2. ReflectionClass
// 3. ReflectionMethod 
// 4. ReflectionParameter
// 5. ReflectionProperty 
// 6. ReflectionFunction 
// 7. ReflectionExtension
// 8. ReflectionException

class ShopProduct { 
	function __construct() {

	}
}

class CdProduct extends ShopProduct {

    static $coverUrl;

	private $title;
	private $summaryLine;
	private $producerFirstName;
	private $producerLastName;
	private $price;
	private $discount;

	function __construct($title, $summaryLine, $producerFirstName, $producerLastName,  $price, $discount) {
		$this->title = $title;
		$this->summaryLine = $summaryLine;
		$this->producerFirstName = $producerFirstName;
		$this->producerLastName = $producerLastName;
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

// Reflectoin::export
$prod_class = new ReflectionClass( 'CdProduct' );
Reflection::export( $prod_class );

// var_dump 

$cd = new CdProduct("cd1", "Summary of the CD1", "bob", "bobbleson", 4, 50);
var_dump($cd);

?>