<?php 
//hook menu
   /*function appointment_checking_form($form, &$form_state){
    
    // get all previous appointments
   	$applicationid = arg(1);
    $patientid = arg(2);
    $currentDate = date('m/d/Y');
     
    $serviceUrl =  "https://wiphy-api.inadev.net/emrservices-dev/patient/7470/schedule?emr_id=1&date=08/28/2017";
    
    //$serviceUrl =  "https://wiphy-api.inadev.net/emrservices-dev/patient/".$patientid."/schedule?emr_id=1&date=".$currentDate."";
    $data = array();
    $data_string = json_encode($data);
    $data_result = request_type($serviceUrl,$data_string);
    

    $form['#theme'] = 'appointment_checking_form'; 
    if($data_result['status_message'] == 'ok'){
     $i=0; 
     foreach($data_result['result'] as $value){
              
      $starttime = explode(' ', $value['StartTime']);

       $form['appontmentData'] = array(
       '#type' => 'container',
       '#attributes' => array( 
        'class'=> array('contact-info'),
        ),
      ); 
       
       $form['appontmentData'][$i]['StartTime'] = array(
        '#markup' => $starttime[1].' '.$starttime[2],
        );

       $form['appontmentData'][$i]['DoctorName'] = array(
       '#markup' => $value['DoctorName'],
        );

       $i++;
     }

     

    


    }
    if($data_result['status_message'] == 'NOT_FOUND'){ 
      
    


    }
 
   
   return $form;

   }*/

   