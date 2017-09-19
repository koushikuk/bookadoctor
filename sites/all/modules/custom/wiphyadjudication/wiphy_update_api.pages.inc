<?php
////////////////////////Update API call/////////////////////////////

function call_lambda($new_data){
	
	global $user;
 	$serviceUrl = variable_get('update_api_url','');
	$encryptedBlank = fnEncrypt("");
	$app_id = trim($new_data['appid']);
	$data_result = fetch_wiphylambda_data($app_id);

   
        	 
    $first_name = $data_result['result'][0]['applicationData']['biographic']['name']['firstName']; 
	$last_name = $data_result['result'][0]['applicationData']['biographic']['name']['lastName']; 
	$birthdate = $data_result['result'][0]['applicationData']['biographic']['dob']; 
	$sexcode = $data_result['result'][0]['applicationData']['biographic']['sex']; 
	$emrId = $data_result['result'][0]['emrId']; 
	$facialIDEMRVerified = $data_result['result'][0]['facialIDEMRVerified']; 
	$manuallyVerified = $data_result['result'][0]['manuallyVerified'];
	$facilityId = $data_result['result'][0]['facilityId'];
	$applicationStatus = $data_result['result'][0]['applicationStatus'];  
	$startTime = $data_result['result'][0]['startTime']; 
	$endTime = $data_result['result'][0]['endTime']; 
	$checkInTime = $data_result['result'][0]['checkInTime']; 
    $patientId = $data_result['result'][0]['patientId']; 
    $checkEmrBalance = $data_result['result'][0]['patientId'];
    $hasInsurance =  $data_result['result'][0]['hasInsurance'];
	 

	
	  
	if($new_data['adjtype']=='facialIDEMRVerified'){

    
	$facialIDEMRVerified = $new_data['facialIDEMRVerified']; 
	$manuallyVerified = $new_data['manuallyVerified'];		
	$applicationStatus = fnDecrypt($data_result['result'][0]['applicationStatus']);
	
	if($applicationStatus!='VERIFIED_BY_ADJUDICATOR'){
	 $applicationStatus = fnEncrypt('VERIFIED_BY_ADJUDICATOR');
	 $lambda_data =  array(
		'applicationData' => array(
			'biographic' => array(	
			                   "dob" => $birthdate,
							   "name"=>array("firstName" => $first_name,
											 "lastName" => $last_name),
								"sex" => $sexcode,	 
					 ),	
							      						
	    ),
 		"applicationId" => $app_id,
		"applicationStatus" => $applicationStatus,
		"emrId" => "1",
		"facilityId" => "1",
		"facialIDEMRVerified" => $facialIDEMRVerified,
		//"manuallyVerified" => $manuallyVerified,
		"manuallyVerified" => $new_data['manuallyVerified'],
		"facialIDDLVerified"=> $new_data['facialIDDLVerified'],
		"createPatient"=> "false",
		"createPolicyHolder"=> "false",
		"hasInsurance" => $hasInsurance
 	);
	         
	$data_string = json_encode($lambda_data);
 
	// Make the request
	$result = request_wiphycurl($serviceUrl, $data_string); 
  }
 }if($new_data['adjtype']=='checkins'){

	 $applicationStatus = fnEncrypt('COMPLETED');
	 $lambda_data =  array(
		'applicationData' => array(
			'biographic' => array(	
			                   "dob" => $birthdate,
							   "name"=>array("firstName" => $first_name,
											 "lastName" => $last_name),
								"sex" => $sexcode,	 
					 ),	
							      						
	      ),
 		"applicationId" => $app_id,
		"applicationStatus" => $applicationStatus,
		"emrId" => "1",
		"facilityId" => "1",
		"facialIDEMRVerified" => $facialIDEMRVerified,
		"manuallyVerified" => $manuallyVerified,
		"createPatient"=> "false",
		"createPolicyHolder"=> "false",
		"hasInsurance" => $hasInsurance
 
	);
	         
	$data_string = json_encode($lambda_data);
	// Make the request
	 
	$result = request_wiphycurl($serviceUrl, $data_string);  
 }
if($new_data['adjtype']=='CHECK_OUT_COMPLETED'){

	 $applicationStatus = fnEncrypt('CHECK_OUT_COMPLETED');
	 $lambda_data =  array(
		'applicationData' => array(
			'biographic' => array(	
			                   "dob" => $birthdate,
							   "name"=>array("firstName" => $first_name,
											 "lastName" => $last_name),
								"sex" => $sexcode,	 
					 ),	
							      						
	      ),
 		"applicationId" => $app_id,
		"applicationStatus" => $applicationStatus,
		"emrId" => "1",
		"facilityId" => "1",
		"facialIDEMRVerified" => $facialIDEMRVerified,
		"manuallyVerified" => $manuallyVerified,
		"reasonForCheckIn" => "System Checked out",
		"createPatient"=> "false",
		"createPolicyHolder"=> "false",
		"hasInsurance" => $hasInsurance
 
	);
	        
	$data_string = json_encode($lambda_data);
	// Make the request
	$result = request_wiphycurl($serviceUrl, $data_string);  
 } 
 
 // added on 13-07-2017
  if($new_data['adjtype']=='updateinsurance'){
   if($new_data['insstatus'] == 'ok'){
	   $ins_status = 'true';
   }
  if($new_data['insstatus'] == 'notok'){
	   $ins_status = 'false';
   }
 
	 $lambda_data =  array(
		'applicationData' => array(
			'biographic' => array(	
			                   "dob" => $birthdate,
							   "name"=>array("firstName" => $first_name,
											 "lastName" => $last_name),
								"sex" => $sexcode,	 
					 ),	
							      						
	      ),
 		"applicationId" => $app_id,
		"applicationStatus" => $applicationStatus,
		"emrId" => "1",
		"facilityId" => "1",
		"facialIDEMRVerified" => $facialIDEMRVerified,
		"manuallyVerified" => $manuallyVerified,
		"insuranceVerified" => $ins_status,
		"createPatient"=> "false",
		"createPolicyHolder"=> "false",
		"hasInsurance" => $hasInsurance
	
	);
	        
	$data_string = json_encode($lambda_data);
	// Make the request
	$result = request_wiphycurl($serviceUrl, $data_string);  
 } 

 // for update checkin reason 

  // added on 13-07-2017
  if($new_data['adjtype']=='checkinreason'){
 	 
  if($applicationStatus == 'EV+hQ05jeULVypjvhUAdqtr6rSV2r7z0zLDJb4bfIio='){
	 $lambda_data =  array(
		'applicationData' => array(
			'biographic' => array(	
			                   "dob" => $birthdate,
							   "name"=>array("firstName" => $first_name,
											 "lastName" => $last_name),
								"sex" => $sexcode,	 
					 ),	
							      						
	      ),
 		"applicationId" => $app_id,
		"applicationStatus" => $applicationStatus,
		"emrId" => "1",
		"facilityId" => $facilityId,
        "reasonCheckInFailure" => $new_data['reasonddvalue'],
        "patientId" => $patientId, 
 		"createPatient"=> "false",
		"createPolicyHolder"=> "false",
		"hasInsurance" => $hasInsurance
 
	);
  }else{
       $lambda_data =  array(
		'applicationData' => array(
			'biographic' => array(	
			                   "dob" => $birthdate,
							   "name"=>array("firstName" => $first_name,
											 "lastName" => $last_name),
								"sex" => $sexcode,	 
					 ),	
							      						
	      ),
 		"applicationId" => $app_id,
		"applicationStatus" => $applicationStatus,
		"emrId" => "1",
		"facilityId" => $facilityId,
        "reasonCheckInFailure" => $new_data['reasonddvalue'],
        "createPatient"=> "false",
		"createPolicyHolder"=> "false",
		"hasInsurance" => $hasInsurance
     ); 
 
    }	 

        
	$data_string = json_encode($lambda_data);
	 
	// Make the request
	$result = request_wiphycurl($serviceUrl, $data_string);  
 }
 
 
   return $result;	 
}