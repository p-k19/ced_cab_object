$(document).ready(function () {
    var xml;
    var pick="cu";
    var drop="cu";
    var cab="cu";
    var kg=0;
      var cab;
      $("#pick").change(function(){
          pick=$(this).val();
        }); 
        $("#drop").change(function(){
          drop=$(this).val();
        });
        $("#cab").change(function(){
          cab=$(this).val();
          
          if(cab=="CedMicro"){
              $("#kg").prop('disabled',true);
          } else {  
              $("#kg").prop('disabled',false);
          }
        });
        $("#kg").change(function(){
          kg=$(this).val();
          
        });
        
    
    
        
        
       $(".btn").click(function () {
        if(pick==drop){
            alert("Please select pickup and drop location distinct!");
           //$("#res").html("<p style='color:red;'>Please select pickup and drop location distinct!</p>"); 
          return;
      }
        if(pick=='cu'){
            alert("Please Select Pickup location!");
        // $('#res').html("<p style='color:red;'>Please Select Pickup location!</p>");
            return;
        }
        if(drop=='cu'){
            alert("Please Select Drop location!");
         //$('#res').html("<p style='color:red;'>Please Select Drop location!</p>");
          return;
      }
      if(cab=='cu'){
        alert("Please Select the Cab!");
       // $('#res').html("<p style='color:red;'>Please Select cab first!</p>");
        return;
    }
    
          $.ajax({
              
               url: "prince.php",
               method:"post",
               type: "post",
               data:{
                   pick:pick,
                   drop:drop,
                   cab:cab,
                   kg:kg
              },
              success: function (result) {
                
               alert(result);
                  //$("#res").modal(result);

                  

              }
          });
        });
      });