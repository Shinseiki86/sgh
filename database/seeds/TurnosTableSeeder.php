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
    	
        \SGH\Turno::create([
            'TURN_DESCRIPCION' => 'TURNO DÍA',
            'TURN_CODIGO' => 'T1',
            'TURN_HORAINICIO' => '06:00:00',
            'TURN_HORAFINAL' => '14:00:00',
            'TURN_OBSERVACIONES' => 'TURNO DE DÍA',
            'EMPL_ID' => 1,
        ]);

    	\SGH\Turno::create([
        	'TURN_DESCRIPCION' => 'TURNO NOCHE',
            'TURN_CODIGO' => 'T3',
            'TURN_HORAINICIO' => '22:00:00',
            'TURN_HORAFINAL' => '06:00:00',
        	'TURN_OBSERVACIONES' => 'TURNO DE NOCHE',
            'EMPL_ID' => 1,
        ]);

    }
}
