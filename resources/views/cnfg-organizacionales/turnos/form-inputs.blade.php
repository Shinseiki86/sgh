@include('timepicker')
@include('chosen')

@include('widgets.forms.input', ['type'=>'text', 'name'=>'TURN_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'TURN_CODIGO', 'label'=>'Código', 'options'=>['maxlength' => '10'] ])

@include('widgets.forms.input', ['type'=>'date', 'name'=>'TURN_HORAINICIO', 'label'=>'Hora Inicial' ])
@include('widgets.forms.input', ['type'=>'date', 'name'=>'TURN_HORAFINAL', 'label'=>'Hora Final' ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'EMPL_ID', 'label'=>'Empleador', 'data'=>$arrEmpleadores])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'TURN_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

