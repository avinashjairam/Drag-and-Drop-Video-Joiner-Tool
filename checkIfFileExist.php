<?php
 require_once ('./includes/file.php');
 require_once ('./includes/session.php');

 $file = new File();
 $session = new Session;

 $fileToDownload = json_decode($_POST['x'], true);

 $file->isFileExist("./".$session->getSessionId());


?>