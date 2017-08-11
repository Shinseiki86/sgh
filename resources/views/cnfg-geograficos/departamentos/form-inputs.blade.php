@include('widgets.forms.group', ['type'=>'text', 'name'=>'DEPA_CODIGO', 'label'=>'Código', 'options'=>['maxlength' => '25'] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'DEPA_NOMBRE', 'label'=>'Descripción', 'options'=>['maxlength' => '300'] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'PAIS_ID', 'label'=>'País', 'data'=>$arrPaises])