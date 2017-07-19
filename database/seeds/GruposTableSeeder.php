<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Empleadores');
    	
    	$turno = new \SGH\Grupo;
    	$turno->GRUP_DESCRIPCION = 'CUARTELILLO CHIMINANGOS';
    	$turno->GRUP_OBSERVACIONES =  'GRUPO DE PRUEBA';
    	$turno->GRUP_CREADOPOR =  'SYSTEM';
    	$turno->save();

    	$turno = new \SGH\Grupo;
    	$turno->GRUP_DESCRIPCION = 'CUARTELILLO PRADOS DEL NORTE';
    	$turno->GRUP_OBSERVACIONES =  'GRUPO DE PRUEBA';
    	$turno->GRUP_CREADOPOR =  'SYSTEM';
    	$turno->save();

    }
}
