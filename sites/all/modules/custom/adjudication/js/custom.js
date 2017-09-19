jQuery(document).ready(function () {  
	jQuery('#show').hide();
	jQuery('#hide_All_Information').hide();
	jQuery('#release_back_queue_btn').attr('disabled', 'disabled');
    jQuery('#Identity_Verified_btn').attr('disabled', 'disabled');
    jQuery('#reject_image_quality_btn').attr('disabled', 'disabled');
    jQuery('#reject_inconclusive_match_btn').attr('disabled', 'disabled');
 
        
					
   jQuery('#release_back_queue').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#release_back_queue_btn').removeAttr('disabled');
        } else {
           jQuery('#release_back_queue_btn').attr('disabled', 'disabled');
        }
    });
		
		jQuery('#reject_image_quality').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#reject_image_quality_btn').removeAttr('disabled');
        } else {
           jQuery('#reject_image_quality_btn').attr('disabled', 'disabled');
        }
    });
		
		
		jQuery('#reject_inconclusive_match').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#reject_inconclusive_match_btn').removeAttr('disabled');
        } else {
           jQuery('#reject_inconclusive_match_btn').attr('disabled', 'disabled');
        }
    });
		
		jQuery('#DOB_on_multiple').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#Identity_Verified_btn').removeAttr('disabled');
        } else {
           jQuery('#Identity_Verified_btn').attr('disabled', 'disabled');
        }
    });
		
		
		jQuery('#Photos_are_same_person').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#Identity_Verified_btn').removeAttr('disabled');
        } else {
           jQuery('#Identity_Verified_btn').attr('disabled', 'disabled');
        }
    });	
		// Show hide all information 
		
			jQuery('#Show_All_Information').click(function() {
				jQuery('#show').show();
				jQuery('#Show_All_Information').hide();
				jQuery('#hide_All_Information').show();
			});	
			// Show hide all information 
			jQuery('#hide_All_Information').click(function() {
				jQuery('#show').hide();
				jQuery('#Show_All_Information').show();
				jQuery('#hide_All_Information').hide();
			});	
			
			// Image checkbox checking 
			jQuery('#Blurry,#Dark,#Light,#Off_Angle,#Partial_Image,#Blurry_selfie,#Dark_selfie,#Light_selfie,#Off_Angle_selfie,#Partial_Image_selfie,#Incorrect_Doc,#Incorrect_Doc_selfie').click(function() { 
				if (jQuery('#Blurry').is(':checked') || jQuery('#Dark').is(':checked') || jQuery('#Light').is(':checked')|| jQuery('#Off_Angle').is(':checked')|| jQuery('#Partial_Image').is(':checked')|| jQuery('#Dark_selfie').is(':checked')|| jQuery('#Light_selfie').is(':checked')|| jQuery('#Off_Angle_selfie').is(':checked')|| jQuery('#Partial_Image_selfie').is(':checked') || jQuery('#Blurry_selfie').is(':checked') || jQuery('#Incorrect_Doc_selfie').is(':checked') || jQuery('#Incorrect_Doc').is(':checked')) {
					//// check box unchecked 
					 jQuery('#release_back_queue').attr('checked', false);
					 jQuery('#DOB_on_multiple').attr('checked', false);
					 jQuery('#Photos_are_same_person').attr('checked', false);
					 //check box disable 
					 jQuery('#release_back_queue').attr('disabled', 'disabled');
					 jQuery('#DOB_on_multiple').attr('disabled', 'disabled');
					 jQuery('#Photos_are_same_person').attr('disabled', 'disabled');
					 // Button disable 
					 jQuery('#release_back_queue_btn').attr('disabled', 'disabled');
					 jQuery('#Identity_Verified_btn').attr('disabled', 'disabled');
        } else {
					// check box enable 
           jQuery('#release_back_queue').removeAttr('disabled');
           jQuery('#DOB_on_multiple').removeAttr('disabled');
           jQuery('#Photos_are_same_person').removeAttr('disabled');
           
        }
			});	
					
});

/////////accordions 

jQuery(document).ready(function() {
		jQuery('.ziehharmonika').ziehharmonika({
			collapsible: true,
			prefix: '★'
		});
	});

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

////////////