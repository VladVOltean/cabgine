$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#patients_table thead tr').clone(true).appendTo( '#patients_table thead' );
    $('#patients_table thead tr:eq(0) th').each( function (i) {
		var title = $(this).text();
        if (title != "")
        {
            $(this).html('<input type="text" style = "width:120px;"  placeholder = "Search ' + title + '" /> ');
        }
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#patients_table').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );