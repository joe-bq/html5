<?php 

interface SomeInterface {
	function someMember();
}


class ShopProduct {
	function __construct() {

	}
}


class CdProduct extends ShopProduct implements SomeInterface {  
	function __construct() {
		parent::__construct();
	}

	function someMember() {
		print "someMember()";
	}
}


function getProduct() {
	return new CdProduct();
}


$product = getProduct(); // acquire an object
if ( is_subclass_of( $product, 'ShopProduct' ) ) {
	print "CdProduct is a subclass of ShopProduct\n";
}

if ( in_array( 'SomeInterface', class_implements($product))) {
	print "CdProduct is an interface of someInterface\n";
}


?>