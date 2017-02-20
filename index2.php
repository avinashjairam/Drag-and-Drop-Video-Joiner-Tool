<?php
require_once("./includes/fileUpload.php");
?>

<!DOCTYPE html>


<html lang="en">



<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Merge My Videos!</title>
<meta name="keywords" content="videos, mp4, avi, flv, merging, joining.">
<meta name="Description" content="MERGE MY VIDEOS is a online web-based video merging software. Merge  various types of video files like mp4, flv, avi." />



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="./css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

<script src="https://use.fontawesome.com/9a454d2491.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script src="./js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="./js/fileinput.min.js" type="text/javascript"></script>
<script src="./js/fileinput.js" type="text/javascript"></script>     
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>



<link rel="stylesheet" href="./css/stylesheet.css" />
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
      <a class="navbar-brand" href="mergemyvideos.com"><img class="resize" src="./img/logo.jpg" alt="mergemyvideos.com logo"/></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-center">
        <li class="active"><a href="./index.php">Home</a></li>
        <li><a href="how_to_use.php">How To Use</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right"> 
	<li><a href="https://www.facebook.com/mergemyvideos" target="_blank"> <i class="fa fa-facebook"></i></a></li> 
        <li><a href="https://twitter.com/mergemyvideos" target="_blank"> <i class="fa fa-twitter"></i></a><li>
	<li><a href="https://plus.google.com/+Mergemyvideos" target="_blank"><i class="fa fa-google-plus"></i></a><li>
     </ul>
	
    </div><!--/.nav-collapse -->
  </div>
</div>






<!-- <div id="mainContent" class="container contentContainer wrapper">
  <div  id="downloadSection" class = "row">          
    <div class="col-md-6 col-md-offset-3">                                     
     <a href="" id ="downloadButton" class="btn btn-success" download ><span class="glyphicon glyphicon-download-alt"></span> Click Here to Download Your Merged Videos!</a>
     <br><br><br><h3>Your Merged File will be available  for 30 minutes.</h3><h3> It will be deleted after then. Thank you for using our service!</h3>
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
    
    <div id="uploadTrack" class="fixPadding">
       <div class="row"> 
        <h1 class="col-md-offset-3">Merge your videos online for free! </h1><br><br><br>
        <form action="index.php" method="post" enctype="multipart/form-data"  >
            <label >Select Tracks to upload:</label><br>
            <input  type="file" name="files[]" class="file" id="fileToUpload" multiple data-allowed-file-extensions='["mp4","avi","flv"]'><br>                      
        </form>
      </div>
    </div>

   


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
 -->
     
    <!--Alert Messages
 <div id ="warning" class="alert alert-danger fixPadding">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> Please Upload a Video First! 
 </div>

 <div id="uploadAnotherTrack" class="alert alert-warning fixPadding">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> You Must Upload a Minimum of 2 or More Videos to Merge!
</div>

 <div id="selectFormat" class="alert alert-danger fixPadding">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> Please select the format you want the merged video to be!
</div>



  <div id="selectMergedFormat">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h3>Select the format of the merged Video</h3>
      <form id="radioForm" role="form" action="index.php" method="post"> 
       <label class="radio-inline">     
        <input id="avi" type="radio" class="videoType" name="videoType" value=".avi"> .avi 
       </label>
        <label class="radio-inline">  
        <input id="flv" type="radio" class="videoType" name="videoType" value=".flv"> .flv
      </label>
         <label class="radio-inline">  
        <input id="mp4" type="radio" class="videoType" name="videoType" value=".mp4"> .mp4
      </label>
      <label class="radio-inline">  
        <input id="wmv" type="radio" class="videoType" name="videoType" value=".wmv"> .wmv
      </label>
      <label class="radio-inline">  
        <input id="mov" type="radio" class="videoType" name="videoType" value=".mov"> .mov
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
  
<div id="noSoftwareReq" class="row"> 
   <div class="col-md-offset-3">
      <br><br><br><br><br><br><br><h2>No Software Download and Installation Required!</h2>
   </div>
</div>



  </div>


</div> -->

<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5892a56bf04dd9de"></script> 
<script type="text/javascript" src="./js/frontEndJS.js"></script>



</body>







</html>
