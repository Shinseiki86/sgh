@push('head')
{!! Html::style('assets/stylesheets/select2/select2.min.css') !!}
{!! Html::style('assets/stylesheets/select2/select2-bootstrap.min.css') !!}
<style type="text/css">
	/*Fix para select ocultos*/
	.selectpicker {width: 100% !important;}
	span.select2.select2-container{width:100% !important;}
</style>
@endpush

@push('scripts')
{!! Html::script('assets/scripts/select2/select2.min.js') !!}
{!! Html::script('assets/scripts/select2/es.js') !!}

<script>
	$(function () {
		jQuery('select.readonly option:not(:selected)').attr('disabled',true);
		$.fn.select2.defaults.set('theme', 'bootstrap');
		$.fn.select2.defaults.set('width', '100%');
		$('.selectpicker').select2();
		$('.selectpickerAjax').select2({
			ajax: {
				processResults: function (data) {
					data = $.map( data, function( value, index ) {
						return {id: index, text: value};
					});
					return {results: data};
				}
			}
		});
	});

	$('form').on('reset', function() {
		$('.selectpicker').val([]).trigger('change');
	});
</script>
@endpush











