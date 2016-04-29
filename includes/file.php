<?php
class File{
	private	$validFormats; 
	private $maxFileSize; 
	private $uploadPath;  // Upload directory
	private $uploadCount; 
	private $uploadDirectory;
	private $uploadDirectoryPermissions;

	public function __construct(){
		$this->validFormats = array("mp4", "avi", "flv");
		$this->maxFileSize = 262144000;  //250MB		
		$this->uploadCount = 0;
		$this->uploadDirectoryPermissions=0700;
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