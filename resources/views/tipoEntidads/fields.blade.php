<!-- Tien Codigo Field -->
<div class="form-group  {{ $errors->has('TIEN_CODIGO') ? ' has-error' : '' }}">
    {!! Form::label('TIEN_CODIGO', 'Codigo:', ['class' => 'col-md-4 control-label Tien Codigo']) !!}
<div class='col-md-6'>
	
	{!! Form::text('TIEN_CODIGO', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'TIEN_CODIGO'])
	</div>
</div>

<!-- Tien Descripcion Field -->
<div class="form-group  {{ $errors->has('TIEN_DESCRIPCION') ? ' has-error' : '' }}">
    {!! Form::label('TIEN_DESCRIPCION', 'Descripcion:', ['class' => 'col-md-4 control-label Tien Descripcion']) !!}
<div class='col-md-6'>
	
	{!! Form::text('TIEN_DESCRIPCION', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'TIEN_DESCRIPCION'])
	</div>
</div>

<!-- Tien Observaciones Field -->
<div class="form-group  {{ $errors->has('TIEN_OBSERVACIONES') ? ' has-error' : '' }}">
    {!! Form::label('TIEN_OBSERVACIONES', 'Observaciones:', ['class' => 'col-md-4 control-label Tien Observaciones']) !!}
<div class='col-md-6'>
	
	{!! Form::text('TIEN_OBSERVACIONES', null, ['class' => 'form-control ']) !!}
	@include('widgets.forms.alerta',['name'=>'TIEN_OBSERVACIONES'])
	</div>
</div>


<!-- Submit Field 
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
</div>-->
