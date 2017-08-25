<table class="table table-striped" id="tabla">
    <thead>
        <th>Enti Codigo</th>
		<th>Enti Nit</th>
		<th>Enti Razonsocial</th>
		<th>Enti Observaciones</th>
		<th>Tien Id</th>
        <th class="col-md-1 all" width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($entidades as $entidad)
        <tr>
            <td>{!! $entidad->ENTI_CODIGO !!}</td>
			<td>{!! $entidad->ENTI_NIT !!}</td>
			<td>{!! $entidad->ENTI_RAZONSOCIAL !!}</td>
			<td>{!! $entidad->ENTI_OBSERVACIONES !!}</td>
			<td>{!! $entidad->TIEN_ID !!}</td>
             <td>
                <!-- Botón Editar (edit) -->
                <a class="btn btn-small btn-info btn-xs" href="{{ route('entidads.edit', [ $entidad->ENTI_ID ] ) }}" data-tooltip="tooltip" title="Editar">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>

                <!-- carga botón de borrar -->
                {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
                    'class'=>'btn btn-xs btn-danger btn-delete',
                    'data-toggle'=>'modal',
                    'data-id'=> $entidad->ENTI_ID,
                    'data-modelo'=> str_upperspace(class_basename($entidad)),
                    'data-descripcion'=> $entidad->ENTI_RAZONSOCIAL,
                    'data-action'=>'ciudades/'. $entidad->ENTI_ID,
                    'data-target'=>'#pregModalDelete',
                    'data-tooltip'=>'tooltip',
                    'title'=>'Borrar',
                ])}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>