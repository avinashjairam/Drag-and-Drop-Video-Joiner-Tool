<?php

class Session{
	private $sessionId;

	public function __construct(){
		session_start();
		$this->sessionId=session_id();
	}

	public function getSessionId(){
		return $this->sessionId;
	}	
}


?>