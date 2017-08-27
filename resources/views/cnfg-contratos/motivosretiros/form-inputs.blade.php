{{--@include('datepicker')--}}
{{--@include('chosen')--}}

@include('widgets.forms.group', ['type'=>'text', 'name'=>'MORE_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'MORE_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
