@extends('layouts.letters.letter')

@section('content')

		<p align="center">
			<b>{{ $empleador->EMPL_RAZONSOCIAL }}</b><br>
			<b>NIT: {{ $empleador->EMPL_NIT }}</b>
		</p>
		<br>
		<p align="center">
			<b>CERTIFICA</b>
		</p>
		<br>
		<br>
		<p align="justify">
			Que el señor  <b>{{ $prospecto->nombre_completo }}</b> identificado con cedula de ciudadanía No. <b>{{ $prospecto->PROS_CEDULA }}</b>

			@if($contrato->ESCO_ID != SGH\Models\EstadoContrato::RETIRADO)
				labora en nuestra compañía desde <b>{{ $contrato->CONT_FECHAINGRESO }}</b>
			@else
				laboró en nuestra compañía desde <b>{{ $contrato->CONT_FECHAINGRESO }}</b> hasta el <b>{{ $contrato->CONT_FECHARETIRO }}</b>
			@endif

			con un contrato de trabajo a <b>{{ $contrato->clasecontrato->CLCO_DESCRIPCION }}</b>

			@if($contrato->ESCO_ID != SGH\Models\EstadoContrato::RETIRADO)
				. Actualmente desempeña el cargo de <b>{{ $contrato->cargo->CARG_DESCRIPCION }}</b>, con un salario básico mensual de <b>${{ $contrato->CONT_SALARIO}}</b> (<b>{{ number_to_letter($contrato->CONT_SALARIO) }} m/cte)</b>

				@if ($contrato->CONT_VARIABLE > 0)
				, mas comisiones durante los últimos tres meses de <b>${{ $contrato->CONT_VARIABLE }}</b> (<b>{{ number_to_letter($contrato->CONT_VARIABLE) }} m/cte)</b>
				@endif

				@if ($contrato->CONT_RODAJE > 0)
				, mas movilización de <b>${{ $contrato->CONT_RODAJE }}</b> (<b>{{ number_to_letter($contrato->CONT_RODAJE) }} m/cte)</b>
				@endif
				.
			@else
				, desempeñandose en el cargo de <b>{{ $contrato->cargo->CARG_DESCRIPCION }}</b>.
			@endif
		</p>
		<p align="justify">
			En constancia se firma en Cali a los {{ number_to_letter($today->day) }} ({{ $today->day }}) días del mes de {{ trans('dates.'.ucfirst($today->format('F'))) }} del {{ number_to_letter($today->year) }} ({{ $today->year }}). 
		</p>

@endsection
@include('layouts.letters.signature')
