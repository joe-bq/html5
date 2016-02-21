<?php

// the pattern for the Database layer and etc...


// First Data Mapper


// handles the mapping between Object and the Database

namespace woo\mapper;
//...
abstract class Mapper {
  protected static $PDO;
  function __construct() {
    if ( ! isset(self::$PDO) ) {
      $dsn = \woo\base\ApplicationRegistry::getDSN( );
      if ( is_null( $dsn ) ) {
        throw new \woo\base\AppException( "No DSN" );
      }
      self::$PDO = new \PDO( $dsn );
      self::$PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
  }
  function find( $id ) {
    $this->selectStmt()->execute( array( $id ) );
    $array = $this->selectStmt()->fetch( );
    $this->selectStmt()->closeCursor( );
    if ( ! is_array( $array ) ) { return null; }
    if ( ! isset( $array['id'] ) ) { return null; }
    $object = $this->createObject( $array );
    return $object;
  }
  function createObject( $array ) {
    $obj = $this->doCreateObject( $array );
    return $obj;
  }
  function insert( \woo\domain\DomainObject $obj ) {
    $this->doInsert( $obj );
  }
  abstract function update( \woo\domain\DomainObject $object );
  protected abstract function doCreateObject( array $array );
  protected abstract function doInsert( \woo\domain\DomainObject $object );
  protected abstract function selectStmt();
}



// and then the concrete mapper class which has the Mapper implementation....

namespace woo\mapper;
//...
class VenueMapper extends Mapper {
  function __construct() {
    parent::__construct();
    $this->selectStmt = self::$PDO->prepare(
    	"SELECT * FROM venue WHERE id=?");
    $this->updateStmt = self::$PDO->prepare(
    	"update venue set name=?, id=? where id=?");
    $this->insertStmt = self::$PDO->prepare(
    	"insert into venue ( name )
    	values( ? )");
  }
  function getCollection( array $raw ) {
    return new SpaceCollection( $raw, $this );
  }
  protected function doCreateObject( array $array ) {
    $obj = new \woo\domain\Venue( $array['id'] );
    $obj->setname( $array['name'] );
    return $obj;
  }
  protected function doInsert( \woo\domain\DomainObject $object ) {
    print "inserting\n";
    debug_print_backtrace();
    $values = array( $object->getName() );
    $this->insertStmt->execute( $values );
    $id = self::$PDO->lastInsertId();
    $object->setId( $id );
  }
  function update( \woo\domain\DomainObject $object ) {
    print "updating\n";
    $values = array( $object->getName(), $object->getId(), $object->getId() );
    $this->updateStmt->execute( $values );
  }
  function selectStmt() {
    return $this->selectStmt;
  }
}

// with all above, you can create the object as such 
$mapper = new \woo\mapper\VenueMapper();
$venue = $mapper->find( 12 );
print_r( $venue );

// well, an Mapper can works with collection...
// the key is to subclass the \Iterator class 
// for sake of space, which is ignored

// to implements the Iterator interface, the following should be implemented

// rewind
// current()
// key()
// next()
// valid

//...
abstract class Collection implements \Iterator {
  protected $mapper;
  protected $total = 0;
  protected $raw = array();
  private $result;
  private $pointer = 0;
  private $objects = array();
  function __construct( array $raw=null, Mapper $mapper=null ) {
    if ( ! is_null( $raw ) && ! is_null( $mapper ) ) {
      $this->raw = $raw;
      $this->total = count( $raw );
    }
    $this->mapper = $mapper;
  }
  function add( \woo\domain\DomainObject $object ) {
    $class = $this->targetClass();
    if ( ! ($object instanceof $class ) ) {
      throw new Exception("This is a {$class} collection");
    }
    $this->notifyAccess();
    $this->objects[$this->total] = $object;
    $this->total++;
  }
  abstract function targetClass();
  protected function notifyAccess() {
    // deliberately left blank!
  }
  private function getRow( $num ) {
    $this->notifyAccess();
    if ( $num >= $this->total || $num < 0 ) {
      return null;
    }
    if ( isset( $this->objects[$num]) ) {
      return $this->objects[$num];
    }
    if ( isset( $this->raw[$num] ) ) {
      $this->objects[$num]=$this->mapper->createObject( $this->raw[$num] );
      return $this->objects[$num];
    }
  }
  public function rewind() {
    $this->pointer = 0;
  }
  public function current() {
    return $this->getRow( $this->pointer );
  }
  public function key() {
    return $this->pointer;
  }
  public function next() {
    $row = $this->getRow( $this->pointer );
    if ( $row ) { $this->pointer++; }
    return $row;
  }
  public function valid() {
    return ( ! is_null( $this->current() ) );
  }
}


?>