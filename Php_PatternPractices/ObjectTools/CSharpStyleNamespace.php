<?php 
// CSharp style namespace declaration 
namespace com\getinstance\util {
	class Debug {
		static function helloWorld() {
			print "Hello from Debug\n";
		}
	}
}

namespace main {
	\com\getinstance\util\Debug::helloWorld();
}
?>