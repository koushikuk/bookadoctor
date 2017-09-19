<style type="text/css">
	.adjcommentdiv{
      clear: both;
     }
     .textareardiv {
      	margin-top: 20px;
      	margin-left: 100px;
      }
</style>

<div class="margin_info"><strong>Name:</strong>&nbsp <?php echo $data['dl_first_name'].'&nbsp'.$data['dl_middle_name'].'&nbsp'.$data['dl_last_name']; ?> <strong>Date of Birth :</strong>&nbsp <?php echo $data['birthdate'];?>  &nbsp; &nbsp; <strong>Issue</strong>  &nbsp;&nbsp;&nbsp;<button type="button" id = "Show_All_Information" name = "Show_All_Information">Show All Information</button>
<button type="button" id = "hide_All_Information" name = "hide_All_Information">Hide All Information</button></div>  
  
<div class="globalentry">Program Enrolled under : <?php print $data['program']; ?></div>
<div class="cont">
	<div class="div1">
  <div class="img_front"><img src="<?php echo $data['drivingLicensesrc']; ?>" width="200" height="140"> </div>

 </div>
   
	<div class="div2">
   <div class="selfi_img">show the selfie App <img src=""><br></div>
   
	</div>
	</div>
	<div class="adjcommentdiv">
	 <textarea class="textareardiv" name="adjudicator_comment" id="adjudicator_comment"  rows="3" cols="80" Placeholder="Adjudicator Notes" style="border:solid 1px black"></textarea>
	 </div>
  <br><br>
	<ul class="checkbox_div1">
		<li><input type="checkbox" id = "release_back_queue_Eligiblity" name="release_back_queue_Eligiblity" id="" value="">
		<button type="button" id = "release_back_queue_btn_Eligiblity"> Release back to queue</button></li>
		<li><input type="checkbox" id = "Reject_Not_Eligible" name="Reject_Not_Eligible" id="" value=""> 
		<button type="button" id = "Reject_Not_Eligible_btn">Reject, Not Eligible</button></li>
		<li><input type="checkbox" id = "Eligiblity_Verified " name="Eligiblity_Verified" id="" value=""><button type="button" id = "Eligiblity_Verified_btn">Eligiblity Verified </button></li>
	</ul>
	
<div class="container" id="show">
<h1>Driver Licence All Information</h1>
		<div class="ziehharmonika">
			<h3>Identity Information </h3>
			<div>
				<p><strong>First Name:</strong> <?php echo $data['dl_first_name'];?><strong>Middle Name:</strong> <?php echo $data['dl_middle_name'];?><strong> Last Name: </strong><?php echo $data['dl_last_name'];?><strong> Sex: </strong> <?php echo $data['sexcode'];?> 
				<strong> Birthdate: </strong> <?php echo $data['birthdate'];?> 
				<strong> Race: </strong> <?php echo $data['race'];?> 
				<strong> Height: </strong> <?php echo $data['height'];?> 
				<strong> weight: </strong> <?php echo $data['weight'];?> 
				<strong> Eyecolor: </strong> <?php echo $data['eyecolor'];?> 
				<strong> Haircolor: </strong> <?php echo $data['haircolor'];?> 
				<strong> Birthcountry: </strong> <?php echo $data['birthcountry'];?>
				<strong> Birthcity: </strong> <?php echo $data['birthcity'];?>
				<strong> Birthstate: </strong> <?php echo $data['birthstate'];?>
				<strong> Telephone no: </strong> <?php echo $data['telephone_no'];?>
				<strong> Phone type: </strong> <?php echo $data['phone_type'];?>
				<strong> Primary Email: </strong> <?php echo $data['primary_email'];?>
				<strong> Secondary Email: </strong> <?php echo $data['secondary_email'];?>
				<strong> Ssn no: </strong> <?php echo $data['ssn_no'];?>
				<strong> Addresstype: </strong> <?php echo $data['addresstype'];?>
				<strong> Address1: </strong> <?php echo $data['address1'];?>
				<strong> Address2: </strong> <?php echo $data['address2'];?>
				<strong> Address city: </strong> <?php echo $data['address_city'];?>
				<strong> Address statecode: </strong> <?php echo $data['address_statecode'];?>
				<strong> Address postalcode: </strong> <?php echo $data['address_postalcode'];?>
				<strong> Address countrycode: </strong> <?php echo $data['address_countrycode'];?>
				
				
				
				
				</p>
			</div>
			<h3>Identity Proof Image</h3>
			<div>
				<p>

                <?php foreach($data['documents'] as $vals){
        $filetype = fnDecrypt($vals['FileType']['type']); 
        $filename = fnDecrypt($vals['FileType']['filename']); 
          if($filetype == 'passport'){ ?>
            <strong> Passport : </strong> <span class="#"><a href="<?php echo $data['passportsrc']; ?>" rel="lightbox"><img src="<?php echo $data['passportsrc']; ?>" height ="50" width="50" title = "Please click to get enlarged image"></a></span>

          <?php } else if ($filetype == 'greenCard') { ?>

         <strong> GreenCard : </strong><span class="#"><a href="<?php echo $data['greenCard']; ?>" rel="lightbox"><img src="<?php echo $data['greenCard']; ?>" height ="50" width="50" title = "Please click to get enlarged image"></a></span>


	   <?php
        } else if ($filetype == 'drivingLicense') { 
        $drivingImg = $data['drivingLicensesrc'];
        	?>
         
       <strong> Driving License : </strong><span class="#"><a href="<?php //echo $drivingImg;?>" rel="lightbox"><img src="<?php echo $data['drivingLicensesrc']; ?>" height ="50" width="50" title = "Please click to get enlarged image"></a></span>
 
		 <?php }
	   } 

	   ?> 





	 
	          </p>
			</div>
			<!--<h3>Section Three</h3>
			<div>
				<p>Endi commodi facere odit alias velit ducimus accusantium maiores, mollitia vitae eum quae maxime labore, quia non consequatur culpa similique, molestiae dicta.</p>
			</div> -->
		</div>
</div>



