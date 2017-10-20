@extends('layouts.menu')

@section('page_heading', 'Nueva Prorroga')
@push('scripts')
    {!! Html::script('assets/js/angular/angular.min.js') !!}
	{!! Html::script('assets/js/angular/ui-bootstrap-tpls-2.5.0.min.js') !!}

    <script>
    	var app = angular.module('app', ['ui.bootstrap'], function($interpolateProvider) {
			$interpolateProvider.startSymbol('{%');
			$interpolateProvider.endSymbol('%}');
		});
		
		app.controller('buscaAusentismo', function($scope, $http) {
		    
		    $scope.cargaAusentismo = function() {
		        $http.get("http://localhost:8083/sgh/public/cnfg-ausentismos/buscaAuse")
		    	.then(function (response) {
		    		$scope.ausentismo = response.data;
		    		console.log($scope.ausentismo);
		    	});


		    }
		});
	</script>

@endpush

@section('section')
{{-- <div class="col-md-6 col-md-offset-4"> --}}
	<div class='col-md-8 col-md-offset-2 form-horizontal'>	
		@include('cnfg-ausentismos.prorrogaausentismos.datosAusentismo')
	</div>
	
	{{ Form::open(['route' => 'cnfg-ausentismos.prorrogaausentismos.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@include('cnfg-ausentismos.prorrogaausentismos.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/prorrogaausentismos'])

	{{ Form::close() }}
{{-- </div> --}}
@endsection

