	<?php 
       $applicationData = fetch_wiphylambda_data($_SESSION['applicationid']);

        $facilityId = taxonomy_term_load($applicationData['result'][0]['facilityId']);

        $facilityName = $facilityId->name;

       //Get preconfigured location, visittype and practice location map

        $visit_type_query = new EntityFieldQuery(); 
        $visit_type_query->entityCondition('entity_type', 'node')  

        ->entityCondition('bundle', 'location_configuration')

        ->fieldCondition('field_physical_location', 'value', $facilityName, '=');  

        $visit_type_result = $visit_type_query->execute(); 

        if (isset($visit_type_result['node'])) {

          $visit_type_result_key = array_keys($visit_type_result['node']);   

          $visit_type_resultsRows = entity_load('node', $visit_type_result_key); 
    }
    $visit_type_result = $visit_type_query->execute();
        
    foreach($visit_type_resultsRows as $visit_type_rows){ 
    

     //$location_arr[]=ucfirst($visit_type_rows->field_practice_location['und'][0]['value']);
    
      $serviceLocation = $visit_type_rows->field_service_location['und'][0]['value']; 
       

     
    } 

	?>


	<div class="col-xs-12 no-left-padding no-right-padding">    
		<div class="body-heading">
			<p>Create Appointment</p>
		</div>
	</div> 
	<div class="createAppointment">
		<div class="col-xs-12 no-left-padding no-right-padding selection-panel">
 			
 			<div class="col-xs-12 no-left-padding no-right-padding createAppointmentSelect">
				<div class="col-sm-4">
					<label for="visitType">Select Visit Type</label>
					<?php
						print render($form['visit_type']);
					?>
				</div>

				<div class="col-sm-4">
					<label for="facilityLocation">Select Practice Location</label>
					<div id="pracloc"><?php
						print render($form['practice_location']);
					?></div>
				</div>
				
				<div class="col-sm-4">
					<label for="practiceLocation">Service Location</label>
					<?php 
						print render($form['service_location']);
					?>
				</div>
			</div>

  

			
			<div class="col-xs-12 no-left-padding no-right-padding createAppointmentSelect">
				<div class="col-sm-4">
					<label for="appointmentCategory">Select appointment category</label>
					<?php
						print render($form['appointment_parent_category']);
					?>
				</div>
				
				<div class="col-sm-4">
					<label for="appointmentType">Select appointment type</label>
					<?php
						print render($form['appointment_sub_category']);
					?>
				</div>	
			</div>	
				
			<div class="col-sm-4 no-right-padding createAppointmentSelect">
					<div class="col-xs-10 col-sm-12 btnLeft no-left-padding no-right-padding">
						<?php print drupal_render_children($form);?>
					</div>
				</div>
			</div>
		</div>
	</div>
  


<script type="text/javascript">
	
 
jQuery(document).ready(function() {
      
       jQuery('#edit-visit-type').on('change', function() {
    	var selectedValue = jQuery(this).find("option:selected").text();
    	jQuery.ajax({
        url: "getVisitPractice",
        data:{option : selectedValue},
        type: "POST",
        success: function(data){
            console.log(data);          
            //jQuery('select#edit-practice-location option').removeAttr("selected");
            //jQuery ("#edit-practice-location option:contains('"+data+"')").attr('selected', 'selected');
            jQuery('#pracloc').html(data);

            //console.log(setVisitType+' '+setPracticeLocation);

        }
    });
       
    });     
 	 
   //jQuery('#edit-visit-type option[value="1016"]').attr('selected', true);
    //jQuery ("#edit-visit-type option:contains('Preventative Health Service')").attr('selected', 'selected');
    //jQuery ("#edit-practice-location option:contains('Best Practices South')").attr('selected', 'selected');
     jQuery ("#edit-service-location option:contains('<?php print ucfirst($serviceLocation);?>')").attr('selected', 'selected');
 



});

</script>