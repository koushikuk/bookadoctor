jQuery(document).ready(function () {  
    jQuery(".verifiedids").live('click',function(e){ 
		
	     var insurence_status = jQuery(this).attr('data-appid');
          e.preventDefault();
		 var appid = jQuery(this).attr('id');
		 var clickstatus;
		 jQuery('#'+appid).closest('td').append('<input type="checkbox" value="'+appid+'" id="'+appid+'_checkbox" checked="checked" disabled/>');
	     jQuery('#insdata_'+appid).hide();
		 if(insurence_status =='yes'){	 
		 jQuery('#insdata_'+appid).closest('td').append('<button type="button" class="testclass" data-toggle="modal" data-target="#edit-modal" data-appid="'+appid+'" id="'+'insdata_'+appid+'">Insurance</button>');
		 }
		 jQuery('#'+appid).hide(); 
		 jQuery('#showmessage').html('Adjudcation status updated');
		 
		 
		
	    jQuery.ajax({
		  url:'wiphy_adjudicator_action',
		  type:'post',
		  data:{'appid':appid,
		        'facialIDEMRVerified':"true",
				'manuallyVerified':  "true",
				'facialIDDLVerified':"true",
		        'adjtype':'facialIDEMRVerified',
		  },
		  success:function(data){
		  	console.log(data);
		jQuery('#insdata_'+data.appid).hide();  
		 if(insurence_status =='yes'){		
		   jQuery('#insdata_'+data.appid).closest('td').append('<button type="button" class="testclass" data-toggle="modal" data-target="#edit-modal" data-appid="'+data.appid+'" id="'+'insdata_'+data.appid+'">Insurance</button>');  
		    }
			  jQuery("#showmessage").html('');
 	          jQuery("#showmessage").html('Verified by adjudicator successfully. ');
		  }
		  
	  }) 
		
	})	


  jQuery(".checkins").live('click',function(e){
	     var insurence_status = jQuery(this).attr('data-appid');
          e.preventDefault();
		 var appids = jQuery(this).attr('id');
		 var res = appids.split("_"); 
		 //alert(res[1]);
		 var appid = res[1];
		 if(appids == 'admin_'+res[1]){ 
		jQuery('#admin_'+appid).closest('td').append('Please Wait...');
		jQuery('#insdata_'+appid).hide();
		if(insurence_status =='yes'){
		 jQuery('#insdata_'+appid).closest('td').append('<button type="button" class="testclass" data-toggle="modal" data-target="#edit-modal" data-appid="'+appid+'" id="'+'insdata_'+appid+'">Insurance</button>');
		 }
			  jQuery('#admin_'+appid).hide(); 
		 }else{
			 jQuery(this).closest('tr').remove();
		 }
		 jQuery("#showmessage").html('');
		 jQuery("#showmessage").html('Check in completed.');		
				
		 
			 jQuery('#'+appid).hide(); 
		//console.log(appid);
	    jQuery.ajax({
		  url:'wiphy_adjudicator_action',
		  type:'post',
		  data:{'appid':appid,
		        'adjtype':'checkins',
		  },
		  success:function(data){
		jQuery('#insdata_'+data.appid).hide(); 	  
		if(insurence_status =='yes'){
		   jQuery('#insdata_'+data.appid).closest('td').append('<button type="button" class="testclass" data-toggle="modal" data-target="#edit-modal" data-appid="'+data.appid+'" id="'+'insdata_'+data.appid+'">Insurance</button>');  
		    }
			  
		  }
		  
	  }) 
		
	})	

/* checkout completed ajax */
  jQuery(".checkout").live('click',function(e){
	     var insurence_status = jQuery(this).attr('data-appid');
          e.preventDefault();
		 var appids = jQuery(this).attr('id');
		 var res = appids.split("_");   
		 var appid = res[1];
		 
		 if(appids == 'admin_'+res[1]){ 
			  jQuery('#admin_'+appid).closest('td').append('Please Wait...');
		jQuery('#insdata_'+appid).hide();	  
		if(insurence_status =='yes'){
		 jQuery('#insdata_'+appid).closest('td').append('<button type="button" class="testclass" data-toggle="modal" data-target="#edit-modal" data-appid="'+appid+'" id="'+'insdata_'+appid+'">Insurance</button>');
		 }
			  
			  jQuery('#admin_'+appid).hide(); 
		 }else{
			 jQuery(this).closest('tr').remove();
		 }
		 
		 
		 jQuery("#showmessage").html('');
		 jQuery("#showmessage").html('Check out completed.');		
				
		 
			 jQuery('#'+appid).hide(); 
		//console.log(appid);
	    jQuery.ajax({
		  url:'wiphy_adjudicator_action',
		  type:'post',
		  data:{'appid':appid,
		        'adjtype':'CHECK_OUT_COMPLETED',
		  },
		  success:function(data){
			 jQuery('#insdata_'+data.appid).hide(); 
			 if(insurence_status =='yes'){
		   jQuery('#insdata_'+data.appid).closest('td').append('<button type="button" class="testclass" data-toggle="modal" data-target="#edit-modal" data-appid="'+data.appid+'" id="'+'insdata_'+data.appid+'">Insurance</button>');  
		    }
			  
		  }
		  
	  }) 
		
	})	
  
//added on 13-07-2017
jQuery(".insbtn").live('click',function(){
	  
		 var appids = jQuery(this).attr('id');
		 var res = appids.split("_"); 
		 //alert(res[1]);
		 var appid = res[1];
		 var insstatus = res[0];
		 
		 
		 /*if(appids == 'admin_'+res[1]){ 
			  jQuery('#admin_'+appid).closest('td').append('Please Wait...');
			  jQuery('#admin_'+appid).hide(); 
		 }else{
			 ///jQuery(this).closest('tr').remove();
		 }*/
		     
		 
		 //jQuery("#showmessage").html('');
		 //jQuery("#showmessage").html('Check out completed.');		
				
		 
		//jQuery('#'+appid).hide(); 
		//console.log(appid);
	    jQuery.ajax({
		  url:'wiphy_adjudicator_action',
		  type:'post',
		  data:{'appid':appid,
		        'insstatus':insstatus,
		        'adjtype':'updateinsurance',
		  },
		  success:function(data){
			   alert('Insurace verification done successfully.');
		 //jQuery("#insmsg").html('');
		 //jQuery("#insmsg").html('Insurace verification done successfully.');		
  
		  }
		  
	  })  
		
	})
  
	//end added on 13-07-2017

 jQuery("#reasonDD").on('change', function() {

    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if(valueSelected ==""){
    	jQuery('.show_success').html("");
    	jQuery('.show_error').html("Please select a reason.");
    }else{
    	jQuery('.show_error').html("");
    }
});



//added on 13-07-2017
jQuery(".savereason").live('click',function(){  
  
		 var appids = jQuery('#checkin-reason').val();
		 var reasonddvalue = jQuery("#reasonDD option:selected").text();
		 var reasonddkey = jQuery("#reasonDD option:selected").val();
		 if(reasonddkey == ""){
			jQuery('.show_error').html("Please select a reason.");
		 	return false;
		 } else {
         jQuery('.show_error').html("");
	     jQuery.ajax({
		  url:'wiphy_adjudicator_action',
		  type:'post',
		  data:{'appid':appids,
		        'reasonddvalue':reasonddvalue,
		        'adjtype':'checkinreason',
		  },
		  success:function(data){
		  	console.log('result data '+data);
		  	jQuery(".show_success").html("Reason submitted successfully.");
		  	//console.log(data);
		    //alert('Reason submitted successfully.');
		 
  
		  }
		  
	  }) 

    }


		
	})
  	
});