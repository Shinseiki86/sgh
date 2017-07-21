@extends('layouts.plane')

@section('body')
    <!--div id="pageLoading">Cargando...</div-->

    @include('layouts.menu-top')

    <div id="wrapper">

        @include('layouts.menu-left')

        <div id="page-wrapper" style="padding: 0 30px;">
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
    <!-- /.wrapper -->
@stop

