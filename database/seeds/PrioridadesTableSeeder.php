<?php

use Illuminate\Database\Seeder;
use SGH\Models\Prioridad;

class PrioridadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $prioridad = new Prioridad;
        $prioridad->PRIO_DESCRIPCION = 'BAJA';
        $prioridad->PRIO_OBSERVACIONES =  'INDICA QUE EL TICKET TIENE PRIORIDAD BAJA';
        $prioridad->PRIO_COLOR =  'rgb(0, 153, 51';
        $prioridad->PRIO_CREADOPOR =  'SYSTEM';
        $prioridad->save();

        $prioridad = new Prioridad;
        $prioridad->PRIO_DESCRIPCION = 'MEDIA';
        $prioridad->PRIO_OBSERVACIONES =  'INDICA QUE EL TICKET TIENE PRIORIDAD MEDIA';
        $prioridad->PRIO_COLOR =  'rgb(255, 102, 0)';
        $prioridad->PRIO_CREADOPOR =  'SYSTEM';
        $prioridad->save();

        $prioridad = new Prioridad;
        $prioridad->PRIO_DESCRIPCION = 'ALTA';
        $prioridad->PRIO_OBSERVACIONES =  'INDICA QUE EL TICKET TIENE PRIORIDAD ALTA';
        $prioridad->PRIO_COLOR =  'rgb(255, 0, 0)';
        $prioridad->PRIO_CREADOPOR =  'SYSTEM';
        $prioridad->save();
    }
}
