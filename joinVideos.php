<?php

 require_once ('./includes/session.php');
 require_once ('./includes/user.php');
 $session = new Session;
 $user    = new User;

 $user->setSessionId($session->getSessionId());

if($_POST['str']){

	 $tracksUploaded = json_decode($_POST['str'], true);
	 $targetFolder= $session->getSessionID();

	 $myfile = fopen("./$targetFolder/filesToMerge.txt", "w") or die("Unable to open file!");

	 $mergeCommand = "cd $targetFolder && bash ../mergeUploadedFiles.sh";


	  for($index=0; $index <count($tracksUploaded); $index++){
	     $tracksUploaded[$index] = 'file ' . "'". rtrim($tracksUploaded[$index])."'"."\n";
	     fwrite($myfile, $tracksUploaded[$index]);
	}

	  fclose($myfile);

	exec($mergeCommand,$output,$return);

	if($return==0){
		print "./$targetFolder/output.mp4";
		$user->clearUploadedTracks();
	}

	//print_r($_POST['str']);

}


?>