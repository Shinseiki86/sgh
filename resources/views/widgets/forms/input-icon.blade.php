@push('head')
	{!! Html::style('assets/stylesheets/fontawesome-iconpicker.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/fontawesome-iconpicker.min.js') !!}
	<script type="text/javascript">
		$('.icp').iconpicker();
	</script>
@endpush

<div class="input-group">
	{{ Form::text( $name, old($name)?old($name):'fa-commenting-o', ['class'=>'form-control icp'] + (isset($options)?$options:[]) ) }}
    <span class="input-group-addon"></span>
</div>
