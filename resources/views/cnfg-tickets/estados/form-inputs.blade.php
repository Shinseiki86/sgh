{{--@include('datepicker')--}}
{{-- @include('chosen')--}}
@include('select-color')

@include('widgets.forms.group', ['type'=>'text', 'name'=>'ESTI_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'color', 'name'=>'ESTI_COLOR', 'label'=>'Color'])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'ESTI_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

