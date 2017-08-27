{{ Form::select( isset($multiple) && $multiple ?$name.'[]':$name , [''=>'']+(isset($data)?$data:[]) , old($name), ['id'=>$name, 'class'=>'form-control chosen-select'] + (isset($options)?$options:[]) + (isset($multiple) && $multiple ? ['multiple']:[]) ) }}

@if(isset(${$name}))
@push('scripts')
	<script type="text/javascript">
		$('#{{$name}}')
			.val({{ old($name) != null ?  json_encode(array_map('intval', old($name))) : ${$name} }})
			.trigger("chosen:updated");
	</script>
@endpush
@endif