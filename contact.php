<?php
  require_once("./includes/contactFormCode.php");
?>
<!DOCTYPE html>


<html lang="en">



<head>
  <meta charset="utf-8">
  <title>Merge your videos</title>



  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/fileinput.css" media="all" rel="stylesheet" type="text/css" />


  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
  <script src="./js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
  <script src="./js/fileinput.min.js" type="text/javascript"></script>
  <script src="./js/fileinput.js" type="text/javascript"></script>     
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="http://necolas.github.com/normalize.css/2.0.1/normalize.css">
  <link rel="stylesheet" href="./css/stylesheet.css?version=51" />
  <script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

  <link rel="apple-touch-icon" sizes="180x180" href="./favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="./favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="./favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="./favicons/manifest.json">
  <link rel="mask-icon" href="./favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="theme-color" content="#ffffff">


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
        <li><a href="./index.php">Home</a></li>
        <li><a href="how_to_use.php">How To Use</a></li>
        <li><a href="about.php">About</a></li>
        <li class="active"><a href="contact.php">Contact</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>


  <div id="mainContent" class="container contentContainer">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 box" >
          <form method="post">
                       <div class="form-group">                              
                             <label>Name</label><span class="error">*</span>
                            <input type="Name" class="form-control" placeholder="Name" name="name" value="<?php echo $_POST['name'];?>"/>
                      </div>
            
                     <div class="form-group">
                             <label>Email</label><span class="error">*</span>
                             <input type="Email" class="form-control" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>"/>
                      </div>

                      <div class="form-group">
                             <label>Subject</label><span class="error">*</span>
                             <input type="Subject" class="form-control" placeholder="Subject" name="subject" value="<?php echo $_POST['subject'];?>"/>
                      </div>            
                              

                      <div class="form-group">
                               <label>Message</label> <span class="error">*</span>                      
                              <textarea class="form-control" name="message" value="<?php echo $_POST['message'];?>" /></textarea>                   
                      </div>

                      <div class="form-group">
                          <div class="g-recaptcha" data-sitekey="6LcjsSMTAAAAAL3yP6xCSgAE-owNyf_O-nrEdW1l"></div>
                      </div>

                     <div class="form-group">
                             <input type="submit" class="btn btn-success" value="Send" name="submit" />
                             <input type="submit" class="btn btn-danger" value="Clear" />

                      </div>
                        <span class="error"><?php echo " * Field Required";?></span><br><br>
                        <span class="error"><?php echo $nameErr;?></span><br>
                        <span class="error"><?php echo $emailErr;?></span><br>
                        <span class="error"><?php echo $subjectErr;?></span><br>
                        <span class="error"><?php echo $messageErr;?></span><br>
                        <span class="error"><?php echo $captchaErr;?></span><br>
                    </form>
        </div>
      </div>
  </div>

 <footer class="footer">
      <div class="container">
         <ul id="contact" >
            <li style="padding-left:0px"><a href="https://www.facebook.com/mergemyvideos" target="_blank"><img class="social" src="./img/facebook.jpeg"/></a></li>
            <li><a href="https://twitter.com/mergemyvideos" target="_blank"><img class="social" src="./img/twitter.jpeg"/></a></li>
            <li><a href="https://plus.google.com/+Mergemyvideos" target="_blank"><img class="social" src="./img/googleplus.jpeg"/></li>
            <li ><a href="./mobileApp.php" target="_blank"><img class="mobile" src="./img/appStore.png"/></a></li>
            <li><a href="./mobileApp.php" target="_blank"><img class="mobile" src="./img/googlePlay.png"/></a></li>    
          </ul>
      </div>
    </footer>





  <script src='https://www.google.com/recaptcha/api.js'></script>


</body>



</html>