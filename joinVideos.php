<?php

 require_once ('./includes/session.php');
 $session = new Session;
	 // echo session_id();

if($_POST['str']){
	// parse_str($_POST['str'], $tracks);

	// print_r($tracks);
	// for($index=0; $index <count($tracks); $index++){
	// 	echo $tracks[$index]."<br>";
	// }
	// $tracksUploaded = array();

	 $tracksUploaded = json_decode($_POST['str'], true);
	 $targetFolder= $session->getSessionID();

	 //echo session_id();

	 for($index=0; $index <count($tracksUploaded); $index++){
		echo $tracksUploaded[$index]."<br>";
	}

	$myfile = fopen("./$targetFolder/newfile.txt", "w") or die("Unable to open file!");

	//echo $tracksUploaded[0];

	print_r($_POST['str']);

}


?>