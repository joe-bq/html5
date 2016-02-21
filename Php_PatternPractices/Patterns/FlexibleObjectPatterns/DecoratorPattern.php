<?php

// the Decorator patterns
//

abstract class Tile { 
	abstract function getWealthFactor();
}


class Plains extends Tile { 
		private $wealthFactor = 2;

		function getWealthFactor() { 
				return $this->wealthFactor;
		}
}


abstract class TileDecorator extends Tile {
	protected $tile;
	function __construct( Tile $tile ) {
		$this->tile = $tile;
	}
}

class DiamondDecorator extends TileDecorator {
	function getWealthFactor() { 
		return $this->tile->getWealthFactor() + 2;
	}
}


class PollutionDecorator extends TileDecorator { 
		function getWealthFactor() { 
				return $this->tile->getWealthFactor()-4;
		}

}

// usage of the decorator pattern
$tile = new Plains();
print $tile->getWealthFactor(); // 2


$tile = new DiamondDecorator(new Plains());
print $tile->getWealthFactor(); // 4

$tile = new PollutionDecorator(new Plains());
print $tile->getWealthFactor(); // 0



// well, the same decorator pattern can be applied through the following example.
class RequestHelper{}

abstract class ProcessRequest { 
		abstract function process( RequestHelper $req );
}

class MainProcess extends ProcessRequest { 
		function process ( RequestHelper $req ) { 
				print __CLASS__ . ": doing something useful with request\n";
		}
}

abstract class DecorateProcess extends ProcessRequest { 
		protected $processrequest;

		function __construct( ProcessRequest $pr ) { 
				$this->processrequest = $pr;
		}
}

class LogRequest extends DecorateProcess {
	function process( RequestHelper $req ) {
		print __CLASS__.": logging request\n";
		$this->processrequest->process( $req );
	}
}

class AuthenticateRequest extends DecorateProcess {
    function process( RequestHelper $req ) {
    		print __CLASS__.": authenticating request\n";
    		$this->processrequest->process( $req );
    }
}
class StructureRequest extends DecorateProcess {
	function process( RequestHelper $req ) {
			print __CLASS__.": structuring request data\n";
			$this->processrequest->process( $req );
	}
}

$process = new AuthenticateRequest( new StructureRequest(
		new LogRequest(
			new MainProcess)
	));

$process->process(new RequestHelper());

?>