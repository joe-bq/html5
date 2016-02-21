<?php 

function __autoload( $classname ) {
	if (preg_match( '/\\\\/', $classname )) {
		$path = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
	} else { 
		$path = str_replace('_', DIRECTORY_SEPARATOR, $classname );
	}

	require_once( "$path.php" );
}


?>