jQuery(document).ready(function(){  
	jQuery('#loader').hide();
	
jQuery("#edit-field-user-status-und-0-value").prop('readonly',true);
	jQuery('#identity_Verified_btn').click(function(e){
		var appid = jQuery(this).attr('data-appid');
		//var facial_status = jQuery(this).attr('data-facial');
		var prog_eligible = jQuery(this).attr('data-eligible');
		e.preventDefault();
		if(prog_eligible=="true")
		{
			var appStatus = "verified";
		}
		else{
			var appStatus = "verification pending";
		}
		jQuery.ajax(
		{
			url : '/telos_adjudicator_action',
			type: "POST",
			data:{'appid': appid,
				  'facial_status': 'true',
				  'manuallyVerified': 'true',
				  'appStatus': appStatus,
			},
			beforeSend: function() {
				jQuery('#loader').show();
			},
			success:function(data) 
			{  	
				bootbox.alert({
					message: "Identity is Verified.",
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
	
	
	jQuery('#reject_image_quality_btn').click(function(e){
		if (jQuery('#Blurry').is(':checked')){
			var blurry_status = "true";
		}
		if (jQuery('#Dark').is(':checked')){
			var dark_status = "true";
		}
		if (jQuery('#Light').is(':checked')){
			var light_status = "true";
		}
		if (jQuery('#Off_Angle').is(':checked')){
			var off_angle_status = "true";
		}
		if (jQuery('#Partial_Image').is(':checked')){
			var partial_image_status = "true";
		}
		if (jQuery('#Incorrect_Doc').is(':checked')){
			var incorrect_doc_status = "true";
		}
		if (jQuery('#Blurry_selfie').is(':checked')){
			var blurry_selfie_status = "true";
		}
		if (jQuery('#Dark_selfie').is(':checked')){
			var dark_selfie_status = "true";
		}
		if (jQuery('#Light_selfie').is(':checked')){
			var light_selfie_status = "true";
		}
		if (jQuery('#Off_Angle_selfie').is(':checked')){
			var off_angle_selfie_status = "true";
		}if (jQuery('#Partial_Image_selfie').is(':checked')){
			var partial_image_selfie_status = "true";
		}
		if (jQuery('#Incorrect_Doc_selfie').is(':checked')){
			var incorrect_doc_selfie_status = "true";
		}
		var appid = jQuery(this).attr('data-appid');
		e.preventDefault();
		jQuery.ajax(
		{
			url : '/telos_adjudicator_action',
			type: "POST",
			data:{
				  'appid': appid,
				  'manuallyVerified': 'true',
				  'appStatus': "rejected",
				  'blurry_status' : blurry_status,
				  'dark_status' : dark_status,
				  'light_status' : light_status,
				  'off_angle_status' : off_angle_status,
				  'partial_image_status' : partial_image_status,
				  'incorrect_doc_status' : incorrect_doc_status,
				  'blurry_selfie_status' : blurry_selfie_status,
				  'dark_selfie_status' : dark_selfie_status,
				  'light_selfie_status' : light_selfie_status,
				  'off_angle_selfie_status' : off_angle_selfie_status,
				  'partial_image_selfie_status' : partial_image_selfie_status,
				  'incorrect_doc_selfie_status' : incorrect_doc_selfie_status,
			},
			beforeSend: function() {
				jQuery('#loader').show();
			},
			success:function(data) 
			{  	
				console.log(data);
				bootbox.alert({
					message: "Application is Rejected",
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
	
	jQuery('#reject_inconclusive_match_btn').click(function(e){
		
		var appid = jQuery(this).attr('data-appid');
		e.preventDefault();
		jQuery.ajax(
		{
			url : '/telos_adjudicator_action',
			type: "POST",
			data:{
				  'appid': appid,
				  'manuallyVerified': 'true',
				  'appStatus': "rejected",
			},
			beforeSend: function() {
				jQuery('#loader').show();
			},
			success:function(data) 
			{  	
				console.log(data);
				bootbox.alert({
					message: "Application is Rejected",
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
	jQuery('#release_back_queue_btn').click(function(e){
		var appid = jQuery(this).attr('data-appid');
		e.preventDefault();
		jQuery.ajax(
		{
			url : '/telos_adjudicator_action',
			type: "POST",
			data:{'appid': appid,
				  'adjudicator_id': '',
			},			
			beforeSend: function() {
				jQuery('#loader').show();
			},
			success:function(data) 
			{  	
				console.log(data);
				bootbox.alert({
					message: "Application is Released back to queue",
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
	
	jQuery('#Reject_Not_Eligible_btn').click(function(e){
		var appid = jQuery(this).attr('data-appid');
		var adjudicator_notes = jQuery('#adjudicator_comment').val();
		
		e.preventDefault();
		jQuery.ajax(
		{
			url : '/telos_adjudicator_action',
			type: "POST",
			data:{'appid': appid,
				  'adjudication_issue': adjudicator_notes,
				  'manuallyVerified': 'true',
				  'appStatus': "rejected",
			},
			beforeSend: function() {
				jQuery('#loader').show();
			},
			success:function(data) 
			{  	
				console.log(data);
				bootbox.alert({
					message: "Application is Rejected",
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
	
	jQuery('#Eligiblity_Verified_btn').click(function(e){
		var appid = jQuery(this).attr('data-appid');
		var adjudicator_notes = jQuery('#adjudicator_comment').val();
		var facial_status = jQuery(this).attr('data-facial');
		//var prog_eligible = jQuery(this).attr('data-eligible');
		e.preventDefault();
		if(facial_status=="true")
		{
			var appStatus = "verified";
		}
		else{
			var appStatus = "verification pending";
		}
		e.preventDefault();
		jQuery.ajax(
		{
			url : '/telos_adjudicator_action',
			type: "POST",
			data:{'appid': appid,
				  'adjudication_issue': adjudicator_notes,
				  'success_status': 'true',
				  'manuallyVerified': 'true',
				  'appStatus': appStatus,
			},
			beforeSend: function() {
				jQuery('#loader').show();
			},
			success:function(data) 
			{  	
				console.log(data);
				bootbox.alert({
					message: "Application is Verified",
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
});