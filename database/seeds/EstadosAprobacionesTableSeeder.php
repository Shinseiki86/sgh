<?php

use Illuminate\Database\Seeder;

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
        $prioridad = new \SGH\EstadoAprobacion;
        $prioridad->ESAP_DESCRIPCION = 'EN REVISIÓN';
        $prioridad->ESAP_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA EN REVISIÓN POR EL JEFE INMEDIATO';
        $prioridad->ESAP_COLOR =  'rgb(0, 153, 51)';
        $prioridad->ESAP_CREADOPOR =  'SYSTEM';
        $prioridad->save();

        $prioridad = new \SGH\EstadoAprobacion;
        $prioridad->ESAP_DESCRIPCION = 'ENVIADO A G.H';
        $prioridad->ESAP_OBSERVACIONES =  'INDICA QUE EL TICKET SE AUTORIZOÓ Y SE ENVIÓ A GESTIÓN HUMANA';
        $prioridad->ESAP_COLOR =  'rgb(255, 102, 0)';
        $prioridad->ESAP_CREADOPOR =  'SYSTEM';
        $prioridad->save();

        $prioridad = new \SGH\EstadoAprobacion;
        $prioridad->ESAP_DESCRIPCION = 'RECHAZADO';
        $prioridad->ESAP_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA EN RECHAZADO POR PARTE DEL JEFE INMEDIATO';
        $prioridad->ESAP_COLOR =  'rgb(255, 0, 0)';
        $prioridad->ESAP_CREADOPOR =  'SYSTEM';
        $prioridad->save();
    }
}
