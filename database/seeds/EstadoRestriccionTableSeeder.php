<?php

use Illuminate\Database\Seeder;
use SGH\Models\EstadoRestriccion;

class EstadoRestriccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estadorestriccion = new EstadoRestriccion;
        $estadorestriccion->ESRE_DESCRIPCION = 'INCAPACITADO';
        $estadorestriccion->ESRE_CREADOPOR =  'admin';
        $estadorestriccion->save();

        $estadorestriccion = new EstadoRestriccion;
        $estadorestriccion->ESRE_DESCRIPCION = 'TEMPORAL';
        $estadorestriccion->ESRE_CREADOPOR =  'admin';
        $estadorestriccion->save();

        $estadorestriccion = new EstadoRestriccion;
        $estadorestriccion->ESRE_DESCRIPCION = 'EN PROCESO';
        $estadorestriccion->ESRE_CREADOPOR =  'admin';
        $estadorestriccion->save();

        $estadorestriccion = new EstadoRestriccion;
        $estadorestriccion->ESRE_DESCRIPCION = 'DEFINITIVO';
        $estadorestriccion->ESRE_CREADOPOR =  'admin';
        $estadorestriccion->save();
    }
}
