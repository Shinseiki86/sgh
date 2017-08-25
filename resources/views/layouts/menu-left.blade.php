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

				@if(Entrust::can(['usuario-*', 'rol-*', 'permiso-*']))
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-user-circle-o fa-fw"></i> <span class="side-menu-title">Usuarios y roles</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">
						@if(Entrust::can('usuario-*'))
						<li>
							<a href="{{ url ('auth/usuarios') }}"><i class="fa fa-user fa-fw"></i> Usuarios</a>
						</li>
						@endif
						@if(Entrust::can('rol-*'))
						<li>
							<a href="{{ url ('auth/roles') }}"><i class="fa fa-male"></i><i class="fa fa-female"></i> Roles</a>
						</li>
						@endif
						@if(Entrust::can('permiso-*'))
						<li>
							<a href="{{ url ('auth/permisos') }}"><i class="fa fa-address-card-o fa-fw"></i> Permisos</a>
						</li>
						@endif
					</ul>
				</li>
				@endif

				<!-- Geográficos -->
				@if(Entrust::can(['pais-*', 'depart-*', 'ciudad-*', ]))
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-globe fa-fw"></i> <span class="side-menu-title">Geográficos</span><span class="fa arrow"></span></a>
					
					<ul class="nav nav-second-level">

						@if(Entrust::can('pais-*'))
						<li>
							<a href="{{ url ('cnfg-geograficos/paises') }}"><i class="fa fa-circle fa-fw"></i> Países</a>
						</li>
						@endif
						@if(Entrust::can('depart-*'))
						<li>
							<a href="{{ url ('cnfg-geograficos/departamentos') }}"><i class="fa fa-circle fa-fw"></i> Departamentos</a>
						</li>
						@endif
						@if(Entrust::can('ciudad-*'))
						<li>
							<a href="{{ url ('cnfg-geograficos/ciudades') }}"><i class="fa fa-circle-o fa-fw"></i> Ciudades</a>
						</li>
						@endif
						
					</ul>
					<!-- /.nav-second-level -->
				</li>
				@endif

				<!-- Contratos -->
				@if(Entrust::can(['contrato-*', 'prospecto-*', 'cnos-*', 'cargo-*', 'tipocontrato-*', 'emprtemp-*', 'clasecontrato-*', 'estadocontrato-*', 'motretiro-*']))
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-handshake-o fa-fw"></i> <span class="side-menu-title">Contratos</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">

						@if(Entrust::can('contrato-*'))
						<li>
							<a href="{{ url ('gestion-humana/contratos') }}"><i class="fa fa-file-text-o fa-fw"></i> Contratos</a>
						</li>
						@endif
						@if(Entrust::can('prospecto-*'))
						<li>
							<a href="{{ url ('gestion-humana/prospectos') }}"><i class="fa fa-file-o fa-fw"></i> Hojas de Vida</a>
						</li>
						@endif
						@if(Entrust::can('cnos-*'))
						<li>
							<a href="{{ url ('cnfg-contratos/cnos') }}"><i class="fa fa-yelp fa-fw"></i> Clasificación de ocupaciones</a>
						</li>
						@endif
						@if(Entrust::can('cargo-*'))
						<li>
							<a href="{{ url ('cnfg-contratos/cargos') }}"><i class="fa fa-sign-language fa-fw"></i> Cargos</a>
						</li>
						@endif
						@if(Entrust::can('tipocontrato-*'))
						<li>
							<a href="{{ url ('cnfg-contratos/tiposcontratos') }}"><i class="fa fa-id-card-o fa-fw"></i> Tipos de contratos</a>
						</li>
						@endif
						@if(Entrust::can('emprtemp-*'))
						<li>
							<a href="{{ url ('cnfg-contratos/temporales') }}"><i class="fa fa-briefcase fa-fw"></i> Empresas temporales</a>
						</li>
						@endif
						@if(Entrust::can('clasecontrato-*'))
						<li>
							<a href="{{ url ('cnfg-contratos/clasescontratos') }}"><i class="fa fa-id-card fa-fw"></i> Clases de contratos</a>
						</li>
						@endif
						@if(Entrust::can('estadocontrato-*'))
						<li>
							<a href="{{ url ('cnfg-contratos/estadoscontratos') }}"><i class="fa fa-cube fa-fw"></i> Estados de contratos</a>
						</li>
						@endif
						@if(Entrust::can('motretiro-*'))
						<li>
							<a href="{{ url ('cnfg-contratos/motivosretiros') }}"><i class="fa fa-hand-o-right fa-fw"></i> Motivos de retiro</a>
						</li>
						@endif

					</ul>
					<!-- /.nav-second-level -->
				</li>
				@endif

				<!-- Organizacionales -->
				@if(Entrust::can(['empleador-*', 'gerencia-*', 'proceso-*', 'ceco-*', 'tipoempleador-*', 'riesgo-*', 'grupo-*', 'turno-*' ]))
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-sitemap fa-fw"></i> <span class="side-menu-title">Organizacionales</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">

						@if(Entrust::can('empleador-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/empleadores') }}"><i class="fa fa-black-tie fa-fw"></i> Empleadores</a>
						</li>
						@endif
						@if(Entrust::can('gerencia-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/gerencias') }}"><i class="fa fa-arrows-alt fa-fw"></i> Gerencias</a>
						</li>
						@endif
						@if(Entrust::can('proceso-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/procesos') }}"><i class="fa fa-crosshairs fa-fw"></i> Procesos</a>
						</li>
						@endif
						@if(Entrust::can('ceco-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/centroscostos') }}"><i class="fa fa-money fa-fw"></i> Centros de costos</a>
						</li>
						@endif
						@if(Entrust::can('tipoempleador-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/tiposempleadores') }}"><i class="fa fa-bars fa-fw"></i> Tipos de empleadores</a>
						</li>
						@endif
						@if(Entrust::can('riesgo-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/riesgos') }}"><i class="fa fa-fire fa-fw"></i> Riesgos ARL </a>
						</li>
						@endif
						@if(Entrust::can('grupo-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/grupos') }}"><i class="fa fa-user-o fa-fw"></i> Grupos de Empleados </a>
						</li>
						@endif
						@if(Entrust::can('turno-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/turnos') }}"><i class="fa fa-clock-o fa-fw"></i> Turnos </a>
						</li>
						@endif

						@if(Entrust::can('plantaslaborales-*'))
						<li>
							<a href="{{ url ('cnfg-organizacionales/plantaslaborales') }}"><i class="fa fa-area-chart"></i> Plantas Laborales </a>
						</li>
						@endif

						{{-- @if(Entrust::can('turno-*')) --}}
						<li>
							<a href="{{ url ('tipoEntidads') }}"><i class="fa fa-institution fa-fw"></i> Tipo Entidades </a>
						</li>
						{{-- @endif --}}

					</ul>
					<!-- /.nav-second-level -->
				</li>
				@endif

				<!-- Tickets Disciplinarios -->
				@if(Entrust::can(['ticket-*', 'tkprioridad-*', 'tkestados-*', 'tksancion-*', 'tkaprobacion-*', 'tkcategoria-*', 'tktpincidente-*', ]))
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-ticket fa-fw"></i> <span class="side-menu-title">Tickets Disciplinarios</span><span class="fa arrow"></span></a>
					
					<ul class="nav nav-second-level">

						@if(Entrust::can('ticket-*'))
						 <li>
							<a href="{{ url ('cnfg-tickets/tickets') }}">
							 <i class="fa fa-id-badge fa-fw"></i> 
							Tickets</a>
						</li>
						@endif
						@if(Entrust::can('tkprioridad-*'))
						<li>
							<a href="{{ url ('cnfg-tickets/prioridades') }}">
							<i class="fa fa-first-order fa-fw"></i> 
							Prioridades</a>
						</li>
						@endif
						@if(Entrust::can('tkestados-*'))
						<li>
							<a href="{{ url ('cnfg-tickets/estadostickets') }}">
							 <i class="fa fa-empire fa-fw"></i> 
							Estados de Ticket</a>
						</li>
						@endif
						@if(Entrust::can('tksancion-*'))
						<li>
							<a href="{{ url ('cnfg-tickets/sanciones') }}">
							 <i class="fa fa-gavel fa-fw"></i> 
							Sanciones</a>
						</li>
						@endif
						@if(Entrust::can('tkaprobacion-*'))
						<li>
							<a href="{{ url ('cnfg-tickets/estadosaprobaciones') }}">
							 <i class="fa fa-check-circle-o fa-fw"></i> 
							Estados de Aprobaciones</a>
						</li>
						@endif
						@if(Entrust::can('tkcategoria-*'))
						<li>
							<a href="{{ url ('cnfg-tickets/categorias') }}">
							 <i class="fa fa-newspaper-o fa-fw"></i>  
							Categorías</a>
						</li>
						@endif
						@if(Entrust::can('tktpincidente-*'))
						<li>
							<a href="{{ url ('cnfg-tickets/tiposincidentes') }}"> 
							 <i class="fa fa-exclamation-triangle fa-fw"></i> 
							Tipos de Incidentes</a>
						</li>
						@endif
					</ul>
					<!-- /.nav-second-level -->
				</li>
				@endif

				<!-- Gestión Humana -->
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-users fa-fw"></i> <span class="side-menu-title">Nómina</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">

						<li>
							<a href="{{ url ('gestion-humana/helpers/validadorTNL') }}"><i class="fa fa-check-square-o fa-fw"></i> Validador de TNL</a>
						</li>

					</ul>
					<!-- /.nav-second-level -->
				</li>

				<!-- Ausentismo -->
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-bed fa-fw"></i> <span class="side-menu-title">Ausentismo</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">

						<li>
							<a href="{{ url ('gestion-humana/helpers/validadorTNL') }}"><i class="fa fa-check-square-o fa-fw"></i> Diagnosticos</a>
						</li>

					</ul>
					<!-- /.nav-second-level -->
				</li>

			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
</nav>
<!-- /.navbar-static-side -->
