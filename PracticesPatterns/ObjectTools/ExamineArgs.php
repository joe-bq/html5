<?php 

// examine methods 

class ShopProduct { 
	function __construct() {

	}
}

class CdProduct extends ShopProduct {

    static $coverUrl;

	private $title;
	private $summaryLine;
	private $producerFirstName;
	private $producerLastName;
	private $price;
	private $discount;

	function __construct($title, $summaryLine, $producerFirstName, $producerLastName,  $price, $discount) {
		$this->title = $title;
		$this->summaryLine = $summaryLine;
		$this->producerFirstName = $producerFirstName;
		$this->producerLastName = $producerLastName;
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

	function getSummaryLine() {
		return $this->summaryLine;
	}
}

function argData( ReflectionParameter $arg ) {
$details = "";
$declaringclass = $arg->getDeclaringClass();
$name = $arg->getName();
$class = $arg->getClass();
$position = $arg->getPosition();
$details .= "\$$name has position $position\n";
if ( ! empty( $class ) ) {
$classname = $class->getName();
$details .= "\$$name must be a $classname object\n";
}
if ( $arg->isPassedByReference() ) {
$details .= "\$$name is passed by reference\n";
}
if ( $arg->isDefaultValueAvailable() ) {
$def = $arg->getDefaultValue();
$details .= "\$$name has default: $def\n";
}
return $details;
}


$prod_class = new ReflectionClass( 'CdProduct' );
$method = $prod_class->getMethod( "__construct" );
$params = $method->getParameters();
foreach ( $params as $param ) {
print argData( $param )."\n";
}

?>