<?php
include_once("AES.php");	

function return_driver_licence_data(){
	$result = fetch_lambda_data('dbic5t7b6sbbqks2o3a97u9f2q');
	
	////////// Image value /////
	foreach ($result['applicationData']['documents'] as $val) {
	  $filetype = fnDecrypt($val['FileType']['type']);
    $filename = fnDecrypt($val['FileType']['filename']);
	 if ($filetype == 'drivingLicense') {
            $extension = fnDecrypt($val['FileType']['extension']);
            // Call curl for post file data
            $ch = curl_init($filename);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            //curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: ' . $extension . ''));
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $requestJSON);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);


            //print_r($response);
            $imageData = base64_encode($response);

            // Format the image SRC:  data:{mime};base64,{data};
            $src = 'data:' . $extension . ';base64,' . $imageData;
						
						$data['drivingLicensesrc'] = $src;
	  }
		if ($filetype == 'passport') {
            $extension = fnDecrypt($val['FileType']['extension']);
            // Call curl for post file data
            $ch = curl_init($filename);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            //curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: ' . $extension . ''));
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $requestJSON);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);


            //print_r($response);
            $imageData = base64_encode($response);

            // Format the image SRC:  data:{mime};base64,{data};
            $src = 'data:' . $extension . ';base64,' . $imageData;
						
						$data['passportsrc'] = $src;
	  }
		
		if ($filetype == 'greenCard') {
            $extension = fnDecrypt($val['FileType']['extension']);
            // Call curl for post file data
            $ch = curl_init($filename);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            //curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: ' . $extension . ''));
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $requestJSON);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);


            //print_r($response);
            $imageData = base64_encode($response);

            // Format the image SRC:  data:{mime};base64,{data};
            $src = 'data:' . $extension . ';base64,' . $imageData;
						
						$data['greenCard'] = $src;
	  }
	 }
	////////////////////
	$data['program'] = fnDecrypt($result['applicationData']['program']);
	$data['suffix'] = (!empty($result['applicationData']['biographic']['name']['suffix'])) ? fnDecrypt($result['applicationData']['biographic']['name']['suffix']) : '';
				$data['dl_first_name'] = (!empty($result['applicationData']['biographic']['name']['firstName'])) ? fnDecrypt($result['applicationData']['biographic']['name']['firstName']) : '';
				$data['dl_middle_name'] = (!empty($result['applicationData']['biographic']['name']['middleName'])) ? fnDecrypt($result['applicationData']['biographic']['name']['middleName']) : '';
				$data['dl_last_name'] = (!empty($result['applicationData']['biographic']['name']['lastName'])) ? fnDecrypt($result['applicationData']['biographic']['name']['lastName']) : '';
				$data['alias'] = (!empty($result['applicationData']['biographic']['aliases'])) ? fnDecrypt($result['applicationData']['biographic']['aliases']) : '';
				$data['sexcode'] = (!empty($result['applicationData']['biographic']['sex'])) ? fnDecrypt($result['applicationData']['biographic']['sex']) : '';
				$data['birthdate'] = (!empty(fnDecrypt($result['applicationData']['biographic']['dob']))) ?   date('Y-m-d',strtotime(fnDecrypt($result['applicationData']['biographic']['dob']))) : '';
				$data['race'] = (!empty($result['applicationData']['biographic']['race'])) ? fnDecrypt($result['applicationData']['biographic']['race']) : '';
				$data['height'] = (!empty($result['applicationData']['biographic']['height'])) ? fnDecrypt($result['applicationData']['biographic']['height']) : '';
				$data['weight']= (!empty($result['applicationData']['biographic']['weight'])) ? fnDecrypt($result['applicationData']['biographic']['weight']) : '';
				$data['eyecolor'] = (!empty($result['applicationData']['biographic']['eyeColor'])) ? fnDecrypt($result['applicationData']['biographic']['eyeColor']) : '';
				$data['haircolor'] = (!empty($result['applicationData']['biographic']['hairColor'])) ? fnDecrypt($result['applicationData']['biographic']['hairColor']) : '';
				$data['birthcountry'] = (!empty($result['applicationData']['biographic']['pobCountry'])) ? fnDecrypt($result['applicationData']['biographic']['pobCountry']) : '';
				$data['birthcity'] = (!empty($result['applicationData']['biographic']['pobCity'])) ? fnDecrypt($result['applicationData']['biographic']['pobCity']) : '';
				$data['birthstate'] = (!empty($result['applicationData']['biographic']['pobState'])) ? fnDecrypt($result['applicationData']['biographic']['pobState']) : '';
				$data['telephone_no'] = (!empty($result['applicationData']['biographic']['phoneNumbers']['number'])) ? fnDecrypt($result['applicationData']['biographic']['phoneNumbers']['number']) : '';
				$data['phone_type'] = (!empty($result['applicationData']['biographic']['phoneNumbers']['type'])) ? fnDecrypt($result['applicationData']['biographic']['phoneNumbers']['type']) : '';
				$data['primary_email'] = (!empty($result['applicationData']['biographic']['primaryEmail'])) ? fnDecrypt($result['applicationData']['biographic']['primaryEmail']) : '';
				$data['secondary_email'] = (!empty($result['applicationData']['biographic']['secondaryEmail'])) ? fnDecrypt($result['applicationData']['biographic']['secondaryEmail']) : '';
				$data['ssn_no'] = (!empty($result['applicationData']['biographic']['ssn'])) ? fnDecrypt($result['applicationData']['biographic']['ssn']) : '';
				$data['addresstype'] = (!empty($result['applicationData']['biographic']['address']['addressKind'])) ? fnDecrypt($result['applicationData']['biographic']['address']['addressKind']) : '';
				$data['address1'] = (!empty($result['applicationData']['biographic']['address']['street1'])) ? fnDecrypt($result['applicationData']['biographic']['address']['street1']) : '';
				$data['address2'] = (!empty($result['applicationData']['biographic']['address']['street2'])) ? fnDecrypt($result['applicationData']['biographic']['address']['street2']) : '';
				$data['address_city'] = (!empty($result['applicationData']['biographic']['address']['city'])) ? fnDecrypt($result['applicationData']['biographic']['address']['city']) : '';
				$data['address_statecode'] = (!empty($result['applicationData']['biographic']['address']['state'])) ? fnDecrypt($result['applicationData']['biographic']['address']['state']) : '';
				$data['address_postalcode'] = (!empty($result['applicationData']['biographic']['address']['postalCode'])) ? fnDecrypt($result['applicationData']['biographic']['address']['postalCode']) : '';
				$data['address_countrycode'] = (!empty($result['applicationData']['biographic']['address']['country'])) ? fnDecrypt($result['applicationData']['biographic']['address']['country']) : '';
				$data['documents'] = (!empty($result['applicationData']['documents'])) ? $result['applicationData']['documents'] : '';
				$data['fingerPrintUploaded'] = (!empty($result['applicationData']['fingerPrintUploaded'])) ? fnDecrypt($result['applicationData']['fingerPrintUploaded']) : '';
				$data['lastStep'] = (!empty($result['applicationData']['userLastStep'])) ? fnDecrypt($result['applicationData']['userLastStep']) : '';
				$data['kbaAttempt'] = (!empty($result['applicationData']['kbaAttempt'])) ? fnDecrypt($result['applicationData']['kbaAttempt']) : '';
				$data['selfAssessment'] = (!empty($result['applicationData']['selfAssessment'])) ? fnDecrypt($result['applicationData']['selfAssessment']) : '';
				
				$_SESSION['suffix'] = $data['suffix'];
				$_SESSION['dl_first_name'] = $data['dl_first_name'];
				$_SESSION['dl_middle_name'] = $data['dl_middle_name'];
				$_SESSION['dl_last_name'] = $data['dl_last_name'];
				$_SESSION['alias'] = $data['alias'];
				$_SESSION['sexcode'] = $data['sexcode'];
				$_SESSION['birthdate'] = date('m/d/Y',strtotime(fnDecrypt($result['applicationData']['biographic']['dob'])));
				$_SESSION['race'] = $data['race'];
				$_SESSION['height'] = $data['height'];
				$_SESSION['weight'] = $data['weight'];
				$_SESSION['eyecolor'] = $data['eyecolor'];
				$_SESSION['haircolor'] = $data['haircolor'];
				$_SESSION['birthcountry'] = $data['birthcountry'];
				$_SESSION['birthcity'] = $data['birthcity'];
				$_SESSION['birthstate'] = $data['birthstate'];
				$_SESSION['telephone_no'] = $data['telephone_no'];
				$_SESSION['phone_type'] = $data['phone_type'];
				$_SESSION['primary_email'] = $data['primary_email'];
				$_SESSION['secondary_email'] = $data['secondary_email'];
				$_SESSION['ssn_no'] = $data['ssn_no'];
				$_SESSION['addresstype'] = $data['addresstype'];
				$_SESSION['address1'] = $data['address1'];
				$_SESSION['address2'] = $data['address2'];
				$_SESSION['address_city'] = $data['address_city'];
				$_SESSION['address_statecode'] = $data['address_statecode'];
				$_SESSION['address_postalcode'] = $data['address_postalcode'];
				$_SESSION['address_countrycode'] = $data['address_countrycode'];
				$_SESSION['userLastStep'] = $data['lastStep'];
				$_SESSION['kbadata'] = $data['kbaAttempt'];
				$_SESSION['selfAssessment'] = $data['selfAssessment'];
				$_SESSION['documents'] = $data['documents'];
				$_SESSION['fingerPrintUploaded'] = $data['fingerPrintUploaded'];
				
		return $data;		
}
?>