{{-- @push('head')
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
@endpush --}}

@push('head')
  {!! Html::style('assets/stylesheets/select2/select2.min.css') !!}
  {!! Html::style('assets/stylesheets/select2/select2-bootstrap.min.css') !!}
@endpush

@push('scripts')
  {!! Html::script('assets/scripts/select2/select2.min.js') !!}
  {!! Html::script('assets/scripts/select2/es.js') !!}

  <script>
    $('.selectpicker').select2({
      theme: "bootstrap"
    });
  </script>
@endpush
