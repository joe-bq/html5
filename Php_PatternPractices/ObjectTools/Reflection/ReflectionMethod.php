<?php

// Reflection
// the following are covered


// 3) ReflectionMethod


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
		$this->edition = $edition;
		$this->discount = $discount;
		$coverUrl = 'http://news.163.com';
	}

	function getSummaryLine() {
		return "{$this->subject} {$this->name} {$this->edition} {$this->discount}";
	}


}



$prod_class = new ReflectionClass('CdProduct');
$methods= $prod_class->getMethods();

foreach ($methods as $method) {
	print methodData($method);
	print "\n...\n";
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

class ReflectionUtil { 
	static function getMethodSource(ReflectionMethod $method) {
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