<?php

/* clone, and its interceptor method __clone, a key to the cloning */

class Person {
	
	private $_name;
	private $_age;
	private $_id;

	public function __construct($name, $age) {
		$this->_name = $name;
		$this->_age = $age;
	}


	public function setId($id) {
		$this->id = $id;
	}

	/* steps:
	1. shallow copy made 
	2. __clone method called 
	*/
	public function __clone() {
		/* don't do this */
		/*
		$person = new Person($this->name, $this->age);
		$person.setId(null);
		return $person;
		*/
		$this->_id = 0;
	}
}

$person = new Person( "bob", 44 );
$person->setId( 343 );
$person2 = clone $person;
// $person2 :
// name: bob
// age: 44
// id: 0.


?>