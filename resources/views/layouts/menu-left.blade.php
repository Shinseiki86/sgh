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

				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-user-circle-o"></i> <span class="side-menu-title">Usuarios y roles</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">
						<li>
							<a href="{{ url ('auth/usuarios') }}"><i class="fa fa-user fa-fw"></i> Usuarios</a>
						</li>
						<li>
							<a href="{{ url ('auth/roles') }}"><i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i> Roles</a>
						</li>
						<li>
							<a href="{{ url ('auth/permisos') }}"><i class="fa fa-address-card-o" aria-hidden="true"></i> Permisos</a>
						</li>
					</ul>
				</li>

				<!-- Contratos -->
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-handshake-o"></i> <span class="side-menu-title">Contratos</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">

						<li>
							<a href="{{ url ('gestion-humana/contratos') }}"><i class="fa fa-file-text-o"></i> Contratos</a>
						</li>

						<li>
							<a href="{{ url ('gestion-humana/prospectos') }}"><i class="fa fa-file-o"></i> Hojas de Vida</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-contratos/cnos') }}"><i class="fa  fa-yelp"></i> Clasificación de ocupaciones</a>
						</li>
						
						<li>
							<a href="{{ url ('cnfg-contratos/cargos') }}"><i class="fa fa-sign-language"></i> Cargos</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-contratos/tiposcontratos') }}"><i class="fa fa-id-card-o"></i> Tipos de contratos</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-contratos/temporales') }}"><i class="fa fa-briefcase"></i> Empresas temporales</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-contratos/clasescontratos') }}"><i class="fa fa-id-card"></i> Clases de contratos</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-contratos/estadoscontratos') }}"><i class="fa fa-cube"></i> Estados de contratos</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-contratos/motivosretiros') }}"><i class="fa fa-hand-o-right"></i> Motivos de retiro</a>
						</li>

					</ul>
					<!-- /.nav-second-level -->
				</li>

				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-sitemap"></i> <span class="side-menu-title">Organizacionales</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">

						<li>
							<a href="{{ url ('cnfg-organizacionales/empleadores') }}"><i class="fa fa-black-tie"></i> Empleadores</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-organizacionales/gerencias') }}"><i class="fa fa-arrows-alt"></i> Gerencias</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-organizacionales/procesos') }}"><i class="fa fa-crosshairs"></i> Procesos</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-organizacionales/centroscostos') }}"><i class="fa fa-money"></i> Centros de costos</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-organizacionales/tiposempleadores') }}"><i class="fa fa-bars"></i> Tipos de empleadores</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-organizacionales/riesgos') }}"><i class="fa fa-fire"></i> Riesgos ARL </a>
						</li>

						<li>
							<a href="{{ url ('cnfg-organizacionales/grupos') }}"><i class="fa fa-user-o"></i> Grupos de Empleados </a>
						</li>

						<li>
							<a href="{{ url ('cnfg-organizacionales/turnos') }}"><i class="fa fa-clock-o"></i> Turnos </a>
						</li>

					</ul>
					<!-- /.nav-second-level -->
				</li>

				<!-- Tickets Disciplinarios -->
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-ticket"></i> <span class="side-menu-title">Tickets Disciplinarios</span><span class="fa arrow"></span></a>
					
					<ul class="nav nav-second-level">

						 <li>
							<a href="{{ url ('cnfg-tickets/tickets') }}">
							 <i class="fa fa-id-badge"></i> 
							Tickets</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-tickets/prioridades') }}">
							<i class="fa fa-first-order"></i> 
							Prioridades</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-tickets/estadostickets') }}">
							 <i class="fa fa-empire"></i> 
							Estados de Ticket</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-tickets/sanciones') }}">
							 <i class="fa fa-gavel"></i> 
							Sanciones</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-tickets/estadosaprobaciones') }}">
							 <i class="fa fa-check-circle-o"></i> 
							Estados de Aprobaciones</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-tickets/categorias') }}">
							 <i class="fa fa-newspaper-o"></i>  
							Categorías</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-tickets/tiposincidentes') }}"> 
							 <i class="fa fa-exclamation-triangle"></i> 
							Tipos de Incidentes</a>
						</li>
						
					</ul>
					<!-- /.nav-second-level -->
				</li>

				<!-- Gestión Humana -->
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-users"></i> <span class="side-menu-title">Nómina</span><span class="fa arrow"></span></a>

					<ul class="nav nav-second-level">

						<li>
							<a href="{{ url ('gestion-humana/helpers/validadorTNL') }}"><i class="fa fa-check-square-o"></i> Validador de TNL</a>
						</li>

					</ul>
					<!-- /.nav-second-level -->
				</li>

				<!-- Geográficos -->
				<li>
					<a href="#" class="dropdown-collapse"><i class="fa fa-globe"></i> <span class="side-menu-title">Geográficos</span><span class="fa arrow"></span></a>
					
					<ul class="nav nav-second-level">

						<li>
							<a href="{{ url ('cnfg-geograficos/departamentos') }}"><i class="fa fa-circle"></i> Departamentos</a>
						</li>

						<li>
							<a href="{{ url ('cnfg-geograficos/ciudades') }}"><i class="fa fa-circle-o"></i> Ciudades</a>
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
