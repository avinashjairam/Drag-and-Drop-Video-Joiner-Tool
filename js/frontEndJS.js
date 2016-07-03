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
  // if($('#downloadButton').is(':visible')){
  //  alert("visible");
  //  setInterval(checkForDeletedFile,5000);
  // }

       $.ajax({
        url:'checkIfFileExist.php',
        dataType:"json",
        data:{data:data},
        type:'POST',
        success:function(data){
          if(!data.error){
           // alert(typeof(data));
            if(data=="1"){
             // alert("file not deleted");
            //    alert("file deleted");
                      // $.ajax({
                      //     url:'clearDatabase.php',
                      //     dataType:"json",
                      //     async: false,
                      //     data:{data:data},
                      //     type:'POST',
                      //     success:function(data){
                      //         alert("files deleted");
                      //     }
                      //   });

               // $("#downloadButton").css("display","none");
               //  $("#downloadSection").css("display","none");
               //   $("#uploadedTracks").css("display","none");
               //  $("#fileDeleted").css("display","block");
            
             // return true;
            }
            else{
               //$("#downloadButton").unbind();
             //  alert("file available");
             // e.preventDefault();
           
            }
           // alert(typeof(data));

          }
        }

  });

 if($('#downloadButton').css('display')=='block'){ 
   alert("visible");
   setInterval(checkVisible,5000);
  }

  // if($('#selectMergedFormat').css('display')=='block' ){
  //   alert("visible");
  //   alert($('#selectMergedFormat').css('display'));
  // }

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
           $('#delete').css('display','block');
        }
      }
    }

  });

//alert($('#selectMergedFormat').is(':visible'));
  // if($('#selectMergedFormat').is(':visible') ){
  //   alert("visible");

  // }


});

 function list(){
   str = JSON.stringify(positions);
   //alert(str);
  return str; 
} 



$('#deleteButton').click(function(e){
  var data="x";
   e.preventDefault();
 alert("button clicked");
$.ajax({
      url:'clearDatabase.php',
      dataType:"json",
      // timeout: 10000,
      data:{data:data},
        async: false,
      type:'POST',      
      success:function(data){
         // alert("files deleted");
          alert("result is " + data);
          // if(data=="0"){
          //   // location.reload();
          // }
      },

      complete: function(XMLHttpRequest, status) {            
                    // $('form')[0].reset();
                    //$( this ).dialog( "close" );
              //   location.reload();
                    //alert(status);
window.location=window.location;

      }
    });

  // $.when(req1).done(function(){
  //     location.reload();
  // });
   //location.reload();
          
});
    // .done(function (){
    //   location.reload();
    // });


  //;
//   location.reload();
// });



$("#mergeButton").click(function(){
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
        //$('#convertArea').css("display","none");
         $("#loading").css("display","block");

      });
      
      $(document).on("ajaxStop.secondCall", function () {
          $('#loading').hide();
          //$('#loading').css("display","none");

      });

      $.ajax({
        url:'joinVideos.php',
        data:{str:str, typeSelected:typeSelected},
        // data:"json",
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
   // alert("hi");
  });



 
function checkVisible(){
  alert("hidden");
  $.ajax({
    url:'checkIfFileExist.php',
    dataType:"json",
    data:{data:data},
    type:'POST',
    success:function(data){
      if(!data.error){
       // alert(typeof(data));
        if(data=="1"){
         // alert("file not deleted");
        //    alert("file deleted");
            $("#downloadButton").css("display","none");
            $("#downloadSection").css("display","none");
             $("#uploadedTracks").css("display","none");
          
        $('#uploadedFilesDeleted').css("display","block");
         // return true;
        }
        else{
           //$("#downloadButton").unbind();
          // alert("file available");
         // e.preventDefault();
       
        }
       // alert(typeof(data));

      }
    }

  });
}

 
// if($('#selectMergedFormat').css('display')=='block' ){
     //alert("visible1111111");
    // $("#uploadedTracks").css("display","none");
    // $('#uploadTrack').css('display','block');
    // $('#uploadMoreTracks').css('display','none');
    //  $('#uploadMoreTracksButton').css("display","none");
    //  $('#instructions').css("display", "none");
    //  $('#convertArea').css("display","none");
    //  $('#selectMergedFormat').css('display',"none");

    // alert($('#selectMergedFormat').css('display'));
  //    $.ajax({
  //       url:'checkIfFileExist.php',
  //       dataType:"json",
  //       data:{data:data},
  //       type:'POST',
  //       success:function(data){
  //         if(!data.error){
  //          // alert(typeof(data));
  //           if(data=="1"){
  //            // alert("file not deleted");
  //           //    alert("file deleted");
  //                     $.ajax({
  //                         url:'clearDatabase.php',
  //                         dataType:"json",
  //                         data:{data:data},
  //                         type:'POST',
  //                         success:function(data){

  //                         }
  //                       });

  //              // $("#downloadButton").css("display","none");
  //              //  $("#downloadSection").css("display","none");
  //              //   $("#uploadedTracks").css("display","none");
  //              //  $("#fileDeleted").css("display","block");
            
  //            // return true;
  //           }
  //           else{
  //              //$("#downloadButton").unbind();
  //              alert("file available");
  //            // e.preventDefault();
           
  //           }
  //          // alert(typeof(data));

  //         }
  //       }

  // });
//  }
