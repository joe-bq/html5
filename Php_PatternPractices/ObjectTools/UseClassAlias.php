<?php 
namespace main;

require_once("FullyQuailifiedNamespace.php");
// you can import the class itself. 
use com\getinstance\util\Debug as uDebug;

class Debug {
	static function helloWorld() {
	  print "hello from main\Debug";
	}
}

uDebug::helloWorld();

?>