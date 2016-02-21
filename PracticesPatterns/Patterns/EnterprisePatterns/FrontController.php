<?php

// implementation


// At heart, the Front Controller pattern defines a central point of entry for every // request. It processes the request and uses it to select an operation to perform


// Controller -> Command
//             /        \     
//        DoAThing		DoAnotherThing

namespace woo\controller;

class Controller {
	private $applicationHelper;
	private function __construct() {}



	static function run() {
		$instance = new Controller();
		$instance->init();
		$instance->handleRequest();
	}


	function init() {
		$applicationHelper = ApplicationHelper::instance();
		$applicationHelper->init();
	}

	function handleRequest() {
		$request = new \woo\controller\Request();
		$cmd_r = new \woo\command\CommandResolver();
		$cmd = $cmd_r->getCommand( $request );
		$cmd->execute( $request );
	}
}

namespace woo\controller;

class ApplicationHelper {
	private static $instance;
	private $config = "\\temp\\data\\woo_options.xml";

	private function __construct() { }

	static function instance() {
		if (!self::$instance) { 
			self::$instance = new self();
		}

		return self::$instance;
	}

	function init() {
		$dsn = \woo\base\ApplicationRegistry::getDSN();
		if (!is_null($dsn)) {
			return;
		}

		$this->getOptions();
	}

	private function getOptions() {
		$this->ensure(file_exists($this->config), "Could not find options file");
		$options = simplexml_load_file($this->config);
		print get_class($options);
		$dsn = (string)$options->dsn;
		$this->ensure($dsn, "No DSN found");
		\woo\base\ApplicationRegistry::setDSN($dsn);
		// set other values
	}

	private function ensure($expr, $message) { 
		if (!$expr) { 
			throw new \woo\base\AppException($message) ;
		}
	}
}

?>