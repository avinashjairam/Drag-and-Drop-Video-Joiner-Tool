<?php

//Database Connection Constants 

define ('DB_HOST','xxxx');
define ('DB_USER','xxxxx');
define('DB_PASS', 'xxxxx');
define('DB_NAME', 'xxxxx');

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

if($connection){
	echo "true";
}



?>