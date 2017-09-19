jQuery(document).ready(function() {
      
       jQuery('.checkprovider').on('click', function() { 
      var selectedValue = jQuery(this).val();
 
      jQuery.ajax({
        url: "getscheduleresource",
        data:{careprovalue : selectedValue,


        },
        type: "POST",
        success: function(data){
          console.log(data);

        if(data == "true"){
           //jQuery("#careprovider-modal").modal('show');
           //jQuery("#getCode").html(data);
        }
          



  
           // jQuery('#pracloc').html(data);
 

        }
    });
       
    });     
   
 



});