{{--@include('datepicker')--}}
@include('chosen')

@include('widgets.forms.input', ['type'=>'text', 'name'=>'CECO_CODIGO', 'label'=>'Código', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'CECO_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'GERE_ID', 'label'=>'Gerencia', 'data'=>$arrGerencias])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'CECO_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
