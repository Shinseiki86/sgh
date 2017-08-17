<?php

use Illuminate\Database\Seeder;
use SGH\Models\EstadoAprobacion;

class EstadosAprobacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estadoaprobacion = new EstadoAprobacion;
        $estadoaprobacion->ESAP_DESCRIPCION = 'EN REVISIÓN';
        $estadoaprobacion->ESAP_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA EN REVISIÓN POR EL JEFE INMEDIATO';
        $estadoaprobacion->ESAP_COLOR =  'rgb(0, 153, 51)';
        $estadoaprobacion->ESAP_CREADOPOR =  'SYSTEM';
        $estadoaprobacion->save();

        $estadoaprobacion = new EstadoAprobacion;
        $estadoaprobacion->ESAP_DESCRIPCION = 'ENVIADO A G.H';
        $estadoaprobacion->ESAP_OBSERVACIONES =  'INDICA QUE EL TICKET SE AUTORIZOÓ Y SE ENVIÓ A GESTIÓN HUMANA';
        $estadoaprobacion->ESAP_COLOR =  'rgb(255, 102, 0)';
        $estadoaprobacion->ESAP_CREADOPOR =  'SYSTEM';
        $estadoaprobacion->save();

        $estadoaprobacion = new EstadoAprobacion;
        $estadoaprobacion->ESAP_DESCRIPCION = 'RECHAZADO';
        $estadoaprobacion->ESAP_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA EN RECHAZADO POR PARTE DEL JEFE INMEDIATO';
        $estadoaprobacion->ESAP_COLOR =  'rgb(255, 0, 0)';
        $estadoaprobacion->ESAP_CREADOPOR =  'SYSTEM';
        $estadoaprobacion->save();

        $estadoaprobacion = new EstadoAprobacion;
        $estadoaprobacion->ESAP_DESCRIPCION = 'FINALIZADO POR G.H';
        $estadoaprobacion->ESAP_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA FINALIZADO POR PARTE DE GESTIÓN HUMANA';
        $estadoaprobacion->ESAP_COLOR =  'rgb(36, 231, 17)';
        $estadoaprobacion->ESAP_CREADOPOR =  'SYSTEM';
        $estadoaprobacion->save();
    }
}
