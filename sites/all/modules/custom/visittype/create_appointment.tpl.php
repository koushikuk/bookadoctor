<div class="container">
	<div class="details-div col-md-12 no-left-padding no-right-padding ">
		<div class="col-xs-12 no-left-padding no-right-padding">	
			<div class="body-heading text-center">
				<p>Create Appointment</p>
				<p class="selectCareProvider">Fields marked with (*) are mandatory</p>
			</div>
		</div>
		<form class="reason clearfix">
			<div class="col-xs-12 no-left-padding no-right-padding createAppointment5">
				<div class="col-md-6 col-md-offset-3 no-left-padding no-right-padding selection-panel">
					<div class="col-sm-12 form-group">
						<label for="reason">Reason for visit  * </label>
						<?php print render($form['ChiefComplaint']); ?>
						<!-- <input type="text" class="form-control input-ctrl" id="reason" placeholder="Enter Reason"> -->
					</div>
					<div class="col-sm-12 form-group">
						<label for="notes">Notes </label>
						<?php print render($form['Comments']); ?>
						<!-- <textarea class="form-control input-ctrl" rows="8" id="notes" placeholder="Enter Notes"></textarea> -->
					</div>
				</div>
				<div class="col-md-6 col-md-offset-3 no-left-padding no-right-padding">
					<?php print drupal_render_children($form); ?>
					<!-- <div class="col-sm-4 no-left-padding no-right-padding">
						<button class="btn btn-primary custom-btn cancel-btn">Cancel</button>
					</div>
					<div class="col-sm-8 no-left-padding no-right-padding">
						<button class="btn btn-primary custom-btn appointment-btn">Create Appointment</button>
					</div> -->
				</div>
			</div>
		</form>
	</div>
</div>