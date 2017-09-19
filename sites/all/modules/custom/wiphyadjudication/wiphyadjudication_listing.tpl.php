<?php global $base_url;
global $user;
 $userdetails  = user_load($user->uid);
// print  '<pre>';
// print_r($userdetails);
 foreach($userdetails->field_facility_id['und'] as $val){
 	$facility[]= $val['tid'];
 }
 //$facility = $userdetails->field_facility_id['und'][0]['tid'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="<?php echo variable_get('socket_io_url','');?>"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
	
	/* time zone count down */
	// Update the count down every 1 second

/* time zone count down function end */	
	
/* start node js call */
	
	var oTable = null;
    jQuery(function(){
        var iosocket = io.connect('<?php echo variable_get('io_connect_url','');?>');
        iosocket.on('connect', function () {
            jQuery('#showmessage').append(jQuery('<li>Connected</li>'));
            iosocket.on('message', function(message) {
                var appiD = message.applicationId;
                //jQuery("#"+appiD).closest('tr').remove();
								//var facility_Id = '<?php echo $facility; ?>';
								var facility_Id = <?php echo json_encode($facility); ?>;
								 
                                 console.log(message);
								if(message.applicationData !=undefined)	{
jQuery.ajax({
	url: '<?php echo $base_url;?>/adjudication_decrypt',
	data: { 
		'firstname': message.applicationData.biographic.name.firstName,
		'lastname': message.applicationData.biographic.name.lastName,
		'startTime': message.startTime,
		'endTime': message.endTime,
		'checkInTime':message.checkInTime,
		'checkOutTime':message.checkOutTime,
		'applicationId':message.applicationId,
		'applicationStatus':message.applicationStatus,
		'facialIDEMRVerified':message.facialIDEMRVerified,
		'facialIDDLVerified':message.facialIDDLVerified,
		'facilityId':message.facilityId,
        'insurance':message.insurance,
        'reasonCheckInFailure':message.reasonCheckInFailure,		
	},
	
	dataType: 'json',
	success: function(msg) {
    console.log('This is messgae '+JSON.stringify(msg));

    

    //console.log('Facility ID'+jQuery("select#edit-fac-id option").filter(":selected").val()); 
    //console.log('Facility Name'+jQuery("select#edit-fac-id option").filter(":selected").text());
    var selFacilityID = jQuery("select#edit-fac-id option").filter(":selected").val();
if(msg.firstname!='' && msg.lastname!=''){
  if(typeof(msg.endTime) =='undefined') {
  
		var endTime = '';
	} else {
	    var endTime = msg.endTime;	
	}
if(msg.rawEndTime > 0 && msg.rawcheckInTime == 0 && msg.applicationStatus!=='COMPLETED' && msg.reasonCheckInFailure == null) {
	
 	var wattingtime = '<div class = "wait" id="lapsetime_'+ msg.applicationId +'"></div>';
	getTimer(msg.rawEndTime,msg.applicationId); 
}
else if (msg.rawEndTime > 0 && msg.rawcheckInTime > 0 && (msg.applicationStatus=='COMPLETED' || msg.applicationStatus=='CHECK_OUT_COMPLETED')  && (msg.reasonCheckInFailure == null)){
   var wattingtime = '<div class = "waiting" id="wait_'+ msg.applicationId +'">'+msg.formatcheckInTime+'</div>';
}
 
else {
	var wattingtime = '<div class = "waittimer" id="blanktimer_'+ msg.applicationId +'">00:00:00</div>';
}

if(typeof(msg.checkInTime) =='undefined') {
 var checkInTime1 = '';
} else{ 
var checkInTime1 = msg.checkInTime;	
}


if(msg.rawcheckInTime > 0){
	var checkInTime = checkInTime1;
}else {
	var checkInTime = '00:00:00';
}
if(msg.rawcheckOutTime > 0){
	var checkOutTime = msg.checkOutTime;
}else {
	var checkOutTime = '00:00:00';
}

/*if(msg.insurance=='yes'){
var insurance_card ='<button type="button"  class="testclass" data-toggle="modal" data-target="#edit-modal" id="'+msg.applicationId+'">Insurance</button>';
}else {
	var insurance_card ='';
}*/

if(msg.insurance !== null ){
   
   var insstatus = 'yes';
   var insurance_card ='<button type="button" class="testclass" data-toggle="modal" data-target="#edit-modal" id="'+'insdata_'+msg.applicationId+'">Insurance</button>';
}else {
	var insstatus = 'no';
	 var insurance_card = '';

}

 // continue application 
   if(msg.applicationStatus !="CHECK_OUT_COMPLETED"){ 
        var continueapp = '<button type="button" id="checkinreason_'+msg.applicationId+'" name="contineapp">Continue</button>';
   }else{
   	  var continueapp = '&nbsp;';
   }




   if((msg.reasonCheckInFailure !== null) || (msg.applicationStatus =="COMPLETED") || (msg.applicationStatus =="CHECK_OUT_COMPLETED")) {
  
  //if(msg.reasonCheckInFailure !== null){
     var checkin_reason = '<button type="button" class="reasonclass" data-toggle="modal" data-target="#checkin_reason-modal" id="checkinreason_'+msg.applicationId+'" disabled="disabled">Reason</button>';

  }else {
     var checkin_reason = '<button type="button" class="reasonclass" data-toggle="modal" data-target="#checkin_reason-modal" id="checkinreason_'+msg.applicationId+'">Reason</button>';

  }

    if(msg.reasonCheckInFailure !== null){
       var disabledValue = 'disabled="disabled"';
     } else {
        var disabledValue = "";
     }


/*if((msg.applicationStatus!=='COMPLETED') && (msg.applicationStatus!=='CHECK_OUT_COMPLETED')){
	var checkin_reason = '<button type="button" class="reasonclass" data-toggle="modal" data-target="#checkin_reason-modal" id="checkinreason_'+msg.applicationId+'">Reason</button>';
   }else{
   	  var checkin_reason = '&nbsp;';
   }*/



var rawEndTime = msg.rawEndTime; 
  
<?php if(in_array('adjudicator', $user->roles)) {	?>	

if(jQuery.inArray(msg.facilityId, facility_Id) !== -1){

 if((msg.facilityId === selFacilityID) || (selFacilityID === 0)){	
 if(((msg.applicationStatus =='VERIFIED_BY_ADJUDICATOR') || (msg.applicationStatus =='REG_COMPLETED')) && ((msg.facialIDEMRVerified=='true')  && (msg.facialIDDLVerified == 'true')) &&  (msg.rawEndTime > 0 ) && (msg.insurance == null)){
  
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();
											
		  oTable.row.add( { 
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		   "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" data-appid="'+insstatus+'" value="Check In" id="'+'admin_'+msg.applicationId+'" type="button" '+disabledValue+'>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
}

  
 else if((msg.applicationStatus !='VERIFIED_BY_ADJUDICATOR') && ((msg.facialIDEMRVerified=='true') && (msg.facialIDDLVerified == 'false')) &&  (rawEndTime >=0 )){
   
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();
											
		  oTable.row.add( { 
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		   "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input name="idverified" value="Verify ID" data-appid="'+insstatus+'" class="verifiedids" id="'+msg.applicationId+'" type="button" '+disabledValue+'>',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" disabled>',
          "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
} 

										 
								
else if (msg.applicationStatus =='COMPLETED'){		
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();

	    oTable.row.add( {
                          "firstname":  msg.firstname,
                          "lastname":   msg.lastname,
						  "created_date": msg.createdDate,
                          "starttime":  msg.startTime,
						  "endTime":    endTime,
						   "check_in":  checkInTime,
                           "check_out": checkOutTime,
						  "wattingtime":wattingtime,
                          "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
                          "insurance_card":insurance_card,
                          "checkin_reason":checkin_reason,
						  "checkin":'<input name="checkout" class="checkout" value="Checkout" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" '+disabledValue+'>',
						  "continueapp" : continueapp,
                          "updateTime":  message.updateTime
                        } ).draw();
											
		  
}


else if (msg.applicationStatus =='CHECK_OUT_COMPLETED'){		
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();

	    oTable.row.add( {
                          "firstname":  msg.firstname,
                          "lastname":   msg.lastname,
						  "created_date": msg.createdDate,
                          "starttime":  msg.startTime,
						  "endTime":    endTime,
						  "check_in":  checkInTime,
                          "check_out": checkOutTime,
						  "wattingtime":wattingtime,
                      "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
	                  "insurance_card":insurance_card,
	                  "checkin_reason":checkin_reason,
					  "checkin":'<input type="text" name="appid"  value="Completed" data-appid="'+insstatus+'" id="'+msg.applicationId+'" readonly="false" style="color:green;border:none;background:none">',
					  "continueapp" : continueapp,
                          "updateTime":  message.updateTime
                        } ).draw();
											
		  
}

else if(((msg.facialIDEMRVerified =='false') || (msg.facialIDDLVerified =='false')) &&  (rawEndTime>=0)){	
 	
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();							
		  oTable.row.add( {  
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		    "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input name="idverified" value="Verify ID" data-appid="'+insstatus+'" class="verifiedids" id="'+msg.applicationId+'" type="button" '+disabledValue+'>',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In"  data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" disabled>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
}	

							
else if(((msg.facialIDEMRVerified =='true') || (msg.facialIDDLVerified =='true')) &&  (rawEndTime==0)){	
 	
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();								
		  oTable.row.add( { 
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		    "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" disabled>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
}                       
					   
else if(((msg.facialIDEMRVerified =='true') && (msg.facialIDDLVerified =='true')) &&  (rawEndTime>0)){	
 	
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();									
		  oTable.row.add( {
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		   "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" '+disabledValue+'>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
} else {
  
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
			
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();							
		  oTable.row.add( {  
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		    "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input name="idverified" value="Facial Status Pending" class="verifiedids" id="'+msg.applicationId+'" type="button" disabled>',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" disabled>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();

     

	
    }											
										
  }
}
	<?php } ?>									 
	<?php if((in_array('administrator', $user->roles)) || (in_array('wiphy_adjudicator_admin', $user->roles))) { ?>
		
	if((msg.facilityId == selFacilityID) || (selFacilityID == 0)){
   									
   if(((msg.applicationStatus =='VERIFIED_BY_ADJUDICATOR') || (msg.applicationStatus =='REG_COMPLETED')) && ((msg.facialIDEMRVerified=='true')  && (msg.facialIDDLVerified == 'true')) &&  (rawEndTime > 0 )){		
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
	  	
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();	
        	  
		  oTable.row.add( {
		  "facility_name":msg.facility_name,	  
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		    "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="'+'admin_'+msg.applicationId+'" type="button" '+disabledValue+'>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
}  

else if((msg.applicationStatus !='VERIFIED_BY_ADJUDICATOR') && ((msg.facialIDEMRVerified=='true') && (msg.facialIDDLVerified == 'false')) &&  (rawEndTime >=0 )){

	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();
											
		  oTable.row.add( { 
		  "facility_name":msg.facility_name,
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		    "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input name="idverified" value="Verify ID" data-appid="'+insstatus+'" class="verifiedids" id="'+msg.applicationId+'" type="button" '+disabledValue+'>',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" disabled>',
           "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
} 											 
								
//else if (msg.applicationStatus =='COMPLETED' && (endTime!='' && typeof endTime!='undefined')){
else if (msg.applicationStatus =='COMPLETED'){
                
						oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
                          .remove()
                          .draw();
													
						oTable.row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
                          .remove()
                          .draw();
                  
                          oTable
                          .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
                          .remove()
                          .draw();
													
													oTable
                          .row( jQuery("#"+msg.applicationId+'_checkbox').closest('tr'))
                          .remove()
                          .draw();
						  
						  oTable.row.add( {
						  "facility_name":msg.facility_name,
                          "firstname":  msg.firstname,
                          "lastname":   msg.lastname,
						  "created_date": msg.createdDate,
                          "starttime":  msg.startTime,
						  "endTime":    endTime,
						  "check_in":  checkInTime,
                          "check_out": checkOutTime,
						  "wattingtime":wattingtime,
                          "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
                          "insurance_card":insurance_card,
                          "checkin_reason":checkin_reason,
						  "checkin":'<input name="checkout" class="checkout" value="Checkout" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" '+disabledValue+'>',
						  "continueapp" : continueapp,
                          "updateTime":  message.updateTime
                        } ).draw();
											
		  
}

else if (msg.applicationStatus =='CHECK_OUT_COMPLETED'){  
 oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
 .remove()
 .draw();
             
  oTable
   .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
   .remove()
   .draw();
    
    
   oTable
   .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
   .remove()
   .draw();

     oTable.row.add( {
		"facility_name":msg.facility_name, 
        "firstname":  msg.firstname,
        "lastname":   msg.lastname,
		"created_date": msg.createdDate,
        "starttime":  msg.startTime,
        "endTime":    endTime,
		"check_in":  checkInTime,
          "check_out": checkOutTime,
        "wattingtime":wattingtime,
		"facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
	   "insurance_card":insurance_card,
	   "checkin_reason":checkin_reason,
	   "checkin":'<input type="text" name="appid"  value="Completed" data-appid="'+insstatus+'" id="'+msg.applicationId+'" readonly="false" style="color:green;border:none;background:none">',
	   "continueapp" : continueapp,
	 "updateTime":  message.updateTime
      } ).draw();
           
    
}

else if(((msg.facialIDEMRVerified =='false') || (msg.facialIDDLVerified =='false')) &&  (rawEndTime>=0)){		
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();							
		  oTable.row.add( {
		  "facility_name":msg.facility_name,	  
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		    "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input name="idverified" value="Verify ID"  data-appid="'+insstatus+'" data-appid="'+insstatus+'"  class="verifiedids" id="'+msg.applicationId+'" type="button" '+disabledValue+'>',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'"  id="admin_'+msg.applicationId+'" type="button" disabled>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
}	

							
else if(((msg.facialIDEMRVerified =='true') || (msg.facialIDDLVerified =='true')) &&  (rawEndTime==0)){		
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();
										
		  oTable.row.add( {
		  "facility_name":msg.facility_name,	  
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		    "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" disabled>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
}                       
					   
else if(((msg.facialIDEMRVerified =='true') && (msg.facialIDDLVerified =='true')) &&  (rawEndTime>0)){		
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
				
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();
		 								
		  oTable.row.add( {
		  "facility_name":msg.facility_name,
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		   "endTime":     endTime,
		    "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input type="checkbox" name="verified" value="verified" checked="checked" disabled="disabled">',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" '+disabledValue+'>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();

} else {
 	 
 	
	oTable.row( jQuery("#"+msg.applicationId).closest('tr') )
	.remove()
	.draw();
													
	 oTable
	  .row( jQuery("#"+'adjudicator_'+msg.applicationId).closest('tr') )
	  .remove()
	  .draw();
				
					
	  oTable
	  .row( jQuery("#"+'admin_'+msg.applicationId).closest('tr'))
	  .remove()
	  .draw();
		  								
		  oTable.row.add( {
		  "facility_name":msg.facility_name,	  
		  "firstname":  msg.firstname,
		  "lastname":   msg.lastname,
		  "created_date": msg.createdDate,
		  "starttime":    msg.startTime,
		  "endTime":     endTime,
		  "check_in":  checkInTime,
          "check_out": checkOutTime,
		   "wattingtime":wattingtime,
		  "facialIDEMRVerified": '<input name="idverified" value="Facial Status Pending" class="verifiedids" id="'+msg.applicationId+'" type="button" disabled>',
		  "insurance_card":insurance_card,
		  "checkin_reason":checkin_reason,
		  "checkin":'<input name="checkin" class="checkins" value="Check In" data-appid="'+insstatus+'" id="admin_'+msg.applicationId+'" type="button" disabled>',
		  "continueapp" : continueapp,
		  "updateTime":  message.updateTime
		} ).draw();
	 
  }
	
}							
<?php } ?>	

			 }
			 
			},
            type: 'POST'
          });
	}              
});
            
            
            
            iosocket.on('disconnect', function() {
                jQuery('#showmessage').append('<li>Disconnected</li>');
            });

            window.onbeforeunload = function () {
                    iosocket.disconnect();
            };
        });
    });
	
</script>
 
<style type="text/css">
	.dataTables_filter, .dataTables_info { display: none; }
</style>
<?php 
global $user;
$userid = $user->uid;
 //print fnDecrypt("ECmkcAiHXfiEWfVwdTT0qg==");

 

?>
<div class="col-xs-12 no-left-padding no-right-padding">	
<div class="body-heading ">
	<p>Adjudication Queue</p>
</div></div> 
<div class="adjudicationQueue">
	
	<div class="col-xs-12 no-left-padding no-right-padding selection-panel">
		<label for="all"></label>
		<div class="col-sm-4 no-right-padding">
			<?php 
			
			   $form['#attributes']=array('class'=> array('listChoice'));
			    print render($form['fac_id']);?>
		</div>
		<div class="col-sm-8 no-right-padding">
			<div class="col-xs-10 col-sm-12 btnLeft no-left-padding no-right-padding">
				<?php print drupal_render_children($form);?>
			</div>
		</div>

	</div>
</div>
<div id="adjudicationQueueTbl">
<table id="adjdata" class="table adjudicationQueueTable" cellspacing="0" width="100%">
    <thead>
        <tr>
<?php 
if((in_array('administrator', $user->roles)) || (in_array('wiphy_adjudicator_admin', $user->roles))) { 

  $facility_name= '<th>Facility Name</th>';
  $data  =  '{ "data": "facility_name" },';
	$hidden  = 'oTable.column(14).visible(false)';
	$order = '"order": [[ 14, "desc" ]],';
} 
if(in_array('adjudicator', $user->roles)) {	 
 $hidden  = 'oTable.column(13).visible(false)';
 $order = '"order": [[ 13, "desc" ]],';
 
}
?>        <?php echo  $facility_name;?>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Created Date</th>
            <th>Start Time</th>
			<th>Finish Time</th>
			<th>Checkin Time</th>
			<th>Checkout Time</th>
			<th>Waiting Time</th>
            <th>Facial ID Status</th>
			<th>Insurance Card</th>
			<th>Reason</th>
            <th>Check In/ Check Out</th>
            <th>Action</th>
			<th>Update Time</th>

        </tr>
    </thead>
</table>
 </div>
 <script type="text/javascript">
 	jQuery(document).ready(function() {
	 //var timezone_offset_minutes = new Date().getTimezoneOffset();
	 // timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;
      


    var tz = jstz.determine();
    var tzname = tz.name();
    /* var c = moment.tz(1496733843930, name);
    current_time= c.format();
    console.log("Current Time : "+current_time);*/
   
     //calculateTimeDiff('1496910434618');
     // php timer starts  


     // php timer end 
     
	  jQuery.ajax({
	    url:'get_timezone',
		data:{'timezone_offset_minutes':tzname},
		type:'POST',
		success: function(data) {
			//console.log("Current Timezone : - "+data);
		   var appid = jQuery(this).attr('id');
      oTable = jQuery('#adjdata').DataTable( {
			  //"order": [[ 6, "desc" ]],
				<?php echo $order ; ?>
		  "sPaginationType": "full_numbers",
		  "iDisplayLength": 10, 
		  "bRetrieve": true,       
 		  "sAjaxSource": "wiphyadjudication_datasource",
            "initComplete": function( settings, json ) { 
			
			jQuery('body').on('click','.testclass',function(e){ 
			   var insID =this.id;
			    $.ajax({
                cache: false,
                 type: 'POST',
                 url: 'showinsurance',
                 data: 'insID='+insID,
                 success: function(data) 
                 {
					  
                    //$modal.find('.edit-content').html(insID);
					 jQuery('.edit-content').html(data);
					 console.log(data);
                  }
                });
  
			})
			
		 jQuery('body').on('click','#closeme',function(){
         jQuery('.edit-content').html('');
			
		   }
 		 )
			
       //--------------------------------// 
      jQuery('body').on('click','.reasonclass',function(e){ 
      	       $('#reasonDD').val('');
      	       $(".show_success").html("");
			   var reasonID =this.id;
			    $.ajax({
                cache: false,
                 type: 'POST',
                 url: 'showreasons',
                 data: 'reasonID='+reasonID,
                 success: function(data) 
                 {
					  
                    //$modal.find('.edit-content').html(insID);
					 //$('.checkin-reason').text(data);
					 jQuery('#checkin-reason').val(data);
					 console.log(data);
                  }
                });
  
			})
			
		    jQuery('body').on('click','#closeme',function(){
            //$('.notcheckin-reason').html('');
			
		   }
 		 )

 

       //----------------------// 
           var container1  = jQuery(".timediv");
           container1.each(function(index, node) {  //console.log('======'+jQuery(node).text());
       var currentNode =  jQuery(node).text();
      
       var format = /[-]/;
      
              // console.log('-----'+currentNode);
              if(format.test(currentNode)){
                //console.log('true');
                jQuery(this).removeClass('timediv').addClass( "timecomplete" );
                var timeDiff = jQuery(this).text().split("-");
                var newtime = timeDiff[0]+':'+timeDiff[1]+':'+timeDiff[2]; 
                //console.log(' ==== '+newtime); 
                jQuery(this).html(newtime);

              }else {
                //console.log('false');
              }
       
    });
    
        var containers  = jQuery(".timediv");
    var times = [];
    var now = new Date();

    containers.each(function(index, node) {
        var values = jQuery(node).text().split(":");


        times[index] = new Date(
            now.getFullYear(), now.getMonth(), now.getDate(),
            values[0], values[1], values[2]).getTime();
    });

    setInterval(function() {
        containers.each(function(index, node) {
            times[index] += 1000;

            var date = new Date(times[index]);
            var values = [date.getHours(), date.getMinutes(), date.getSeconds()];

            for (var i = 0; i < 3; i++)
                if (values[i] < 10)
                    values[i] = "0" + values[i];

            jQuery(node).text(values.join(":"));
        });

    }, 1000);   


        //---------------------------------//
 jQuery(".paginate_button").live('click', function(){
   
    var container1  = jQuery(".timediv");
    container1.each(function(index, node) {  //console.log('======'+jQuery(node).text());
       var currentNode =  jQuery(node).text();
      
       var format = /[-]/;
      
              // console.log('-----'+currentNode);
              if(format.test(currentNode)){
                //console.log('true');
                jQuery(this).removeClass('timediv').addClass( "timecomplete" );
                var timeDiff = jQuery(this).text().split("-");
                var newtime = timeDiff[0]+':'+timeDiff[1]+':'+timeDiff[2]; 
                //console.log(' ==== '+newtime); 
                jQuery(this).html(newtime);

              }else {
                //console.log('false');
              }
       
    });
    
    var containers  = jQuery(".timediv");
    var times = [];
    var now = new Date();

    containers.each(function(index, node) {
       
        var values = jQuery(node).text().split(":");


        times[index] = new Date(
            now.getFullYear(), now.getMonth(), now.getDate(),
            values[0], values[1], values[2]).getTime();
    });

    setInterval(function() {
        containers.each(function(index, node) {
            times[index] += 1000;

            var date = new Date(times[index]);
            var values = [date.getHours(), date.getMinutes(), date.getSeconds()];

            for (var i = 0; i < 3; i++)
                if (values[i] < 10)
                    values[i] = "0" + values[i];

            jQuery(node).text(values.join(":"));
        });

     
           
 
      }, 1000);

  });

        //-------------------------------------//
        },
 		  
          "columns": [
		    <?php echo $data;?>
            { "data": "firstname" },
            { "data": "lastname" },
            { "data": "created_date" },
            { "data": "starttime" },
			{ "data": "endTime" },
			{ "data": "check_in"},
			{ "data": "check_out"},
			{ "data": "wattingtime","className" : "timediv",},
            { "data": "facialIDEMRVerified"},
			{"data" : "insurance_card"},
			{"data" : "checkin_reason"},
            {"data": "checkin" },
            {"data": "continueapp" },
			{"data": "updateTime" }
			//{"defaultContent": "<button>Check In</button>"}
        ],
      	
     } );
      jQuery('#adjdata thead th').removeClass('timediv');

      // set timer for php
  /* jQuery(".paginate_button").live('click', function(){
   setTimeout(function(){  
    var container1  = jQuery(".timediv");
    container1.each(function(index, node) {  //console.log('======'+jQuery(node).text());
			 var currentNode =  jQuery(node).text();
			
			 var format = /[-]/;
			
              // console.log('-----'+currentNode);
              if(format.test(currentNode)){
              	//console.log('true');
              	jQuery(this).removeClass('timediv').addClass( "timecomplete" );
                var timeDiff = jQuery(this).text().split("-");
                var newtime = timeDiff[0]+':'+timeDiff[1]+':'+timeDiff[2]; 
                console.log(' ==== '+newtime); 
                jQuery(this).html(newtime);

              }else {
              	//console.log('false');
              }
       
		});
    
        var containers  = jQuery(".timediv");
		var times = [];
		var now = new Date();

		containers.each(function(index, node) {
			 
 		    var values = jQuery(node).text().split(":");


		    times[index] = new Date(
		        now.getFullYear(), now.getMonth(), now.getDate(),
		        values[0], values[1], values[2]).getTime();
		});

		setInterval(function() {
		    containers.each(function(index, node) {
		        times[index] += 1000;

		        var date = new Date(times[index]);
		        var values = [date.getHours(), date.getMinutes(), date.getSeconds()];

		        for (var i = 0; i < 3; i++)
		            if (values[i] < 10)
		                values[i] = "0" + values[i];

		        jQuery(node).text(values.join(":"));
		    });

		}, 1000);
		       
 
      }, 10000);

});*/

  
	<?php echo $hidden; ?>
		 
		}
	  })	

 } );

</script>
<script type="text/javascript">
   function valueselect(facilityVal){
        $.ajax({
                    type: "POST",
                    url: '/getFacilityTid',//url to file
                    data: {facID:facilityVal},
                    success: function(data){
                    //success
                      }

                    });
              
       window.location.href="/adjudication-queue";
    }	
 
</script>


    <script type="text/javascript">
function addZeroBefore(n) {
  return (n < 10 ? '0' : '') + n;
}	
	
function getTimer(countDownDate,uniqueDiv){

	var x = setInterval(function() {

	 
	  var now = new Date().getTime();

	  var distance = now - countDownDate;

	  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

         
         var format = "" 
               
                + (
                      hours !== 0 ? addZeroBefore(hours) +' : ' :"00 : "
                )
                + (
                      minutes !== 0 ? addZeroBefore(minutes) +' : ' :"00 : "
                 )
               + (
                      seconds !== 0 ? addZeroBefore(seconds) +'' :"00"
                 );
				 
				  jQuery("#lapsetime_"+uniqueDiv).html(format);
				  
         //document.getElementById("lapsetime_"+uniqueDiv).innerHTML = format;
		  
        
	  // If the count down is finished, write some text
	  if (distance < 0) {
	    clearInterval(x);
	    jQuery("#lapsetime_"+uniqueDiv).html('00:00:00');
	  }
	}, 1000);

	}
function calculateTime(rawEndTime,checkInTime,uniqueDiv){
	
     var x = setInterval(function() {
	  var distance = checkInTime - rawEndTime;

	  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

         
         var format = "" 
               
                + (
                      hours !== 0 ? hours +' : ' :"00 : "
                )
                + (
                      minutes !== 0 ? minutes +' : ' :"00 : "
                 )
               + (
                      seconds !== 0 ? seconds +'' :"00"
                 );
				if(distance > 0){
                 clearInterval(x);					
				  jQuery("#wait_"+uniqueDiv).html(format);
				} 
         //document.getElementById("lapsetime_"+uniqueDiv).innerHTML = format;
		  
        
	  // If the count down is finished, write some text
	  
	}, 1000);
				 
         
}	
	
  </script>
  <?php
 // Added on 13-17-2017
  if(!(in_array('administrator',$user->roles))){ 
?>
   <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
				  <div id="insmsg"></div>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <h4 class="modal-title" id="myModalLabel">Insurace Details</h4>
                </div>
                <div class="modal-body edit-content">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="" data-dismiss="modal" id="closeme">Close</button>
                </div>
            </div>
        </div>
    </div>
  
  <!-- Checkin Reason popup start-->
   <div id="checkin_reason-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
				  <div id="insmsg"></div>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <h4 class="modal-title" id="myModalLabel">Please select reason for not checking in</h4>
                </div>
                <fom method="post" id="reasonform">
                 <div class="col-xs-12">
                 <div class="show_success" style="color: green;font-weight: bold;"></div>
                 <div class="show_error" style="color:red;"></div>
                  <div class="form-group">
                 <label for="sel1">Select Reason:</label>
                   <?php
                    $reasonDDArray = array();
			        $vocabulary = taxonomy_vocabulary_machine_name_load('checkin_reason');

			     	$vocabulary_vid = $vocabulary->vid;
				    $terms = taxonomy_get_tree($vocabulary_vid,0,NULL,TRUE);

			     foreach($terms as $key=>$val){

			        $key = $val->name;
					$value = $val->name;
					$reasonDDArray[$key] = $value; 

			      }

                 $newValue = array(''=>'--Select--');
                 $reasonDDArray = array_merge($newValue,$reasonDDArray);
                 ?>
			     
			      <select name="reasonDD" id="reasonDD" class="form-control" style="width:auto;">
			      <?php foreach($reasonDDArray as $key => $val) {
			      print '<option value="'.$key.'">'.$val.'</option>';
			       } ?>
			    
			      </select><br><br>
  
                  <div class="modal-body notcheckin-reason">
                  <input type="hidden" name="reason_appid" id="checkin-reason" value="" >

                 </div>
                 <input type="button" name="savereason" class="savereason" value="Submit">  

                   </div>
                </div>
                </fom>


               
                <div class="modal-footer">
                    <button type="button" class="pull-right" data-dismiss="modal" id="closeme">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Checkin Reason popup ends-->


 <?php
   } 
?> 
<script type="text/javascript">
	 $(document).ready(function(){
    $("#edit-lastweekrecord").live("click", function(){ 
       $('#wiphyadjudication-listing-form').submit();
      }
     )
  }
); 
</script>