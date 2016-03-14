<?php
class File{
	private	$validFormats; 
	private $maxFileSize; 
	private $path;  // Upload directory
	private $uploadCount; 
	private $uploadDirectory;
	private $uploadDirectoryPermissions;

	public function __construct(){
		$this->validFormats = array("mp4", "avi", "flv");
		$this->maxFileSize = 262144000;  //250MB
		$this->path = "./video_joiner"; // Upload directory
		$this->uploadCount = 0;
		$this->uploadDirectoryPermissions=0700;
	}

	public function setValidFormats($arrayOfValidFormats){
		$this->validFormats=$arrayOfValidFormats;
	}

	public function setMaxFileSize($maxFileSize){
		$this->maxFileSize=$maxFileSize;
	}

	public function setPath($path){
		$this->path=$path;
	}

	public function setUploadDirectory(Session $sessionId){
		$this->uploadDirectory=$sessionId;

	}

	private function createUploadDirectory(){
		$makeDirectory = "mkdir $this->uploadDirectory";
		exec($makeDirectory, $permission); 

	}


	public function setUploadCount(){
		$this->uploadCount++;
	}

	public function getUploadCount(){
		return $this->uploadCount;
	}

	public function getPath(){
		return $this->path;
	}

	public function getMaxFileSize(){
		return $this->maxFileSize;
	}


	public function getValidFormats(){

		return $this->validFormats;
	}

}




?>