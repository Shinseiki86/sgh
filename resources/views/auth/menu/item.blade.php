<div class="dd-handle dd3-handle">Drag</div>
<div class="dd3-content">
	<i class="fa fa-{{ $item['MENU_ICON'] }} fa-fw"></i> 
	{{ $item['MENU_ID'].' - '.$item['MENU_LABEL'] }}
	<div class="pull-right">
		<a href="{{ url('auth/menu/'.$item['MENU_ID'].'/edit') }}">Edit</a>
		{{-- <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a> --}}
	</div>
</div>