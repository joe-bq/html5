<?php


// suppose that we have a query for Venue and we can get hold of the space associated 
// with the venue, but that requries extra request to the database
//
class VenueMapper {


	protected function doCreateObject( array $array ) {
		$obj = new \woo\domain\Space( $array['id'] );
		$obj->setname( $array['name'] );
		$ven_mapper = new VenueMapper();
		$venue = $ven_mapper->find( $array['venue'] );
		$obj->setVenue( $venue );
		$event_mapper = new EventMapper();
		$event_collection = $event_mapper->findBySpaceId( $array['id'] );
		$obj->setEvents( $event_collection );
		return $obj;
	}

}


namespace woo\mapper;

class DefferedEventCollection extends EventCollection { 
	private $stmt;
	private $value;
	private $run = false;

	function notifyAccess() {
		if (!$this->run) { 
			$this->stmt->execute($this->valuerray);
			$this->raw = $this->stmt->fetchAll();
			$this->total = count($this->raw);
		}

		$this->run = true;
	}
}

class Venue {
	function findSpaceId($s_id) {
		return new DefferedEventCollection(
			$this,
			$this->selectedBySpactStmt, array($s_id));
	}
}
?>