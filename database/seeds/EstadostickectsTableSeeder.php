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
        $estadoticket->ESTI_COLOR =  'blue';
        $estadoticket->ESTI_CREADOPOR =  'admin';
        $estadoticket->save();

        
        $estadoticket = new EstadoTicket;
        $estadoticket->ESTI_DESCRIPCION = 'CADUCADO';
        $estadoticket->ESTI_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA CADUCADO';
        $estadoticket->ESTI_COLOR =  'yellow';
        $estadoticket->ESTI_CREADOPOR =  'admin';
        $estadoticket->save();
        
        $estadoticket = new EstadoTicket;
        $estadoticket->ESTI_DESCRIPCION = 'CERRADO';
        $estadoticket->ESTI_OBSERVACIONES =  'INDICA QUE EL TICKET SE ENCUENTRA CERRADO';
        $estadoticket->ESTI_COLOR =  'grey';
        $estadoticket->ESTI_CREADOPOR =  'admin';
        $estadoticket->save();
    }
}
