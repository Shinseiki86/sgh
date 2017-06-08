<?php

use Illuminate\Database\Seeder;

class TiposempleadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder TiposEmpleadores');
    	
    	$empleador = new \SGH\TipoEmpleador;
    	$empleador->TIEM_DESCRIPCION = 'DIRECTO';
    	$empleador->TIEM_OBSERVACIONES =  'TIPO EMPLEADOR DE PRUEBA';
    	$empleador->TIEM_CREADOPOR =  'SYSTEM';
    	$empleador->save();

    	$empleador = new \SGH\TipoEmpleador;
    	$empleador->TIEM_DESCRIPCION = 'TEMPORAL';
    	$empleador->TIEM_OBSERVACIONES =  'TIPO EMPLEADOR DE PRUEBA';
    	$empleador->TIEM_CREADOPOR =  'SYSTEM';
    	$empleador->save();
    }
}
