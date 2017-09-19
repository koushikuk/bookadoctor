<?php

$chartstr = '';
foreach ($astra_daily_summary_results as $val) {
$chartstr.= "['".$val[0]."',".$val[1].",".$val[2].",".$val[3]."]";
$chartstr.= ',';       
 }
$chartstr = substr($chartstr,0,-1);


$current_summary_chartstr = '';
foreach ($current_summary as $val) {
$current_summary_chartstr.= "['".$val[0]."',".$val[1].",".$val[2].",".$val[3]."]";
$current_summary_chartstr.= ',';       
 }
$current_summary_chartstr = substr($current_summary_chartstr,0,-1);


/// Today summary report code end 
$name = 'facility';
$myvoc = taxonomy_vocabulary_machine_name_load($name);
$tree = taxonomy_get_tree($myvoc->vid);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<div id="wrapper" class="astradashboard">
	<div class="col-xs-12 no-left-padding no-right-padding">	
		<div class="body-heading ">
			<p>Astra Dashboard</p>
		</div>
	</div>
	<div class="col-xs-12 no-left-padding no-right-padding selection-panel">
		<div class="col-sm-4 no-right-padding">
			<label for="all"></label>
			<select name="status" id="status">
				<option value=0>ALL</option>
				<?php foreach ($tree as $term) {?>
				<option value="<?php echo $term->tid;?>"><?php echo $term->name;?></option>
				<?php }?>
			</select>
		</div>
	</div>
</div>	
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo variable_get('socket_io_url','');?>"></script>

<script type="text/javascript">

     google.charts.load('current', {'packages':['bar','corechart']});
      google.charts.setOnLoadCallback(drawChart);
	  
      
	jQuery(function () {
		var iosocket = io.connect('<?php echo variable_get('io_connect_url','');?>');
		iosocket.on('connect', function () {

			iosocket.on('message', function (message) {
			jQuery('#status').val(0);
			jQuery("#wait").css("display", "block");	
				
				
				/* current date report */
						var current_jsonData = jQuery.ajax({
						url: '<?php echo $base_url; ?>/current_dasbord_ajax',
						error: function () {
							console.log('ERROR');
						},
						dataType: 'json',
						async: false,
						success: function(current_jsonData)
						
						{
							console.log(current_jsonData);
							//var data = new google.visualization.arrayToDataTable(current_jsonData);	
							
						  var data = new google.visualization.DataTable();
						   data.addColumn('string', "Date");
						   data.addColumn('number', "Patient incomplete");
						   data.addColumn('number', "Patient Checkin");
						   data.addColumn('number', "Patient Completed");
						   
						   data.addRows(current_jsonData);
					      var current_options = {
							title: 'Today Summary',
							titleTextStyle: {
							  color: '000',
							  fontName: 'Georgia',
							  fontSize: 18,
							  textAlign:'Center'
							},
							width: 900,
							height: 500,
							hAxis: {title: 'Today'+"'"+'s Record',titleTextStyle: {color: 'red'}},
							vAxis: {title: 'Number Of Patients', titleTextStyle: {color: 'red'}},
							colors: ['deepskyblue','darkslateblue','orange'], 
							legend: {position: 'top'},
							};

                              /* var chart = new google.visualization.ColumnChart(current_material);
                              chart.draw(data, current_options); */
							
  
                      var chart = new google.charts.Bar(document.getElementById('current_material'));
                             chart.draw(data, google.charts.Bar.convertOptions(current_options)); 
						}	
					}).responseText;
				
				/*current date report */
				
				
				
					var jsonData = jQuery.ajax({
						url: '<?php echo $base_url; ?>/wiphy_dasbord_ajax',
						error: function () {
							console.log('ERROR');
						},
						dataType: 'json',
						async: false,
						success: function(jsonData)
						
						{
							console.log(jsonData);
							//var data = new google.visualization.arrayToDataTable(jsonData);	
							
						  var data = new google.visualization.DataTable();
						   data.addColumn('string', "Date");
						   data.addColumn('number', "Patient incomplete");
						   data.addColumn('number', "Patient Checkin");
						   data.addColumn('number', "Patient Completed");
						   
						   data.addRows(jsonData);
						 var options = {
							             title: 'Daily Summary Report',
										 titleTextStyle: {
										  color: '000',
										  fontName: 'Georgia',
										  fontSize: 18,
										  textAlign:'Center'
										},
										 width: 900,
                                         height: 500,
										 hAxis: {title: 'Past 30 days Record',titleTextStyle: {color: 'red'}},
										 vAxis: {title: 'Number Of Patients', titleTextStyle: {color: 'red'}},
										 colors: ['deepskyblue','darkslateblue','orange'],
                                         legend: {position: 'top'},										 
							};
                             /* var chart = new google.visualization.ColumnChart(barchart_material);
                              chart.draw(data, options); */							
                          var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                             chart.draw(data, google.charts.Bar.convertOptions(options));  
						}	
					}).responseText;
					
					
						var jsonGraphData = jQuery.ajax({
						url: '<?php echo $base_url; ?>/wiphy_dasbord_wait_ajax',
						error: function () {
							console.log('ERROR');
						},
						dataType: 'json',
						async: false,
						success: function(jsonGraphData)
						{
							console.log(jsonGraphData);
						 google.charts.load('current', {'packages':['annotatedtimeline']});
							
							for(var i = 0; i < jsonGraphData.length; i++){
								jsonGraphData[i][0] = new Date(Number(jsonGraphData[i][0]));
							}	
							var data = new google.visualization.DataTable();
							data.addColumn('date', "Date");
							data.addColumn('number', 'Average Waiting Time');
							data.addRows(jsonGraphData);
							console.log(data);
							var chart = new google.visualization.AnnotatedTimeLine(document.getElementById('chart_div'));
							var options = {
								 displayAnnotations: true,
								 displayZoomButtons: false,
							};
							chart.draw(data, options); 
						jQuery("#wait").css("display", "none");	
						}	
					}).responseText;
					
			});


			iosocket.on('disconnect', function () {
				jQuery('#showmessage').append('<li>Disconnected</li>');
			});

			window.onbeforeunload = function () {
				iosocket.disconnect();
			};
		});
	});
	
