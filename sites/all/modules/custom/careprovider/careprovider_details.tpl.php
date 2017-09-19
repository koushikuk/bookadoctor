<div class="col-xs-12 no-left-padding no-right-padding">  
              <div class="body-heading text-center">
                <p>Create Appointment</p>
              </div>
            </div>
  <div class="createAppointment3">
           
              
              <div class="col-md-10 col-md-offset-1 no-left-padding no-right-padding selection-panel clearfix">
                <div class="col-xs-12 no-left-padding no-right-padding">
                  <div class="col-xs-12">
                    <label for="facilityType">Select facility location</label>
                    
                    <div class="input-group">
                      <input type="text" class="form-control search-control" placeholder="Search care provider" onfocus="this.placeholder = ''"
                      onblur= "this.placeholder ='Search care provider'" aria-label="Username" aria-describedby="basic-addon1" id="myInput" onkeyup="myFunction()">
                    </div>
                  </div>  
                  <div class="col-md-12 appointCareProviderListWrap">
                    <ul class="appointCareProviderList clearfix" id="myUL">
                     
                <?php  foreach($carepdata['result'] as $val){?>

                      <li class="col-xs-12 list-group-item">
                        <div class="col-xs-10">
                          <img src="<?php print  axelia_get_img_path();?>/img/doc-icon.png" class="img-responsive">
                          <p><?php print $val['Name']?></p>
                        </div>
                        <div class="col-xs-2 checkBox">
                          <input class="form-check-input pull-right checkprovider" type="radio" value="<?php print  $val['OwnerCareProviderID'].'|'.$val['ResourceID'].'|'.$val['CareProviderCategoryID'];?>" name="careprovider" data-toggle="modal" data-target="#careprovider-modal" >
                          <label for="checkboxFourInput"></label>
                        </div>
                      </li>

                 <?php }?>
                      
                    </ul>
                  </div>  
                </div>
                
                
              </div>
              
              <div class="col-md-10 col-md-offset-1 no-left-padding no-right-padding text-center">
                <button class="btn btn-primary custom-btn search-btn">Continue</button>
              </div>
            </div>       

<div id="careprovider-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
          <div id="insmsg"></div>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <h4 class="modal-title" id="myModalLabel">Please select reason for not checking in</h4>
                </div>
                <fom method="post" id="reasonform">
                 <div class="col-xs-12">
                 <div class="show_success" style="color: green;font-weight: bold;"></div>
                 <div class="show_error" style="color:red;"></div>
                  <div class="form-group" style="color:#3c3939;">
                 <label for="sel1">Select Billable care provider</label>
                  <div class="modal-body" id="cprovider">
                  
                   This is a sample form
                 </div> 
                 <input type="button" name="savereason" class="savereason" value="Submit">  

                   </div>
                </div>
                </fom>

                <div class="modal-footer">
                    <button type="button" class="pull-right" data-dismiss="modal" id="closeme">Close</button>
                </div>
            </div>
        </div>
    </div>






 <script>
function myFunction() {
    var input, filter, ul, li, div, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        div = li[i].getElementsByTagName("div")[0];
        if (div.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>      