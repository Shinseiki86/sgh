<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departamento = new \SGH\Departamento;
        $departamento->DEPA_CODIGO = 76;
        $departamento->DEPA_DESCRIPCION =  'VALLE DEL CAUCA';
        $departamento->DEPA_CREADOPOR =  'SYSTEM';
        $departamento->save();

        $departamento = new \SGH\Departamento;
        $departamento->DEPA_CODIGO = 1;
        $departamento->DEPA_DESCRIPCION =  'CUNDINAMARCA';
        $departamento->DEPA_CREADOPOR =  'SYSTEM';
        $departamento->save();
    }
}
