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


$my_car = new Car();
$my_car2 = new Car();
if ($my_car == $my_car2) { 
	echo "equal";
}

if ($my_car === $my_car2) 
{
	echo "identical";
}
else 
{
	echo "not equal";
}


?>