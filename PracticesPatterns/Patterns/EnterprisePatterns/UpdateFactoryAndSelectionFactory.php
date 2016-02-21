<?php 


abstract class UpdateFactory { 
	abstract function newUpdate(\woo\domain\DomainObject $obj);

	protected function buildStatement( $table, array $fields, array $conditions=null ) {	$terms = array();
	if (!is_null($conditions)) { 
		$query = "UPDATE {$table} SET ";
		$query . implode( " =? " , array_Keys($fields)) . " = ?";
		$terms =array_values($fields);
		$cond = array();
		$query .= " WHERE ";
		foreach ($conditions as $key => $val) { 
			$cond[] = "$key = ?";
			$terms =$val;
		}
		$query .= implode( " AND " , $cond);
	} else { 
		$query = "INSERT INTO {$table} (";
		$query .= implode(",", array_keys($fields));
		$query .= ") VALUES (";
		foreach ($fields as $name => $value) { 
			$terms[] = $value;
			$qs = "?";
		}

		$query .= implode(",", $qs);
		$query .= ")";
	}

	return array($query, $terms);
	}

}

class VenueUpdateFactory extends UpdateFactory {
	function newUpdate( \woo\domain\DomainObject $obj ) {
		// not type checking removed
		$id = $obj->getId();
		$cond = null;
		$values['name'] = $obj->getName();
		if ( $id > -1 ) {
			$cond['id'] = $id;
		}
		return $this->buildStatement( "venue", $values, $cond );
	}
}


abstract class SelectionFactory { 
	abstract function newSelection(IdentifyObject $obj) {
		if ($obj->isVoid()) {
			return array("", array());
		}

		$compstrings = array();
		$values = array();
		foreach ($obj->getComps() as $comp) { 
			$compstrings[] = "{$comp['name']} {$comp['operator']} ?";
			$values[] = $comp['value'];
		}

		$where = "WHERE " . implode( " AND ", $compstrings);
		return array($where, $values);

	}
}
?>