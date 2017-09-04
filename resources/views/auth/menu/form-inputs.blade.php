{{-- @include('datepicker') --}}
{{-- @include('chosen') --}}

@include('widgets.forms.input', ['type'=>'text', 'name'=>'MENU_LABEL', 'label'=>'Label', 'options'=>['maxlength' => '20'] ])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'MENU_URL', 'label'=>'Destino (URL)', 'options'=>['maxlength' => '250'] ])

@include('widgets.forms.input', ['type'=>'icon', 'name'=>'MENU_ICON', 'label'=>'Ícono', 'options'=>['maxlength' => '250'] ])


{{-- @include('widgets.forms.input', ['type'=>'radio', 'name'=>'MENU_ENABLED', 'label'=>'Habilitado' ]) --}}

{{-- @include('widgets.forms.input', ['type'=>'select', 'name'=>'roles_ids', 'label'=>'Roles', 'data'=>$arrRoles, 'multiple'=>true, 'options'=>['data-live-search'=>'true']]) --}}

{{-- 		'MENU_PARENT',
		'MENU_ORDER',
 --}}