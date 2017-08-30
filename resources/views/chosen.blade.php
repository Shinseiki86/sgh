@push('head')
	{!! Html::style('assets/stylesheets/bootstrap/bootstrap-select.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/bootstrap/bootstrap-select-es_ES.min.js') !!}
	<script type="text/javascript">
		$(function () {
			//opciones del choosen select
			jQuery('select.readonly option:not(:selected)').attr('disabled',true);
		});
	</script>
@endpush