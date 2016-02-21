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


function methodData( ReflectionMethod $method ) {
	$details = "";
	$name = $method->getName();
	if ( $method->isUserDefined() ) {
		$details .= "$name is user defined\n";
	}
	if ( $method->isInternal() ) {
		$details .= "$name is built-in\n";
	}
	if ( $method->isAbstract() ) {
		$details .= "$name is abstract\n";
	}
	if ( $method->isPublic() ) {
		$details .= "$name is public\n";
	}
	if ( $method->isProtected() ) {
		$details .= "$name is protected\n";
	}
	if ( $method->isPrivate() ) {
		$details .= "$name is private\n";
	}
	if ( $method->isStatic() ) {
		$details .= "$name is static\n";
	}
	if ( $method->isFinal() ) {
		$details .= "$name is final\n";
	}
	if ( $method->isConstructor() ) {
		$details .= "$name is the constructor\n";
	}
	if ( $method->returnsReference() ) {
		$details .= "$name returns a reference (as opposed to a value)\n";
	}
	return $details;
}

$prod_class = new ReflectionClass( 'CdProduct' );
$methods = $prod_class->getMethods();
foreach ( $methods as $method ) {
	print methodData( $method );
	print "\n----\n";
}

class ReflectionUtil {
	static function getMethodSource( ReflectionMethod $method ) {
		$path = $method->getFileName();
		$lines = @file( $path );
		$from = $method->getStartLine();
		$to = $method->getEndLine();
		$len = $to-$from+1;
		return implode( array_slice( $lines, $from-1, $len ));
	}
}

$class = new ReflectionClass( 'CdProduct' );
$method = $class->getMethod( 'getSummaryLine' );
print ReflectionUtil::getMethodSource( $method );


?>