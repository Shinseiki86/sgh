//Filtro con input
tbIndex.columns(':not(.notFilter)').every( function () {
	var column = this;

	$( 'input', this.footer() ).on( 'keyup change', function () {
		if ( column.search() !== this.value ) {
			column.search( this.value ).draw();
		}
	} );
} );

//Filtro con select
/*tbIndex.columns(':not(.notFilter)').every( function () {
	var column = this;
	console.log(column);

	var select = $('<select><option value="">Todos</option></select>')
		.appendTo( $(column.footer()).empty() )
		.on( 'change', function () {
			var val = $.fn.dataTable.util.escapeRegex( $(this).val() );
			column
				.search( val ? '^'+val+'$' : '', true, false )
				.draw();
		});
 
	column.data().unique().sort().each( function ( d, j ) {
		if(column.search() === '^'+d+'$'){
			select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
		} else {
			select.append( '<option value="'+d+'">'+d+'</option>' )
		}
	});
	column.adjust();
});*/


