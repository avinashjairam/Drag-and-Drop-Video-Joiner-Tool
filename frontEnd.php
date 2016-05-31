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
 
//var uploadedTracks = <?php $user->getFilesUploaded();?>;

// var uploadedTracks=[];
// var y=false;
// var str=[];
// var data;
// var positions =[];


// $.ajax({
//   url:'uploadedTracks.php',
//   data:{data:data},
//   type:'POST',
//   success:function(data){
//     if(!data.error){
    
//       alert(data);      
//       uploadedTracks=data; 
//       alert(uploadedTracks.length);

//       var x ="";

//       y=true;
//       var elem = document.getElementById("sortable");

   
//       if(uploadedTracks==1){
//        // $('#instructions').css('display','block');
//         $('#uploadTrack').css('display','block');
//         //$('#selectMergedFormat').css("display","block");
//       }
//        else{
//          for(var i=0; i < uploadedTracks.length; i++){
//            x  +="<li class=\"ui-state-default\" id=\"item-" + i + "\">" +uploadedTracks[i] + " </li>";  
//          }

//         if(typeof elem !== 'undefined' && elem !== null) {  
//           elem.innerHTML=x;
//           $('#selectMergedFormat').css("display","block");
//         }

//         $('#sortable').sortable({

//           stop: function (event, ui) {
//              data = $(this).sortable('toArray');
           
//              for(var i =0; i <data.length; i++){
//                positions[i]=$('#'+data[i]).text(); 
//              }      
//           }
//         });
//       }

//    // $('#instructions').css('display','block');
//      // $('#uploadTrack').css('display','none');
//       //$('#uploadMoreTracks').css('display','block');





//       //$('#mergedStuff').html(data);
//     }
//   }

// });




// var y=false;
// var str=[];
// var data;
// var positions =[];
// window.onload=function(){

//  var x ="";

//  y=true;
//   var elem = document.getElementById("sortable");

//    if(uploadedTracks.length >=1){
//       $('#instructions').css('display','block');
//       $('#uploadTrack').css('display','none');
//       $('#uploadMoreTracks').css('display','block');
//    }

//    for(var i=0; i < uploadedTracks.length; i++){
//       x  +="<li class=\"ui-state-default\" id=\"item-" + i + "\">" +uploadedTracks[i] + " </li>";  
//   }

//   if(typeof elem !== 'undefined' && elem !== null) {  
//    elem.innerHTML=x;
//     $('#selectMergedFormat').css("display","block");
//   }

//   $('#sortable').sortable({

//     stop: function (event, ui) {
//        data = $(this).sortable('toArray');
     
//         for(var i =0; i <data.length; i++){
//           positions[i]=$('#'+data[i]).text(); 

//         }       

//    }
// });
 


// }




</script>



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
      <a class="navbar-brand" href="#">MergeMyVideos</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="how_to_use.php">How To Use</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>




<!-- <div id="">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
  <!--   <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./frontEnd.php">Merge Your Videos</a>
    </div> -->

    <!-- Collect the nav links, forms, and other content for toggling -->
<!--     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./howToUse.php">How to Use<span class="sr-only">(current)</span></a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>        
      </ul>  
    </div><!-- /.navbar-collapse -->
  <!-- </div> --><!-- /.container-fluid -->
<!-- </nav>
</div> --> 

<div id="mainContent" class="container contentContainer">
  <div class = "row">          
    <div class="col-md-6 col-md-offset-3">                                     
     <a href="" id ="downloadButton" class="btn btn-success" download><span class="glyphicon glyphicon-download-alt"></span> Click Here to Download Your Merged Videos!</a>
        
      </div>
  </div>

  <div id="loading">
   <div class="row">
    <div>
      
    <img class="col-md-6 col-md-offset-3" src="./img/loading.gif" alt="loading-icon">
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
            <input type="file" name="files[]" class="file" id="fileToUpload" multiple data-allowed-file-extensions='["mp4","avi","flv"]'><br>                      
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
      <form role="form" action="frontEnd.php" method="post"> 
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




  <button class="btn btn-success glyphicon glyphicon-cog col-md-6 col-md-offset-3" id="merge">MERGE!!!</button>
  </div>

  </div>


<div class="footer" class="container-fluid">
    <div class="row">....</div>