function drawChart() {

	/* Current Date record */
	 var current_data = google.visualization.arrayToDataTable([
         ['Date','Patient incomplete','Patient Checkin', 'Patient Completed'],
	    <?php 
			echo $current_summary_chartstr;
		?>

        ]);
		 var button = document.getElementById('barchart_material');
	
	var current_options = {
        title: 'Today Summary',
		titleTextStyle: {
		  color: '000',
		  fontName: 'Georgia',
		  fontSize: 18,
		  textAlign:'Center'
		},
		width: 900,
        height: 500,
        hAxis: {title: 'Todays Record',titleTextStyle: {color: 'red'}},
	    vAxis: {title: 'Number Of Patients', titleTextStyle: {color: 'red'}},
        colors: ['deepskyblue','darkslateblue','orange'], 
		legend: {position: 'top'},
        };	 

		
	 /*  var chart = new google.visualization.ColumnChart(current_material);
       chart.draw(current_data, current_options); */
		
        var chart = new google.charts.Bar(document.getElementById('current_material'));

        chart.draw(current_data, google.charts.Bar.convertOptions(current_options)); 
	
	
	/* current date record */
	
	
	/* Past 30 days record */
	
        var data = google.visualization.arrayToDataTable([
          ['Date','Patient incomplete','Patient Checkin', 'Patient Completed'],
	    <?php print $chartstr; ?>


        ]);
		 var button = document.getElementById('barchart_material');
	
	var options = {
          title: 'Daily Summary Report',
		  titleTextStyle: {
		  color: '000',
		  fontName: 'Georgia',
		  fontSize: 18,
		  textAlign:'Center'
		},
		width: 930,
        height: 500,
        hAxis: {title: 'Past 30 days Record',titleTextStyle: {color: 'red', fontSize: 10, italic: false, fontFamily: 'Roboto'}, direction:-1, slantedText: true, slantedTextAngle:90},
        vAxis: {title: 'Number Of Patients', titleTextStyle: {color: 'red', fontSize: 10	, italic: false, fontFamily: 'Roboto'}},
		 
		 colors: ['deepskyblue','darkslateblue','orange'], 
		 //legend: {position: 'top'},
        };	 

		/*  var chart = new google.visualization.ColumnChart(barchart_material);
         chart.draw(data, options); */

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));  
		
	/* Past 30 days record */	
      }

</script>
<script type='text/javascript'>
	google.charts.load('current', {'packages':['annotatedtimeline']});
	google.charts.setOnLoadCallback(drawChart);
	var data = [
		["Date", "Average Waiting Time"],
		<?php 
			 foreach($waiting_time_report as $value){
			 echo "['".$value['0']."',".$value['1']."],";
			 }
		?>
	];
	
	for(var i = 1; i < data.length; i++){
		data[i][0] = new Date(Number(data[i][0]));
	}	
	  
	function drawChart() {
		var display_data = google.visualization.arrayToDataTable(data);
		var chart = new google.visualization.AnnotatedTimeLine(document.getElementById('chart_div'));
		var options = {
			
			 displayAnnotations: true,
			 displayZoomButtons: true,
			
		};
					
		
		chart.draw(display_data, options);
	}	  
    </script>

<!-- average time end chart -->

<div class="loder clearfix">
	<div id="wait">
		<span class="waitText">Please Wait Processing Data ......</span>
	</div>
	<div id="current_material" class="customChart"></div>
	<div id="barchart_material" class="customChart"></div>
	<div class="waitingTimeText">Waiting Time Report</div>
	<div id='chart_div'></div>
</div>
<!-- average time div start !-->

