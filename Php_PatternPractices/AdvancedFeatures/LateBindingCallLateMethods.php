<?php

/* Late Static Binding - late binding */

abstract class DomainObject { 
	private $group;

	public function __construct() {
		$this->group = static::getGroup();
	}

	public static function create() {
		return new static();
	}

	public static function getGroup() {
		return "default";
	}
}

class Document extends DomainObject { 
	public static function getGroup() {
		return "Document";
	}
}

class User extends DomainObject {
}

class SpreadSheet extends DomainObject { 
	public static function getGroup() {
		return "SpreadSheet";
	}
}


$spreadSheet = SpreadSheet::Create();

print_r($spreadSheet);

?>