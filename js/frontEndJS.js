var uploadedTracks=[];
var y=false;
var str=[];
var jsonData;
var data;
var positions =[];



$(document).ready(function(){
  // $('#myVideo').hide();
  $('#downloadSection').css("display", "none");
  $('#instructions').css("display", "none");
  $('#uploadMoreTracks').css("display", "none");
  $('#selectMergedFormat').css("display", "none");
  $('#warning').css("display", "none");
  $('#uploadAnotherTrack').css("display", "none");
  $('#selectFormat').css("display", "none");
  $('#loading').css("display", "none");
  $('#fileDeleted').css("display", "none");
  $('#uploadedFilesDeleted').css("display", "none");
  $('#delete').css("display", "none");
  
       $.ajax({
        url:'checkIfFileExist.php',
        dataType:"json",
        data:{data:data},
        type:'POST',
        success:function(data){
          if(!data.error){
           
            if(data=="1"){
           
            }
            else{
             
           
            }
          

          }
        }

  });

 if($('#downloadButton').css('display')=='block'){ 
  // alert("visible");
   setInterval(checkVisible,5000);
  }

 
  $.ajax({
    url:'uploadedTracks.php',
    data:{data:data},
    type:'POST',
    dataType:"json",
    success:function(data){
      if(!data.error){
      
       
        uploadedTracks=data;
     
      // alert(uploadedTracks.length);
       // alert(typeof(uploadedTracks));

        var x ="";

        y=true;
        var elem = document.getElementById("sortable");

     
        if(uploadedTracks.length==0){
          //alert("No track uploaded");
         
          $('#uploadTrack').css('display','block');
         
        }
         else{
       
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
          $('#delete').css('display','block');
          $('#noSoftwareReq').css('display','none');
        }
      }
    }

  });




});

 function list(){
   str = JSON.stringify(positions);
 
  return str; 
} 



$('#deleteButton').click(function(e){
  var data="x";
   e.preventDefault();
 //alert("button clicked");
$.ajax({
      url:'clearDatabase.php',
      dataType:"json",
    
      data:{data:data},
        async: false,
      type:'POST',      
      success:function(data){
        
         // alert("result is " + data);
         
      },

      complete: function(XMLHttpRequest, status) {            
                 
        window.location=window.location;

      }
    });

 
          
});
    


$("#mergeButton").click(function(){
  var typeSelected = $(".videoType:checked").val();
 
    if(uploadedTracks.length==0){
      $('#warning').css("display","block");
    }
    else if(uploadedTracks.length==1){
      $('#uploadAnotherTrack').css("display","block");
    }
    else if( !$('#mp4').is(':checked') && !$('#flv').is(':checked') && !$('#avi').is(':checked')  ){
      
     
       $('#selectFormat').css("display","block");
    }
    else{
     
      
      

      str=list();
    
           

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
        
            if(data=="1"){
                  $("#uploadedTracks").css("display","none");
                    $('#uploadTrack').css('display','block');
                    $('#uploadMoreTracks').css('display','none');
                     $('#uploadMoreTracksButton').css("display","none");
                     $('#instructions').css("display", "none");
                     $('#convertArea').css("display","none");
                     $('#selectMergedFormat').css('display',"none");
                     $('#uploadedFilesDeleted').css('display','block');

            }
            else{
               data=data;
                jsonData=data;
                
                $('#convertArea').hide();
               // $('#convertArea').css("display","block");
                $('#downloadButton').fixDownloadButton(data);
                
                setInterval(checkVisible,60000);

            }
           
          
          }
        }

      });
    }

    

  });

 $.fn.fixDownloadButton = function(data){
    this.attr("href",data);
    this.css("display","block");
    $("#downloadSection").css("display","block");
  }


  $("#uploadMoreTracksButton").click(function(){
    $('#uploadTrack').css("display","block");
    $('#uploadMoreTracksButton').css("display","none");
  
  });



 
function checkVisible(){
 
  $.ajax({
    url:'checkIfFileExist.php',
    dataType:"json",
    data:{data:data},
    type:'POST',
    success:function(data){
      if(!data.error){       
        if(data=="1"){
         
            $("#downloadButton").css("display","none");
            $("#downloadSection").css("display","none");
             $("#uploadedTracks").css("display","none");
          
        $('#uploadedFilesDeleted').css("display","block");
       
        }
        else{
       
       
        }
      

      }
    }

  });
}

 
