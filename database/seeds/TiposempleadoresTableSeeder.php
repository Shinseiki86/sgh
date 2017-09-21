<?php

use Illuminate\Database\Seeder;
use SGH\Models\TipoEmpleador;

class TiposEmpleadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder TiposEmpleadores');
    	
    	$empleador = new TipoEmpleador;
    	$empleador->TIEM_DESCRIPCION = 'DIRECTO';
    	$empleador->TIEM_OBSERVACIONES =  NULL;
    	$empleador->TIEM_CREADOPOR =  'admin';
    	$empleador->save();

    	$empleador = new TipoEmpleador;
    	$empleador->TIEM_DESCRIPCION = 'TEMPORAL';
    	$empleador->TIEM_OBSERVACIONES =  NULL;
    	$empleador->TIEM_CREADOPOR =  'admin';
    	$empleador->save();
    }
}
