<?php

use Illuminate\Database\Seeder;
use SGH\Models\Grupo;

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
    	
    	$grupo = new Grupo;
    	$grupo->GRUP_DESCRIPCION = 'CUARTELILLO CHIMINANGOS';
        $grupo->EMPL_ID = 1;
    	$grupo->GRUP_OBSERVACIONES =  'GRUPO DE PRUEBA';
    	$grupo->GRUP_CREADOPOR =  'SYSTEM';
    	$grupo->save();

    	$grupo = new Grupo;
    	$grupo->GRUP_DESCRIPCION = 'CUARTELILLO PRADOS DEL NORTE';
        $grupo->EMPL_ID = 1;
    	$grupo->GRUP_OBSERVACIONES =  'GRUPO DE PRUEBA';
    	$grupo->GRUP_CREADOPOR =  'SYSTEM';
    	$grupo->save();

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'CUARTELILLO VALLE DEL LILI';
        $grupo->EMPL_ID = 2;
        $grupo->GRUP_OBSERVACIONES =  'GRUPO DE PRUEBA';
        $grupo->GRUP_CREADOPOR =  'SYSTEM';
        $grupo->save();

    }
}
