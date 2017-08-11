@include('widgets.forms.group', ['type'=>'text', 'name'=>'CIUD_CODIGO', 'label'=>'Código', 'options'=>['maxlength' => '25'] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'CIUD_NOMBRE', 'label'=>'Descripción', 'options'=>['maxlength' => '300'] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'DEPA_ID', 'label'=>'Departamento', 'data'=>$arrDepartamentos])