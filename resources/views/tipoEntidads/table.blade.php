<table class="table table-striped" id="tabla">
    <thead>
        <th>Tien Codigo</th>
		<th>Tien Descripcion</th>
		<th>Tien Observaciones</th>
        <th class="col-md-1 all" width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($tipoEntidads as $tipoEntidad)
        <tr>
            <td>{!! $tipoEntidad->TIEN_CODIGO !!}</td>
			<td>{!! $tipoEntidad->TIEN_DESCRIPCION !!}</td>
			<td>{!! $tipoEntidad->TIEN_OBSERVACIONES !!}</td>
             <td>
                <!-- Botón Editar (edit) -->
                <a class="btn btn-small btn-info btn-xs" href="{{ route('tipoEntidads.edit', [ $tipoEntidad->PREFIJO_ID ] ) }}" data-tooltip="tooltip" title="Editar">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>

                <!-- carga botón de borrar -->
                {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
                    'class'=>'btn btn-xs btn-danger btn-delete',
                    'data-toggle'=>'modal',
                    'data-id'=> $tipoEntidad->PREFIJO_ID,
                    'data-modelo'=> str_upperspace(class_basename($tipoEntidad)),
                    'data-descripcion'=> $tipoEntidad->PREFIJO_NOMBRE,
                    'data-action'=>'ciudades/'. $tipoEntidad->PREFIJO_ID,
                    'data-target'=>'#pregModalDelete',
                    'data-tooltip'=>'tooltip',
                    'title'=>'Borrar',
                ])}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>