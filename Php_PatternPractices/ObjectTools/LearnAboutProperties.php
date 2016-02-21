<?php

// Learn about proeprties 
// key here is to use the get_class method to return a string representing the class.
// methods that ca be covered in this situation include the following
//  1) Properties

class CdProduct { 

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


print_r(get_class_vars('CdProduct'));
?>