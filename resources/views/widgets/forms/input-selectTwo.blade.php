  {!!Html::script('select2-4.0.3/dist/js/select2.js')!!}
  {!!Html::script('select2-4.0.3/dist/js/i18n/es.js')!!}
  {!!Html::style('select2-4.0.3/dist/css/select2.css',['rel'=>"stylesheet"])!!} 
  {!!Html::style('select2-4.0.3/dist/css/select2-bootstrap.css',['rel'=>"stylesheet"])!!} 
  <script>
    $("#{{$name}}").select2({
      allowClear: {{$allowClear}},
      placeholder: "{{$placeholder}}",
      theme: "bootstrap",
      
    });
</script> 
{{-- ejemplo de llamado
@section('selectTwo')
	@include('widgets.forms.input-selectTwo',['name'=>'EMPL_ID','placeholder'=>'Seleccione un Departamento','allowClear'=>true])

@endsection 
  --}}