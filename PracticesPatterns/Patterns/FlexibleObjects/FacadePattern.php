<?php

function getProductFileLine( $file ) { 
	return file( $file );
}


function getProductObjectFromId( $id, $productname ) {
	// some kind of daabase lookup 
	return new Product ($id, $productname );
}

function getNameFromLine( $line ) { 
	if (preg_match ("/.*-(.*)\s\d+/", $line, $array)) {
		return str_replace('_', ' ', $array[1]);
	}

	return '';
}


function getIDFromLine( $line ) { 
	if ( preg_match("/^(\d{1,3})-/", $line, $array) ) {
		return $array[1];
	}

	return -1;
}

class Product { 
	public $id;
	public $name;
	function __construct( $id, $name ) {
		$this->id = $id;
		$this->name = $name;
	}
}



$lines = getProductFileLine('test.txt' );
$objects = array();

foreach ($lines as $line) {
	# 
	$id = getIDFromLine( $line );
	$name = getNameFromLine( $line );
	$objects[$id] = getProductObjectFromId( $id, $name );
}

// well the above code does the work , it is not elegant and it is not working perfectly fine 

class ProductFacade { 

	private $products = array();

	function __construct ( $file ) {
		$this->file = $file;
		$this->compile();

	}

	private function compile() { 
		$lines = getProductFileLine($this->file);
		foreach ($lines as $line ) {
			$id = getIDFromLine( $line );
			$name = getNameFromLine( $line );
			$this->products[$id] = getProductObjectFromId( $id, $name );
		}
	}

	function getProducts() {
		return $this->products;
	}

	function getProduct($id ) {
		return $this->products[$id];
	}
}

$facade = new ProductFacade('test.txt');
$facade->getProduct(234);
?>
