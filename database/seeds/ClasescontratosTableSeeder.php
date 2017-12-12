<?php

use Illuminate\Database\Seeder;
use SGH\Models\ClaseContrato;

class ClasesContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->command->info('---Seeder Clasescontratos');
        
        $clasecontrato = new ClaseContrato;
        $clasecontrato->CLCO_DESCRIPCION = 'TERMINO INDEFINIDO';
        $clasecontrato->CLCO_OBSERVACIONES =  NULL;
        $clasecontrato->CLCO_CREADOPOR =  'SYSTEM';
        $clasecontrato->save();

        $clasecontrato = new ClaseContrato;
        $clasecontrato->CLCO_DESCRIPCION = 'TERMINO FIJO';
        $clasecontrato->CLCO_OBSERVACIONES =  NULL;
        $clasecontrato->CLCO_CREADOPOR =  'SYSTEM';
        $clasecontrato->save();

        $clasecontrato = new ClaseContrato;
        $clasecontrato->CLCO_DESCRIPCION = 'OBRA O LABOR CONTRATADA';
        $clasecontrato->CLCO_OBSERVACIONES =  NULL;
        $clasecontrato->CLCO_CREADOPOR =  'SYSTEM';
        $clasecontrato->save();

        $clasecontrato = new ClaseContrato;
        $clasecontrato->CLCO_DESCRIPCION = 'CONTRATO DE APRENDIZAJE';
        $clasecontrato->CLCO_OBSERVACIONES =  NULL;
        $clasecontrato->CLCO_CREADOPOR =  'SYSTEM';
        $clasecontrato->save();

        $clasecontrato = new ClaseContrato;
        $clasecontrato->CLCO_DESCRIPCION = 'COOPERATIVA';
        $clasecontrato->CLCO_OBSERVACIONES =  'EXCLUSIVO PARA EMPLEADOS DE LAS COOPERATIVAS';
        $clasecontrato->CLCO_CREADOPOR =  'SYSTEM';
        $clasecontrato->save();

    }
}