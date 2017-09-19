<?php   
//p($data);
 ?>        
<style>
.globalentry {
    margin-left:400px;
}
.margin_info{
	margin-left:300px;
}
.div1{
	width:50%;
	float:left;
}
.img_front,.selfi_img{
	display:inline-block;
	width:200px;
	vertical-align: top;
	height: 140px;
	border: 2px solid;
}
.checkbox_div{
	list-style-type: none !important;
	display:inline-block;
}
.checkbox_div>li>input{
	display:inline-block;
}
.div2{
	float:right;
	width:50%;
}
.cont{
	margin-top:20px;
}
.checkbox_div1{
	list-style-type: none !important;
	display:inline-block;
	margin-top:10px !important;
}
.checkbox_div1>li{
	display:inline-block;
}
</style>
<div class="margin_info"><strong>Name:</strong>&nbsp <?php echo $data['dl_first_name'].'&nbsp'.$data['dl_middle_name'].'&nbsp'.$data['dl_last_name']; ?> <strong>Date of Birth :</strong>&nbsp <?php echo $data['birthdate'];?>  &nbsp &nbsp <button type="button" id = "Show_All_Information" name = "Show_All_Information">Show All Information</button>
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
	<strong> GreenCard : </strong><span class="file_path"><a href="<?php print $data['greenCard']; ?>" rel="lightbox"><img src="<?php print $data['greenCard']; ?>" height ="50" width="50" title = "Please click to get enlarged image"></a></span>
	
	<strong> Passport : </strong> <span class="file_path"><a href="<?php print $data['passportsrc']; ?>" rel="lightbox"><img src="<?php print $data['passportsrc']; ?>" height ="50" width="50" title = "Please click to get enlarged image"></a></span>
	
	<strong> Driving License : </strong> <span class="file_path"><a href="<?php print $data['drivingLicensesrc']; ?>" rel="lightbox"><img src="<?php print $data['drivingLicensesrc']; ?>" height ="50" width="50" title = "Please click to get enlarged image"></a></span>
	 </p>
			</div>
			<!--<h3>Section Three</h3>
			<div>
				<p>Endi commodi facere odit alias velit ducimus accusantium maiores, mollitia vitae eum quae maxime labore, quia non consequatur culpa similique, molestiae dicta.</p>
			</div> -->
		</div>
</div>



