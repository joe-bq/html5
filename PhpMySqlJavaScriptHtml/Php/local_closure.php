<?php 

function hello() { 

	$hundred_more = 100;

	/*  &$hundred_more referes to address */
	/* $hundred_more shall passed by value */
	$sum = function($a, $b) use (&$hundred_more) {
		return $a + $b + $hundred_more;
	};

	$hundred_more = 100000;

	echo $sum(0, 0); // 100
}


hello();


?>