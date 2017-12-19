@push('head')
{!! Html::style('assets/stylesheets/select2/select2.min.css') !!}
{!! Html::style('assets/stylesheets/select2/select2-bootstrap.min.css') !!}
@endpush

@push('scripts')
{!! Html::script('assets/scripts/select2/select2.min.js') !!}
{!! Html::script('assets/scripts/select2/es.js') !!}

<script>
	$(function () {
		jQuery('select.readonly option:not(:selected)').attr('disabled',true);
		$.fn.select2.defaults.set("theme", "bootstrap");
		$.fn.select2.defaults.set("width", "100%");
		$('.selectpicker').select2();
	});

	$('form').on('reset', function() {
		$('.select2-selection__clear').trigger('mousedown');
		$('.selectpicker').val([]).select2();
	});
</script>
@endpush











