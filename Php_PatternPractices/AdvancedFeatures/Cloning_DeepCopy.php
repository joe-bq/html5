<?php

/* clone, shallow copy vs. deep copy */

class Account {
	public $balance;
	function __construct( $balance ) {
		$this->balance = $balance;
	}
}

class Person {
	
	private $_name;
	private $_age;
	private $_id;
	public $_account;

	public function __construct($name, $age, Account $account) {
		$this->_name = $name;
		$this->_age = $age;
		$this->account = $account;
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

		$this->_account = clone $this->_account;
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