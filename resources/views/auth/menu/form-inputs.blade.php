{{-- @include('datepicker') --}}
@include('chosen')
<div class='col-md-8 col-md-offset-2'>

@include('widgets.forms.input', ['type'=>'text', 'name'=>'MENU_LABEL', 'label'=>'Label', 'options'=>['maxlength' => '20'] ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'MENU_URL', 'label'=>'Destino (URL)', 'data'=>$arrRoutes, 'allowNew'=>true, 'allowClear'=>true])

@include('widgets.forms.input', ['type'=>'checkbox', 'column'=>1, 'name'=>'MENU_ENABLED', 'label'=>'Habilitado' ])


{{-- @include('widgets.forms.input', ['type'=>'select', 'name'=>'roles_ids', 'label'=>'Roles', 'data'=>$arrRoles, 'multiple'=>true, 'options'=>['data-live-search'=>'true']]) --}}

{{-- 		'MENU_PARENT',
		'MENU_ORDER',
 --}}

</div>