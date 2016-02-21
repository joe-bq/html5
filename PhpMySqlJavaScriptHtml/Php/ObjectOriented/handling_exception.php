<?php 
class Car
{
	
	private $gas = 0;
	function addGas($amount) {
		$this->gas = $this->gas + $amount;
		echo "<p>$amount gallons of gas were added</p>";
		if ($this->gas > 50) {
			throw new Exception("Gas is overflowing");
		}
	}

}


$my_car = new Car();
try
{
	$my_car->addGas(10);
	$my_car ->addGas(45);
}
catch (Exception $e) 
{
	echo $e ->getMessage();
	exit();
}
/*
there is no "finally" keyword in try-catch clause, it is because there 
is no resource that need to be cleaned by Php?
finally {
	echo "finally clause";
}
*/

?>