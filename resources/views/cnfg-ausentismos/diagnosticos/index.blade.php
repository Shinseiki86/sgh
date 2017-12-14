@extends('layouts.menu')
@section('title', '/Diagnosticos')

@section('page_heading')
    @include('cnfg-ausentismos.diagnosticos.modal')
    <div class="row">
        <div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
            Diagnósticos
        </div>
        <div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
        <button class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button>
            <a class='btn btn-primary' role='button' href="{{ route('cnfg-ausentismos.diagnosticos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
    </div>
@endsection

@section('section')

    <table class="table table-striped" id="tabla">
        <thead>
        <th>Código CIE10</th>
        <th>Descripción</th>
        <th class="col-md-1 all notFilter" width="50px"></th>
    </thead>
        <tbody></tbody>
    </table>

    @include('widgets/modal-delete')
    @include('widgets.datatable.datatable-ajax', ['urlAjax'=>'getDiagnostico', 'columns'=>[
        'DIAG_CODIGO',
        'DIAG_DESCRIPCION',
    ]]) 
    
@endsection


