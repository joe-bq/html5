<?php 


/* __call properly the most frequently used interceptor  */


class Person {
	private $_name;
	private $_age;
	private $_writer;

	public function __construct(PersonWRiter $writer) {
		$this->_writer = $writer;
	}

	public function __call($methodname, $args) {
		if (method_exists($this->_writer, $methodname)) {
			$this->_writer->$methodname($this);
		}
	}

	function __get( $property ) {
		$method = "get{$property}";
		if ( method_exists( $this, $method ) ) {
			return $this->$method();
		}
	}

	function __set($property, $value) {
		$method =  "set{$property}";
		if (method_exists($this, $method)) {
			return $this->$method($value);
		}
	}
	function getName() {
		return "Bob";
	}
	function getAge() {
		return 44;
	}

	function setName( $name ) {
		$this->_name = $name;
		if ( ! is_null( $name ) ) {
			$this->_name = strtoupper($this->_name);
		}
	}

	function setAge( $age ) {
		$this->_age = strtoupper($age);
	}
}

class PersonWriter {
	function writeName(Person $p) {
		print $p->getName()."\n";
	}

	function writeAge(Person $p) {
		print $p->getAge()."\n";
	}
}

$person = new Person(new PersonWriter());
$person->writeName();

?>