@extends('layouts.plane')

@section('body')
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url ('') }}">SGH</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            @if( null !== Auth::user() )
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->username }}</a>
                    </li>
                    <li><a href="{{ url('password/reset') }}"><i class="fa fa-key fa-fw"></i> Cambiar contraseña</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url ('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
            @endif
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>

                    <li {{ (Request::is('auth*') ? 'class=active' : '') }}>
                        <a href="#"><i class="fa fa-user-circle-o"></i> Usuarios y roles<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                            <li {{ (Request::is('*/usuarios') ? 'class=active' : '') }}>
                                <a href="{{ url ('auth/usuarios') }}"><i class="fa fa-user fa-fw"></i> Usuarios</a>
                            </li>
                            <li {{ (Request::is('*/roles') ? 'class=active' : '') }}>
                                <a href="{{ url ('auth/roles') }}"><i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i> Roles</a>
                            </li>
                            <li {{ (Request::is('*/permisos') ? 'class=active' : '') }}>
                                <a href="{{ url ('auth/permisos') }}"><i class="fa fa-address-card-o" aria-hidden="true"></i> Permisos</a>
                            </li>
                        </ul>
                    </li>

                    <li {{ (Request::is('cnfg-*') ? 'class=active' : '') }}>
                        <a href="#"><i class="fa fa-cogs"></i> Parametros Generales<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-handshake-o fa-fw"></i> Contratos<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">

                                    <li {{ (Request::is('*/cnos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-contratos/cnos') }}"><i class="fa  fa-yelp"></i> Clasificación de ocupaciones</a>
                                    </li>
                                    
                                    <li {{ (Request::is('*/cargos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-contratos/cargos') }}"><i class="fa fa-sign-language"></i> Cargos</a>
                                    </li>

                                    <li {{ (Request::is('*/tiposcontratos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-contratos/tiposcontratos') }}"><i class="fa fa-id-card-o"></i> Tipos de contratos</a>
                                    </li>

                                    <li {{ (Request::is('*/temporales') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-contratos/temporales') }}"><i class="fa fa-briefcase"></i> Empresas temporales</a>
                                    </li>

                                    <li {{ (Request::is('*/clasescontratos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-contratos/clasescontratos') }}"><i class="fa fa-id-card"></i> Clases de contratos</a>
                                    </li>

                                    <li {{ (Request::is('*/estadoscontratos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-contratos/estadoscontratos') }}"><i class="fa fa-cube"></i> Estados de contratos</a>
                                    </li>

                                    <li {{ (Request::is('*/motivosretiros') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-contratos/motivosretiros') }}"><i class="fa fa-hand-o-right"></i> Motivos de retiro</a>
                                    </li>

                                </ul>
                                <!-- /.nav-third-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Organizacionales<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">

                                    <li {{ (Request::is('*/empleadores') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-organizacionales/empleadores') }}"><i class="fa fa-black-tie"></i> Empleadores</a>
                                    </li>

                                    <li {{ (Request::is('*/gerencias') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-organizacionales/gerencias') }}"><i class="fa fa-arrows-alt"></i> Gerencias</a>
                                    </li>

                                    <li {{ (Request::is('*/procesos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-organizacionales/procesos') }}"><i class="fa fa-crosshairs"></i> Procesos</a>
                                    </li>

                                    <li {{ (Request::is('*/centroscostos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-organizacionales/centroscostos') }}"><i class="fa fa-money"></i> Centros de costos</a>
                                    </li>

                                    <li {{ (Request::is('*/tiposempleadores') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-organizacionales/tiposempleadores') }}"><i class="fa fa-bars"></i> Tipos de empleadores</a>
                                    </li>

                                    <li {{ (Request::is('*/riesgos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-organizacionales/riesgos') }}"><i class="fa fa-fire"></i> Riesgos ARL </a>
                                    </li>

                                    <li {{ (Request::is('*/grupos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-organizacionales/grupos') }}"><i class="fa fa-user-o"></i> Grupos de Empleados </a>
                                    </li>

                                    <li {{ (Request::is('*/turnos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-organizacionales/turnos') }}"><i class="fa fa-clock-o"></i> Turnos </a>
                                    </li>

                                </ul>
                                <!-- /.nav-third-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-ticket"></i> Tickets<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">

                                    <li {{ (Request::is('*/prioridades') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-tickets/prioridades') }}">
                                        <i class="fa fa-first-order"></i> 
                                        Prioridades</a>
                                    </li>

                                    <li {{ (Request::is('*/estadostickets') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-tickets/estadostickets') }}">
                                         <i class="fa fa-empire"></i> 
                                        Estados de Ticket</a>
                                    </li>

                                    <li {{ (Request::is('*/sanciones') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-tickets/sanciones') }}">
                                         <i class="fa fa-gavel"></i> 
                                        Sanciones</a>
                                    </li>

                                    <li {{ (Request::is('*/estadosaprobaciones') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-tickets/estadosaprobaciones') }}">
                                         <i class="fa fa-check-circle-o"></i> 
                                        Estados de Aprobaciones</a>
                                    </li>

                                    <li {{ (Request::is('*/categorias') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-tickets/categorias') }}">
                                         <i class="fa fa-newspaper-o"></i>  
                                        Categorías</a>
                                    </li>

                                    <li {{ (Request::is('*/tiposincidentes') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-tickets/tiposincidentes') }}"> 
                                         <i class="fa fa-exclamation-triangle"></i> 
                                        Tipos de Incidentes</a>
                                    </li>
                                    

                                </ul>
                                <!-- /.nav-third-level -->
                            </li>

                            <li {{ (Request::is('*/cnfg-geograficos/*') ? 'class=active' : '') }}>
                                <a href="#"><i class="fa fa-globe fa-fw"></i> Geográficos<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">

                                    <li {{ (Request::is('*/departamentos') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-geograficos/departamentos') }}"><i class="fa fa-circle"></i> Departamentos</a>
                                    </li>

                                    <li {{ (Request::is('*/ciudades') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-geograficos/ciudades') }}"><i class="fa fa-circle-o"></i> Ciudades</a>
                                    </li>

                                    
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li {{ (Request::is('gestion-humana/*') ? 'class=active' : '') }}>
                        <a href="#"><i class="fa fa-users"></i> Gestión Humana<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li {{ (Request::is('*/prospectos') ? 'class=active' : '') }}>
                                <a href="{{ url ('gestion-humana/prospectos') }}"><i class="fa fa-file-o"></i> Hojas de Vida</a>
                            </li>

                            <li {{ (Request::is('*/contratos') ? 'class=active' : '') }}>
                                <a href="{{ url ('gestion-humana/contratos') }}"><i class="fa fa-file-text-o"></i> Contratos</a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-wrench"></i> Herramientas de Nómina<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">



                                    <li {{ (Request::is('*/uploads') ? 'class=active' : '') }}>
                                        <a href="{{ url ('gestion-humana/helpers/validadorTNL') }}"><i class="fa fa-check-square-o"></i> Validador de TNL</a>
                                    </li>

                                </ul>
                                <!-- /.nav-third-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-ticket"></i> Ticket Disciplinario<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">

                                     <li {{ (Request::is('*/tickets') ? 'class=active' : '') }}>
                                        <a href="{{ url ('cnfg-tickets/tickets') }}">
                                         <i class="fa fa-id-badge"></i> 
                                        Tickets</a>
                                    </li>

                                </ul>
                                <!-- /.nav-third-level -->
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@yield('page_heading')</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">

            @include('widgets/flash-alert')
            @yield('section')

        </div>
        <!-- /#page-wrapper -->
    </div>
    <div class="text-right" style="color: #606060;padding-right:10px;">
        <small>Powered by <i>diheke</i></small>
    </div>
</div>
@stop

