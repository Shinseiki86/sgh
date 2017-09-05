<div class='col-md-4 col-md-offset-4'>
	<!-- Coau Codigo Field -->
<div class="form-group  {{ $errors->has('COAU_CODIGO') ? ' has-error' : '' }}">
    {!! Form::label('COAU_CODIGO', 'Codigo:', ['class' => 'control-label Coau Codigo']) !!}
	{!! Form::text('COAU_CODIGO', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'COAU_CODIGO'])
</div>

<!-- Coau Descripcion Field -->
<div class="form-group  {{ $errors->has('COAU_DESCRIPCION') ? ' has-error' : '' }}">
    {!! Form::label('COAU_DESCRIPCION', 'Descripcion:', ['class' => 'control-label Coau Descripcion']) !!}
	{!! Form::text('COAU_DESCRIPCION', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'COAU_DESCRIPCION'])
</div>

<!-- Coau Observaciones Field -->
<div class="form-group  {{ $errors->has('COAU_OBSERVACIONES') ? ' has-error' : '' }}">
    {!! Form::label('COAU_OBSERVACIONES', 'Observaciones:', ['class' => 'control-label Coau Observaciones']) !!}
	{!! Form::text('COAU_OBSERVACIONES', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'COAU_OBSERVACIONES'])
</div>

<!-- Tiau Id Field -->

@include('widgets.forms.input', ['type'=>'select', 'name'=>'TIAU_ID', 'label'=>'Tipo Ausentismo', 'data'=>$arrTipoAusentismo,'selectpicker'=>false,'column'=>14, 'options'=>['data-live-search'=>'true']])

<!-- Tien Id Field -->

@include('widgets.forms.input', ['type'=>'select', 'name'=>'TIEN_ID', 'label'=>'Tipo Entidad', 'data'=>$arrTipoEntidad,'selectpicker'=>false,'column'=>14, 'options'=>['data-live-search'=>'true']])


</div>

@include('widgets.forms.input-selectTwoM',['columns'=>[['name'=>'TIAU_ID','placeholder'=>'Seleccione un Tipo de Ausentismo','allowClear'=>true],['name'=>'TIEN_ID','placeholder'=>'Seleccione un Tipo de Entidad','allowClear'=>true]]])
<!-- Submit Field 
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
</div>-->
