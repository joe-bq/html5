<?php


session_start();

if (!issset($_SESSION['accessTime'])) {
	die(header("Location: page1.php"));
}

print "This is page 2<br />";


print "You accessed the application at:  " . $_SESSION['accessTime'];

print "<div><a href=\"page3.php\">Continue to next page</a></div>";

?>