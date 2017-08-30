{{ Form::select( isset($multiple) && $multiple ?$name.'[]':$name, (isset($multiple) && $multiple ? []:[null=>'']) + (isset($data)?$data:[]) , isset($value)? $value:old($name), ['id'=>$name, 'class'=>'form-control selectpicker'.(isset($readonly) && $readonly ?' readonly':''), 'data-size'=>5] + (isset($options)?$options:[]) + (isset($multiple) && $multiple ? ['multiple']:[]) ) }}

@push('scripts')
<script type="text/javascript">
	$('#{{$name}}')
		.val(
			{{ old($name)!=null ?  json_encode(array_map('intval', old($name))) : (isset(${$name})?${$name}:'') }}
		)//.selectpicker('render');
</script>
@endpush
