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
	@yield('head')
</head>
<body>
	@yield('body')

	{!! Html::script('assets/scripts/frontend.js') !!}
	@yield('scripts')

	<footer class="footer navbar-default navbar-fixed-bottom">
		<div class="text-right" style="color: #606060;padding-right:10px;">
			<small>Powered by <i>diheke</i></small>
		</div>
	</footer>
</body>
</html>