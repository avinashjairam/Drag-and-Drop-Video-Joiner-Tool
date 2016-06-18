<?php

  // ini_set('display_errors',1);
  // error_reporting(E_ALL);

  error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

  $name = "";
  $email = "";
  $message = "";

  $errName    = "";
  $errEmail   = "";
  $errMessage = "";
  $errHuman   = "";
  $result     = "";

    if (isset($_POST["submit"])) {
       if(isset($_POST['name'])){
          $name = $_POST['name'];
        }
        if(isset($_POST['email'])){
          $email = $_POST['email'];
        }
        
        if(isset($_POST['message'])){
          $message = $_POST['message'];
        }
     

        // echo $name."<br>";
        // echo $email."<br>";
        // echo $message."<br>";

        print_r($_POST);

        $human = intval($_POST['human']);
        $from = 'Demo Contact Form'; 
        $to = 'avinash.jairam@gmail.com'; 
        $subject = 'Message from Contact Demo ';

      //  mail("avinash.jairam@gmail.com","hi", "Hello", "asdfasdfasdf");
        
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        //Check if simple anti-bot test is correct
        if ($human !== 5) {
            $errHuman = 'Your anti-spam is incorrect';
        }
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
        print_r(error_get_last()) ;
    }
}
    }
?>


<html>

<head>
  <meta charset="utf-8">
  <title>Merge your videos</title>



  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/fileinput.css" media="all" rel="stylesheet" type="text/css" />


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
  <script src="./js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
  <script src="./js/fileinput.min.js" type="text/javascript"></script>
  <script src="./js/fileinput.js" type="text/javascript"></script>     
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="http://necolas.github.com/normalize.css/2.0.1/normalize.css">
  <link rel="stylesheet" href="./css/stylesheet.css" />
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

</head>


<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img class="resize" src="./img/logo.jpg"/></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="./frontEnd.php">Home</a></li>
        <li><a href="how_to_use.php">How To Use</a></li>
        <li><a href="about.php">About</a></li>
        <li class="active"><a href="contact.php">Contact</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>



<div id="mainContent" class=" wrapper container contentContainer">
  <div class = "row">          
     <h3>Contact Us</h3>
       <div class="col-md-8 ">                             
            <form class="form-horizontal" role="form" method="post" action="contact.php">
                  <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo $name; ?>">
                          <?php echo "<p class='text-danger'>$errName</p>";?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo $email; ?>">
                          <?php echo "<p class='text-danger'>$errEmail</p>";?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="message" class="col-sm-2 control-label">Message</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars(isset($_POST['message']));?></textarea>
                          <?php echo "<p class='text-danger'>$errMessage</p>";?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                          <?php echo "<p class='text-danger'>$errHuman</p>";?>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-2">
                          <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-2">
                          <?php echo $result; ?>    
                      </div>
                  </div>
              </form>          
        </div>
    
  </div>

  <div class="push"></div>
</div>

<div class="footer">
            <p>Copyright </p>
</div>









</body>



</html>