<?php
 require_once ('./includes/session.php');
 require_once ('./includes/db.php');
 require_once ('./includes/user.php');
 
 $session = new Session;
 $user    = new User;
 $db      = new DB; 

 $user->setSessionId($session->getSessionId());

 $user->delete();


?>