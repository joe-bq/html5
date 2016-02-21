<?php

// instantiate an object given onnly a class name, PHP allows you to use string to refer to classes dynamically like below tricks.

$classname = "Task";
require_once("tasks/{$classname}.php");

$classname = "tasks\\$classname";

$myObj = new $classname();
$myObj->doSpeak();

?>