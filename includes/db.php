<?php

require_once("./includes/config.php");
//Database Class
//This class has functions which perform CRUD operations
class DB{

	//The database connection 
	public $connection;


	public function __construct(){
		$this->openDBConnection();
	}

	public function openDBConnection(){
		$this->connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

		if(mysqli_connect_error()){
			die("Database connection failed badly" . mysqli_error());
		}
	}

	public function query($sql){
		$result = mysqli_query($this->connection, $sql);

		return $result; 		
	}

	public function confirmQuery($result){
		if(!$result){
			die("Query Failed");
		}
	}


	public function escapeString($string){
		$escapedString = mysqli_real_escape_string($this->connection,$string);
		return $escapedString;
	}





}



?>