@include('chosen')
@include('datepicker')
@include('widgets.validaFecha',['fecha1'=>'PROR_FECHAINICIO','fecha2'=>'PROR_FECHAFINAL','fechaIn'=>'AUSE_FECHAFINAL'])
@include('widgets.autocomplete',['first'=>'DX_DESCRIPCIONP','ruta'=>'autocomplete','cod'=>'CIE10','id'=>'DIAG_ID'])
@include('widgets.buscarV',['FieldClave'=>'CIE10','FieldDescripcion'=>'DX_DESCRIPCIONP','ruta'=>'cnfg-ausentismos/buscaDx','colDescripcion'=>'DIAG_DESCRIPCION','FieldId'=>'DIAG_ID','colId'=>'DIAG_ID'])
<div class='row'>	
	<!-- Diagnostico -->
	<div class="row">
		{{ Form::hidden('AUSE_ID', null, array('id' => 'AUSE_ID')) }}
		{{ Form::hidden('DIAG_ID', null, array('id' => 'DIAG_ID')) }}
		@include('widgets.forms.input', ['type'=>'text', 'column'=>2, 'name'=>'CIE10', 'label'=>'CIE10'])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'DX_DESCRIPCIONP', 'label'=>'Descripción Dx'])
		@include('widgets.forms.input', ['type'=>'select', 'column'=>4, 'name'=>'COAU_ID', 'label'=>'Concepto Ausencia', 'data'=>$arrConceptoAusentismo, 'placeholder'=>'Seleccione un Concepto','allowClear'=>true])
	</div>	
	<div class="row">
		@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'PROR_FECHAINICIO', 'label'=>'Fecha de Inicio' ])
		@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'PROR_FECHAFINAL', 'label'=>'Fecha Final' ])
		@include('widgets.forms.input', ['type'=>'number', 'column'=>4, 'name'=>'PROR_DIAS', 'label'=>'Total Dias'])		
	</div>
	<div class="row">
		<!-- Ause Observaciones Field -->
		@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'PROR_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
	</div>
</div>
<!-- Submit Field
<div class="form-group col-sm-12">
	{{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
</div>-->