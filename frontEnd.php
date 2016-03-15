<?php

require_once ('./includes/file.php');
require_once ('./includes/session.php');


$file    = new File;
$session = new Session;

$file->createUploadDirectory($session->getSessionId());



if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  // Loop $_FILES to exeicute all files
  foreach ($_FILES['files']['name'] as $f => $name) {     
      if ($_FILES['files']['error'][$f] == 4) {
          continue; // Skip file if any error found
      }        
      if ($_FILES['files']['error'][$f] == 0) {            
          if ($_FILES['files']['size'][$f] > $file->getMaxFileSize();) {
              $message[] = "$name is too large!.";
              continue; // Skip large files
          }
      elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), /*$valid_formats*/ $file->getValidFormats()  ) ){
        $message[] = "$name is not a valid format";
        continue; // Skip invalid file formats
      }
          else{ // No error found! Move uploaded files 
              $file->setUploadPath($name);
              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $file->getUploadPath()));
              $file->setUploadCount(); // Number of successfully uploaded file
          }
      }
  }
}

echo $message;




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

<script>
    $(function() {
        $( "#sortable" ).sortable({ 
            placeholder: "ui-sortable-placeholder" 
        });
    });
</script>


</head>


<body>


<div class="container contentContainer">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Merger Your Videos</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">How to Use<span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        
      </ul>
     
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- <form action="frontEnd.php" method="post">
  <label class="control-label">Select File</label>
  <input id="input-2" name="input2[]" type="file" class="file" multiple data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["mp4", "avi"]'>
<input type="file" name="fileUpload" action="frontEnd.php" class="file" id="fileToUpload" data-allowed-file-extensions='["mp4"]'><br>
</form> -->

  <div id="uploadTrack">
    <br><br><br>
    <form action="frontEnd.php" method="post" enctype="multipart/form-data" >
        <label >Select Track to upload:</label><br>
        <input type="file" name="files[]" class="file" id="fileToUpload" multiple data-allowed-file-extensions='["mp4"]'><br>                      
    </form>
  </div>


<br>

<ul id="sortable">
    <li class="ui-state-default">Item 1</li>
    <li class="ui-state-default">Item 2</li>
    <li class="ui-state-default">Item 3</li>
    <li class="ui-state-default">Item 4</li>
    <li class="ui-state-default">Item 5</li>
    <li class="ui-state-default">Item 6</li>
    <li class="ui-state-default">Item 7</li>
</ul>


<br>

<a href="#" class="btn btn-success col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-cog"></span>MERGE!!!</a>
</div>

<script>

// initialize with defaults
// $("#input-2").fileinput();

// with plugin options
$("#input-2").fileinput({'showUpload':true, 'previewFileType':'mp4, avi'});

</script>

</body>



</html>