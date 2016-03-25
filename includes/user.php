<?php
	class User{

		private $sessionID;
		private $ipAddress;
		private $filesUploaded; //Array
		private $trackName;

		public function __construct(){
			$this->filesUploaded= array();

		}

		public function create(){
			global $DB;
			$sql = "INSERT INTO videoMerger ($this->sessionID, $this->ipAddress, $this-trackName)";
			$sql .= "VALUES ('";
			$sql .= $database->escapeString($this->sessionID."', '";
			$sql .= $database->escapeString($this->ipAddress."', '";
			$sql .= $database->escapeString($this->trackName."')";

			if($database->query($sql)){
				return true;

			}else{
				return false;

			}	
		}

		public function setSessionId($sessionID){
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








	}




?>