<?php

use Illuminate\Database\Seeder;
use SGH\Models\Atributo;

class AtributosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $atributo = new Atributo;
        $atributo->ATRI_DESCRIPCION = 'INCAPACIDAD MAYOR A 180 DÍAS';
        $atributo->ATRI_CREADOPOR =  'admin';
        $atributo->save();

        $atributo = new Atributo;
        $atributo->ATRI_DESCRIPCION = 'APLICACIÓN DE ART. 140';
        $atributo->ATRI_CREADOPOR =  'admin';
        $atributo->save();
    }
}
