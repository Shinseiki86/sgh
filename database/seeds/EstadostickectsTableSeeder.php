<?php

use Illuminate\Database\Seeder;
use SGH\Models\EstadoTicket;

class EstadosTickectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estadoticket = new EstadoTicket;
        $estadoticket->ESTI_DESCRIPCION = 'ABIERTO';
        $estadoticket->ESTI_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA ABIERTO';
        $estadoticket->ESTI_COLOR =  'rgb(255, 0, 0)';
        $estadoticket->ESTI_CREADOPOR =  'SYSTEM';
        $estadoticket->save();

        /*
        $estadoticket = new EstadoTicket;
        $estadoticket->ESTI_DESCRIPCION = 'REASIGNADO';
        $estadoticket->ESTI_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA REASIGNADO';
        $estadoticket->ESTI_COLOR =  'rgb(0, 153, 34)';
        $estadoticket->ESTI_CREADOPOR =  'SYSTEM';
        $estadoticket->save();
        */

        $estadoticket = new EstadoTicket;
        $estadoticket->ESTI_DESCRIPCION = 'FINALIZADO';
        $estadoticket->ESTI_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA FINALIZADO';
        $estadoticket->ESTI_COLOR =  'rgb(0, 153, 51)';
        $estadoticket->ESTI_CREADOPOR =  'SYSTEM';
        $estadoticket->save();
    }
}
