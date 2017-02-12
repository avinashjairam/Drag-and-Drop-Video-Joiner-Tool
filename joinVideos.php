<?php

 require_once ('./includes/session.php');
 require_once ('./includes/user.php');
 require_once ('./includes/db.php');

 $session = new Session;
 $user    = new User;
 $db      = new DB; 

 $user->setSessionId($session->getSessionId());


 $increment = 1;
$_SESSION['mergeCount'] += $increment;

if($_POST['str']){
	 $targetFolder= $session->getSessionID();

	 if(is_dir($targetFolder)){
	 	 $tracksUploaded = json_decode($_POST['str'], true);
		
		 $desiredMergeFormat=$_POST['typeSelected'];
		 $targetFolder= $session->getSessionID();

		 $myfile1 = fopen("./$targetFolder/filesToMerge.txt", "w") or die("Unable to open file!");
		 $myfile2 = fopen("./mergeUploadedFiles.sh", "w") or die("Unable to open file!");
		 $myfile3 = fopen("./$targetFolder/format.txt", "w") or ("Unable to open file!");

		

		 $mergedFileName="output".$_SESSION['mergeCount'].$desiredMergeFormat;
		 // $avi=".avi";
		 // $flv=".flv";
		 // $mp4=".mp4";

		 // if(strcmp($desiredMergeFormat,".mp4")==0){
		 // 	$convertCommand="cd $targetFolder && ../hello.sh ".$avi." ".$flv." ".$mp4;
		 // 	exec($convertCommand,$output,$return);
		 // }
		 // else if(strcmp($desiredMergeFormat,".flv")==0){
		 // 	$convertCommand="cd $targetFolder && ../hello.sh ".$avi." ".$mp4." ".$flv;
		 // 	exec($convertCommand,$output,$return);

		 // }
		 // else if(strcmp($desiredMergeFormat,".avi")==0){
		 // 	$convertCommand="cd $targetFolder && ../hello.sh ".$flv." ".$mp4." ".$avi;
		 // 	exec($convertCommand,$output,$return);
		 // }

		 $convertCommand="cd $targetFolder && ../MPGConvert.sh";
		 exec($convertCommand,$output,$return);

		 //echo $output;


		// $ffmpegCommand = "ffmpeg -f concat -i filesToMerge.txt -c copy $mergedFileName";

		 $ffmpegCommand ="cat ";// video3.mpg video2.mpg video2.mpg | ffmpeg -f mpeg -i - -qscale 0 -vcodec mpeg4 output2.mp4
	
		for($index=0; $index <count($tracksUploaded); $index++){
		  	//$trackName=substr(rtrim($tracksUploaded[$index]),0,-4).$desiredMergeFormat;

		  	$trackName=substr(rtrim($tracksUploaded[$index]),0,-4).".mpg";

		  	$ffmpegCommand .= $trackName . " ";

			// $tracksUploaded[$index] = 'file ' . "'". $trackName."'"."\n";
		   
		    // fwrite($myfile1, $tracksUploaded[$index]);
		}

		if(strcmp($desiredMergeFormat,".flv")==0){
		 	$ffmpegCommand .= " | ffmpeg -f mpeg -i - -qscale 0 -vcodec flv " .$mergedFileName ;

		}
		else{

			$ffmpegCommand .= " | ffmpeg -f mpeg -i - -qscale 0 -vcodec mpeg4 " .$mergedFileName ;

		}
		
		fwrite($myfile2, $ffmpegCommand);
		
		$mergeCommand = "cd $targetFolder && bash ../mergeUploadedFiles.sh";

		exec($mergeCommand,$output,$return);

		fclose($myfile1);
		fclose($myfile2);

	//	fwrite($myfile3,"./$targetFolder/$mergedFileName");

		// foreach ($output as $line) {
		// 	fwrite($myfile3, "<br>output is ".$line);
		// 	# code...

		// }
	//	fwrite($myfile3, "output is ".$output);
		fclose($myfile3);


		if($return==0){
			$user->clearUploadedTracks();
	
			// if(strcmp($desiredMergeFormat,".flv")==0){
			// 	print "flv";
			// }
			print "./$targetFolder/$mergedFileName";
		}
		
	}
	else{
	 	$user->delete();

	 	print "1";
	 }

	

}


?>