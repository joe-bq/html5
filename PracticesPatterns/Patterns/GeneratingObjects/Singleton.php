<?php

// singleton patterns

class Preferences {
	private $props = array(); // it is not "new Array()";

	private static $instance;

	private function __construct() {  }

	public static function getInstance() { 
		if ( empty( self::$instance ) ) { 
			self::$instance = new Preferences();
		}

		return self::$instance;
	}

	public function setProperty( $key, $val ) { 
		$this->props[$key] = $val;
	}

	public function getProperty( $key ) {
		return $this->props[$key];
	}
}


// create the Preferences instances 
// $preferences = new Preferences(); // you cannot instantiate an Preferences via this context
$preferences_instance = Preferences::getInstance();
$preferences_instance->setProperty("name", "Joe.Wang");
echo "\$preferences is " . $preferences_instance->getProperty("name");

?>
