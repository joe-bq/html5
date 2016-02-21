<?php 

// Enterprise pattern - register 

// the register patterns.

// the old singleton patterns


/** the registry pattern version 1 : singleton implementation */

/*
class Registry { 
	private static $instance;

	private $request;


	private function __construct() {}

	static function instance() { 
		if (! isset(self::$instance)) { self::$instance = new self(); }

		return self::$instance;

	}


	function getRequest() {
		return $this->request;
	}


	function setRequest( Request $request) { 
		$this->request = $request;
	}
}

// empty class for testing 
class Request { } 


$reg = Registry::instance();
$reg->setRequest(new Request() );

*/


/** the registry implementation - singleton with get/set */

/*
class Registry { 
	private static $instance;

	private $value = array();


	private function __construct() {}

	static function instance() { 
		if (! isset(self::$instance)) { self::$instance = new self(); }

		return self::$instance;

	}


	function get($key) { 
		if (isset( $this->values[$key] ) ) {
			return $this->values[$key];
		}

		return null;
	}

	function set($key, $value) { 
		$this->values[$ke] = value;
	}
}

// empty class for testing 
class Request { } 


$reg = Registry::instance();
$reg->setRequest(new Request() );

*/


/** registry - base Registry class where it can help build concept of scope
which is quite common to use in PHP program */

namespace woo\base;

abstract class Registry { 

	abstract protected function get($key);
	abstract protected function set($key, $val);
}



class RequestRegistry extends Registry { 
	private $values = array();
	private static $instance;

	private function __construct() { 
	}

	static function instance() {
		if ( ! isset( self::$instance ) ) { self::$instance = new self(); }
		return self::$instance;
	}

	protected function get($key) {
		if ( isset( $this->values[$key] ) ) {
			return $this->values[$key];
		}

		return null;
	}

	protected function set($key, $val) { 
		$this->values[$key] = $val;
	}


	static function getRequest() { 
		return self::instance()->get('request');
	}

	static function setRequest(Request $request) {
			return self::instance()->set('request', $request);
	}
}

class Request {}


// then we can have RequestRegistry and other registry class such as SessionRegistry 

class SessionRegistry extends Registry {
	private static $instance;

	private function __construct() { 
	}

	static function instance() {
		if ( ! isset( self::$instance ) ) { self::$instance = new self(); }
		return self::$instance;
	}

	protected function get($key) {
		if ( isset( $this->values[$key] ) ) {
			return $this->values[$key];
		}

		return null;
	}

	protected function set($key, $val) { 
		$this->values[$key] = $val;
	}


	static function getRequest() { 
		return self::instance()->get('request');
	}

	static function setRequest(Request $request) {
			return self::instance()->set('request', $request);
	} 
}

class ApplicationRegistry extends Registry {
	private static $instance;
	private $freezedir = "data";
	private $values = array();
	private $mtimes = array();

	private function __construct() { }
	static function instance() {
	if ( ! isset(self::$instance) ) { self::$instance = new self(); }
		return self::$instance;
	}
	protected function get( $key ) {
		$path = $this->freezedir . DIRECTORY_SEPARATOR . $key;
		if ( file_exists( $path ) ) {
			clearstatcache();
			$mtime=filemtime( $path );
			if ( ! isset($this->mtimes[$key] ) ) { $this->mtimes[$key]=0; }
			if ( $mtime > $this->mtimes[$key] ) {
				$data = file_get_contents( $path );
				$this->mtimes[$key]=$mtime;
				return ($this->values[$key]=unserialize( $data ));
			}
		}
		if ( isset( $this->values[$key] ) ) {
			return $this->values[$key];
		}
		return null;
	}
	protected function set( $key, $val ) {
		$this->values[$key] = $val;
		$path = $this->freezedir . DIRECTORY_SEPARATOR . $key;
		file_put_contents( $path, serialize( $val ) );
		$this->mtimes[$key]=time();
	}

	static function getDSN() {
		return self::instance()->get('dsn');
	}
	static function setDSN($dsn) {
		return self::instance()->set('dsn', $dsn );
	}

}

class MemApplicationRegistry extends Registry {
	private static $instance;
	private $values = array();
	private $id;

	const DSN = 1;

	private function __construct() {
		$this->id= @shm_attach(55, 10000, 0600);
		if (!$this->id) { 
			throw new Exception("could not access shared memory");
		}
	}

	static function instance() {
		if ( ! isset(self::$instance) ) { self::$instance = new self(); }
		return self::$instance;
	}


	protected function get($ke) {
		return shm_get_var($this->id, $key);
	}


	protected function set($key, $val ) {
		return shm_put_var($this->id, $key, $val);
	}

	static function getDSN() { 
		return self::instance()->get(self::DSN);
	}


	static function setDSN($dsn){
		return self::instance()->set(self::DSN, $dsn);
	}
}
?>