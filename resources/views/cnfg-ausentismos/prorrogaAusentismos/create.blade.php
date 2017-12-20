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
			if ($("#AUSE_ID").val()=="") {
				toastr.error(
					'Para continuar debe seleccionar un Prospecto','Seleccione un prospecto',
					{
						"hideMethod": "fadeOut",
						"timeOut": "5000",
						"progressBar": true,
						"closeButton": true,
						"positionClass": "toast-top-right","preventDuplicates": true}
					);
				return;
			} else {
				$http({
			        method : "GET",
			        r:"2",
			        url : '{!!URL::to('cnfg-ausentismos/buscaAuse')!!}'+'/'+$("#AUSE_ID").val()
			    }).then(function (response) {
					$scope.ausentismo = response.data;
					$('.viewInfoAusentismo').removeClass('hidden');
					$scope.showHide = "Ocultar Información";
					$scope.showResult = true;
				});
			}
		}

		$scope.mostrarOcultar = function() {
			if ($scope.showHide=="Ocultar Información") {
				$scope.showHide = "Mostrar Información";
				$scope.showResult = false;
			} else {
				$scope.showHide = "Ocultar Información";
				$scope.showResult = true;
			}
		}
	});
</script>
@endpush

@section('section')
<div class='col-md-8 col-md-offset-2' ng-app="app" ng-controller="buscaAusentismo">
	{{ Form::open(['route' => 'cnfg-ausentismos.prorrogaausentismos.store', 'class' => 'form-horizontal']) }}
		@include('cnfg-ausentismos.prorrogaausentismos.datosAusentismo')
		<!-- Elementos del formulario -->
		@include('cnfg-ausentismos.prorrogaausentismos.fields')
		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/prorrogaausentismos'])
	{{ Form::close() }}
</div>
@endsection