Drupal.behaviors.appointmentjs = {
  attach: function (context, settings) {
	
	
	jQuery("#edit-appointment-parent-category").on('change',function(){
		var parentCategory = $(this).val();
		//console.log(parentCategory);
		get_appointment_subcategory(parentCategory);
	});
	
  }
};

function get_appointment_subcategory(categoryId){
	//console.log(categoryId);
	jQuery('#edit-appointment-sub-category').find('option').remove();
	var appointmentCategories = Drupal.settings.appointment;
	
	jQuery.each(appointmentCategories.appointment_category_type,function(i,category){
		if(category.AppointmentCategoryID == categoryId){
			console.log(category);
			var $subCategories = category.AppointmentTypes;
			$.each($subCategories,function(subKey,subCat){
				$('#edit-appointment-sub-category').append($("<option></option>")
                    .attr("value",subCat.AppointmentTypeID)
                    .text(subCat.Name));
			});
		}
		
	})
	
}

/*jQuery(document).ready(function(){
    
    //var value = jQuery('#edit-visit-type:selected').val('Preventative Health Service');


	});*/
