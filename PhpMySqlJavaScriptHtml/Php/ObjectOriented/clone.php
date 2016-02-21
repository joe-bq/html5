<?php


class Car
{
	private $gas =  0;
	private $color = "red";
	function addGas($amount) 
	{
		$this->gas = $this->gas + $amount;
		echo "$amount gallons addedc to gas tank";
	}

	function __clone() 
	{
		$this->gas = 5;
	}
}


$firstCar = new Car;
$firstCar->addGas(10);
$secondCar = clone $firstCar;


?>