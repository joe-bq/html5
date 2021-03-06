<?php 


// use of the instanceof operator
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
}



function getProduct() {
	return new CdProduct( "Exile on Coldharbour Lane",
		"The", "Alabama 3", 10.99, 60.33 );
}

$product = getProduct();

if ( $product instanceof CdProduct) {
	print "\$product is a ShopProduct object\n";
}



?>