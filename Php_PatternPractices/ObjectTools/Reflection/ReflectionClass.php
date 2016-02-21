<?php

// Reflection
// the following are covered

// 1) Reflection
// 2) ReflectionClass 
// 3) ReflectionMethod
// 4) ReflectionParameter
// 5) ReflectionProperty
// 6) ReflectionFunction
// 7) ReflectionExtension
// 8) ReflectionException


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
		$this->eidtion = $edition;
		$this->discount = $discount;
		$coverUrl = 'http://news.163.com';
	}


}



$prod_class = new ReflectionClass('CdProduct');

function classData(ReflectionClass $class) {

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

// demon how to use it 

print classData($prod_class);


class ReflectionUtil { 
	static function getClassSource (ReflectionClass $class) { 
		$path = $class->getFileName();
		$lines = @file($path);
		$from = $class->getStartLine();
		$to = $class->getEndLine();
		$len = $to-$from+1;

		return implode( array_slice($lines, $from-1, $len));
	}
}


print Reflectionutil::getClassSource(
	new ReflectionClass('CdProduct') );
?>