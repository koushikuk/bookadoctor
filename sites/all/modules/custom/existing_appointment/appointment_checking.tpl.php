<?php 
    if($appointmentdata['status_message'] == 'ok'){ 
  
      ?>

<div class="col-xs-12 no-left-padding no-right-padding">  
              <div class="body-heading text-center">
                <p>Appointment List</p> 
                <p class="selectCareProvider">There are <?php print $patientInfo['no_of_appointments'];?> Previously fixed appointments</p>
              </div>
            </div>



    
<form method="post" action="send_appoinmentinfo">
<?php 
  foreach($appointmentdata['result'] as $value){
        $patientID = $patientid;
        $startTime = explode(' ', $value['StartTime']);
        $finalStartTime = $startTime[1].' '.$startTime[2];
        $DoctorName = $value['DoctorName']; 
        $AppointmentReason = $value['AppointmentReason'];

?>

<div class="col-xs-12 no-left-padding no-right-padding createAppointment6">
    <div class="col-md-12 no-left-padding no-right-padding selection-panel clearfix">
                <div class="col-xs-6 col-sm-3 no-left-padding no-right-padding each-wrap">
                  <div class="col-xs-12 col-sm-4 no-right-padding">
                    <img src="<?php  print axelia_get_img_path();?>/img/clock.png" class="clock-img img-responsive">
                  </div>
                  <div class="col-xs-12 col-sm-8 no-left-padding no-right-padding">
                    <p>Time</p>
                    <p><?php print $finalStartTime;?></p>
                  </div>
                </div>
                
                <div class="col-xs-6 col-sm-4 no-left-padding no-right-padding each-wrap">
                  <div class="col-xs-12 col-sm-3 no-right-padding">
                    <img src="<?php print axelia_get_img_path();?>/img/doctor.png" class="doc-img img-responsive">
                  </div>
                  <div class="col-xs-12 col-sm-7 no-left-padding no-right-padding">
                    <p>Care Provider:</p>
                    <p><?php print $DoctorName;?></p>
                  </div>
                </div>
                
                <div class="col-xs-6 col-sm-4 no-left-padding no-right-padding each-wrap">
                  <div class="col-xs-12 col-sm-3 no-right-padding text-center">
                    <img src="<?php print axelia_get_img_path();?>/img/reason.png" class="reason-img img-responsive">
                  </div>
                  <div class="col-xs-12 col-sm-7 no-left-padding no-right-padding">
                    <p>Reason</p>
                    <p><?php print $AppointmentReason;?></p>
                  </div>
                </div>
                
                <div class="col-xs-6 col-sm-1 radioBox each-wrap">
                  <input class="form-radio-input pull-right" type="radio" name="patientID" value="<?php print $value['AppointmentID'];?>">
                  <label></label>
                </div>
              </div>
          <?php } ?>
            <input type="hidden" name="patientid" value="<?php print $patientid; ?>">
            <input type="hidden" name="applicationid" value="<?php print $applicationid;?>">
        <div class="col-xs-12 col-md-6 col-md-offset-3 no-left-padding no-right-padding">
                <div class="col-xs-12 col-md-8 col-md-offset-2 no-left-padding no-right-padding text-center">
                  <button type="submit" class="btn btn-primary custom-btn continue-btn">Continue</button>
                </div>
              </div>

</div>

</form>
<?php }
if($appointmentdata['status_message'] == 'NOT_FOUND'){ ?>   
 <div class="col-xs-12 no-left-padding no-right-padding"> 
              <div class="body-heading text-center">
                <p>Appointment</p>
              </div>
            </div>
          <form method="post" action="/appointment_details">   
            <div class="appointmentList">
              <div class="col-xs-12 col-md-4 col-md-offset-4 co no-left-padding no-right-padding selection-panel">
                  
                <div class="col-xs-12 text-center no-left-padding no-right-padding">
                  <label for="all">No scheduled appointment fixed.</label>
                </div>
                <input type="hidden" name="applicationid" value="<?php print $applicationid;?>">
                <input type="hidden" name="patientid" value="<?php print $patientid;?>">
                <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 no-left-padding no-right-padding">
                  <button type="submit" class="btn btn-primary custom-btn search-btn" id="create_appointment">Create Appointment</button>
                </div>
              </div>
            </div> 
          </form>
<?php }?>          