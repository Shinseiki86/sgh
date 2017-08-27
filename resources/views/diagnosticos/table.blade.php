<table class="table table-striped" id="tabla">
    <thead>
        <th>Diag Codigo</th>
		<th>Diag Descripcion</th>
        <th class="col-md-1 all" width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($diagnosticos as $diagnostico)
        <tr>
            <td>{!! $diagnostico->DIAG_CODIGO !!}</td>
			<td>{!! $diagnostico->DIAG_DESCRIPCION !!}</td>
             <td>
                <!-- Botón Editar (edit) -->
                <a class="btn btn-small btn-info btn-xs" href="{{ route('diagnosticos.edit', [ $diagnostico->DIAG_ID ] ) }}" data-tooltip="tooltip" title="Editar">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>

                <!-- carga botón de borrar -->
                {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
                    'class'=>'btn btn-xs btn-danger btn-delete',
                    'data-toggle'=>'modal',
                    'data-id'=> $diagnostico->DIAG_ID,
                    'data-modelo'=> str_upperspace(class_basename($diagnostico)),
                    'data-descripcion'=> $diagnostico->DIAG_NOMBRE,
                    'data-action'=>'ciudades/'. $diagnostico->DIAG_ID,
                    'data-target'=>'#pregModalDelete',
                    'data-tooltip'=>'tooltip',
                    'title'=>'Borrar',
                ])}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>