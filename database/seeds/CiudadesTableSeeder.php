<?php

use Illuminate\Database\Seeder;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ciudad = new \SGH\Ciudad;
        $ciudad->CIUD_CODIGO = 1;
        $ciudad->CIUD_DESCRIPCION =  'CALI';
        $ciudad->DEPA_ID = 1;
        $ciudad->CIUD_CREADOPOR =  'SYSTEM';
        $ciudad->save();

        $ciudad = new \SGH\Ciudad;
        $ciudad->CIUD_CODIGO = 2;
        $ciudad->CIUD_DESCRIPCION =  'BOGOTA D.C';
        $ciudad->DEPA_ID = 2;
        $ciudad->CIUD_CREADOPOR =  'SYSTEM';
        $ciudad->save();
    }
}
