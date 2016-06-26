<?php
	class User{

		private $sessionId;
		private $ipAddress;
		public $filesUploaded; //Array
		private $trackName;
		//global $db; 

		public function __construct(){
			$this->filesUploaded= array();

		}	

		public function create($table){
			global $db;
			$sql = "INSERT INTO `".$table."` (`sessionId`, `ipAddress`, `trackName`) ";
			$sql .= "VALUES ('";

			$sql .= $db->escapeString($this->sessionId)."', '";
			$sql .= $db->escapeString($this->ipAddress)."', '";
			$sql .= $db->escapeString($this->trackName)."')";

			if($db->query($sql)){
				echo "yes";
				//echo $db->confirmQuery();
				return true;

			}else{
				//echo $db->confirmQuery();
				return false;

			}	
		}

	

		public function select(){
			global $db;

			$sql = "SELECT * FROM `videoMerger` WHERE `sessionId` = '$this->sessionId'";

			$result = $db->query($sql);

			if($result->num_rows > 0 ){
				while($row=$result->fetch_assoc()){
					//echo $row['trackName'];
					array_push($this->filesUploaded, $row['trackName']);
				}
			    return true;
			}
			else{
				return false; 
			}	
		}

		public function delete(){
			global $db;

			$sql = "DELETE FROM `videoMerger` WHERE `sessionId` = '$this->sessionId'";

			$result = $db->query($sql);

			//return $result;
			echo "rows affected ".$db->rowsAffected();
			// if(!$result){
			// 	return 1;
			// }	
			// else{
			// 	return 0;
			// }		

		}


	

		public function displayUploadedTracks(){
			if($this->select()){		
				echo "<script> var track = new Track();
				               track.displayUploadedTracks();
				       </script>";		
			}
		}

		public function clearUploadedTracks(){
			global $db;
		//	echo "method called";

			$sql = "DELETE FROM `videoMerger` WHERE `sessionId` = '$this->sessionId'";
			//echo $sql;

			$result = $db->query($sql);
			//echo"yooooooooooooooooo";
			// return  $result; 

			//print json_encode("1");
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

		public function getFilesUploaded(){
			//echo"asdfjasldf";
			$this->select();
			if(count($this->filesUploaded) > 0){
				//echo count($this->filesUploaded);
				//echo json_encode($this->filesUploaded);
				 print json_encode($this->filesUploaded);
			}
			else{
			   //echo json_encode(""); 
				 //return "";
				print json_encode($this->filesUploaded);
			}

			// $this->clearUploadedTracks();
		}
	
}




?>