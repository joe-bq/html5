<?php

// test class - autolaoding @ see more details from ../Autoloading.php
// shop_ShopProduct demonstrate the strength of the PEAR naming....
// don't know PEAR naming, go google.com

//* the namespace way
namespace shop;
class ShopProduct {
/*/  the PEAR way
class shop_ShopProduct { 
//*/

	public $name;
	public $category;
	public $subcategory;
	public $price;

	function __construct($name, $category, $subcategory, $price) {
		$this->name = $name;
		$this->category = $category;
		$this->subcategory = $subcategory;
		$this->price = $price;
	}

	function print_data() {
		return "{$this->name} {$this->category} {$this->subcategory} {$this->price} ";
	}
}

?>