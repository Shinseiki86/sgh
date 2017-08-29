<li>
    @if ($item['submenu'] == [])
        <a href="{{ url($item['MENU_LABEL']) }}">
            <i class="fa fa-{{ $item['MENU_ICON'] }} fa-fw"></i> 
            {{ $item['MENU_LABEL'] }}
        </a>
    @else
        <a href="#" class="dropdown-collapse">
            <i class="fa fa-{{ $item['MENU_ICON'] }} fa-fw"></i> 
            <span class="side-menu-title">{{ $item['MENU_LABEL'] }}</span><span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <li><a href="{{ url($submenu['MENU_URL']) }}">
                        <i class="fa fa-{{ $submenu['MENU_ICON'] }} fa-fw"></i> 
                        {{ $submenu['MENU_LABEL'] }}
                    </a></li>
                @else
                    @include('layouts.menu.menu-item', [ 'item' => $submenu ])
                @endif
            @endforeach
        </ul>
    @endif
</li>
