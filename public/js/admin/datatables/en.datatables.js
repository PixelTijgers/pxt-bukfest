console.log('Init: Datatables');

$.extend( true, $.fn.DataTable.defaults, {
    "pageLength": 10,
	"language": {
		"sProcessing": "Processing...",
		"sLengthMenu": "<span>Display _MENU_ records per page</span>",
		"sZeroRecords": "No matching records found",
		"sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
		"sInfoEmpty": "Showing 0 to 0 of 0 entries", //Geen resultaten om weer te geven",
		"sInfoFiltered": "(filtered from _MAX_ total entries)",
		"sInfoPostFix": "",
		"sSearch": "<span>Search</span>",
		"sEmptyTable": "No data available in table",
		"sInfoThousands": ".",
		"sLoadingRecords": "Loading...",
		"oPaginate": {
			"sFirst": "First",
			"sLast": "Last",
			"sNext": "Next",
			"sPrevious": "Previous"
		},
		"oAria": {
			"sSortAscending":  ": Activate to sort column ascending",
			"sSortDescending": ": Activate to sort column descending"
		}
	}
} );
