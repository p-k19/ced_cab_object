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
         // $("#drop option[value*='" + drop+ "']").prop('disabled', true);
        });
        $("#cab").change(function(){
          cab=$(this).val();
          
          if(cab=="CedMicro"){
            
              $("#kg").hide();
          } else {  
              $("#kg").show();
              $("#kg").val("No Luggage Service");                                            
          }
        });

        
        $("#kg").change(function(){
          kg=$(this).val();
          
          
        });


        
        
        $("#pick").change(function(){
          $("#drop option").prop('disabled',false);
          $('#drop option[value="' + $("#pick").val() + '"]').prop('disabled', 'disabled');
        });
        $('#drop').change(function () {
          $('#pick option').prop('disabled', false);
          $('#pick option[value="' + $("#drop").val() + '"]').prop('disabled', 'disabled');
      });




  


        
    
        
        
    
        
        
       $(".btn").click(function () {
         
        if(pick==drop){
            //alert("Please select pickup and drop location distinct!");
           $("#res").html("<p style='color:red;'>Please select pickup and drop location!</p>"); 
          return;
      }
        if(pick=='cu'){
           // alert("Please Select Pickup location!");
        $('#res').html("<p style='color:red;'>Please Select Pickup location!</p>");
            return;
        }
        if(drop=='cu'){
          // alert("Please Select Drop location!");
         $('#res').html("<p style='color:red;'>Please Select Drop location!</p>");
          return;
      }
      if(cab=='cu'){
       // alert("Please Select the Cab!");
       $('#res').html("<p style='color:red;'>Please Select cab first!</p>");
       
       
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
                
               //alert(result);
                  $("#res").html(result);
                  //$("#drop option[value*='" + pick+ "']").show();

                  

              }
          });
        });
      });
      