<!-- average time div end !-->
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('select[name="status"]').change(function(){
		jQuery("#wait").css("display", "block");
		//jQuery("#wait").css("display", "none");	
			
			
			var text = this.options[this.selectedIndex].text;
            var id = jQuery(this).val();
			
			/* current date ajax */
			        jQuery.ajax({
						
                    type: 'POST',
                   url: 'current_dasbord_ajax',
				   error: function () {
					console.log('ERROR');
				   },
                    data: {facility: id},
                    	dataType: 'json',
						async: false,
						success: function(jsonData)
						{
							 
						  console.log(jsonData);
						  
						  if(text){
							  
							 var text_input = text +' '+'Daily Summary Report';
                             var pacient_number = text +' '+'Number Of Patients';							 
						  }else{
							  
							 var text_input ='Todays Report';
                             var pacient_number ='Number Of Patients';	
						  }
						  var data = new google.visualization.DataTable();
						   data.addColumn('string', "Date");
						   data.addColumn('number', "Patient incomplete");
						   data.addColumn('number', "Patient Checkin");
						   data.addColumn('number', "Patient Completed");
						   
						   data.addRows(jsonData);
                             var options = {
							  title: text_input,
							  titleTextStyle: {
							  color: '000',
							  fontName: 'Georgia',
							  fontSize: 18,
							  textAlign:'Center'
							},
							   width: 900,
                               height: 500,
							  hAxis: {title: 'Todays Record', titleTextStyle: {color: 'red'}},
							  vAxis: {title: pacient_number, titleTextStyle: {color: 'red'}},
							  colors: ['deepskyblue','darkslateblue','orange'],
							  legend: {position: 'top'},
							};  
							
							 /* var chart = new google.visualization.ColumnChart(current_material);
                             chart.draw(data, options);
 */
							 var chart = new google.charts.Bar(document.getElementById('current_material'));
                             chart.draw(data, google.charts.Bar.convertOptions(options)); 
							 
						}
             });
			
			/*current date ajax */
			
			
			
			
            jQuery.ajax({
                    type: 'POST',
                   url: 'wiphy_dasbord_ajax',
				   error: function () {
					console.log('ERROR');
				   },
                    data: {facility: id},
                    	dataType: 'json',
						async: false,
						success: function(jsonData)
						{
						  //console.log(jsonData);
						  
						  if(text){
							  
							 var text_input = text +' '+'Daily Summary Report';
                             var pacient_number = text +' '+'Number Of Patients';							 
						  }else{
							  
							 var text_input ='Daily Summary Report';
                             var pacient_number ='Number Of Pacient';	
						  }
						  var data = new google.visualization.DataTable();
						   data.addColumn('string', "Date");
						   data.addColumn('number', "Patient incomplete");
						   data.addColumn('number', "Patient Checkin");
						   data.addColumn('number', "Patient Completed");
						   
						   data.addRows(jsonData);
                             var options = {
							  title: text_input,
							  titleTextStyle: {
							  color: '000',
							  fontName: 'Georgia',
							  fontSize: 18,
							  textAlign:'Center'
							}, 
                             width: 930,
                             height: 500,
                             hAxis: {title: 'Past 30 days Record',titleTextStyle: {color: 'red', fontSize: 10, italic: false, fontFamily: 'Roboto'}, direction:-1, slantedText: true, slantedTextAngle:90},
                               vAxis: {title: pacient_number, titleTextStyle: {color: 'red', fontSize: 10	, italic: false, fontFamily: 'Roboto'}},
							  
							  colors: ['deepskyblue','darkslateblue','orange'],
							  legend: {position: 'top'},
							}; 

                           /*  var chart = new google.visualization.ColumnChart(barchart_material);
                             chart.draw(data, options);	 */						

						 	 var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                             chart.draw(data, google.charts.Bar.convertOptions(options)); 
						}
             });
			 
			 /* wating time ajax */
			 			
		 		jQuery.ajax({
                    type: 'POST',
                   url: 'wiphy_dasbord_wait_ajax',
				   error: function () {
					console.log('ERROR');
				   },
                    data: {facility: id},
                    	dataType: 'json',
						async: false,
						success: function(jsonGraphData)
						{ 
						if(jsonGraphData){ 
						 google.charts.load('current', {'packages':['annotatedtimeline']});
							
							for(var i = 0; i < jsonGraphData.length; i++){
								jsonGraphData[i][0] = new Date(Number(jsonGraphData[i][0]));
							}	
							var data = new google.visualization.DataTable();
							data.addColumn('date', "Date");
							data.addColumn('number', 'Average Waiting Time');
							data.addRows(jsonGraphData);
							console.log(data);
							var chart = new google.visualization.AnnotatedTimeLine(document.getElementById('chart_div'));
							var options = {
								 displayAnnotations: true,
								 displayZoomButtons: false,
							};
							chart.draw(data, options);
						} 
						else{
							
						}
						jQuery("#wait").css("display", "none");	
						  
						
						}
             }); 
			 
			 /* wating time ajax code end */
			 
			 

			 
        });
    }); 
</script>
