<?php

 require_once ('./includes/session.php');
 require_once ('./includes/user.php');
 $session = new Session;
 //$user    = new User;

 $increment = 1;
$_SESSION['mergeCount'] += $increment;
 //$user->setSessionId($session->getSessionId());

if($_POST['str']){

	 $tracksUploaded = json_decode($_POST['str'], true);
	 $targetFolder= $session->getSessionID();

	 $myfile1 = fopen("./$targetFolder/filesToMerge.txt", "w") or die("Unable to open file!");
	 $myfile2 = fopen("./mergeUploadedFiles.sh", "w") or die("Unable to open file!");

	 $mergedFileName="output".$_SESSION['mergeCount'].".mp4";

	// echo $mergedFileName."<br>";

	// fwrite($myfile2," ".$mergedFileName);
	 //file_put_contents($my, '');

	 $ffmpegCommand = "ffmpeg -f concat -i filesToMerge.txt -c copy $mergedFileName";
	 //fwrite($myfile2,$ffmpegCommand);
	// echo $ffmpegCommand."<br>";

	 $mergeCommand = "cd $targetFolder && bash ../mergeUploadedFiles.sh";
	 //$mergeCommand = "cd $targetFolder && $ffmpegCommand";

	 fwrite($myfile2, $ffmpegCommand);

	  for($index=0; $index <count($tracksUploaded); $index++){
	     $tracksUploaded[$index] = 'file ' . "'". rtrim($tracksUploaded[$index])."'"."\n";
	     fwrite($myfile1, $tracksUploaded[$index]);
	}

	  fclose($myfile1);
	  fclose($myfile2);
	//  echo $user->clearUploadedTracks();

	exec($mergeCommand,$output,$return);

	if($return==0){
		print "./$targetFolder/$mergedFileName";
		// $user->clearUploadedTracks();
	}

	//print_r($_POST['str']);

}


?>