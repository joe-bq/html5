<?php
/* script name: displayGallery
Description: Displays all the image files that are stored in a specified directory


*/

echo "<html><head><title>Image Gallery</title></head><body>";

$dir = "..\\Javascript\\";
$path_info = pathinfo($dir);
if (! empty($path_info)) {
	echo $dir . "Exists!";
}
$dh = opendir($dir);

/* there is NO 'not' keywod or oeprator in PHP */
if (! empty($dh)) { 
	echo "opened" . $dir;
}

while ($filename = readdir($dh)) { 
	$filepath = $dir.$filename;
	echo $filepath . "\n";
	if (is_file($filepath) and ereg("\.html$", $filename)) {
		$gallery[] = $filepath;
	}
}


if (isset($gallery)){
	sort($gallery);
	foreach ($gallery as $image) {
		echo "<hr />";
		echo "<img src='$image /><br />";
	}

}

echo "</body></html>";
?>