{{--@include('datepicker')--}}
{{-- @include('chosen') --}}

@include('widgets.forms.input', ['type'=>'text', 'name'=>'ESRE_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '300'] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'ESRE_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])