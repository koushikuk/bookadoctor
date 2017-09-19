jQuery(document).ready(function () {
	jQuery('#loader').hide();
	// Dl resubmited JS 
	jQuery('#resubmission').click(function(e){
	
	
		var appid = jQuery(this).attr('data-appid');
		var dl_count = jQuery(this).attr('data-dl-count');
		var selfie_count = jQuery(this).attr('data-selfie-count');
		var dl_checkedValue = jQuery('#resubmit_dl_chk:checked').val();
		var selfie_checkedValue = jQuery('#resubmit_selfie_chk:checked').val();
		// DL resubmit status
		if(dl_checkedValue=="true"){
			var resubmission_type_dl = "true"
		}else{
			var resubmission_type_dl = "false";
			
		}
		// Selfie resubmit status
		if(selfie_checkedValue=="true"){
			var resubmission_type_selfie = "true"
		}else{
			var resubmission_type_selfie = "false";
			
		}
		// checck dl count for resubmit
		if((resubmit_dl_count!='') && (dl_checkedValue=="true")){
		var resubmit_dl_count = parseInt(dl_count) + 1;
		}else {
		var resubmit_dl_count = 1;
		}	

		// checck dl count for resubmit
		if((resubmit_selfie_count!='') && (selfie_checkedValue=="true")){
		 var resubmit_selfie_count = parseInt(selfie_count) + 1;
		}else {
			var resubmit_selfie_count = 1;
		}	
		//var facial_status = jQuery(this).attr('data-facial');
		var prog_eligible = jQuery(this).attr('data-eligible');
		e.preventDefault();
		var appStatus = "resubmited";
		var resubmited_for ="DL";
		jQuery.ajax(
		{
			url : '/dl_resubmit',
			type: "POST",
			data:{'appid': appid,
				  'appStatus': appStatus,
					'resubmission_type_dl':resubmission_type_dl,
					'resubmission_type_selfie':resubmission_type_selfie,
					'resubmit_dl_count':resubmit_dl_count,
					'resubmit_selfie_count':resubmit_selfie_count,
					
			},
			beforeSend: function() {
				jQuery('#loader').show();
			},
			success:function(data) 
			{  	
				bootbox.alert({
					message: "Re-submission Successfully Completed.",
					callback: function () {
						var url = "https://" + window.location.host + '/telos_adjudication_queue';
						jQuery(location).attr('href', url);
					}
				});
			},
			complete: function() {
				jQuery('#loader').hide();
			},
			error: function() 
			{
				console.log('Thre is something wrong.');
			}
		});
	});


	
    // img rotate
    var rotation =0;
    jQuery('.btnRotate1').click(function(){
         rotation += 90;
        jQuery(this).parents( ".div1" ).children().find('.img1').stop().css("transform","rotate("+rotation+"deg)").stop();
        
    })
     jQuery('.btnRotate2').click(function(){
         rotation += 90;
        jQuery(this).parents( ".div2" ).children().find('.img2').stop().css("transform","rotate("+rotation+"deg)").stop();
        
    })
    
    
    
	jQuery('#show').hide();
	jQuery('#hide_All_Information').hide();
	jQuery('#release_back_queue_btn').attr('disabled', 'disabled');
    jQuery('#identity_Verified_btn').attr('disabled', 'disabled');
    jQuery('#reject_image_quality_btn').attr('disabled', 'disabled');
    jQuery('#reject_inconclusive_match_btn').attr('disabled', 'disabled');
    jQuery('#release_back_queue_btn_Eligiblity').attr('disabled', 'disabled');
    jQuery('#Reject_Not_Eligible_btn').attr('disabled', 'disabled');
    jQuery('#Eligiblity_Verified_btn').attr('disabled', 'disabled');
    jQuery('#resubmission').attr('disabled', 'disabled');
    jQuery('#btnRotate2').hide();
    jQuery('#btnRotate1').hide();
 
        
	jQuery('#resubmit_selfie_chk').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#resubmission').removeAttr('disabled');
        } 
				
		else if (jQuery('#resubmit_selfie_chk').is(':checked') || jQuery('#resubmit_dl_chk').is(':checked')){
					
			jQuery('#resubmission').removeAttr('disabled');
		}
		
		else {
           jQuery('#resubmission').attr('disabled', 'disabled');
        }
    });

    jQuery('#resubmit_dl_chk').click(function() {
        if (jQuery(this).is(':checked')) {
				jQuery('#resubmission').removeAttr('disabled');
        } 
		else if (jQuery('#resubmit_selfie_chk').is(':checked') || jQuery('#resubmit_dl_chk').is(':checked')){
			
			jQuery('#resubmission').removeAttr('disabled');
		}	
				
		else {
           jQuery('#resubmission').attr('disabled', 'disabled');
        }
    });		
		

	jQuery('#DOB_on_multiple').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#identity_Verified_btn').removeAttr('disabled');
        } 
				
		else if (jQuery('#DOB_on_multiple').is(':checked') || jQuery('#photos_are_same_person_value').is(':checked')){
					
			jQuery('#identity_Verified_btn').removeAttr('disabled');
		}
		
		else {
           jQuery('#identity_Verified_btn').attr('disabled', 'disabled');
        }
    });

	jQuery('#photos_are_same_person_value').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#identity_Verified_btn').removeAttr('disabled');
        } 
				
		else if (jQuery('#DOB_on_multiple').is(':checked') || jQuery('#photos_are_same_person_value').is(':checked')){
					
			jQuery('#identity_Verified_btn').removeAttr('disabled');
		}
		
		else {
           jQuery('#identity_Verified_btn').attr('disabled', 'disabled');
        }
    });		
				
	jQuery('#Eligiblity_Verified').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#Eligiblity_Verified_btn').removeAttr('disabled');
        } else {
           jQuery('#Eligiblity_Verified_btn').attr('disabled', 'disabled');
        }
    });		
				
				
	jQuery('#Reject_Not_Eligible').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#Reject_Not_Eligible_btn').removeAttr('disabled');
        } else {
           jQuery('#Reject_Not_Eligible_btn').attr('disabled', 'disabled');
        }
    });			
		
				
    jQuery('#release_back_queue_Eligiblity_check').click(function() {
        if (jQuery(this).is(':checked')) {
					 jQuery('#release_back_queue_btn').removeAttr('disabled');
        } else {
           jQuery('#release_back_queue_btn').attr('disabled', 'disabled');
        }
    });			

			
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
			jQuery('#photos_are_same_person_value').attr('checked', false);
			//check box disable 
			jQuery('#release_back_queue').attr('disabled', 'disabled');
			jQuery('#DOB_on_multiple').attr('disabled', 'disabled');
			jQuery('#photos_are_same_person_value').attr('disabled', 'disabled');
			// Button disable 
			jQuery('#release_back_queue_btn').attr('disabled', 'disabled');
			jQuery('#identity_Verified_btn').attr('disabled', 'disabled');
		} else {
					// check box enable 
		   jQuery('#release_back_queue').removeAttr('disabled');
		   jQuery('#DOB_on_multiple').removeAttr('disabled');
		   jQuery('#photos_are_same_person_value').removeAttr('disabled');
		   
		}
	});

	// Print s3 backet images 
	var appid = jQuery('#drivingLicensesrc').attr('data-appid');
	jQuery.ajax({
		url: '/s3_images',
		data: { 'appid': appid, },
		error: function () {
			console.log('ERROR');
		},
		dataType: 'json',
		success: function (msg) {
									
			var url = "https://" + window.location.host +'/sites/all/modules/custom/telosadjudication/images/no_image.jpg';
			if(msg){									
				if((typeof msg.drivingLicensesrc!='') || (typeof msg.drivingLicensesrc != "undefined")){
										
					var drivingLicensimg = jQuery('<img id="dynamic" width="196" height="136" src="'+msg.drivingLicensesrc+'">'); 
					drivingLicensimg.appendTo('#drivingLicensesrc');
					jQuery(".image_loader").hide();
					jQuery("#btnRotate1").show();
		 

					var drivingLicensimglightbox = jQuery('<a href ="'+msg.drivingLicensesrc+'" rel="lightbox" onclick="Lightbox.start(this, false, false, false, false); return false;"><img id="dynamic" width="50" height="50" src="'+msg.drivingLicensesrc+'"></a>');
					drivingLicensimglightbox.appendTo('#drivingImg_doc');
					jQuery(".image_loader").hide();										
									
				}else {

					var drivingLicensnoimg = jQuery('<img id="dynamic" width="196" height="136" src="'+url+'">'); 
					drivingLicensnoimg.appendTo('#drivingLicensesrc');
					jQuery(".image_loader").hide();
					jQuery("#btnRotate1").hide();
				}

				if((typeof msg.selfie!='') || (typeof msg.selfie != "undefined")){
			
					var selimg = jQuery('<img id="dynamic" width="196" height="136" src="'+msg.selfie+'">'); 
					selimg.appendTo('#selfie');
					jQuery(".image_loader").hide();										 
					jQuery("#btnRotate2").show();

					var lightboxselfie = jQuery('<a href ="'+msg.selfie+'" rel="lightbox" onclick="Lightbox.start(this, false, false, false, false); return false;"><img id="dynamic" width="50" height="50" src="'+msg.selfie+'"></a>');
					lightboxselfie.appendTo('#selfie_doc');
					jQuery(".image_loader").hide();										
									
					}else {
						var selfienoimg = jQuery('<img id="dynamic" width="196" height="136" src="'+url+'">'); 
						selfienoimg.appendTo('#selfie');
						jQuery(".image_loader").hide();
						jQuery("#btnRotate2").hide();
					}
			}else {
								
				var drivingLicensesrcimg = jQuery('<img id="dynamic" width="196" height="136" src="'+url+'">'); 
				drivingLicensesrcimg.appendTo('#drivingLicensesrc');
							 
				var selfieimg = jQuery('<img id="dynamic" width="196" height="136" src="'+url+'">'); 

				selfieimg.appendTo('#selfie');
				jQuery(".image_loader").hide();
				jQuery("#btnRotate2").hide();
				jQuery("#btnRotate1").hide();
			}										
								
		},
		type: 'POST'
	});
		
// end code s3 backet images					
});

/////////accordions ////////////////

jQuery(document).ready(function() {
		jQuery('.ziehharmonika').ziehharmonika({
			collapsible: true,
			prefix: '★'
		}); 

		
}); 

