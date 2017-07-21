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
			</div>

			<div class="row">
				@include('widgets/flash-alert')
				@yield('section')
			</div>
			
		</div><!-- /#page-wrapper -->

	</div><!-- /.wrapper -->

	<footer class="footer navbar-default navbar-fixed-bottom">
		<div class="text-right" style="color: #606060;padding-right:20px;">
			<small>Powered by <i>diheke</i></small>
		</div>
	</footer>

@stop

