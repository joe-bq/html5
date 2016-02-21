<?php 


// Atoload alows you to autoload packages and etc...


// 1) Version one
// function __autoload( $classname ) {
// 	include_once( "$classname.php" );
// }

// 2) version 2

// function __autoload($clasname){ 
// 	$path = str_replace('_', DIRECTORY_SEPARATOR, $classname);
// 	include_once("$path.php"));
// }

// $y = new business_ShopProduct();



// 3) version 3
function __autoload( $classname ) {
	if ( preg_match( '/\\\\/', $classname ) ) {
		$path = str_replace('\\', DIRECTORY_SEPARATOR, $classname );
	} else {
		$path = str_replace('_', DIRECTORY_SEPARATOR, $classname );
	}

	require_once( "$path.php" );
}

// demonstrate the use of PEAR way
// $z = new shop_ShopProduct( 'The Darkening', 'Harry', 'Hunter', 12.99 );
// $z->print_data();

$z = new shop\ShopProduct('The Darkening', 'Harry', 'Hunter', 12.99);
$z->print_data();
?>