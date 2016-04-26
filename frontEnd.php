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
                $user->create();
        
            }
        }
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

<script>
    $(function() {
        $( "#sortable" ).sortable({ 
            placeholder: "ui-sortable-placeholder" 
        });
    });

var uploadedTracks = <?php $user->getFilesUploaded();?>;

var y=false;
var str=[];
var data;
var positions =[];
window.onload=function(){

 var x ="";
 y=true;
  var elem = document.getElementById("sortable");

   for(var i=0; i < uploadedTracks.length; i++){
      x  +="<li class=\"ui-state-default\" id=\"item-" + i + "\">" +uploadedTracks[i] + " </li>";  
  }

  if(typeof elem !== 'undefined' && elem !== null) {  
   elem.innerHTML=x;
  }

  $('#sortable').sortable({
    // axis: 'y',
    stop: function (event, ui) {
       data = $(this).sortable('toArray');
      // positions=data.join(';');
    
     

        for(var i =0; i <data.length; i++){
          positions[i]=$('#'+data[i]).text();
         // alert(positions[i]);

        }

           $('p').text(positions);

          // alert(typeof(positions));

       // alert($('#'+data[0]).text() );

        // alert($(data[0]).;

      // for(var i=0; i < uploadedTracks.length; i++){

      //   console.log()
      // }
       
}
});
 


}




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
      <a class="navbar-brand" href="#">Merge Your Videos</a>
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

<div class="container contentContainer">
  <div class = "row">                                               
     <a href="" id ="downloadButton" class="btn btn-lg btn-success" download><span class="glyphicon glyphicon-download-alt"></span> Click Here to Download Your Merged Videos!</a>
         <div class="col-md-3 col-md-offset-2" id="download">  
            <br><br>
          <video id="myVideo" controls autoplay>
            <source id="mp4_src" src="" type="video/mp4">
            <source id="ogg_src" src="" type="video/ogg">
            Your browser does not support HTML5 video.
          </video>
       </div>
  </div>





  <div id="convertArea">
    
    <div id="uploadTrack">
       <div class="row">
        <br><br><br>
        <form action="frontEnd.php" method="post" enctype="multipart/form-data"  >
            <label >Select Track to upload:</label><br>
            <input type="file" name="files[]" class="file" id="fileToUpload" multiple data-allowed-file-extensions='["mp4"]'><br>                      
        </form>
      </div>
    </div>

    
   <p > </p>

   <h1 id ="mergedStuff"></h1>

    <div id="uploadedTracks">
       <div class="row">
          <ul id="sortable"> 
        </ul> 
       </div>    
    </div>


   <!--  <div id="mergeButton">
     <div class="row">
      <form method="post" action="frontEnd.php" onsubmit="list();">
         <input type="hidden" id="str" name="str" value="data"/> 
        <label for="mySubmit" class="btn btn-success glyphicon glyphicon-cog col-md-6 col-md-offset-3"> MERGE!!!</label>     
         <input id="mySubmit" type="submit" value="Go" class="hidden" />
      </form>
    </div>
   </div> -->

      <button id="merge">Merge</button>
  </div>

  </div>

</div>

<footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
</footer>



<script>

 function list(){
   str = JSON.stringify(positions);
   //alert(str);
  return str; 
  }

  $("#merge").click(function(){
    // alert("hey");

    str=list();
 //   alert(str);
          // alert(list());
    $.ajax({
      url:'joinVideos.php',
      data:{str:str},
      type:'POST',
      success:function(data){
        if(!data.error){
        //  alert("successful ajax response");
       // alert(data);
          $('#convertArea').hide();
          $('#downloadButton').fixDownloadButton(data);
          $('#myVideo').fixVideo(data);
          //$('#mergedStuff').html(data);
        }
      }

    })

  });


  $(document).ready(function(){
    $('#myVideo').hide();
    $('#downloadButton').hide();



  });

  $.fn.fixDownloadButton = function(data){
    this.attr("href",data);
    this.css("display","block");
  }

  $.fn.fixVideo=function(data){
    this.attr("src",data);
    this.show();
  }


  // $(document).ready(function(){

  //      str = list();


  //   $("#merge").click(function(){
  //     // alert("hey");
  //     alert(str);
  //           // alert(list());
  //     $.ajax({
  //       url:'joinVideos.php',
  //       data:{str:str},
  //       type:'POST',
  //       success:function(data){
  //         if(!data.error){
  //           $('#mergedStuff').html(data);
  //         }
  //       }

  //     })

  //   });





  // });

</script>

</body>



</html>