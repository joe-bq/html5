<?php 
class ShopProduct {
	public $title;
	public $producerMainName;
	public $producerFirstName;
	public $price;
	function __construct( $title, $firstName,
		$mainName, $price ) {
		$this->title = $title;
		$this->producerFirstName = $firstName;
		$this->producerMainName = $mainName;
		$this->price = $price;
	}
	function getProducer() {
		return "{$this->producerFirstName}".
		" {$this->producerMainName}";
	}
	function getSummaryLine() {
		$base = "{$this->title} ( {$this->producerMainName}, ";
		$base .= "{$this->producerFirstName} )";
		return $base;
	}
}

class CdProduct extends ShopProduct {
	public $playLength;
	function __construct( $title, $firstName,
		$mainName, $price, $playLength ) {
		parent::__construct( $title, $firstName,
		$mainName, $price );
		$this->playLength = $playLength;
	}
	function getPlayLength() {
		return $this->playLength;
	}
	function getSummaryLine() {
		$base = "{$this->title} ( {$this->producerMainName}, ";
		$base .= "{$this->producerFirstName} )";
		$base .= ": playing time - {$this->playLength}";
		return $base;
	}
}

class BookProduct extends ShopProduct {
	public $numPages;
	function __construct( $title, $firstName,
		$mainName, $price, $numPages ) {
		parent::__construct( $title, $firstName,
		$mainName, $price );
		$this->numPages = $numPages;
	}
	function getNumberOfPages() {
		return $this->numPages;
	}
	function getSummaryLine() {
		$base = "$this->title ( $this->producerMainName, ";
		$base .= "$this->producerFirstName )";
		$base .= ": page count - $this->numPages";
		return $base;
	}
}

?>