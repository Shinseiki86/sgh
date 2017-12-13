<?php

use Illuminate\Database\Seeder;
use SGH\Models\DiagnosticoGeneral;

class DiagnosticoGeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $diagnosticogeneral = new DiagnosticoGeneral;
        $diagnosticogeneral->DIGE_DESCRIPCION = 'TRAUMAS CONTUSIONES ARTICULACIONES';
        $diagnosticogeneral->DIGE_CREADOPOR =  'admin';
        $diagnosticogeneral->save();

        $diagnosticogeneral = new DiagnosticoGeneral;
        $diagnosticogeneral->DIGE_DESCRIPCION = 'ENFERMEDAD CARDIOVASCULAR';
        $diagnosticogeneral->DIGE_CREADOPOR =  'admin';
        $diagnosticogeneral->save();
    }
}
