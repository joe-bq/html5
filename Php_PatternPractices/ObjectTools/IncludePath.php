<?php 

// include pathto better organize your php lib and souce file
// 

// 1)
// on Unix system, you can do the following. 
   include_path = ".:/usr/local/lib/php-libraries"

// on httpd.conf if you are in the apache container
php_value include_path value .:/user/local/lib/php-lbraries

?>