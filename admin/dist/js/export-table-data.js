/*Export Table Init*/

"use strict"; 

$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		"pageLength": 50,
		buttons: [
			'csv', 'excel'
		]
	} );
} );