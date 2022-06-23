console.log('Init: Datatables');

$.extend( true, $.fn.DataTable.defaults, {
    "pageLength": 10,
	"language": {
		"sProcessing": "Bezig...",
		"sLengthMenu": "<span>Resultaten weergeven</span> _MENU_",
		"sZeroRecords": "Geen resultaten gevonden",
		"sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
		"sInfoEmpty": "", //Geen resultaten om weer te geven",
		"sInfoFiltered": " (Gefilterd uit _MAX_ resultaten)",
		"sInfoPostFix": "",
		"sSearch": "<span>Zoeken</span>",
		"sEmptyTable": "Geen resultaten",
		"sInfoThousands": ".",
		"sLoadingRecords": "Een moment geduld aub - bezig met laden...",
		"oPaginate": {
			"sFirst": "Eerste",
			"sLast": "Laatste",
			"sNext": "Volgende",
			"sPrevious": "Vorige"
		},
		"oAria": {
			"sSortAscending":  ": Activeer om kolom oplopend te sorteren",
			"sSortDescending": ": Activeer om kolom aflopend te sorteren"
		}
	}
} );
