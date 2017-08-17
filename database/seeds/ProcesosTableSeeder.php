<?php

use Illuminate\Database\Seeder;
use SGH\Models\Proceso;

class ProcesosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Gerencias');
		
        Proceso::create([
            'PROC_DESCRIPCION' => 'SOLICITUD DE PROCESOS DISCIPLINARIOS',
            'PROC_OBSERVACIONES' =>  'DISCIPLINARIOS',
        ]);
        Proceso::create([
            'PROC_DESCRIPCION' => 'PROCESO 1',
            'PROC_OBSERVACIONES' =>  'PRUEBAS',
        ]);
        Proceso::create([
            'PROC_DESCRIPCION' => 'PROCESO 2',
            'PROC_OBSERVACIONES' =>  'PRUEBAS',
        ]);

	}

}
