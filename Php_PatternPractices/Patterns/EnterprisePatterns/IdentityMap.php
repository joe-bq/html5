<?php 


// well, in this page, we will discuss the Identity map which invovles the discussion of the ObjectWatcher
//


namespace woo\domain;
/*
//...
class ObjectWatcher {
  private $all = array();
  private static $instance;
  private function __construct() { }
  static function instance() {
    if ( ! self::$instance ) {
      self::$instance = new ObjectWatcher();
    }
    return self::$instance;
  }
  function globalKey( DomainObject $obj ) {
    $key = get_class( $obj ).".".$obj->getId();
    return $key;
  }
  static function add( DomainObject $obj ) {
    $inst = self::instance();
    $inst->all[$inst->globalKey( $obj )] = $obj;
  }
  static function exists( $classname, $id ) {
    $inst = self::instance();
    $key = "$classname.$id";
    if ( isset( $inst->all[$key] ) ) {
      return $inst->all[$key];
    }
    return null;
  }
}
*/

// well the ObjectWatcher does create a object holder for all those object, but we would like 
// while , this can be further enhanced to support operations befall on the objects (clean, dirty, dleete....)

class ObjectWatcher {
	// ...
	private $all = array();
	private $dirty = array();
	private $new = array();
	private $delete = array(); // unused in this example
	private static $instance;
	// ...
	static function addDelete( DomainObject $obj ) {
	  $self = self::instance();
	  $self->delete[$self->globalKey( $obj )] = $obj;
	}
	static function addDirty( DomainObject $obj ) {
	  $inst = self::instance();
	  if ( ! in_array( $obj, $inst->new, true ) ) {
	    $inst->dirty[$inst->globalKey( $obj )] = $obj;
	  }
	}
	static function addNew( DomainObject $obj ) {
	  $inst = self::instance();
	  // we don't yet have an id
	  $inst->new[] = $obj;
	}
	static function addClean( DomainObject $obj ) {
	  $self = self::instance();
	  unset( $self->delete[$self->globalKey( $obj )] );
	  unset( $self->dirty[$self->globalKey( $obj )] );
	  $self->new = array_filter( $self->new,
	  function( $a ) use ( $obj ) { return !( $a === $obj ); }
	  );
	}
	function performOperations() {
	  foreach ( $this->dirty as $key=>$obj ) {
	    $obj->finder()->update( $obj );
	  }
	  foreach ( $this->new as $key=>$obj ) {
	    $obj->finder()->insert( $obj );
	  }
	  $this->dirty = array();
	  $this->new = array();
	}
}


// well , then we can create DomainObject as such 

abstract class DomainObject { 
	$private $id = -1;

	function __construct($id = null) { 
		if (is_null($id)) {
			$this->markNew()
		} else {
			$this->id = $id;
		}

	}

	function markNew() {
	  ObjectWatcher::addNew( $this );
	}
	function markDeleted() {
	  ObjectWatcher::addDelete( $this );
	}
	function markDirty() {
	  ObjectWatcher::addDirty( $this );
	}
	function markClean() {
	  ObjectWatcher::addClean( $this );
	}
	function setId( $id ) {
	  $this->id = $id;
	}
	function getId( ) {
	  return $this->id;
	}
	function finder() {
	  return self::getFinder( get_class( $this ) );
	}
	static function getFinder( $type ) {
	  return HelperFactory::getFinder( $type );
	}
}


/* code snippet in the mapper class after the change to employ the PHP domain object */


// Mapper 
function createObject($array){ 
	$old = $this->getFromMap($array['id']);
	if ($old) { return $old; }
	$obj = $this->doCreateObject
}

?>