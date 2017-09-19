jQuery(document).ready(function () {  
	jQuery('#loader').hide();
    jQuery(document).on('click', ".claimbutton", function(){ 
		 
		var id = jQuery(this).attr('id');
		var adjudicator = id.split('_');
		var appid = adjudicator[3];
		var adjudicatorID = adjudicator[0];
		//console.log(''+adjudicatorID);
		//console.log(''+appid);
		jQuery(this).prop('disabled', true);
	    
		
	    jQuery.ajax({
			url:'/telosadjudication_adjudicator_action',
			type:'post',
			data:{'id':id,
				  'appid':appid,
		          'adjudicator_id': adjudicatorID,
			},
			beforeSend: function() {
				jQuery('#loader').show();
			},
			success:function(data){
			  
				console.log(data);
				var adjudicationStatusCondition = data.split('+');
				//redirect to facial or program eligibility screen 
				var adjudicator_id = adjudicationStatusCondition[0];
				var facial_status = adjudicationStatusCondition[1];
				var program_eligibility_validation = adjudicationStatusCondition[2];
				var app_id = adjudicationStatusCondition[3];
				//console.log('++===='+adjudicator_id+' hi '+facial_status+' hii '+program_eligibility_validation);
				if((facial_status=='') || (program_eligibility_validation == '')){    
					location.href='manual_facial_adjudication/'+app_id;
				}
				else if((facial_status=='false') && (program_eligibility_validation == 'false')){    
					location.href='manual_facial_adjudication/'+app_id;
				}
				else if((facial_status=='true') && (program_eligibility_validation == 'false')){ 
					location.href='eligibility_adjudication/'+app_id;
				}
				else if((facial_status=='true') && (program_eligibility_validation == '')){ 
					location.href='eligibility_adjudication/'+app_id;
				}
				else if((facial_status=='false') && (program_eligibility_validation == 'true')){ 
					location.href='manual_facial_adjudication/'+app_id;						
				} 
				//console.log(data);
			},
			complete: function() {
				jQuery('#loader').hide();
			}
		  
		}) 
		
	})	
 	
});
