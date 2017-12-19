<div class="row form-horizontal">
	@include('widgets.forms.input', ['type'=>'select','column'=>10, 'name'=>'CONT_ID', 'label'=>'Prospecto', 'data'=>$arrContratos,'value','placeholder'=>'Seleccione un Prospecto','allowClear'=>true])
	<div class="col-xs-2 pull-right" style="margin-top: 25px;padding-left: 30px;">
		{{ Form::button('<i class="fa fa-search" aria-hidden="true"></i> Buscar', [
			'class'=>'btn btn-primary ',
			'type'=>'button',
			'ng-click'=>'cargaAusentismo()'
		]) }}
	</div>
</div>

<div class="row hidden viewInfoAusentismo">
	<button type="button" class="btn btn-link pull-right" ng-click="mostrarOcultar()" ng-model="showHide">
		<span ng-show="!showResult" class="fa fa-caret-down"></span>
		<span ng-show="showResult" class="fa fa-caret-up"></span>
		<span ng-bind="showHide"></span>
	</button>
</div>
<div class="form-horizontal hidden viewInfoAusentismo" ng-show="showResult">
	<!-- Diagnostico -->
	<div class="row" >			
		@include('widgets.forms.input', ['type'=>'text', 'column'=>3, 'name'=>'CIE10A', 'label'=>'CIE10','options'=>['ng-model'=>'ausentismo.diagnostico.DIAG_CODIGO','disabled'=>true]])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>9, 'name'=>'DX_DESCRIPCION', 'label'=>'Descripción Dx','options'=>['ng-model'=>'ausentismo.diagnostico.DIAG_DESCRIPCION','disabled'=>true]])
	</div>
	<div class="row">
		@include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'COAU_ID', 'label'=>'Concepto Ausencia','options'=>['ng-model'=>'ausentismo.conceptoausencia.COAU_DESCRIPCION','disabled'=>true]])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'ENTI_ID', 'label'=>'Entidad Responsable','options'=>['ng-model'=>'ausentismo.entidad.ENTI_RAZONSOCIAL','disabled'=>true]])
	</div>
	<div class="row">
		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'AUSE_FECHAINICIO', 'label'=>'Fecha de Inicio','options'=>['ng-model'=>'ausentismo.AUSE_FECHAINICIO','disabled'=>true] ])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'AUSE_FECHAFINAL', 'label'=>'Fecha Final','options'=>['ng-model'=>'ausentismo.AUSE_FECHAFINAL','disabled'=>true] ])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'AUSE_FECHAACCIDENTE', 'label'=>'Fecha de Accidente','options'=>['ng-model'=>'ausentismo.AUSE_FECHAACCIDENTE','disabled'=>true] ])
	</div>
	<div class="row">
		@include('widgets.forms.input', ['type'=>'number', 'column'=>3, 'name'=>'AUSE_DIAS', 'label'=>'Total Dias','options'=>['ng-model'=>'ausentismo.AUSE_DIAS','disabled'=>true]])
		@include('widgets.forms.input', ['type'=>'number', 'column'=>5, 'name'=>'AUSE_IBC', 'label'=>'Ingreso Base de Cotizacion','options'=>['ng-model'=>'ausentismo.AUSE_IBC','disabled'=>true]])
		@include('widgets.forms.input', ['type'=>'number', 'column'=>4, 'name'=>'AUSE_VALOR', 'label'=>'VAlor Total','options'=>['ng-model'=>'ausentismo.AUSE_VALOR','disabled'=>true]])
	</div>
	<div class="row">
		<!-- Ause Observaciones Field -->
		@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'AUSE_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300','ng-model'=>'ausentismo.AUSE_OBSERVACIONES','disabled'=>true] ])
	</div>
</div>