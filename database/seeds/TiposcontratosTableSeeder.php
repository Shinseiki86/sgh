<?php

use Illuminate\Database\Seeder;
use SGH\Models\TipoContrato;

class TiposContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Tiposcontratos');
		
		$tipocontrato = new TipoContrato;
        $tipocontrato->TICO_DESCRIPCION = 'CONTRATACIÓN DIRECTA';
        $tipocontrato->TICO_OBSERVACIONES =  'TIPO DE CONTRATO DE PRUEBA';
        $tipocontrato->TICO_CREADOPOR =  'SYSTEM';
        $tipocontrato->save();

        $tipocontrato = new TipoContrato;
        $tipocontrato->TICO_DESCRIPCION = 'CONTRATACIÓN INDIRECTA';
        $tipocontrato->TICO_OBSERVACIONES =  'TIPO DE CONTRATO DE PRUEBA';
        $tipocontrato->TICO_CREADOPOR =  'SYSTEM';
        $tipocontrato->save();
	}

}
