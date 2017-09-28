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
    	$this->command->info('---Seeder Grupos');

        //PROMOCALI    	
    	$grupo = new Grupo;
    	$grupo->GRUP_DESCRIPCION = 'AVENIDA DEL RIO';
    	$grupo->GRUP_OBSERVACIONES =  NULL;
    	$grupo->GRUP_CREADOPOR =  'admin';
    	$grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'PRADOS DEL NORTE';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'CALIMA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'SENA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'CHAPINERO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        //PROMOVALLE
        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'LIMONAR';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'EL INGENIO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'NAPOLES';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'VALLE DEL LILI';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);
    	

    }
}
