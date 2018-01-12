{{--@include('datepicker')--}}
{{-- @include('chosen') --}}

@include('widgets.forms.input', ['type'=>'text', 'name'=>'ESRE_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '300', 'required'] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'ESRE_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])