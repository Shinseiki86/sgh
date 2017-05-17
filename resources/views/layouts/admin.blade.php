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

                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Parametros Geograficos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*admin/ciudades') ? 'class=active' : '') }}>
                                <a href="{{ url ('admin/ciudades') }}"><i class="fa fa-building-o fa-fw"></i> Ciudades</a>
                                </li>
                                <li {{ (Request::is('*admin/departamentos') ? 'class=active' : '') }}>
                                <a href="{{ url ('admin/departamentos') }}"><i class="fa fa-globe fa-fw"></i> Departamentos</a>
                                </li>
                            </ul>
                        </li>

                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Parametros Hojas de Vida<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*admin/cnos') ? 'class=active' : '') }}>
                                <a href="{{ url ('admin/cnos') }}"><i class="fa fa-building-o fa-fw"></i> Clasificación de ocupaciones</a>

                                </li>
                                <li {{ (Request::is('*admin/cargos') ? 'class=active' : '') }}>
                                <a href="{{ url ('admin/cargos') }}"><i class="fa fa-globe fa-fw"></i> Cargos</a>
                                </li>

                                <li {{ (Request::is('*admin/tiposcontratos') ? 'class=active' : '') }}>
                                <a href="{{ url ('admin/tiposcontratos') }}"><i class="fa fa-globe fa-fw"></i> Tipos de contratos</a>
                                </li>

                                 <li {{ (Request::is('*admin/temporales') ? 'class=active' : '') }}>
                                <a href="{{ url ('admin/temporales') }}"><i class="fa fa-globe fa-fw"></i> Empresas temporales</a>
                                </li>

                            </ul>
                        </li>


                        <li {{ (Request::is('*documentation') ? 'class=active' : '') }}>
                            <a href="{{ url ('documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
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
    </div>
@stop

