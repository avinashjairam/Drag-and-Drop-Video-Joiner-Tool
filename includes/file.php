<?php
class File{
	private	$validFormats; 
	private $maxFileSize; 
	private $uploadPath;  // Upload directory
	private $uploadCount; 
	private $uploadDirectory;
	private $fileTypesToBeUploaded;
	private $fileSafeToBeUploaded;
	private $uploadDirectoryPermissions;

	public function __construct(){
		$this->validFormats = array("mp4", "avi", "flv");
		$this->filesTypesToBeUploaded=array();
		$this->maxFileSize = 262144000;  //250MB		
		$this->uploadCount = 0;
		$this->uploadDirectoryPermissions=0700;
		$this->fileSafeToBeUploaded=0;
	}

	public function setFileTypesToBeUploaded($fileExtension){
		array_push($this->filesTypesToBeUploaded, $fileExtension);

	}

	public function checkIfAllFilesSameType(){		
		$criteria = $this->filesTypesToBeUploaded[0];
		echo $this->fileTypesToBeUploaded[0];
		//echo "criteria is {$criteria}<br>";
		//echo "flag is {$this->fileSafeToBeUploaded}<br>";
		print_r($this->fileTypesToBeUploaded);
		echo count($this->fileTypesToBeUploaded);

		for($index=0; $index<count($this->fileTypesToBeUploaded); $index++){	
		    echo $this->fileTypesToBeUploaded[$index];		
			if($criteria===$this->fileTypesToBeUploaded[$index]) {
				$this->fileSafeToBeUploaded=1;
		//		echo "flag is {$this->fileSafeToBeUploaded}<br>{$this->fileTypesToBeUploaded[$index]}";
			}
		}	
	}

	public function isFileSafeToBeUploaded($fileExtension){
		echo $fileExtension;
		$this->setFileTypesToBeUploaded($fileExtension);
		$this->checkIfAllFilesSameType();

		return $this->fileSafeToBeUploaded;
	}

	public function setValidFormats($arrayOfValidFormats){
		$this->validFormats=$arrayOfValidFormats;
	}

	public function setMaxFileSize($maxFileSize){
		$this->maxFileSize=$maxFileSize;
	}

	public function setUploadPath($fileName){
		$this->uploadPath=$this->uploadDirectory."/".$fileName;
	}

	public function createUploadDirectory(){
		$makeDirectory = "cd /var/www/steelpanwebsite.com/public_html/video_joiner && mkdir $this->uploadDirectory";
		exec($makeDirectory, $this->uploadDirectoryPermissions); 
	}

	public function setUploadDirectory($sessionId){
		$this->uploadDirectory=$sessionId;
	}

	public function setUploadCount(){
		$this->uploadCount++;
	}

	public function getUploadCount(){
		return $this->uploadCount;
	}

	public function getUploadPath(){
		return $this->uploadPath;
	}

	public function getMaxFileSize(){
		return $this->maxFileSize;
	}


	public function getValidFormats(){

		return $this->validFormats;
	}
	

}




?>