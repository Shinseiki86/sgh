<?php

use Illuminate\Database\Seeder;
use SGH\Models\Gerencia;

class GerenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Gerencias');
		
		$gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA DE GESTIÓN HUMANA';
        $gerencia->EMPL_ID = 1;
        $gerencia->GERE_OBSERVACIONES =  'GERENCIA DE PRUEBA';
        $gerencia->GERE_CREADOPOR =  'SYSTEM';
        $gerencia->save();

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA DE OPERACIONES';
        $gerencia->EMPL_ID = 1;
        $gerencia->GERE_OBSERVACIONES =  'GERENCIA DE PRUEBA';
        $gerencia->GERE_CREADOPOR =  'SYSTEM';
        $gerencia->save();

	}

}
