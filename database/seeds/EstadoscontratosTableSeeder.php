<?php

use Illuminate\Database\Seeder;

class EstadoscontratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Estadoscontratos');
    	
    	$estadocontrato = new \SGH\EstadoContrato;
    	$estadocontrato->ESCO_DESCRIPCION = 'ACTIVO';
    	$estadocontrato->ESCO_OBSERVACIONES =  'ESTADO CONTRATO DE PRUEBA';
    	$estadocontrato->ESCO_CREADOPOR =  'SYSTEM';
    	$estadocontrato->save();

    	$estadocontrato = new \SGH\EstadoContrato;
    	$estadocontrato->ESCO_DESCRIPCION = 'RETIRADO';
    	$estadocontrato->ESCO_OBSERVACIONES =  'ESTADO CONTRATO DE PRUEBA';
    	$estadocontrato->ESCO_CREADOPOR =  'SYSTEM';
    	$estadocontrato->save();
    }
}
