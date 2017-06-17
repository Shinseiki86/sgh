<?php

use Illuminate\Database\Seeder;

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
		
        \SGH\Proceso::create([
            'PROC_DESCRIPCION' => 'SOLICITUD DE PROCESOS DISCIPLINARIOS',
            'PROC_OBSERVACIONES' =>  'DISCIPLINARIOS',
        ]);
        \SGH\Proceso::create([
            'PROC_DESCRIPCION' => 'PROCESO 1',
            'PROC_OBSERVACIONES' =>  'PRUEBAS',
        ]);
        \SGH\Proceso::create([
            'PROC_DESCRIPCION' => 'PROCESO 2',
            'PROC_OBSERVACIONES' =>  'PRUEBAS',
        ]);

	}

}
