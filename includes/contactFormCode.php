<?php

// define variables and set to empty values
$to       = "avinash.jairam@gmail.com";
$nameErr  = $emailErr = $subjectErr = $messageErr = $captchaErr= "";
$name     = $email = $subject = $message = "";
$captcha;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["subject"])) {
    $subjectErr = "Subject is required";
  } 
  else {
    $subject = test_input($_POST["subject"]);
  }

  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }
  if(isset($_POST['g-recaptcha-response'])){
      $captcha=$_POST['g-recaptcha-response'];
  }
  else{
      $captchaErr="Plese check the captcha form";
  }

  $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcjsSMTAAAAAGF-hrJaniHZ3CKdIuezLa4mUfXS=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

  if(empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr) && empty($captchaErr) && $response.success==true){
    $headers="From: ".$name . " via ".$email."\r\n"; 
    if(mail($to,$subject,$message,$headers)){
      echo "<script>alert('Message Sent! We will contact you shortly!');</script>";
    }
  }
 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>