<?php 

/* __destruct - the destructor get called when expunged from memory */

class Person { 
	private $name;
	private $age;
	private $id;

	public function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function __destruct() { 
		if (! empty($this->id)) {
			// save data
			print "Save Data";
		}
	}
}


$person = new Person( "bob", 44 );
$person->setId( 343 );
unset( $person );

?>