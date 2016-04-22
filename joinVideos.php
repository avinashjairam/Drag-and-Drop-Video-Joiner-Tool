<?php

 require_once ('./includes/session.php');
 $session = new Session;

if($_POST['str']){

	 $tracksUploaded = json_decode($_POST['str'], true);
	 $targetFolder= $session->getSessionID();

	 $myfile = fopen("./$targetFolder/filesToMerge.txt", "w") or die("Unable to open file!");

	  for($index=0; $index <count($tracksUploaded); $index++){
	     $tracksUploaded[$index]."\n";
	     fwrite($myfile, $tracksUploaded[$index]);
	}

	print_r($_POST['str']);

}


?>