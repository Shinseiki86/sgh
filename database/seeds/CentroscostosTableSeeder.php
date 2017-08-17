<?php

use Illuminate\Database\Seeder;
use SGH\Models\CentroCosto;

class CentrosCostosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Centroscostos');
		
		$centrocosto = new CentroCosto;
		$centrocosto->CECO_CODIGO = '500101';
		$centrocosto->GERE_ID = 1;
        $centrocosto->CECO_DESCRIPCION = 'GESTIÓN HUMANA';
        $centrocosto->CECO_OBSERVACIONES =  'CENTRO DE COSTOS DE PRUEBA';
        $centrocosto->CECO_CREADOPOR =  'SYSTEM';
        $centrocosto->save();

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '500102';
        $centrocosto->GERE_ID = 1;
        $centrocosto->CECO_DESCRIPCION = 'BIENESTAR Y DESARROLLO';
        $centrocosto->CECO_OBSERVACIONES =  'CENTRO DE COSTOS DE PRUEBA';
        $centrocosto->CECO_CREADOPOR =  'SYSTEM';
        $centrocosto->save();
	}
}
