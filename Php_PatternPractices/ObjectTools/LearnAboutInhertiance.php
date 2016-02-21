<?php

// Learn about inheritance 
// key here is to use the get_class method to return a string representing the class.
// methods that ca be covered in this situation include the following
//  1) inheritance - the parent/child relationship

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

function getProduct() {
	return new CdProduct( "Exile on Coldharbour Lane",
			"The", "Alabama 3", 10.99, 60.33 );
}


$product = getProduct(); // acquire an object 
if (is_subclass_of($product, 'ShopProduct')) {
	print "cdProduct is a subclass of ShopProduct";
}
?>