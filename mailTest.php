<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// echo "hi";
// $x=mail("avinash.jairam.com","My subject","hi");
// echo $x;
// print_r(error_get_last());


$to = "avinash.jairam@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"C";

$x=mail($to,$subject,$txt,$headers);
echo $x;

?>
