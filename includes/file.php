<?php

class file{
	private	$validFormats; 
	private $maxFileSize; 
	private $path;  // Upload directory
	private $uploadCount; 

	public function __construct(){
		private	$validFormats = array("mp4", "avi", "flv");
		private $maxFileSize = 262144000; 
		private $path = "./video_joiner"; // Upload directory
		private $uploadCount = 0;

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