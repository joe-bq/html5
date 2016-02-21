<?php 


/* this is the Unit version 1 */
/*
abstract class Unit {
	abstract function addUnit( Unit $unit );
	abstract function removeUnit( Unit $unit );
	abstract function bombardStrength();
}
*/


/* this is the unit version 2 */
/*
abstract class Unit {
	abstract function bombardStrength();

	function addUnit( Unit $unit ) { 
		throw new UnitException( get_class($this) . "is a leaf");
	}

	function removeUnit( Unit $unit) {
		throw new UnitException( get_class($this) . " is a leaf" );
	}
}


class Army extends Unit { 
	private $units = array();

	function addUnit( Unit $unit ){ 
		if ( in_array( $unit, $this->units, true) ) { 
			return;
		}

		$this->units[] = $unit; // prepend to the front
	}

	function removeUnit( Unit $unit ) {

		$this->units = array_diff(
			$this->units,
			array($unit), 
			function ($a, $b) { return ($a === $b) ? 0 : 1; }
			);
	}

	// well, if you have old versoin of PHP, you won't have the ability to create an anonymous function 
	function removeUnit_createFunction( Unit $unit ) {
		$this->units = array_diff($this->units, array($unit),
			create_function('$a, $b', 'return ($a === $b) ? 0 : 1;' ));
	}

	function bombardStrength() { 
		$ret = 0;
		foreach ($this->units as $unit)  {
			$ret += $unit->bombardStrength();
		}

		return $ret;
	}
}

*/


/* below are the Unit vesion 3 */

abstract class Unit {
	function getComposite() {
		return null;
	}
	
	abstract function bombardStrength();
}

abstract class CompositeUnit extends Unit { 
	private $units = array();

	function getComposite() {
		return $this;
	}

	protected function units() {
		return $this->units;
	}

	function removeUnit( Unit $unit ) {
		$this->units = array_udiff( $this->units, array( $unit ),
			function( $a, $b ) { return ($a === $b)?0:1; } );
	}

	function addUnit( Unit $unit ) {
		if ( in_array( $unit, $this->units, true ) ) {
			return;
		}

		$this->units[] = $unit;
	}

}

// well as a composite pattern, some concrete class does not implements all the methods 

// here we create our Exception class 
class UnitException extends Exception {}


class Archer extends Unit { 
	function bombardStrength() { 
		return 4;
	}
} 


class LaserCannonUnit extends Unit { 
	function bombardStrength() { 
		return 15;
	}
}

class Army extends CompositeUnit {
	function bombardStrength() {
		$ret = 0;
		foreach ($this->units() as $unit) {
			$ret += $unit->bombardStrength();
		}
		return $ret;
	}
}



class UnitScript { 
	static function joinExisting( Unit $newUnit, Unit $occupyingUnit ) {
		$comp;
		if (!is_null( ($comp = $occupyingUnit->getComposite))) { 
			$comp->addUnit($newUnit);
		} else { 
			$comp = new Army;
		}
	}
}

// create an army
$main_army = new Army();
// add some units
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannonUnit() );
// create a new army
$sub_army = new Army();

// add some unit 
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );

// add the second army to the first
$main_army->addUnit( $sub_army );

// all the calculatons handled behind the scene
print "attacking with strength: {$main_army->bombardStrength()}\n ";



?>