<?php 
ob_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ('./includes/file.php');
require_once ('./includes/session.php');
require_once ('./includes/db.php');
require_once ('./includes/user.php');

$file    = new File;
$session = new Session;
$db      = new DB; 
$user    = new User;

//echo $_SESSION['id'];

$file->setUploadDirectory($session->getSessionId());

if(isset($_POST['item'])){
  $choices =json_decode($_POST['item']);
  // if(isset($choices)){
    print_r($choices);
  // }
}




if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  
  
if(isset($_POST['str'])){
  // print_r($_POST['str']);

  echo "HI";
 // echo $_POST['str'];

}

  

  if(!empty($_FILES['files']['name'])){
  // Loop $_FILES to exeicute all files
    foreach ($_FILES['files']['name'] as $f => $name) {     
        if ($_FILES['files']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }        
        if ($_FILES['files']['error'][$f] == 0) {            
            if ($_FILES['files']['size'][$f] > $file->getMaxFileSize()) {
                $message[] = "$name is too large!.";
                continue; // Skip large files
            }
        elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), /*$valid_formats*/ $file->getValidFormats()  ) ){
          $message[] = "$name is not a valid format";
          continue; // Skip invalid file formats
        }
            else{ // No error found! Move uploaded files 
                $file->createUploadDirectory();
                $file->setUploadPath($name);
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $file->getUploadPath()));
                $file->setUploadCount(); // Number of successfully uploaded file
                $user->setSessionId($session->getSessionId());
                $user->setTrackName($_FILES["files"]["name"][$f]);
                $user->setIpAddress($_SERVER['REMOTE_ADDR']);
                $user->create('videoMerger');
                $user->create('videoMergerUploads');
        
            }
        }
    }
  }
}
?>