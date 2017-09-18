<?php

use Illuminate\Database\Seeder;
use SGH\Models\Turno;
use SGH\Models\Empleador;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //======================================================================
        //PROMOCALI - PROMOVALLE - SURASEO - SERAMBIENTAL - PACARIBE - CENCOASEO
    	$this->command->info('---Seeder Turnos');

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #1 (06:00 - 14:00)';
        $turno->TURN_CODIGO = 'T1';
        $turno->TURN_HORAINICIOPI = '06:00:00';
        $turno->TURN_HORAFINALPI = '14:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save(); 

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #2 (14:00 - 22:00)';
        $turno->TURN_CODIGO = 'T2';
        $turno->TURN_HORAINICIOPI = '14:00:00';
        $turno->TURN_HORAFINALPI = '22:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #3 (22:00 - 06:00)';
        $turno->TURN_CODIGO = 'T3';
        $turno->TURN_HORAINICIOPI = '22:00:00';
        $turno->TURN_HORAFINALPI = '06:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #4 (18:00 - 02:00)';
        $turno->TURN_CODIGO = 'T4';
        $turno->TURN_HORAINICIOPI = '18:00:00';
        $turno->TURN_HORAFINALPI = '02:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #5 (10:00 - 18:00)';
        $turno->TURN_CODIGO = 'T5';
        $turno->TURN_HORAINICIOPI = '10:00:00';
        $turno->TURN_HORAFINALPI = '18:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #6 (20:00 - 04:00)';
        $turno->TURN_CODIGO = 'T6';
        $turno->TURN_HORAINICIOPI = '20:00:00';
        $turno->TURN_HORAFINALPI = '04:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $turno->empleadores()->sync($empleadores);

         /*
        $empleadores = Empleador::all('EMPL_ID')->toArray();
        $turno->empleadores()->sync($empleadores);
        */

        /*
        $empleadores = Empleador::all('EMPL_ID')->toArray();
        $turno->empleadores()->sync($empleadores);
        */
        //======================================================================

    }
}
