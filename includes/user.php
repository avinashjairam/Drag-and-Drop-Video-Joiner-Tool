<?php
	class User{

		private $sessionId;
		private $ipAddress;
		private $filesUploaded; //Array
		private $trackName;
		//global $db; 

		public function __construct(){
			$this->filesUploaded= array();

		}	

		public function setSessionId($sessionId){
			$this->sessionId=$sessionId;
		}

		public function setIpAddress($ipAddress){
			$this->ipAddress=$ipAddress;
		}

		public function setTrackName($trackName){
			$this->trackName=$trackName;
		}


		public function getTrackName(){
			return $this->trackName;
		}

		public function getIpAddress(){
			return $this->ipAddress;
		}

		public function getSessionId(){
			return $this->sessionId;
		}

		public function create(){
			global $db;
			$sql = "INSERT INTO `videoMerger` (`sessionId`, `ipAddress`, `trackName`) ";
			$sql .= "VALUES ('";

			$sql .= $db->escapeString($this->sessionId)."', '";
			$sql .= $db->escapeString($this->ipAddress)."', '";
			$sql .= $db->escapeString($this->trackName)."')";

			if($db->query($sql)){
				echo "yes";
				return true;

			}else{
				return false;

			}	
	}







	}




?>