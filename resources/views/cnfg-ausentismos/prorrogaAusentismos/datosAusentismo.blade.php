<div class="row form-horizontal">
	@include('widgets.forms.input', ['type'=>'select','column'=>10, 'name'=>'AUSE_ID', 'label'=>'Ausentismo Inicial', 'data'=>$arrContratos,'value','placeholder'=>'Seleccione un Ausentismo','allowClear'=>true])
	<div class="col-xs-2 pull-right" style="margin-top: 25px;padding-left: 30px;">
		{{ Form::button('<i class="fa fa-search" aria-hidden="true"></i> Buscar', [
		'class'=>'btn btn-primary ',
		'type'=>'button',
		'ng-click'=>'cargaAusentismo()'		
		]) }}
	</div>
</div>
<div class="row form-horizontal hidden viewInfoAusentismo">
	<button type="button" class="btn btn-link pull-right" ng-click="mostrarOcultar()" ng-model="showHide">
		<span ng-show="!showResult" class="fa fa-caret-down"></span>
		<span ng-show="showResult" class="fa fa-caret-up"></span>
		<span ng-bind="showHide"></span>
	</button>
</div>

<div class="row form-horizontal hidden viewInfoAusentismo panel panel-default" ng-show="showResult" style="margin-top: 0px;padding-left: 20px;padding-right: 20px;">
	<!-- Diagnostico -->
	<div class="row" >
		<p>Datos del Ausentismo:</p>
		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'CIE10A', 'label'=>'CIE10','options'=>['ng-model'=>'ausentismo.ausentismo.diagnostico.DIAG_CODIGO','disabled'=>true]])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>8, 'name'=>'DX_DESCRIPCION', 'label'=>'Descripción Dx','options'=>['ng-model'=>'ausentismo.ausentismo.diagnostico.DIAG_DESCRIPCION','disabled'=>true]])
	</div>
	<div class="row">
		@include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'COAU_ID2', 'label'=>'Concepto Ausencia','options'=>['ng-model'=>'ausentismo.ausentismo.conceptoausencia.COAU_DESCRIPCION','disabled'=>true]])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'ENTI_ID', 'label'=>'Entidad Responsable','options'=>['ng-model'=>'ausentismo.ausentismo.entidad.ENTI_RAZONSOCIAL','disabled'=>true]])
	</div>
	<div class="row">
		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'AUSE_FECHAINICIO', 'label'=>'Fecha de Inicio','options'=>['ng-model'=>'ausentismo.ausentismo.AUSE_FECHAINICIO','disabled'=>true] ])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'AUSE_FECHAFINAL', 'label'=>'Fecha Final','options'=>['ng-model'=>'ausentismo.ausentismo.AUSE_FECHAFINAL','disabled'=>true] ])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'AUSE_FECHAACCIDENTE', 'label'=>'Fecha de Accidente','options'=>['ng-model'=>'ausentismo.ausentismo.AUSE_FECHAACCIDENTE','disabled'=>true] ])
	</div>
	<div class="row">
		@include('widgets.forms.input', ['type'=>'number', 'column'=>3, 'name'=>'AUSE_DIAS', 'label'=>'Total Dias','options'=>['ng-model'=>'ausentismo.ausentismo.AUSE_DIAS','disabled'=>true]])
		@include('widgets.forms.input', ['type'=>'number', 'column'=>6, 'name'=>'AUSE_IBC', 'label'=>'Ingreso Base de Cotizacion','options'=>['ng-model'=>'ausentismo.ausentismo.AUSE_IBC','disabled'=>true]])
		@include('widgets.forms.input', ['type'=>'number', 'column'=>3, 'name'=>'AUSE_VALOR', 'label'=>'VAlor Total','options'=>['ng-model'=>'ausentismo.ausentismo.AUSE_VALOR','disabled'=>true]])
	</div>
	<div class="row">
		<!-- Ause Observaciones Field -->
		@include('widgets.forms.input', [ 'type'=>'textarea','column'=>12, 'name'=>'AUSE_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300','ng-model'=>'ausentismo.ausentismo.AUSE_OBSERVACIONES','disabled'=>true] ])
	</div>
	<div class="row">
		<p>Listado de Prorrogas</p>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Numero</th>
					<th>Fecha Inicio</th>
					<th>Fecha Final</th>
					<th>Cantidad Dias</th>
					<th>Diagnostico</th>
					<th>Observaciones</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="prorroga in ausentismo.prorroga">
					<td>{%$index + 1%}</td>
					<td>{%prorroga.PROR_FECHAINICIO%}</td>
					<td>{%prorroga.PROR_FECHAFINAL%}</td>
					<td>{%prorroga.PROR_DIAS%}</td>
					<td>{%prorroga.diagnostico.DIAG_DESCRIPCION%}</td>
					<td>{%prorroga.PROR_OBSERVACIONES%}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>