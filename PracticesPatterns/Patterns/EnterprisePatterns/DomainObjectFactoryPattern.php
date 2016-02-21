<?php


// domain object factory 

// this pattern helps breaks Mapper into more foucsed patterns.
// 

// basically it create arrays and store the arrays and handle the request 
// for object on demand from the array that it stores.


abstract class DomainObjectFactory { 
	abstract function createObject(array $array) ;
}



class VenueObjectFactory extends DomainObjectFactory {
	function createObject (array $array) { 
		$obj = new \woo\domain\Vnue($array['id']);
		$obj->setname($array['name']);
		return $obj;
	}
 }


 // and when we have the DomainObjectFactory , the Collection changes to the following 

 abstract class Collection { 
 	protected $dofact;
 	protected $total = 0;
 	protected $raw = array();


 	function __construct(array $raw = null, \woo\mapper\DomainObjectFactory $dofact = null) { 
 		if (!is_null($raw) && !is_null($dofact)) {
 			$this->raw = $raw;
 			$this->total = count($raw);
 		}
 		$this->dofact = $dofact;
 	}

 }

 // the rest of the chapter is now omitted 
 

?>