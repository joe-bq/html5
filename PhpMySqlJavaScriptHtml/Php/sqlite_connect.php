<?php


$db = sqlite_open("testdb");


$sql = "SELECT * FROM Product";
$result = sqlite_query($db, $sql);

$row = sqlite_fetch_array($result);


while ($row = sqlite_fetch_assoc($result))
{
	foreach ($row as $value) {
		echo "$value<br />";
	}
}

sqlite_close($db);

?>