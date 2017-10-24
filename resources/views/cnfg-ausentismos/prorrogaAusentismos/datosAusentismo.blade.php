<div class="row">	 
	<div class="row">
		@include('widgets.forms.input', ['type'=>'select','column'=>8, 'name'=>'CONT_ID', 'label'=>'Prospecto', 'data'=>$arrContratos,'value','placeholder'=>'Seleccione un Prospecto','allowClear'=>true])
		<button ng-click="cargaAusentismo()"  class="col-xs-2">RESET</button>
	</div>
	<div class="row">
		<button type="button" class="btn btn-link" ng-click="mostrarOcultar()" ng-model="showHide"/><span ng-bind="showHide"></span></button> 
	</div> 
	<div class="row" ng-show="showResult">
		<!-- Diagnostico -->
		<div class="row" >			
			@include('widgets.forms.input', ['type'=>'text', 'column'=>3, 'name'=>'CIE10A', 'label'=>'CIE10','options'=>['ng-model'=>'ausentismo.diagnostico.DIAG_CODIGO','disabled'=>true]])
			@include('widgets.forms.input', ['type'=>'text', 'column'=>9, 'name'=>'DX_DESCRIPCION', 'label'=>'Descripcion Dx','options'=>['ng-model'=>'ausentismo.diagnostico.DIAG_DESCRIPCION','disabled'=>true]])
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
</div>