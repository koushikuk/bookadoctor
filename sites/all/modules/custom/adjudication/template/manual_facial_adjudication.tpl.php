<form method="post" name="man_fac_adj" id="man_fac_adj">
<div class="margin_info"><strong>Name:</strong>&nbsp <?php echo $data['dl_first_name'].'&nbsp'.$data['dl_middle_name'].'&nbsp'.$data['dl_last_name']; ?> <strong>Date of Birth :</strong>&nbsp <?php echo $data['birthdate'];?>  &nbsp &nbsp <button type="button" id = "Show_All_Information" value = "Show_All_Information">Show All Information</button>
<button type="button" id = "hide_All_Information" value = "hide_All_Information">Hide All Information</button></div>  
  
<div class="globalentry">Program Enrolled under : <?php echo $data['program']; ?></div>
<div class="cont">
	<div class="div1">
  <div class="img_front"><img src="<?php echo $data['drivingLicensesrc']; ?>" width="200" height="140"> </div>
	<ul class="checkbox_div">
	<li><input type="checkbox" name="Blurry" id="Blurry" value="blurry"> Blurry</li>
  <li><input type="checkbox" name="Dark" id="Dark" value="dark"> Dark</li>
	<li><input type="checkbox" name="Light" id="Light" value="light"> Light</li>
	<li><input type="checkbox" name="Off_Angle" id="Off_Angle" value="off_Angle"> Off Angle</li>
	<li><input type="checkbox" name="Partial_Image" id="Partial_Image" value="partial_image"> Partial Image</li>
	<li><input type="checkbox" name="Incorrect_Doc" id="Incorrect_Doc" value="incorrect_doc"> Incorrect Doc</li>
	</ul>
 </div>
   
	<div class="div2">
   <div class="selfi_img">show the selfie App <img src=""><br></div>
	<ul class="checkbox_div">
	<li><input type="checkbox" name="Blurry_selfie" id="Blurry_selfie" value="blurry_selfie_value"> Blurry</li>
    <li><input type="checkbox" name="Dark_selfie" id="Dark_selfie" value="dark_selfie_value_value"> Dark</li>
	<li><input type="checkbox" name="Light_selfie" id="Light_selfie" value="light_selfie_value"> Light</li>
	<li><input type="checkbox" name="Off_Angle_selfie" id="Off_Angle_selfie" value="off_angle_selfie_value"> Off Angle</li>
	<li><input type="checkbox" name="Partial_Image_selfie" id="Partial_Image_selfie" value="partial_image_selfie_value"> Partial Image</li>
	<li><input type="checkbox" name="Incorrect_Doc_selfie" id="Incorrect_Doc_selfie" value="incorrect_doc_selfie_value"> Incorrect Doc</li>
	</ul>
	</div>
	</div>
  <br><br>
	<ul class="checkbox_div1">
		<li><input type="checkbox" id = "release_back_queue" name="release_back_queue" id="" value="release_back_queue_value">
		<button type="submit" id = "release_back_queue_btn" value = "release_back_queue_btn">release_back_queue_btn </button></li>
		<li><input type="checkbox" id = "reject_image_quality" name="reject_image_quality" value="reject_image_quality_value"> 
		<button type="submit" id = "reject_image_quality_btn" value="reject_image_quality_btn">Reject, Image quality</button></li>
		<li><input type="checkbox" id = "reject_inconclusive_match" name="reject_inconclusive_match" value="reject_inconclusive_match_value">
		<button type="submit" id = "reject_inconclusive_match_btn" value="reject_inconclusive_match_btn">Reject inclonclusive match</button></li>
		<li><input type="checkbox" name="DOB_on_multiple" id="DOB_on_multiple" value="dob_on_multiple_value">DOB on multiple docs the same</li>
		<li><input type="checkbox" name="Photos_are_same_person" id="Photos_are_same_person" value="photos_are_same_person_value">Photos are same person</li>
		<li><button type="submit" id = "Identity_Verified_btn" value="Identity_Verified_btn">Identity Verified</button></li>
	</ul>
 </form>
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

<script type="text/javascript">
	 jQuery(document).ready(function() { 
      jQuery('#man_fac_adj').submit(function(e){
      	 e.preventDefault();
            var postData = jQuery('#man_fac_adj').serializeArray();
		    var formURL = jQuery('#man_fac_adj').attr("action");
            jQuery.ajax(
			{
				url : '/manual_fac_adj_submit',
				type: "POST",
				data : postData,
				//dataType: "json",
				success:function(data) 
				{ 
                    //console.log('this is my success response.');
                     console.log(data);
                 
				},
				error: function() 
				{
                    console.log('Thre is something wrong.');
			    }
	      });
      	});
    });

</script>
