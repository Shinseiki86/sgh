@extends('layouts.menu')
@section('title', '/ Prorrogas')
@section('page_heading', 'Nueva Prorroga')
@push('scripts')
{!! Html::script('assets/scripts/angular/angular.min.js') !!}
{!! Html::script('assets/scripts/angular/ui-bootstrap-tpls-2.5.0.min.js') !!}
{!! Html::script('assets/scripts/metodosVarios.js') !!}
<script>

	var fecha = new Fecha();
	var app = angular.module('app', ['ui.bootstrap'], function($interpolateProvider) {
		$interpolateProvider.startSymbol('{%');
		$interpolateProvider.endSymbol('%}');
	});
	var d = document.getElementById("divAn"); 
	if ($("#AUSE_ID").val()!="") {		
		d.setAttribute("ng-init", "mySwitch=false");
	}else{
		d.setAttribute("ng-init", "mySwitch=true");
	}
	app.controller('buscaAusentismo', function($scope, $http) {
		$scope.cargaAusentismo = function() {
			if ($("#AUSE_ID").val()=="") {
				toastr.error(
					'Para continuar debe seleccionar un ausentismo inicial','Seleccione un ausentismo',{
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
					var cantProrroga=$scope.ausentismo.prorroga.length;
					if (cantProrroga==0) {
						$("#FECHA_ADICIONAL").val($scope.ausentismo.ausentismo.AUSE_FECHAFINAL);
					} else {
						$("#FECHA_ADICIONAL").val($scope.ausentismo.prorroga[cantProrroga-1].PROR_FECHAFINAL);
					}
					var f=fecha.varFecha($("#FECHA_ADICIONAL").val());
					var fechaAdd=fecha.sumaDias(f,1);
					$("#PROR_FECHAINICIO").val(fecha.formatoFecha(f));
					$("#PROR_FECHAFINAL").val(fecha.formatoFecha(f));
					$scope.showHide = "Ocultar Información";
					$scope.showResult = true;
					$scope.mySwitch = false;
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
<div id="divAn" class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" ng-app="app" ng-controller="buscaAusentismo">
	{{ Form::open(['route' => 'cnfg-ausentismos.prorrogaausentismos.store', 'class' => 'form-horizontal']) }}
		@include('cnfg-ausentismos.prorrogaausentismos.datosAusentismo')
		<!-- Elementos del formulario -->
		@include('cnfg-ausentismos.prorrogaausentismos.fields')
		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/prorrogaausentismos'])
	{{ Form::close() }}
</div>
@endsection