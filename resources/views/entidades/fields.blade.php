<div class='col-md-4 col-md-offset-4'>
	<!-- Enti Codigo Field -->
	<div class="form-group  {{ $errors->has('ENTI_CODIGO') ? ' has-error' : '' }}">
		{!! Form::label('ENTI_CODIGO', 'Enti Codigo:', ['class' => 'control-label Enti Codigo']) !!}
		{!! Form::text('ENTI_CODIGO', null, ['class' => 'form-control ']) !!}
		@include('widgets.forms.alerta',['name'=>'ENTI_CODIGO'])
	</div>
	<!-- Enti Nit Field -->
	<div class="form-group  {{ $errors->has('ENTI_NIT') ? ' has-error' : '' }}">
		{!! Form::label('ENTI_NIT', 'Enti Nit:', ['class' => 'control-label Enti Nit']) !!}
		{!! Form::text('ENTI_NIT', null, ['class' => 'form-control ']) !!}
		@include('widgets.forms.alerta',['name'=>'ENTI_NIT'])
	</div>
	<!-- Enti Razonsocial Field -->
	<div class="form-group  {{ $errors->has('ENTI_RAZONSOCIAL') ? ' has-error' : '' }}">
		{!! Form::label('ENTI_RAZONSOCIAL', 'Enti Razonsocial:', ['class' => 'control-label Enti Razonsocial']) !!}
		{!! Form::text('ENTI_RAZONSOCIAL', null, ['class' => 'form-control ']) !!}
		@include('widgets.forms.alerta',['name'=>'ENTI_RAZONSOCIAL'])
	</div>
	<!-- Enti Observaciones Field -->
	<div class="form-group  {{ $errors->has('ENTI_OBSERVACIONES') ? ' has-error' : '' }}">
		{!! Form::label('ENTI_OBSERVACIONES', 'Enti Observaciones:', ['class' => 'control-label Enti Observaciones']) !!}
		{!! Form::text('ENTI_OBSERVACIONES', null, ['class' => 'form-control ']) !!}
		@include('widgets.forms.alerta',['name'=>'ENTI_OBSERVACIONES'])
	</div>
	<!-- Tien Id Field -->
	{{-- <div class="form-group  {{ $errors->has('TIEN_ID') ? ' has-error' : '' }}">
		{!! Form::label('TIEN_ID', 'Tien Id:', ['class' => 'control-label Tien Id']) !!}
		<div class='col-md-6'>
			{!! Form::number('TIEN_ID', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'TIEN_ID'])
		</div>
	</div> --}}
	@include('widgets.forms.group', ['type'=>'select', 'name'=>'TIEN_ID', 'label'=>'Tipo Entidad', 'data'=>$arrTipoEntidad])
</div>