<?php

if (isset($_GET['cookiecheck'])) {
	if (isset($_COOKIE['testcookie'])) {
		print "Cookies are enabled";
	}
	else 
	{
		print "Cookie are not enabled";
	}
} else { 
	// otherwise, we set the cookie and send the header again to page with
	// the cookiecheck enabled.
	setcookie('testcookie', "testvalue");
	die(header("Location: " . $_SERVER['PHP_SELF'] . "?cookiecheck=1")) ;
}


?>