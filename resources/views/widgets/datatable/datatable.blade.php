@push('head')
	{!! Html::style('assets/stylesheets/datatable/buttons.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/responsive.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/buttons.bootstrap4.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/dataTables.bootstrap4.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/responsive.bootstrap.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/datatable/jquery.dataTables.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/scripts/datatable/jszip.min.js') !!}
	{!! Html::script('assets/scripts/datatable/pdfmake.min.js') !!}
	{!! Html::script('assets/scripts/datatable/vfs_fonts.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.html5.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.colVis.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.print.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.flash.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.bootstrap4.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.bootstrap4.min.js') !!}
	{!! Html::script('assets/scripts/datatable/responsive.bootstrap.min.js') !!}

<script type="text/javascript">
	$.extend( true, $.fn.dataTable.defaults, {
		lengthMenu: [[5,10,25,50,-1], [5,10,25,50,'Todos']],
		//retrieve: true,
		pagingType: 'simple_numbers',
		bScrollCollapse: true,
		sScrollY: '500px',
		responsive: true,
		language: { 
			sProcessing:     'Procesando...', 
			sLengthMenu:     'Mostrar _MENU_ registros', 
			sZeroRecords:    'No se encontraron resultados', 
			sEmptyTable:     'Ningún dato disponible en esta tabla', 
			sInfo:           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros', 
			sInfoEmpty:      'Mostrando registros del 0 al 0 de un total de 0 registros', 
			sInfoFiltered:   '(filtrado de un total de _MAX_ registros)', 
			sSearch:         'Buscar:', 
			sInfoThousands:  ',', 
			sLoadingRecords: 'Cargando...', 
			oPaginate: {
				sFirst:    '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
				sLast:     '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
				sNext:     '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
				sPrevious: '<i class="fa fa-chevron-left" aria-hidden="true"></i>'
			}
		},
		dom: "<'col-sm-2' f> <'col-sm-offset-9' B>"
			 +"<rt>"
			 +"<'row'<'form-inline'"
			 +" <'col-sm-6 col-md-6 col-lg-6'l>"
			 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
		buttons: [{
				extend: 'csvHtml5',
				text:  '<i class="fa fa-file-text-o"></i>',
				titleAttr: 'CSV',
			},{
				extend: 'excelHtml5',
				text:   '<i class="fa fa-file-excel-o"></i>',
				titleAttr: 'Excel',
			},{
				extend: 'pdfHtml5',
				text:    '<i class="fa fa-file-pdf-o"></i>',
				titleAttr: 'PDF',
			},{
				extend: 'print',
				text:    '<i class="fa fa-print"></i>',
				titleAttr: 'Imprimir',
			},{
				extend: 'colvis',
				text:  '<i class="fa fa-columns"></i>',
				titleAttr: 'Ver Columnas'
			}
		]
	});
</script>
@endpush
