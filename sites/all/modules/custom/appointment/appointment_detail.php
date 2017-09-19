<div class="col-xs-12 no-left-padding no-right-padding">    
<div class="body-heading ">
    <p>Create Apportment</p>
</div></div> 
 <div class="adjudicationQueue">

    <div class="col-xs-12 no-left-padding no-right-padding selection-panel">
        <label for="all"></label>
        <div class="col-sm-4 no-right-padding">
           <strong>Visit Type</strong>
            <?php 
            
                print render($form['visit_type']);?>
        </div>

<div class="col-sm-4 no-right-padding">
            <strong>Practice Location</strong> 
            <?php 
            
                print render($form['element_to_be_replaced_1']);?>
        </div>


     <div class="col-sm-4 no-right-padding">   
          <strong>Service Location</strong>
            <?php 
                print render($form['element_to_be_replaced_2']);?>
        </div>
    
    </div>
</div>