</div>
</body>


<script>

var uploadedTracks=[];
var y=false;
var str=[];
var data;
var positions =[];



$(document).ready(function(){
  // $('#myVideo').hide();
  $('#downloadButton').hide();
  $('#instructions').hide();
  $('#uploadMoreTracks').hide();
  $('#selectMergedFormat').hide();
  $('#warning').hide();
  $('#uploadAnotherTrack').hide();
  $('#selectFormat').hide();
  $('#loading').hide();

 

  $.ajax({
    url:'uploadedTracks.php',
    data:{data:data},
    type:'POST',
    dataType:"json",
    success:function(data){
      if(!data.error){
      
       // alert(data);      
        //uploadedTracks=JSON.stringify(data); 
        uploadedTracks=data;
      //  alert("data contents" +data);
       // alert(uploadedTracks.length);
       alert(uploadedTracks.length);
        alert(typeof(uploadedTracks));

        var x ="";

        y=true;
        var elem = document.getElementById("sortable");

     
        if(uploadedTracks.length==0){
          alert("No track uploaded");
         // $('#instructions').css('display','block');
          $('#uploadTrack').css('display','block');
          //$('#selectMergedFormat').css("display","block");
        }
         else{
        //  uploadedTracks=JSON.stringify(uploadedTracks);
           for(var i=0; i < uploadedTracks.length; i++){
             x  +="<li class=\"ui-state-default\" id=\"item-" + i + "\">" +uploadedTracks[i] + " </li>";  
           }

          if(typeof elem !== 'undefined' && elem !== null) {  
            elem.innerHTML=x;
            $('#selectMergedFormat').css("display","block");
          }

          $('#sortable').sortable({
            stop: function (event, ui) {
               data = $(this).sortable('toArray');
             
               for(var i =0; i <data.length; i++){
                 positions[i]=$('#'+data[i]).text(); 
               }      
            }
          });

          $('#instructions').css('display','block');
          $('#uploadTrack').css('display','none');
          $('#uploadMoreTracks').css('display','block');
        }
      }
    }

  });
});

 function list(){
   str = JSON.stringify(positions);
   //alert(str);
  return str; 
} 


$("#merge").click(function(){
  var typeSelected = $(".videoType:checked").val();
  alert(typeSelected);
    if(uploadedTracks.length==0){
      $('#warning').css("display","block");
    }
    else if(uploadedTracks.length==1){
      $('#uploadAnotherTrack').css("display","block");
    }
    else if( !$('#mp4').is(':checked') && !$('#flv').is(':checked') && !$('#avi').is(':checked')  ){
      //alert("not checked");
      alert($('mp4').is(':checked'));
      alert("nothing selected");
       $('#selectFormat').css("display","block");
    }
    else{
       alert("hey");
      
      // alert("hey");

      str=list();
     alert(str);
            // alert(list());

     if(str=="[]"){
      var z="[";
      var temp;
         for(var i=0; i < uploadedTracks.length; i++){
           temp="#item-" + i; 
           z+= "\""+ $(temp).text() +"\"";

           if(uploadedTracks.length-i > 1 ){
            z+=",";
           }
         }

         z+="]";
         str=z;

       //alert("zero");
      }

      $(document).on("ajaxStart.secondCall", function () {
        $('#convertArea').hide();
         $("#loading").css("display","block");

      });
      
      $(document).on("ajaxStop.secondCall", function () {
          $('#loading').hide();
      });

      $.ajax({
        url:'joinVideos.php',
        data:{str:str, typeSelected:typeSelected},
        type:'POST',
        success:function(data){
          if(!data.error){
          //  alert("successful ajax response");
            //alert(data);
            $('#convertArea').hide();
            $('#downloadButton').fixDownloadButton(data);
            // $("#downloadButton").attr("href", data);
            // $("downloadButton").css("display","block");
            // $('#myVideo').fixVideo(data);


            //$('#mergedStuff').html(data);
          }
        }

      });
    }

    

  });

 $.fn.fixDownloadButton = function(data){
    this.attr("href",data);
    this.css("display","block");
  }


  $("#uploadMoreTracksButton").click(function(){
    $('#uploadTrack').css("display","block");
    $('#uploadMoreTracksButton').css("display","none");
   // alert("hi");
  });




</script>





</html>