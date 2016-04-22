<?php

if($_POST['str']){
	// parse_str($_POST['str'], $tracks);

	// print_r($tracks);
	// for($index=0; $index <count($tracks); $index++){
	// 	echo $tracks[$index]."<br>";
	// }
	// $tracksUploaded = array();

	 $tracksUploaded = json_decode($_POST['str'], true);

	 for($index=0; $index <count($tracksUploaded); $index++){
		echo $tracksUploaded[$index]."<br>";
	}

	//echo $tracksUploaded[0];

	print_r($_POST['str']);

}


?>