<table class="table table-striped" id="tabla">
    <thead>
        <th>Código</th>
		<th>Descripción</th>
		<th>Observaciones</th>
		<th>Tipo Ausetismo</th>
		<th>Tipo Entidad</th>
        <th>Remunerado</th>
        <th class="col-md-1 all notFilter" width="50px"></th>
    </thead>
    <tbody>
    @foreach($conceptoausencias as $conceptoausencia)
        <tr>
            <td>{!! $conceptoausencia->COAU_CODIGO !!}</td>
			<td>{!! $conceptoausencia->COAU_DESCRIPCION !!}</td>
			<td>{!! $conceptoausencia->COAU_OBSERVACIONES !!}</td>
			<td>{!! $conceptoausencia->TIAU_DESCRIPCION !!}</td>
			<td>{!! $conceptoausencia->TIEN_DESCRIPCION !!}</td>
            <td>{!! $conceptoausencia->COAU_REMUNERADO !!}</td>
            <td>
                <!-- Botón Editar (edit) -->
                <a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-ausentismos.conceptoausencias.edit', [ $conceptoausencia->COAU_ID ] ) }}" data-tooltip="tooltip" title="Editar">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>

                <!-- carga botón de borrar -->
                {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
                    'class'=>'btn btn-xs btn-danger btn-delete',
                    'data-toggle'=>'modal',
                    'data-id'=> $conceptoausencia->COAU_ID,
                    'data-modelo'=> str_upperspace(class_basename($conceptoausencia)),
                    'data-descripcion'=> $conceptoausencia->COAU_NOMBRE,
                    'data-action'=>'conceptoausencias/'. $conceptoausencia->COAU_ID,
                    'data-target'=>'#pregModalDelete',
                    'data-tooltip'=>'tooltip',
                    'title'=>'Borrar',
                ])}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>