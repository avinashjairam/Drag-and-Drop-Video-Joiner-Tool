<?php

require_once("config.php");
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


	public function connect(){

	}

	public function disconnect(){

	}

	public function select(){

	}

	public function insert(){

	}

	public function delete(){

	}

	public function update(){

	}



}


$database = new Database();
$database->openDBConnection();


?>