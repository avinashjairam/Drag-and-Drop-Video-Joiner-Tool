<?php
require_once("./includes/fileUpload.php");
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
<link rel="stylesheet" href="//necolas.github.com/normalize.css/2.0.1/normalize.css">
<link rel="stylesheet" href="./css/stylesheet.css" />
<script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>




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
      <ul class="nav navbar-nav navbar-center">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="how_to_use.php">How To Use</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
    <!--   <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
       <li ><a href="https://www.facebook.com/mergemyvideos" target="_blank"><img class="socialNav" src="./img/facebook.jpeg"/></a></li>
      <li><a href="https://twitter.com/mergemyvideos" target="_blank"><img class="socialNav" src="./img/twitter.jpeg"/></a></li>
      <li><a href="https://plus.google.com/+Mergemyvideos" target="_blank"><img class="socialNav" src="./img/googleplus.jpeg"/></li>
    </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>






<div id="mainContent" class="container contentContainer wrapper">
  <div  id="downloadSection" class = "row">          
    <div class="col-md-6 col-md-offset-3">                                     
     <a href="" id ="downloadButton" class="btn btn-success" download ><span class="glyphicon glyphicon-download-alt"></span> Click Here to Download Your Merged Videos!</a>
     <br><br><br><h3>Your Merged File will be available  for 30 minutes. It will be deleted after then. Thank you for using our service!</h3>
     <br><br><br><h3>Do you want to merge more videos? Click on the HOME link!</h3>
        
      </div>
  </div>

  <div id="loading">
   <div class="row">
    <div>      
    <img class="col-md-6 col-md-offset-3" src="./img/loading.gif" alt="loading-icon">
   </div>
   </div>
  </div>


  <div id="fileDeleted">
   <div class="row">      
     <div  class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> File Has Been Deleted! 
     </div>
   </div>
  </div>


  <div id="uploadedFilesDeleted">
    <div class="row">
     <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Warning!</strong> Your session has expired and your files were deleted! Please <a>upload new files!</a>
      </div>
    </div>
  </div>




  <div id="convertArea">

    <div id="uploadMoreTracks">
      <div class="row">
        <div class="">
          <button class="btn btn-danger col-md-6 col-md-offset-3" id="uploadMoreTracksButton"><span class="glyphicon glyphicon-cloud-upload"></span>Upload Another Video?</button>
        </div>
        
      </div>
    </div>
    
    <div id="uploadTrack">
       <div class="row">
        <br><br><br>
        <form action="frontEnd.php" method="post" enctype="multipart/form-data"  >
            <label >Select Track to upload:</label><br>
            <input  type="file" name="files[]" class="file" id="fileToUpload" multiple data-allowed-file-extensions='["mp4","avi","flv"]'><br>                      
        </form>
      </div>
    </div>

   <h1 id ="mergedStuff"></h1>


    <div id="uploadedTracks">
       <div class ="row" id ="instructions">        
          <h3>Click on the Videos to drag and rearrage them in the order to be joined!</h3>         
       </div>

       <div class="row">
          <ul id="sortable"> 
        </ul> 
       </div>    
    </div>

    <div id="delete">
      <div class="row">
        <div class="">
          <button class="btn btn-warning col-md-6 col-md-offset-3" id="deleteButton"><span class="glyphicon glyphicon-trash"></span>Delete Uploaded Files and Start Over</button>
        </div>        
      </div>
    </div>

     
    <!--Alert Messages -->
 <div id ="warning" class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> Please Upload a Video First! 
 </div>

 <div id="uploadAnotherTrack" class="alert alert-warning">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> You Must Upload a Minimum of 2 or More Videos to Merge!
</div>

 <div id="selectFormat" class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> Please select the format you want the merged video to be!
</div>



  <div id="selectMergedFormat">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h3>Select the format of the merged Video</h3>
      <form id="radioForm" role="form" action="frontEnd.php" method="post"> 
       <label class="radio-inline">     
        <input id="avi" type="radio" class="videoType" name="videoType" value=".avi"> .avi 
       </label>
        <label class="radio-inline">  
        <input id="flv" type="radio" class="videoType" name="videoType" value=".flv"> .flv
      </label>
         <label class="radio-inline">  
        <input id="mp4" type="radio" class="videoType" name="videoType" value=".mp4"> .mp4
      </label>
      </form>
     </div>
   </div>
  </div>


<div id="merge">
      <div class="row">
        <div class="">
          <button class="btn btn-success col-md-6 col-md-offset-3" id="mergeButton"><span class="glyphicon glyphicon-cog"></span>MERGE!!!</button>
        </div>        
      </div>
</div>




  </div>


</div>



</body>


<script type="text/javascript" src="./js/frontEndJS.js"></script>





</html>