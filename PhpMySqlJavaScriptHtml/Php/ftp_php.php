<?php 

include("ftpstuff.inc");


$dir_name = "data/";
$connect = ftp_connect($servername) 
	or die("Can't connect to FTP Server");
$login_result = ftp_login($connect, $userID, $passwd)
	or die("Can't log in");
$filesArr = ftp_nlist($connect, $dir_name);
foreach ($fileArr as $value) {
	if (preg_match("#\.txt$#", $value)) { 
	}

}

?>