<?php 

// learning about propertties
class CdProduct {

    static $coverUrl;

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

print_r( get_class_vars( 'CdProduct' ) );



?>