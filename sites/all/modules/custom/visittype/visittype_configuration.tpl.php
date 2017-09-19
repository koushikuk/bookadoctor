 
	<?php 
		global $user;

		   $visit_type_query = new EntityFieldQuery(); 
			$visit_type_query->entityCondition('entity_type', 'node')  

			->entityCondition('bundle', 'location_configuration');

			//->fieldCondition('field_visit_type', 'value', $form_state['values']['visit_type'], '=');  

			$visit_type_result = $visit_type_query->execute();  

			if (isset($visit_type_result['node'])) {

			  $visit_type_result_key = array_keys($visit_type_result['node']);   

			  $visit_type_resultsRows = entity_load('node', $visit_type_result_key); 
 
			  //echo "<pre>";
			  

				
			}

    ?>

	<div class="col-xs-12 no-left-padding no-right-padding">    
		<div class="body-heading">
			<p>Visit type configuration</p>
		</div>
	</div> 
	<div class="visitTypeConfiguration">
		<div class="col-xs-12 no-left-padding no-right-padding selection-panel">
			
           <div class="col-sm-4">
				<label for="visitType">Location</label>
				<?php 
					print render($form['facility_list']);
				?>
			</div>
 
			<div class="col-sm-4">
				<label for="visitType">Visit Type</label>
				<?php 
					print render($form['visit_type']);
				?>
			</div>

			<div class="col-sm-4">
				<label for="practiceLocation">Select Practice Location</label>
				<?php 
					print render($form['practice_location']);?>
			</div>
			
			<div class="col-sm-4">
				<label for="serviceLocation">Service Location</label>
				<?php 
					print render($form['service_location']);
				?>
			</div>
			
			<div class="col-sm-8 no-right-padding">
				<div class="col-xs-10 col-sm-12 btnLeft no-left-padding no-right-padding" style="padding-top: 20px;">
					<?php print drupal_render_children($form);?>
				</div>
			</div>
		</div>
		
		<div class="col-xs-12 no-left-padding no-right-padding visitTypeConfigurationDetails">
			<table id="adjdata" class="table visitTypeConfigurationTable" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>Location</th>
						<th>Visit Type</th>
						<th>Practice Location</th>
						<th>Service Location</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($visit_type_resultsRows as $visit_type_rows){ 
						 
						print '<tr><td>'.$visit_type_rows->field_physical_location['und'][0]['value'].'</td>';
						print '<td>'.$visit_type_rows->field_visit_type['und'][0]['value'].'</td>';
						print '<td>'.$visit_type_rows->field_practice_location['und'][0]['value'].'</td>';
						print '<td>'.$visit_type_rows->field_service_location['und'][0]['value'].'</td>';
						print '<td><a href="delete_visittype/'.$visit_type_rows->nid.'">Delete</a></td></tr>';

					}
					?>
				<tbody>
			</table>
		</div>
	</div>