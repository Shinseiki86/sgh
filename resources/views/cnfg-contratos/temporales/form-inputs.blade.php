{{--@include('datepicker')--}}
{{--@include('chosen')--}}

@include('widgets.forms.group', ['type'=>'text', 'name'=>'TEMP_RAZONSOCIAL', 'label'=>'Razón Social', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'TEMP_NOMBRECOMERCIAL', 'label'=>'Nombre Comercial', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'TEMP_DIRECCION', 'label'=>'Dirección', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'TEMP_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
