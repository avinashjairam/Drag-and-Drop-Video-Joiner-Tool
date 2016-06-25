<?php

 require_once ('./includes/session.php');
 require_once ('./includes/user.php');
 require_once ('./includes/db.php');

 $session = new Session;
 $user    = new User;
 $db      = new DB; 

 $user->setSessionId($session->getSessionId());
 //$user    = new User;

 $increment = 1;
$_SESSION['mergeCount'] += $increment;
 //$user->setSessionId($session->getSessionId());

if($_POST['str']){
	 $targetFolder= $session->getSessionID();

	 if(is_dir($targetFolder)){
	 	 $tracksUploaded = json_decode($_POST['str'], true);
		// $format=json_decode($_POST['typeSelected'], true);
		 $desiredMergeFormat=$_POST['typeSelected'];
		 $targetFolder= $session->getSessionID();

		 $myfile1 = fopen("./$targetFolder/filesToMerge.txt", "w") or die("Unable to open file!");
		 $myfile2 = fopen("./mergeUploadedFiles.sh", "w") or die("Unable to open file!");
		 $myfile3 = fopen("./$targetFolder/format.txt", "w") or ("Unable to open file!");

		// fwrite($myfile3, $desiredMergeFormat);

		 $mergedFileName="output".$_SESSION['mergeCount'].$desiredMergeFormat;
		 $avi=".avi";
		 $flv=".flv";
		 $mp4=".mp4";

		 if(strcmp($desiredMergeFormat,".mp4")==0){
		 	//"{$avi}" "{$flv}" "{$mp4}"
		 	$convertCommand="cd $targetFolder && ../hello.sh ".$avi." ".$flv." ".$mp4;
		 	exec($convertCommand,$output,$return);
		 	//fwrite($myfile3, $convertCommand);
		 }
		 else if(strcmp($desiredMergeFormat,".flv")==0){
		 	$convertCommand="cd $targetFolder && ../hello.sh ".$avi." ".$mp4." ".$flv;
		 	exec($convertCommand,$output,$return);

		 }
		 else if(strcmp($desiredMergeFormat,".avi")==0){
		 	$convertCommand="cd $targetFolder && ../hello.sh ".$flv." ".$mp4." ".$avi;
		 	exec($convertCommand,$output,$return);
		 }


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
		  	$trackName=substr(rtrim($tracksUploaded[$index]),0,-4).$desiredMergeFormat;
		  	$tracksUploaded[$index] = 'file ' . "'". $trackName."'"."\n";
		    // $tracksUploaded[$index] = 'file ' . "'". rtrim($tracksUploaded[$index])."'"."\n";
		     fwrite($myfile1, $tracksUploaded[$index]);
		}

		  fclose($myfile1);
		  fclose($myfile2);
		  fclose($myfile3);
		//  echo $user->clearUploadedTracks();

		exec($mergeCommand,$output,$return);

		if($return==0){
			$user->clearUploadedTracks();
			print "./$targetFolder/$mergedFileName";
		     //$user->clearUploadedTracks();
		}

		//print_r($_POST['str']);

	 }
	 else{
	 	$user->delete();

	 	print "1";
	 }

	

}


?>