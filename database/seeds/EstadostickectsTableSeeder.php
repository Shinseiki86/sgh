<?php

use Illuminate\Database\Seeder;

class EstadostickectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estadoticket = new \SGH\EstadoTicket;
        $estadoticket->ESTI_DESCRIPCION = 'ABIERTO';
        $estadoticket->ESTI_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA ABIERTO';
        $estadoticket->ESTI_COLOR =  'rgb(255, 0, 0)';
        $estadoticket->ESTI_CREADOPOR =  'SYSTEM';
        $estadoticket->save();

        $estadoticket = new \SGH\EstadoTicket;
        $estadoticket->ESTI_DESCRIPCION = 'FINALIZADO';
        $estadoticket->ESTI_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA FINALIZADO';
        $estadoticket->ESTI_COLOR =  'rgb(0, 153, 51)';
        $estadoticket->ESTI_CREADOPOR =  'SYSTEM';
        $estadoticket->save();
    }
}
