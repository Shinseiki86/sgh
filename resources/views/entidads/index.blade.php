@extends('layouts.menu')
@section('title', '/ Ciudades')

@section('page_heading')
    {{-- @include('entidads.modal') --}}
    <div class="row">
        <div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
            Entidades
        </div>
        <div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
        <button class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button>
            <a class='btn btn-primary' role='button' href="{{ route('entidads.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
    </div>
@endsection

@section('section')

    <table class="table table-striped" id="tabla">
        <thead>
        <th>Codigo</th>
        <th>Nit</th>
        <th>Razonsocial</th>
        <th>Observaciones</th>
        <th>Id Tipo Entiad</th>
        <th class="col-md-1 all" width="50px">Acciones</th>
        </thead>
        <tbody></tbody>
    </table>

    @include('widgets/modal-delete')
    @include('datatable-ajax', ['urlAjax'=>'getEntidad', 'columns'=>[
        'ENTI_CODIGO',
        'ENTI_NIT',
        'ENTI_RAZONSOCIAL',
        'ENTI_OBSERVACIONES',
        'tipoentidad.TIEN_DESCRIPCION',
    ]]) 
@endsection


