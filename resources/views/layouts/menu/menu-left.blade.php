<nav role="navigation" style="margin-bottom: 0; margin-top: -1px;">
	<div class="navbar-default sidebar" role="navigation">

		<div class="sidebar-nav navbar-collapse" id="sidebar-area">
			<ul class="nav" id="sidebar">

				<li class="sidebar-search">
					<div class="input-group custom-search-form">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							<i class="fa fa-search"></i>
						</button>
					</span>
					</div>
					<div  class="search-icon">
						<a href="#"><i class="fa fa fa-search fa-fw"></i></a>
					</div>
					<!-- /input-group -->
				</li>

				@if(isset($menus))
                @foreach ($menus as $key => $item)
					{{-- @if(Entrust::can(['usuarios-*', 'roles-*', 'permisos-*'])) --}}
	                    @if ($item['MENU_PARENT'] != 0)
	                        @break
	                    @endif
	                    @include('layouts.menu.menu-list', ['item' => $item])
	                {{-- @endif --}}
                @endforeach
				@endif
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
</nav>
<!-- /.navbar-static-side -->
