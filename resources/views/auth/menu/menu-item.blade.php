
	<li class="dd-item" data-id="{{$item['MENU_ID']}}">
		<div class="dd-handle">
			<i class="fa fa-{{ $item['MENU_ICON'] }} fa-fw"></i> 
			{{ $item['MENU_ID'].' - '.$item['MENU_LABEL'] }}

	        <div class="pull-right">
	          <a href="{{ url('auth/menu/edit/'.$item['MENU_ID']) }}">Edit</a>
	          <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a>
	        </div>

		</div>
	@if ($item['submenu'] != [])

		<ol class="dd-list">
		{{-- @include('auth.menu.item', ['item' => $item]) --}}
			@foreach ($item['submenu'] as $submenu)
				@if ($submenu['submenu'] == [])
					<li class="dd-item" data-id="{{$submenu['MENU_ID']}}">
						<div class="dd-handle">
							<i class="fa fa-{{ $submenu['MENU_ICON'] }} fa-fw"></i> 
							{{ $submenu['MENU_ID'].' - '.$submenu['MENU_LABEL'] }}


					        <div class="pull-right">
					          <a href="{{ url('auth/menu/edit/'.$item['MENU_ID']) }}">Edit</a>
					          <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a>
					        </div>

						</div>
					</li>
				@else
					{{-- @include('auth.menu.menu-item', [ 'item' => $submenu ]) --}}
				@endif
			@endforeach
		</ol>
	@endif

	</li>


{{-- 

<div class="dd" id="nestable3">
    <ol class="dd-list">
        <li class="dd-item dd3-item" data-id="13">
            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 13</div>
        </li>
        <li class="dd-item dd3-item" data-id="14">
            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 14</div>
        </li>
        <li class="dd-item dd3-item" data-id="15">
            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 15</div>
            <ol class="dd-list">
                <li class="dd-item dd3-item" data-id="16">
                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 16</div>
                </li>
                <li class="dd-item dd3-item" data-id="17">
                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 17</div>
                </li>
                <li class="dd-item dd3-item" data-id="18">
                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 18</div>
                </li>
            </ol>
        </li>
    </ol>
</div>




	'MENU_LABEL',
	'MENU_URL',
	'MENU_ICON',
	'MENU_PARENT',
	'MENU_ORDER',
	'MENU_ENABLED',
--}}

