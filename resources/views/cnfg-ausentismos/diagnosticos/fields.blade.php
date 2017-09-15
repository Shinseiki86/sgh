{{--@include('datepicker')--}}
{{-- @include('chosen') --}}
<div class='col-md-6 col-md-offset-4'>

@include('widgets.forms.input', ['type'=>'text', 'name'=>'DIAG_CODIGO', 'label'=>'Código', 'options'=>['maxlength' => '20'] ])
@include('widgets.forms.input', ['type'=>'text', 'name'=>'DIAG_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

</div>

