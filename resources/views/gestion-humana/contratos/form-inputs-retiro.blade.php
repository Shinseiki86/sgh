@include('datepicker')
@include('chosen')
@include('utilidades.validacion-contratos')



<div class="col-md-10">

<input type="hidden" name="CONT_ID" name="CONT_ID" value="{{ $contrato->CONT_ID}}">


@include('widgets.forms.input', ['type'=>'select', 'column'=>5  ,'name'=>'EMPL_ID', 'label'=>'Empleador', 'data'=>$arrEmpleadores, 'hidden'=>'true', 'options'=>['disabled']])
</div>

<div class="col-md-10">

@include('widgets.forms.input', ['type'=>'select', 'column'=>5, 'name'=>'GERE_ID', 'label'=>'Gerencia', 'data'=>$arrGerencias, 'options'=>['disabled']])


</div>

<div class="col-md-10">

@include('widgets.forms.input', ['type'=>'select', 'column'=>5, 'name'=>'CARG_ID', 'label'=>'Cargo', 'data'=>$arrCargos, 'options'=>['disabled']])
</div>

<div class="col-md-10">

@include('widgets.forms.input', ['type'=>'select', 'column'=>5,'name'=>'PROS_ID', 'label'=>'Empleado', 'data'=>$arrProspectos, 'options'=>['disabled']])

@include('widgets.forms.input', ['type'=>'date', 'column'=>3, 'name'=>'CONT_FECHAINGRESO', 'label'=>'Fecha de Ingreso', 'options'=>['disabled']])
</div>

<div class="col-md-10">
@include('widgets.forms.input', ['type'=>'select', 'column'=>5, 'name'=>'MORE_ID', 'label'=>'Motivo de Retiro', 'data'=>$arrMotivosretiro, 'options'=>['required']])

@include('widgets.forms.input', ['type'=>'date', 'column'=>3, 'name'=>'CONT_FECHARETIRO', 'label'=>'Fecha de Retiro', 'options'=>['required']])
</div>

<div class="col-md-10">
@include('widgets.forms.input', ['type'=>'select', 'column'=>2, 'name'=>'PROS_MARCA', 'label'=>'¿Descartar Hoja de Vida?','value'=>'NO', 'data'=>['NO' => 'NO', 'SI' => 'SI']])
</div>

<div class="col-md-10">
@include('widgets.forms.input', [ 'type'=>'textarea', 'column'=>8, 'name'=>'CONT_MOREOBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
</div>









</div>