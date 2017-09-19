<script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script>
//Client side
        jQuery(function(){
            var iosocket = io.connect('http://localhost:3000');
            iosocket.on('connect', function () {
                jQuery('#showmessage').append(jQuery('<li>Connected</li>'));
                iosocket.on('message', function(message) {
                    console.log(message);
					jQuery("#adj_data").html('Application Id '+message.applicationId);
					
					// decrypt data in jquery ajax
					 
							/*jQuery.ajax({
							  type: "GET",
							  url: "/fnDecrypt",
							  dataType: "json"
							}).done (function (data) {
							  console.log(data);
							});*/
 
                });
                iosocket.on('disconnect', function() {
                    jQuery('#showmessage').append('<li>Disconnected</li>');
                });
            });
            /*jQuery('#outgoingChatMessage').keypress(function(event) {
                if(event.which == 13) {
                    event.preventDefault();
                    iosocket.send($('#outgoingChatMessage').val());
                    jQuery('#incomingChatMessages').append(jQuery('<li></li>').text(jQuery('#outgoingChatMessage').val()));
                    jQuery('#outgoingChatMessage').val('');
                }
            });*/
        });
    </script>


<script type="text/javascript">
	jQuery(document).ready(function() {

    var table = jQuery('#adjdata').DataTable( {
        ajax: "adjudication_datasource",
         "lengthChange": false,
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button>Claim</button>"
        } ]
     
    } );

    jQuery('#adjdata tbody').on( 'click', 'button', function () {
        var data = table.row( jQuery(this).parents('tr') ).data();
        var appid = data[4];
         console.log(appid);
    } );

} );

</script>
<style type="text/css">
	.dataTables_filter, .dataTables_info { display: none; }
</style>

Connection Status: <div id="showmessage"></div>
<br />
<input type="hidden" id="outgoingChatMessage">
<br><br>
<div id="adj_data"></div>

<table id="adjdata" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Program Enrolled Under</th>
            <th>Time in Queue(minutes)</th>
            <th>Adjudication Action</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
</table>

 