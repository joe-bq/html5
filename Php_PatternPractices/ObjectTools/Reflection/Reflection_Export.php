<?php

// Reflection
// the following are covered

// 1) Reflection
// 2) ReflectionClass 
// 3) ReflectionMethod
// 4) ReflectionParameter
// 5) ReflectionProperty
// 6) ReflectionFunction
// 7) ReflectionExtension
// 8) ReflectionException


class ShopProduct {
}

class CdProduct extends ShopProduct { 

	/* -- private variables are not counted as the properties/variables
	private $subject;
	private $name;
	private $edition;
	private $discount;
	*/

	// Only public variables are counted.
	public $coverUrl;
	function CdProduct($subject, $name, $edition, $price, $discount) { 
		$this->subject= $subject;
		$this->name = $name;
		$this->eidtion = $edition;
		$this->discount = $discount;
		$coverUrl = 'http://news.163.com';
	}


}



$prod_class = new ReflectionClass("CdProduct");
Reflection::export($prod_class);

?>