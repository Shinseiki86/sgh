@include('chosen')

@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'CIUD_CODIGO', 'label'=>'Código', 'options'=>['maxlength' => '25'] ])

@include('widgets.forms.input', ['type'=>'text', 'column'=>8, 'name'=>'CIUD_NOMBRE', 'label'=>'Descripción', 'options'=>['maxlength' => '300'] ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'DEPA_ID', 'label'=>'Departamento', 'data'=>$arrDepartamentos])