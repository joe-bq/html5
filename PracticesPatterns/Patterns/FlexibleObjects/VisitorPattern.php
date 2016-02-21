<?php

// for sake of space and time, the discussion of Visitor pattern stops here.

// as we have to define new method in the AbstractUnit class to support Visitor pattern
// we  cannot just use the below deifnition as follow.

// require_once("..\\GeneratingObjects\\Composition.php");




abstract class Unit {
	protected $depth;
	function getComposite() {
		return null;
	}
	
	abstract function bombardStrength();

	/** part defines visitor pattern */
	function accept(ArmyVisitor $visitor) {
		$method = "visit".get_class($this);
		$visitor->$method($this);
	}

	protected function setDepth($depth) { 
		$this->depth = $depth;

	}

	function getDepth(){ 
		return $this->depth;
	}
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
		$unit->setDepth($this->depth+1); // well, this store information about itself.
	}

	function accept(ArmyVisitor $visitor) { 
		$method = "visit".get_class($this);
		$visitor->$method($this);
		foreach ($this->units as $thisunit) { 
			$thisunit->accept($visitor);
		}
	}

}

class UnitException extends Exception {}


class Archer extends Unit { 
	function bombardStrength() { 
		return 4;
	}
} 

class Cavalry extends Unit { 
	function bombardStrength() { 
		return 10;
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



/** below are the definition of the Visitor base classes */

abstract class ArmyVisitor {
	abstract function visit(Unit $node) ;


	function visitArcher(Archer $node) { 
		$this->visit($node);
	}

	function visitCavalry(Cavalry $node ) { 
		$this->visit($node);
	}

	function visitLaserCannonUnit (LaserCannonUnit $node) {
		$this->visit($node);
	}


	function visitTroopCarrierUnit(TroopCarrierUnit $node) {
		$this->visit($node);
	}

	function visitArmy(Army $node) { 
		$this->visit($node);
	}

}

// concrete visitor class 

class TextDumpArmyVisitor extends ArmyVisitor { 
	private $text = "";
	function visit(Unit $node) { 
		$ret = "";
		$pad = 4*$node->getDepth();
		$ret .= sprintf( "%{$pad}s", "" );
		$ret .= get_class($node).": ";
		$ret .= "bombard: ".$node->bombardStrength()."\n";
		$this->text .= $ret;
	}

	function getText() {
		return $this->text;
	}
}



$main_army = new Army();
$main_army->addUnit(new Archer() );
$main_army->addUnit(new LaserCannonUnit() );
$main_army->addUnit(new Cavalry() );


$textdump = new TextDumpArmyVisitor();
$main_army->accept($textdump);
print $textdump->getText();

// yet another visitor
class TaxCollectionVisitor extends ArmyVisitor { 
	private $due = 0;
	private $report = "";


	function visit( Unit $node ) {
$this->levy( $node, 1 );
}
function visitArcher( Archer $node ) {
$this->levy( $node, 2 );
}
function visitCavalry( Cavalry $node ) {
$this->levy( $node, 3 );
}
function visitTroopCarrierUnit( TroopCarrierUnit $node ) {
$this->levy( $node, 5 );
}
private function levy( Unit $unit, $amount ) {
$this->report .= "Tax levied for ".get_class( $unit );
$this->report .= ": $amount\n";
$this->due += $amount;
}
function getReport() {
return $this->report;
}
function getTax() {
return $this->due;
}
}


$taxcollector = new TaxCollectionVisitor();
$main_army->accept($taxcollector);
print "TOTAL: ";
print $taxcollector->getTax()."\n";

?>