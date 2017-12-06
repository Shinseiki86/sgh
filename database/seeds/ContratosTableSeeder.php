<?php

use Illuminate\Database\Seeder;
use SGH\Models\Contrato;

class ContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contrato = new Contrato;
        $contrato->PROS_ID = 1;
        $contrato->CONT_CASOMEDICO = 'NO';
        $contrato->CARG_ID = 64;
        $contrato->CONT_FECHAINGRESO = '2017-12-04';
        $contrato->CONT_SALARIO = 1598000;
        $contrato->ESCO_ID = 1;
        $contrato->TICO_ID = 1;
        $contrato->CLCO_ID = 1;
        $contrato->EMPL_ID = 3;
        $contrato->NEGO_ID = 2;
        $contrato->RIES_ID = 3;
        $contrato->RIES_ID = 1;
        $contrato->TIEM_ID = 1;
        $contrato->GERE_ID = 1;
        $contrato->CECO_ID = 17;
        $contrato->GRUP_ID = 39;
        $contrato->GRUP_ID = 40;
        $contrato->CIUD_CONTRATA = 1004;
        $contrato->CIUD_SERVICIO = 1004;
        $contrato->CONT_CREADOPOR = 'admin';
        $contrato->save();

        $contrato = new Contrato;
        $contrato->PROS_ID = 2;
        $contrato->CONT_CASOMEDICO = 'NO';
        $contrato->CARG_ID = 54;
        $contrato->CONT_FECHAINGRESO = '2017-12-05';
        $contrato->CONT_SALARIO = 1477000;
        $contrato->CONT_RODAJE = 350000;
        $contrato->ESCO_ID = 1;
        $contrato->TICO_ID = 1;
        $contrato->CLCO_ID = 1;
        $contrato->EMPL_ID = 3;
        $contrato->NEGO_ID = 2;
        $contrato->RIES_ID = 3;
        $contrato->RIES_ID = 1;
        $contrato->TIEM_ID = 1;
        $contrato->GERE_ID = 4;
        $contrato->CECO_ID = 22;
        $contrato->GRUP_ID = 39;
        $contrato->GRUP_ID = 40;
        $contrato->CIUD_CONTRATA = 1004;
        $contrato->CIUD_SERVICIO = 1004;
        $contrato->CONT_CREADOPOR = 'admin';
        $contrato->save();

        $contrato = new Contrato;
        $contrato->PROS_ID = 3;
        $contrato->CONT_CASOMEDICO = 'NO';
        $contrato->CARG_ID = 128;
        $contrato->CONT_FECHAINGRESO = '2017-11-20';
        $contrato->CONT_SALARIO = 737717;
        $contrato->CONT_RODAJE = 350000;
        $contrato->ESCO_ID = 1;
        $contrato->TICO_ID = 2;
        $contrato->CLCO_ID = 3;
        $contrato->EMPL_ID = 4;
        $contrato->NEGO_ID = 1;
        $contrato->TEMP_ID = 1;
        $contrato->RIES_ID = 3;
        $contrato->TIEM_ID = 2;
        $contrato->GERE_ID = 4;
        $contrato->CECO_ID = 22;
        $contrato->GRUP_ID = 1;
        $contrato->GRUP_ID = 1;
        $contrato->CIUD_CONTRATA = 1004;
        $contrato->CIUD_SERVICIO = 1004;
        $contrato->CONT_CREADOPOR = 'admin';
        $contrato->save();

        $contrato = new Contrato;
        $contrato->PROS_ID = 4;
        $contrato->CONT_CASOMEDICO = 'NO';
        $contrato->CARG_ID = 118;
        $contrato->CONT_FECHAINGRESO = '2017-11-28';
        $contrato->CONT_SALARIO = 1264000;
        $contrato->ESCO_ID = 1;
        $contrato->TICO_ID = 2;
        $contrato->CLCO_ID = 3;
        $contrato->EMPL_ID = 1;
        $contrato->NEGO_ID = 4;
        $contrato->TEMP_ID = 9;
        $contrato->RIES_ID = 3;
        $contrato->TIEM_ID = 2;
        $contrato->GERE_ID = 4;
        $contrato->CECO_ID = 24;
        $contrato->GRUP_ID = 10;
        $contrato->GRUP_ID = 1;
        $contrato->CIUD_CONTRATA = 492;
        $contrato->CIUD_SERVICIO = 492;
        $contrato->CONT_CREADOPOR = 'admin';
        $contrato->save();

       
    }
}
