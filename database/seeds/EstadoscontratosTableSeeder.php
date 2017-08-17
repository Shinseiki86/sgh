<?php

use Illuminate\Database\Seeder;
use SGH\Models\EstadoContrato;

class EstadosContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Estadoscontratos');
    	
    	$estadocontrato = new EstadoContrato;
    	$estadocontrato->ESCO_DESCRIPCION = 'ACTIVO';
    	$estadocontrato->ESCO_OBSERVACIONES =  'ESTADO CONTRATO DE PRUEBA';
    	$estadocontrato->ESCO_CREADOPOR =  'SYSTEM';
    	$estadocontrato->save();

    	$estadocontrato = new EstadoContrato;
    	$estadocontrato->ESCO_DESCRIPCION = 'RETIRADO';
    	$estadocontrato->ESCO_OBSERVACIONES =  'ESTADO CONTRATO DE PRUEBA';
    	$estadocontrato->ESCO_CREADOPOR =  'SYSTEM';
    	$estadocontrato->save();
    }
}
