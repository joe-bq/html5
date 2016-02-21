<?php 

// examing a Class

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
}


$prod_class = new ReflectionClass( 'CdProduct' );

function classData( ReflectionClass $class ) {
	$details = "";
	$name = $class->getName();
	if ( $class->isUserDefined() ) {
		$details .= "$name is user defined\n";
	}
	if ( $class->isInternal() ) {
		$details .= "$name is built-in\n";
	}
	if ( $class->isInterface() ) {
		$details .= "$name is interface\n";
	}
	if ( $class->isAbstract() ) {
		$details .= "$name is an abstract class\n";
	}
	if ( $class->isFinal() ) {
		$details .= "$name is a final class\n";
	}
	if ( $class->isInstantiable() ) {
		$details .= "$name can be instantiated\n";
	} else {
		$details .= "$name can not be instantiated\n";
	}
	return $details;
}

$prod_class = new ReflectionClass( 'CdProduct' );
print classData( $prod_class );


class ReflectionUtil {
	static function getClassSource( ReflectionClass $class ) {
		$path = $class->getFileName();
		$lines = @file( $path );
		$from = $class->getStartLine();
		$to = $class->getEndLine();
		$len = $to-$from+1;
		return implode( array_slice( $lines, $from-1, $len ));
	}
}


print ReflectionUtil::getClassSource(
	new ReflectionClass( 'CdProduct' ) );

?>