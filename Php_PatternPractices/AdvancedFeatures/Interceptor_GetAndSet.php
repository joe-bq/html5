<?php

/* Interceptor - Get and Set interceptors */

class Person {
	private $_name;
	private $_age;

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

$p = new Person();
print $p->name;

?>