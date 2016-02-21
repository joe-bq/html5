<?php


// use of the class_exists() function accepts a string representing the class to check for and return a boolean ... 

// TaskRunner.php
$classname = "Task";
$path = "tasks/{$classname}.php";
if ( ! file_exists( $path ) ) {
	throw new Exception( "No such file as {$path}" );
}



require_once($path);

$qclassname = "tasks\\$classname";
if (! class_exists($qclassname)) {
	throw new Exception( "No such class as $qclassname");
}

$myObj = new $qclassname();
$myObj->doSpeak();


print_r( get_declared_classes() );

?>