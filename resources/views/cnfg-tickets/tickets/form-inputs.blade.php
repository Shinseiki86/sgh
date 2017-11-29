@include('datepicker')
@include('chosen')

@include('utilidades.select-dinamico', ['url'=>'cnfg-tickets/buscaGrupo', 'selectPadre'=>'EMPL_ID', 'selectHijo'=>'GRUP_ID', 'idBusqueda'=>'GRUP_ID', 'nombreBusqueda'=>'GRUP_DESCRIPCION', 'prepend'=>'Seleccione un Grupo'])

@include('utilidades.select-dinamico', ['url'=>'cnfg-tickets/buscaTurno', 'selectPadre'=>'EMPL_ID', 'selectHijo'=>'TURN_ID', 'idBusqueda'=>'TURN_ID', 'nombreBusqueda'=>'TURN_DESCRIPCION', 'prepend'=>'Seleccione un Turno'])

<div class='col-md-8 col-md-offset-2'>

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'EMPL_ID', 'label'=>'Empleador', 'data'=>$arrEmpleadores])

@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'TICK_FECHAEVENTO', 'label'=>'Fecha del Evento' ])

{{-- DISABLED EN CREATE, SELECT DEFAULT 1 --}}
@if(current_route_action() == 'create')
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'ESTI_ID', 'label'=>'Estado', 'data'=>$arrEstados, 'value'=>1, 'class'=>'readonly'])
@else
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'ESTI_ID', 'label'=>'Estado', 'data'=>$arrEstados])
@endif

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'CATE_ID', 'label'=>'Categoría', 'data'=>$arrCategorias])

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'PRIO_ID', 'label'=>'Prioridad', 'data'=>$arrPrioridad])

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'CONT_ID', 'label'=>'Empleado', 'data'=>$arrContratos])

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'TIIN_ID', 'label'=>'Tipo de Incidente', 'data'=>$arrTiposIncidentes])


@include('widgets.forms.input', ['type'=>'select', 'column'=>8, 'name'=>'GRUP_ID', 'label'=>'Grupo de Empleado', 'data'=>$arrGrupos])

@include('widgets.forms.input', ['type'=>'select', 'column'=>4, 'name'=>'TURN_ID', 'label'=>'Turno', 'data'=>$arrTurnos])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'TICK_DESCRIPCION', 'label'=>'Descripción de los hechos', 'options'=>['maxlength' => '3000'] ])

@include('widgets.forms.input', ['type'=>'file', 'name'=>'TICK_ARCHIVO', 'label'=>'Evidencia'])


{{-- DISABLED EN CREATE, SELECT DEFAULT 1 --}}
@if(current_route_action() == 'create')
@include('widgets.forms.input', ['type'=>'select', 'name'=>'ESAP_ID', 'label'=>'Estado de Aprobación', 'data'=>$arrEstadosAprobacion, 'value'=>1, 'class'=>'readonly'])
@else
@include('widgets.forms.input', ['type'=>'select', 'name'=>'ESAP_ID', 'label'=>'Estado de Aprobación', 'data'=>$arrEstadosAprobacion])
@endif

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'TICK_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

</div>