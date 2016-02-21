<?php 

// Factory method/abstract method
abstract class ApptEncoder {
	abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder { 
	function encode() { 
		return "Appointment data encode in BloggsCal format\n";
	}
}

class BloggsTtdEncoder extends ApptEncoder {
	function encode() { 
		return "Appointment data encode in BloggsTtdEncoder format\n";
	}
}

/* this shows that if you do this way, it is verbose and not coool 
abstract class CommsManager {

	abstract function getHeaderText();
	abstract function getApptEncoder();

	abstract function getTtdEncoder();
	abstract function getContactEncoder();

	abstract function getFooterText();
}


class BloggsCommsManager extends CommsManager { 
	function getHeaderText( ) { 
		return "BloggsCal header\n";
	}

	function getApptEncoder() { 
		return new BloggsApptEncoder();
	}

	function getFooterText() {
		return "BloggsCal footer\n";
	}


	function getTtdEncoder() {
		return new BloggsTtdEncoder();
	}
	function getContactEncoder() {
		return new BloggsContactEncoder();
	}

}
*/

abstract class CommsManager {

	const APPT = 1;
	const TTD = 2;
	const CONTACT = 3;

	abstract function getHeaderText();
	abstract function make ($flag_int);
	abstract function getFooterText();
}


class BloggsCommsManager extends CommsManager { 
	function getHeaderText( ) { 
		return "BloggsCal header\n";
	}

/* apparently the self:: is not the self in BloggsCommsManager 
	function make( $flag_int ) { 
		switch ($flag_int ) {
			case self:APPT:
			return new BloggsApptEncoder();
			case self::CONTACT:
			return new BloggsApptEncoder();
			case self::TTD:
			return new BloggsTtdEncoder();
		}
	}
*/


	function make( $flag_int ) {
		switch ( $flag_int ) {
			case CommsManager::APPT:
			return new BloggsApptEncoder();
			case CommsManager::CONTACT:
			return new BloggsApptEncoder();
			case CommsManager:TTD:
			return new BloggsTtdEncoder();
		}
	}

	function getFooterText() {
		return "BloggsCal footer\n";
	}

}

$blogger = new BloggsCommsManager();
$encoder = $blogger->make(CommsManager::CONTACT);

echo $encoder->encode();

?>