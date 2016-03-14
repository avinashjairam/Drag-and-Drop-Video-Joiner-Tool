<?php
class File{
	private	$validFormats; 
	private $maxFileSize; 
	private $path;  // Upload directory
	private $uploadCount; 

	public function __construct(){
		$this->validFormats = array("mp4", "avi", "flv");
		$this->maxFileSize = 262144000; 
		$this->path = "./video_joiner"; // Upload directory
		$this->uploadCount = 0;
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