<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es" class="no-js">
<!--<![endif]-->
<head>
	<title>SGH @yield('title')</title>
	{!! Html::meta( null, 'IE=edge', [ 'http-equiv'=>'X-UA-Compatible' ] ) !!}
	{!! Html::meta( null, 'text/html; charset=utf-8', [ 'http-equiv'=>'Content-Type' ] ) !!}
	{!! Html::meta( 'viewport', 'width=device-width, initial-scale=1') !!}
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	{!! Html::style('assets/stylesheets/styles.css') !!}
	{{--datatable--}}
	{!! Html::style('assets/stylesheets/datatable/buttons.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/responsive.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/buttons.bootstrap4.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/dataTables.bootstrap4.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/rowReorder.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/responsive.bootstrap.min.css') !!}
	{!! Html::style('assets/stylesheets/metisMenu.min.css') !!}
	{{--datatable--}}

	@yield('head')
	}
</head>
<body>
	@yield('body')

	{!! Html::script('assets/scripts/frontend.js') !!}
	{{--datatable--}}
	{!! Html::script('assets/scripts/datatable/jquery-1.12.4.js') !!}
	{!! Html::script('assets/scripts/datatable/jquery.dataTables.min.js') !!}
		{!! Html::script('assets/scripts/datatable/dataTables.buttons.min.js') !!}
		{!! Html::script('assets/scripts/datatable/jszip.min.js') !!}
		{!! Html::script('assets/scripts/datatable/pdfmake.min.js') !!}
		{!! Html::script('assets/scripts/datatable/vfs_fonts.js') !!}
		{!! Html::script('assets/scripts/datatable/buttons.html5.min.js') !!}
		{!! Html::script('assets/scripts/datatable/buttons.colVis.min.js') !!}
		{!! Html::script('assets/scripts/datatable/buttons.print.min.js') !!}
		{!! Html::script('assets/scripts/datatable/dataTables.responsive.min.js') !!}
		{!! Html::script('assets/scripts/datatable/buttons.flash.min.js') !!}
		{!! Html::script('assets/scripts/datatable/buttons.bootstrap4.min.js') !!}
		{!! Html::script('assets/scripts/datatable/dataTables.bootstrap4.min.js') !!}
		{!! Html::script('assets/scripts/datatable/dataTables.rowReorder.min.js') !!}
		{!! Html::script('assets/scripts/datatable/responsive.bootstrap.min.js') !!}
		{!! Html::script('assets/scripts/metisMenu.min.js') !!}
	{{--datatable--}}
	@yield('scripts')

	<footer class="footer navbar-default navbar-fixed-bottom">
		<div class="text-right" style="color: #606060;padding-right:10px;">
			<small>Powered by <i>diheke</i></small>
		</div>
	</footer>
</body>
</html>