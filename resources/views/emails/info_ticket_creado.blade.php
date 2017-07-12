@extends('emails/layout')
@section('title', '- Nuevo Ticket')

@section('tituloMensaje')
  <td class="alert alert-warning" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #FF9F00; margin: 0; padding: 20px;" align="center" bgcolor="#FF9F00" valign="top">
    {{ 'Ticket No. '.$tickets->TICK_ID }}
  </td>
@endsection

@section('mensaje')

  <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

    <tr>

    <h1 class="page-header">Ticket No. {{ $tickets->TICK_ID }}</h1>

  <div class="jumbotron text-center">
    <strong>Datos Generales</strong>
    <p>
      <ul class="list-group">

        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-4"><strong>Fecha Creación:</strong>
            {{ $tickets->TICK_FECHASOLICITUD }}
            </div>
           
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-4"><strong>Implicado:</strong>
            {{ nombre_empleado($tickets -> contrato -> PROS_ID) }}
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-4"><strong>Estado:</strong>
            {{ $tickets -> estadoticket -> ESTI_DESCRIPCION }}
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-4"><strong>Tipo de Incidente:</strong>
            {{ $tickets -> tipoincidente -> TIIN_DESCRIPCION }}
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-4"><strong>Prioridad:</strong>
            {{ $tickets -> prioridad -> PRIO_DESCRIPCION }}
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-4"><strong>Categoría:</strong>
            {{ $tickets -> categoria -> CATE_DESCRIPCION }}
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-4"><strong>Fecha del Evento:</strong>
            {{ $tickets -> TICK_FECHAEVENTO }}
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-4"><strong>Estado Aprobación:</strong>
            {{ $tickets -> estadoaprobacion -> ESAP_DESCRIPCION }}
            </div>
          </div>
        </li>

      </ul>
    </p>

  </div>
        
    </tr>

     <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
      <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
      para ver el detalle del ticket haga click en el enlace <strong style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"> 
      <!-- Botón Ver (show) -->
          <a class="btn btn-small btn-basic btn-xs" href="{{ URL::to('cnfg-tickets/tickets/' . $tickets->TICK_ID  ) }}" data-tooltip="tooltip" title="Ver">
            Ver Ticket
          </a>
      </strong>.
      </td>
    </tr>

    <tr>
      <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
      *** esta es una notificación automática, por favor no responder este mensaje *** <strong style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"> 
      <!-- Botón Ver (show) -->
          </a>
      </strong>.
      </td>
    </tr>

  </table>

@endsection