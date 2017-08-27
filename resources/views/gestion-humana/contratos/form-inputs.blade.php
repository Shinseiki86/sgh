@include('datepicker')
@include('chosen')

@include('widgets.forms.group', ['type'=>'select', 'name'=>'PROS_ID', 'label'=>'Prospecto', 'data'=>$arrProspectos])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'EMPL_ID', 'label'=>'Empleador', 'data'=>$arrEmpleadores])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'TEMP_ID', 'label'=>'Temporal', 'data'=>$arrTemporales])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'TIEM_ID', 'label'=>'Tipo de empleador', 'data'=>$arrTiposempleadores])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CECO_ID', 'label'=>'Centro de costo', 'data'=>$arrCentroscostos])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'ESCO_ID', 'label'=>'Estado de contrato', 'data'=>$arrEstadoscontrato])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'TICO_ID', 'label'=>'Tipo de contrato', 'data'=>$arrTiposcontrato])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CLCO_ID', 'label'=>'Clase de contrato', 'data'=>$arrClasescontrato])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'RIES_ID', 'label'=>'Riesgo ARL', 'data'=>$arrRiesgos])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CARG_ID', 'label'=>'Cargo', 'data'=>$arrCargos])

@include('widgets.forms.group', ['type'=>'date', 'name'=>'CONT_FECHAINGRESO', 'label'=>'Fecha de Ingreso' ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CIUD_CONTRATA', 'label'=>'Ciudad de Contratación', 'data'=>$arrCiudades])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CIUD_SERVICIO', 'label'=>'Ciudad de Servicio', 'data'=>$arrCiudades])

{{--@include('widgets.forms.group', ['type'=>'date', 'name'=>'CONT_FECHARETIRO', 'label'=>'Fecha de Retiro' ])--}}

@include('widgets.forms.group', ['type'=>'select', 'name'=>'MORE_ID', 'label'=>'Motivo de Retiro', 'data'=>$arrMotivosretiro])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'CONT_SALARIO', 'label'=>'Salario', 'options'=>['size' => '99999999999999' ] ])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'CONT_VARIABLE', 'label'=>'Variable', 'options'=>['size' => '99999999999999' ] ])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'CONT_RODAJE', 'label'=>'Rodaje', 'options'=>['size' => '99999999999999' ] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'GRUP_ID', 'label'=>'Grupo de Empleado', 'data'=>$arrGrupos])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'TURN_ID', 'label'=>'Turno', 'data'=>$arrTurnos])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'JEFE_ID', 'label'=>'Jefe Inmediato', 'data'=>$arrJefes])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CONT_CASOMEDICO', 'label'=>'¿R.M?', 'data'=>['NO' => 'NO', 'SI' => 'SI']])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'CONT_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
