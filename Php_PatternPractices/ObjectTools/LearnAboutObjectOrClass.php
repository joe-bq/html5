<?php

// Learn about an object or class 
// key here is to use the get_class method to return a string representing the class.

// if you add the following namespace above
namespace LearnAboutObjectOrClass;

class CdProduct { 
	function CdProduct($subject, $name, $edition, $price, $discount) { 
		$this->subject= $subject;
		$this->name = $name;
		$this->eidtion = $edition;
		$this->discount = $discount;
	}
}


function getProduct() {
	return new CdProduct( "Exile on Coldharbour Lane",
			"The", "Alabama 3", 10.99, 60.33 );
}


$product = getProduct	();
if (get_class($product) == 'CdProduct') {
	print "\$product is a CdProduct object\n";
} else if (get_class($product) == 'LearnAboutObjectOrClass\CdProduct')  {
	print "\$product is a LearnAboutObjectOrClass\CdProduct object\n";
}
?>