<?php 


class ShopProduct
{

	private $title;
	private $producerMainName;
	private $producerFirstName;
	protected $price;
	private $discount = 0;
	public function __construct($title, 
		$firstName,
		$mainName,
		$price) 	{
		$this->title = $title;
		$this->producerMainName = $mainName;
		$this->producerFirstName = $firstName;
		$this->price = $price;
	}

	function getProducer()	{
		return "{$this->producerFirstName}".
			"{$this->producerMainName}";
	}

	function getSummaryLine() {
		$base = "{$this->title} ( {$this->producerMainName}, ";
		$base .= "{$this->producerFirstName} )";
		return $base;
	}
}

class CdProduct extends ShopProduct {
	public $playLength;

	function __construct($title, $firstName, $mainName, $price, $playLength) {
		parent::__construct($title, $firstName, $mainName, $price);
		$this->playLength = $playLength;
	}

	public function getPlayLength() {
		return $this->playLength;
	}

	function getSummmaryLine() {
		$base = "{$this->title} ( {$this->producerMainName}, ";
		$base .= "{$this->producerFirstName} )";
		$base .= ": playing time - {$this->playLength}";
		return $base;
	}
}

class BookProduct extends ShopProduct {
	public $numPages;

	function __construct($title, $firstName, $mainName, $price, $numPages) {
		parent::__construct($title, $firstName, $mainName, $price);
		$this->numPages = $numPages;
	}

	function getNumberOfPages() { 
		return $this-> numPages;
	}

	function getSummaryLine() {
		$base = "$this->title ( $this->producerMainName, ";
		$base .= "$this->producerFirstName )";
		$base .= ": page count - $this->numPages";
		return $base;
	}
}

abstract class ShopProductWriter {
	protected $products = array();

	public function addProduct(ShopProduct $shopProudct) {
		$this->products[] = $shopProduct;
	}

	abstract public function write();
}


/*$writer = new ShopProductWriter();*/
// output:
// Fatal error: Cannot instantiate abstract class
// shopproductwriter ...

class XmlProductWriter extends ShopProductWriter {
	public function write() { 
		$str = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
		$str .= "<products>\n";
		foreach ( $this->products as $shopProduct ) {
			$str .= "\t<product title=\"{$shopProduct->getTitle()}\">\n";
			$str .= "\t\t<summary>\n";
			$str .= "\t\t{$shopProduct->getSummaryLine()}\n";
			$str .= "\t\t</summary>\n";
			$str .= "\t</product>\n";
		}
		$str .= "</products>\n";
		print $str;
	}
}

class TextProductWriter extends ShopProductWriter{
	public function write() {
	$str = "PRODUCTS:\n";
	foreach ( $this->products as $shopProduct ) {
		$str .= $shopProduct->getSummaryLine()."\n";
	}
	print $str;
	}
}

?>