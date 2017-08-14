<?php

use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Empleadores');
    	
    	$turno = new \SGH\Turno;
    	$turno->TURN_DESCRIPCION = 'TURNO DÍA';
        $turno->TURN_CODIGO = 'T1';
        $turno->TURN_HORAINICIO = '06:00:00';
        $turno->TURN_HORAFINAL = '14:00:00';
    	$turno->TURN_OBSERVACIONES =  'TURNO DE PRUEBA';
        $turno->EMPL_ID =  1;
    	$turno->TURN_CREADOPOR =  'SYSTEM';
    	$turno->save();

    	$turno = new \SGH\Turno;
    	$turno->TURN_DESCRIPCION = 'TURNO NOCHE';
        $turno->TURN_CODIGO = 'T3';
         $turno->TURN_HORAINICIO = '22:00:00';
        $turno->TURN_HORAFINAL = '06:00:00';
    	$turno->TURN_OBSERVACIONES =  'TURNO DE PRUEBA';
        $turno->EMPL_ID =  1;
    	$turno->TURN_CREADOPOR =  'SYSTEM';
    	$turno->save();

    }
}
