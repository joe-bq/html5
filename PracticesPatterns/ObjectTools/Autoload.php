<?php

// the following __autoload is handy to handle the PEAR classes
function __autoload( $classname ) {
	$path = str_replace( '_', DIRECTORY_SEPARATOR, $classname );
	print_r( "$path.php" );
	require_once( "$path.php" );
}

// $y = new business_ShopProduct();
// require_once("business\ShopProduct.php");
// $y = new ShopProduct();


$y = new business_ShopProduct();

?>