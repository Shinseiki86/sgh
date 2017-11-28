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
        $tipocontrato->TICO_OBSERVACIONES =  'TIPO DE CONTRATO DIRECTO POR COMPAÑÍA';
        $tipocontrato->TICO_CREADOPOR =  'SYSTEM';
        $tipocontrato->save();

        $tipocontrato = new TipoContrato;
        $tipocontrato->TICO_DESCRIPCION = 'CONTRATACIÓN INDIRECTA';
        $tipocontrato->TICO_OBSERVACIONES =  'TIPO DE CONTRATO INDIRECTO';
        $tipocontrato->TICO_CREADOPOR =  'SYSTEM';
        $tipocontrato->save();
	}

}
