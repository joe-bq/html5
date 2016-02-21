<?php

/* Late Static Binding - instantiating */

abstract class DomainObject { 
	public function Create() { 
		return new static();
	}
}

class Document extends DomainObject { 

}

class User extends DomainObject {
}


$user = User::Create();
$document = Document::Create();

print_r($user);


/* comparing to the bad example */

/*
abstract class DomainObject { 
	
}

class Document extends DomainObject { 
	public function Create() { 
		return new Document();
	}
}

class User extends DomainObject {
	public function Create() { 
		return new User();
	}
}
/*/
//*/

?>