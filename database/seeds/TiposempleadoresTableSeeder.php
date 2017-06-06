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
    	$this->command->info('---TiposEmpleadores table');
    	
    	$empleador = new \SGH\Tiposempleadore;
    	$empleador->TIEM_DESCRIPCION = 'DIRECTO';
    	$empleador->TIEM_OBSERVACIONES =  'TIPO EMPLEADOR DE PRUEBA';
    	$empleador->TIEM_CREADOPOR =  'SYSTEM';
    	$empleador->save();

    	$empleador = new \SGH\Tiposempleadore;
    	$empleador->TIEM_DESCRIPCION = 'TEMPORAL';
    	$empleador->TIEM_OBSERVACIONES =  'TIPO EMPLEADOR DE PRUEBA';
    	$empleador->TIEM_CREADOPOR =  'SYSTEM';
    	$empleador->save();

    	$this->command->info('---FIN TiposempleadoresTableSeeder');
    }
}
