<?php
 require_once ('./includes/file.php');

 $file = new File();

 $fileToDownload = json_decode($_POST['x'], true);

 $file->isFileExist($fileToDownload);


?>