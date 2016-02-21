<?php

// looking for classes 
// show 
//   1) class and function can be dynamic
//   2) file_exists and class_exists
// commonly used when you are developing some plgin system


// TaskRunner.php
$classname = "Task";

// $path = "tasks/{$classname}.php";
$path = "tasks" . DIRECTORY_SEPARATOR . "{$classname}.php";
if ( ! file_exists( $path ) ) {
	throw new Exception( "No such file as {$path}" );
}

require_once( $path );

// $classname = "tasks\\$classname"; -- LINUX file path, which no recognized
$qclassname = "tasks" . DIRECTORY_SEPARATOR . $classname;
if ( ! class_exists( $qclassname ) ) {
	throw new Exception( "No such class as $qclassname" );
}

$myObj = new $qclassname();
$myObj->doSpeak();


?>