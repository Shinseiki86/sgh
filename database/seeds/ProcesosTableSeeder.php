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
		$this->command->info('---Seeder Procesos');

        $proceso = new Proceso;
        $proceso->PROC_DESCRIPCION = 'SOLICITUD DE PROCESO DISCIPLINARIO';
        $proceso->PROC_OBSERVACIONES = NULL;
        $proceso->PROC_CREADOPOR = 'admin';
        $proceso->save();

        $gerencias = array(8);
        $proceso->gerencias()->sync($gerencias);

	}

}
