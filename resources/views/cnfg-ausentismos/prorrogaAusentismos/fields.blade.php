@include('datepicker')
@include('chosen')
<div class='col-md-8 col-md-offset-2'>
	<!-- Ause Id Field -->
<div class="col-xs-12"> 
	<div class="form-group  {{ $errors->has('AUSE_ID') ? ' has-error' : '' }}">
	    {!! Form::label('AUSE_ID', 'Ause Id:', ['class' => 'control-label Ause Id']) !!}
	{!! Form::number('AUSE_ID', null, ['class' => 'form-control']) !!}
		@include('widgets.forms.alerta',['name'=>'AUSE_ID'])
	</div>
</div>

<!-- Diag Id Field -->
<div class="col-xs-12"> 
	<div class="form-group  {{ $errors->has('DIAG_ID') ? ' has-error' : '' }}">
	    {!! Form::label('DIAG_ID', 'Diag Id:', ['class' => 'control-label Diag Id']) !!}
	{!! Form::number('DIAG_ID', null, ['class' => 'form-control']) !!}
		@include('widgets.forms.alerta',['name'=>'DIAG_ID'])
	</div>
</div>

<!-- Coau Id Field -->
<div class="col-xs-12"> 
	<div class="form-group  {{ $errors->has('COAU_ID') ? ' has-error' : '' }}">
	    {!! Form::label('COAU_ID', 'Coau Id:', ['class' => 'control-label Coau Id']) !!}
	{!! Form::number('COAU_ID', null, ['class' => 'form-control']) !!}
		@include('widgets.forms.alerta',['name'=>'COAU_ID'])
	</div>
</div>

<!-- Pror Fechainicio Field -->
<div class="col-xs-12"> 
	<div class="form-group  {{ $errors->has('PROR_FECHAINICIO') ? ' has-error' : '' }}">
	    {!! Form::label('PROR_FECHAINICIO', 'Pror Fechainicio:', ['class' => 'control-label Pror Fechainicio']) !!}
	{!! Form::date('PROR_FECHAINICIO', null, ['class' => 'form-control']) !!}
		@include('widgets.forms.alerta',['name'=>'PROR_FECHAINICIO'])
	</div>
</div>

<!-- Pror Fechafinal Field -->
<div class="col-xs-12"> 
	<div class="form-group  {{ $errors->has('PROR_FECHAFINAL') ? ' has-error' : '' }}">
	    {!! Form::label('PROR_FECHAFINAL', 'Pror Fechafinal:', ['class' => 'control-label Pror Fechafinal']) !!}
	{!! Form::date('PROR_FECHAFINAL', null, ['class' => 'form-control']) !!}
		@include('widgets.forms.alerta',['name'=>'PROR_FECHAFINAL'])
	</div>
</div>

<!-- Pror Dias Field -->
<div class="col-xs-12"> 
	<div class="form-group  {{ $errors->has('PROR_DIAS') ? ' has-error' : '' }}">
	    {!! Form::label('PROR_DIAS', 'Pror Dias:', ['class' => 'control-label Pror Dias']) !!}
	{!! Form::number('PROR_DIAS', null, ['class' => 'form-control']) !!}
		@include('widgets.forms.alerta',['name'=>'PROR_DIAS'])
	</div>
</div>

<!-- Pror Observaciones Field -->
<div class="col-xs-12"> 
	<div class="form-group  {{ $errors->has('PROR_OBSERVACIONES') ? ' has-error' : '' }}">
	    {!! Form::label('PROR_OBSERVACIONES', 'Pror Observaciones:', ['class' => 'control-label Pror Observaciones']) !!}
	{!! Form::textarea('PROR_OBSERVACIONES', null, ['class' => 'form-control']) !!}
		@include('widgets.forms.alerta',['name'=>'PROR_OBSERVACIONES'])
	</div>
</div>


</div>
<!-- Submit Field 
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
</div>-->
