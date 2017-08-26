<!-- Enti Codigo Field -->
<div class="form-group  {{ $errors->has('ENTI_CODIGO') ? ' has-error' : '' }}">
    {!! Form::label('ENTI_CODIGO', 'Enti Codigo:', ['class' => 'col-md-4 control-label Enti Codigo']) !!}
<div class='col-md-6'>
	
	{!! Form::text('ENTI_CODIGO', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'ENTI_CODIGO'])
	</div>
</div>

<!-- Enti Nit Field -->
<div class="form-group  {{ $errors->has('ENTI_NIT') ? ' has-error' : '' }}">
    {!! Form::label('ENTI_NIT', 'Enti Nit:', ['class' => 'col-md-4 control-label Enti Nit']) !!}
<div class='col-md-6'>
	
	{!! Form::text('ENTI_NIT', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'ENTI_NIT'])
	</div>
</div>

<!-- Enti Razonsocial Field -->
<div class="form-group  {{ $errors->has('ENTI_RAZONSOCIAL') ? ' has-error' : '' }}">
    {!! Form::label('ENTI_RAZONSOCIAL', 'Enti Razonsocial:', ['class' => 'col-md-4 control-label Enti Razonsocial']) !!}
<div class='col-md-6'>	
	{!! Form::text('ENTI_RAZONSOCIAL', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'ENTI_RAZONSOCIAL'])
	</div>
</div>

<!-- Enti Observaciones Field -->
<div class="form-group  {{ $errors->has('ENTI_OBSERVACIONES') ? ' has-error' : '' }}">
    {!! Form::label('ENTI_OBSERVACIONES', 'Enti Observaciones:', ['class' => 'col-md-4 control-label Enti Observaciones']) !!}
<div class='col-md-6'>
	
	{!! Form::text('ENTI_OBSERVACIONES', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'ENTI_OBSERVACIONES'])
	</div>
</div>

<!-- Tien Id Field -->
{{-- <div class="form-group  {{ $errors->has('TIEN_ID') ? ' has-error' : '' }}">
    {!! Form::label('TIEN_ID', 'Tien Id:', ['class' => 'col-md-4 control-label Tien Id']) !!}
    <div class='col-md-6'>
		{!! Form::number('TIEN_ID', null, ['class' => 'form-control']) !!}
		@include('widgets.forms.alerta',['name'=>'TIEN_ID'])
	</div>
</div> --}}
@include('widgets.forms.group', ['type'=>'select', 'name'=>'TIEN_ID', 'label'=>'Tipo Entidad', 'data'=>$arrTipoEntidad])


<!-- Submit Field 
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
</div>-->
