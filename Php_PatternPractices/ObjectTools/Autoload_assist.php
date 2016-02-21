<?php 


require_once("shop\\ShopProduct.php");

// demonstrate the use of PEAR way
// $z = new shop_ShopProduct( 'The Darkening', 'Harry', 'Hunter', 12.99 );
// $z->print_data();

$z = new shop\ShopProduct('The Darkening', 'Harry', 'Hunter', 12.99);
echo $z->print_data();
?>