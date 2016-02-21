<?php 

// prototype is a convenient way of creating objects

class Sea {}
class EarthSea extends Sea {}
class MarsSea extends Sea {}
class Plains {}
class EarthPlains extends Plains {}
class MarsPlains extends Plains {}
class Forest {}
class EarthForest extends Forest {}
class MarsForest extends Forest {}

class TerrainFactory { 
	private $sea;
	private $plains;
	function __construct( Sea $sea, Plains $plains, Forest $forest ) {
		$this->sea = $sea;
		$this->plains = $plains;
		$this->forest = $forest;
	}


	function getSea() { 
		return clone $this->sea;
	}

	function getPlains() { 
		return clone $this->plains;
	}

	function getForest() { 
		return clone $this->forest;
	}
}


// how to use it 
$factory = new TerrainFactory(new EarthSea(), new EarthPlains(), new EarthForest());

print_r($factory->getSea());
print_r($factory->getPlains());
print_r($factory->getForest());

// well, how to make a custome object that support cloned
class Contained { }

class Container {
	public  $Contained;
	function __construct() { 
		$this->Contained = new Contained();
	}


	function __clone() { 
		// ENsure that cloned object holds a 
		// clone of self::$contained and not 
		// a reference to it
		$this->Contained = clone $this->Contained;
	}
}


?>