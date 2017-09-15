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
    	$this->command->info('---Seeder Turnos');

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO DÍA';
        $turno->TURN_CODIGO = 'T1';
        $turno->TURN_HORAINICIOPI = '06:00:00';
        $turno->TURN_HORAFINALPI = '14:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        /*
        $empleadores = Empleador::all('EMPL_ID')->toArray();
        $turno->empleadores()->sync($empleadores);
        */

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO NOCHE';
        $turno->TURN_CODIGO = 'T3';
        $turno->TURN_HORAINICIOPI = '22:00:00';
        $turno->TURN_HORAFINALPI = '06:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        /*
        $empleadores = Empleador::all('EMPL_ID')->toArray();
        $turno->empleadores()->sync($empleadores);
        */

    }
}
