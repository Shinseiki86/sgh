<table class="table table-striped" id="tabla">
    <thead>
        <th>Prospecto</th>
		<th>Diagnostico Prorroga</th>
		<th>Consepto Ausentismo</th>
		<th>Fecha Inicio Ausentismo</th>
        <th>Fecha Inicio Prorroga</th>
		<th>Fecha Final Prorroga</th>
		<th>Dias de Prorroga</th>
        <th>Periodo Causado</th>
		<th>Observaciones</th>
        <th class="col-md-1 all notFilter" width="50px"></th>
    </thead>
    <tbody>
    @foreach($prorrogaAusentismos as $prorrogaAusentismo)
        <tr>
            <td>{!! nombre_empleado($prorrogaAusentismo->ausentismo->contrato->PROS_ID) !!}</td>
			<td>{!! $prorrogaAusentismo->diagnostico->DIAG_DESCRIPCION or null!!}</td>
			<td>{!! $prorrogaAusentismo->conceptoausencia->COAU_DESCRIPCION !!}</td>
			<td>{!! $prorrogaAusentismo->ausentismo->AUSE_FECHAINICIO !!}</td>
            <td>{!! $prorrogaAusentismo->PROR_FECHAINICIO !!}</td>
			<td>{!! $prorrogaAusentismo->PROR_FECHAFINAL !!}</td>
			<td>{!! $prorrogaAusentismo->PROR_DIAS !!}</td>
            <td>{!! $prorrogaAusentismo->PROR_PERIODO !!}</td>
			<td>{!! $prorrogaAusentismo->PROR_OBSERVACIONES !!}</td>
             <td>
                <!-- Botón Editar (edit) -->
                <a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-ausentismos.prorrogaausentismos.edit', [ $prorrogaAusentismo->PROR_ID ] ) }}" data-tooltip="tooltip" title="Editar">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>

                <!-- carga botón de borrar -->
                {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
                    'class'=>'btn btn-xs btn-danger btn-delete',
                    'data-toggle'=>'modal',
                    'data-id'=> $prorrogaAusentismo->PROR_ID,
                    'data-modelo'=> str_upperspace(class_basename($prorrogaAusentismo)),
                    'data-descripcion'=> $prorrogaAusentismo->PROR_NOMBRE,
                    'data-action'=>'prorrogaausentismos/'. $prorrogaAusentismo->PROR_ID,
                    'data-target'=>'#pregModalDelete',
                    'data-tooltip'=>'tooltip',
                    'title'=>'Borrar',
                ])}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>