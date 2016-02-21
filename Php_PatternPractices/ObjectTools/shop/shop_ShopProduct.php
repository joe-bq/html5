<?php

// test class - autolaoding @ see more details from ../Autoloading.php
// the file name is incorrect 
// well the content here shows when you are using the namespace in php, how the ShopProduct should looks like 
class ShopProduct {
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