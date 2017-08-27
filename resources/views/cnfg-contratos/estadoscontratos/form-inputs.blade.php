{{--@include('datepicker')--}}
{{--@include('chosen')--}}

@include('widgets.forms.group', ['type'=>'text', 'name'=>'ESCO_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'ESCO_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
