@include('datepicker')
@include('chosen')

@include('widgets.forms.input', ['type'=>'text', 'name'=>'TURN_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100', 'required'] ])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'TURN_CODIGO', 'label'=>'Código', 'options'=>['maxlength' => '10', 'required'] ])

@include('widgets.forms.input', ['type'=>'time', 'name'=>'TURN_HORAINICIOPI', 'label'=>'Hora Inicial Primer Intervalo', 'required' ])
@include('widgets.forms.input', ['type'=>'time', 'name'=>'TURN_HORAFINALPI', 'label'=>'Hora Final Primer Intervalo', 'required' ])

@include('widgets.forms.input', ['type'=>'time', 'name'=>'TURN_HORAINICIOSI', 'label'=>'Hora Inicial Segundo Intervalo' ])
@include('widgets.forms.input', ['type'=>'time', 'name'=>'TURN_HORAFINALSI', 'label'=>'Hora Final Segundo Intervalo' ])

@include('widgets.forms.input', ['type'=>'time', 'name'=>'TURN_HORAINICIOTI', 'label'=>'Hora Inicial Tercer Intervalo' ])
@include('widgets.forms.input', ['type'=>'time', 'name'=>'TURN_HORAFINALTI', 'label'=>'Hora Inicial Tercer Intervalo' ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'TURN_TIPOTURNO', 'label'=>'Tipo de Turno', 'data'=>$arrTipoTurnos, 'options'=>['data-live-search'=>'true', 'required']])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'TURN_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

