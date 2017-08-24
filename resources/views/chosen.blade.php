@push('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
	<script type="text/javascript">
		$(function () {
			//opciones del choosen select
			var options = {
				disable_search_threshold: 5,
				width: '100%',
				placeholder_text_single: 'Seleccione una opción',
				placeholder_text_multiple: 'Seleccione algunas opciones',
				no_results_text: 'Ningún resultado coincide.'
			};
			$('.chosen-select').chosen(options);
		});
	</script>
@endpush