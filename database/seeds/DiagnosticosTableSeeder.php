<?php

use Illuminate\Database\Seeder;
use SGH\Models\Diagnostico;

class DiagnosticosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$diagnostico = new Diagnostico;
    	$diagnostico->DIAG_CODIGO = 'A00';
        $diagnostico->DIAG_DESCRIPCION = 'Colera';
    	$diagnostico->save();

        $diagnostico = new Diagnostico;
        $diagnostico->DIAG_CODIGO = 'A01';
        $diagnostico->DIAG_DESCRIPCION = 'Fiebre';
        $diagnostico->save();

        $diagnostico = new Diagnostico;
        $diagnostico->DIAG_CODIGO = 'A02';
        $diagnostico->DIAG_DESCRIPCION = 'Cefalea';
        $diagnostico->save();

        $diagnostico = new Diagnostico;
        $diagnostico->DIAG_CODIGO = 'A03';
        $diagnostico->DIAG_DESCRIPCION = 'Dolor Abdominal';
        $diagnostico->save();
    }
}
