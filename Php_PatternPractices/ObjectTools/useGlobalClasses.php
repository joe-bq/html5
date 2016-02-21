<?php 
// use Global namespaces classes 
namespace com\getinstance\util;
require_once("Global.php");
class Lister { 
	public static function helloWorld() {
		print "Hello from ".__NAMESPACE__."\n";
	}
}

Lister::helloWorld(); // access local
\Lister::helloWorld(); // access global

?>