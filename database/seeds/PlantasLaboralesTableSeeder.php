<?php

use Illuminate\Database\Seeder;
use SGH\Models\PlantaLaboral;

class PlantasLaboralesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //============================METALMECANICA==========================//
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 8;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 2;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 8;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 98;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 8;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 6;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 8;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 157;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //============================PROMOAMBIENTAL (CARTAGENA)==========================//

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 6;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 158;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 6;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 134;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //============================PROMOAMBIENTAL CALI==========================//

        //Operaciones

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 78;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 159;
        $planta->PALA_CANTIDAD = 27;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 128;
        $planta->PALA_CANTIDAD = 138;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 118;
        $planta->PALA_CANTIDAD = 73;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 39;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 9;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 104;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 134;
        $planta->PALA_CANTIDAD = 239;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 109;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 52;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 54;
        $planta->PALA_CANTIDAD = 9;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Mantenimiento

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 86;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 160;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 37;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 20;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 141;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 145;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 148;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 149;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 150;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 137;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 153;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 154;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 2;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 1;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 53;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Clus
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 7;
        $planta->CARG_ID = 57;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Regulación y Facturación
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 62;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 63;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 65;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 67;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 71;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 82;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 84;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 85;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 89;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 40;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 24;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Financiera y Contraloría
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 59;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 61;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 66;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 80;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 81;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 107;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 4;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 30;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 31;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Ventas
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 10;
        $planta->CARG_ID = 100;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 10;
        $planta->CARG_ID = 23;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 10;
        $planta->CARG_ID = 117;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Servicio Especial de Aseo (Promocali RH)
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 13;
        $planta->CARG_ID = 92;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 13;
        $planta->CARG_ID = 100;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 13;
        $planta->CARG_ID = 128;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 13;
        $planta->CARG_ID = 119;
        $planta->PALA_CANTIDAD = 5;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 13;
        $planta->CARG_ID = 41;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 13;
        $planta->CARG_ID = 142;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 13;
        $planta->CARG_ID = 161;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 13;
        $planta->CARG_ID = 138;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Juridica
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 9;
        $planta->CARG_ID = 101;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 9;
        $planta->CARG_ID = 103;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 9;
        $planta->CARG_ID = 7;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Gestion Humana
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 64;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 162;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 112;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 74;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 25;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 116;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 29;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Administrativa
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 68;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 93;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 36;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 19;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 114;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //Gerencia General
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 164;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 73;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 108;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 5;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 6;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 4;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 155;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; $planta->save();

        //============================PROMOAMBIENTAL VALLE==========================//

        //Operaciones

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 128;
        $planta->PALA_CANTIDAD = 115;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 118;
        $planta->PALA_CANTIDAD = 60;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 39;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 104;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 134;
        $planta->PALA_CANTIDAD = 190;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 109;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 54;
        $planta->PALA_CANTIDAD = 8;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Mantenimiento

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 20;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 141;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 145;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 148;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 149;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 150;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 137;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 153;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 2;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 1;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 53;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Clus
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 7;
        $planta->CARG_ID = 3;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 7;
        $planta->CARG_ID = 57;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Regulación y Facturación
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 62;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 62;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 82;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 84;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 85;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 89;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 44;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Financiera y Contraloría
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 59;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 66;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 80;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 81;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 28;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Ventas
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 10;
        $planta->CARG_ID = 100;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 10;
        $planta->CARG_ID = 166;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Juridico
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 9;
        $planta->CARG_ID = 102;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Gestión Humana
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 60;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 64;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 167;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 168;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 112;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 74;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 1;
        $planta->CARG_ID = 116;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Administrativo
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 69;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 93;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 163;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 110;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Gerencia General
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 165;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 169;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 3;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 6;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //============================PROMOAMBIENTAL CARIBE==========================//

        //Operaciones
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 195;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 159;
        $planta->PALA_CANTIDAD = 11;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 139;
        $planta->PALA_CANTIDAD = 137;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 118;
        $planta->PALA_CANTIDAD = 72;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 39;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 105;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 134;
        $planta->PALA_CANTIDAD = 292;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 136;
        $planta->PALA_CANTIDAD = 30;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 109;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 52;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 54;
        $planta->PALA_CANTIDAD = 14;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 13;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Canales y Gestión social
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 12;
        $planta->CARG_ID = 170;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 12;
        $planta->CARG_ID = 104;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 12;
        $planta->CARG_ID = 12;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Mantenimiento
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 141;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 171;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 148;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 154;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 172;
        $planta->PALA_CANTIDAD = 5;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 98;
        $planta->PALA_CANTIDAD = 5;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 173;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 174;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 175;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 176;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 177;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 178;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 149;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 179;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 152;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 150;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 53;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 37;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 16;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 180;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Comercial
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 100;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 181;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 166;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 92;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 182;
        $planta->PALA_CANTIDAD = 7;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 183;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 14;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 51;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 184;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 47;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 95;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 106;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 99;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 185;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Financiera y Contraloría
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 14;
        $planta->CARG_ID = 186;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 59;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 49;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 81;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 80;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 4;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 31;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Administrativa
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 15;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 187;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 64;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 188;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 45;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 189;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 190;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 93;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 58;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 163;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 50;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 191;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 90;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 192;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 110;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 140;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 121;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 193;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 11;
        $planta->CARG_ID = 112;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Gerencia General
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 73;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 194;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 103;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 127;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 27;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 22;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 34;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 8;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 2;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 6;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //============================CENTRAL COLOMBIANA DE ASEO==========================//
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 7;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 139;
        $planta->PALA_CANTIDAD = 6;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 7;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 134;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 7;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 54;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 7;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 6;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 7;
        $planta->GERE_ID = 3;
        $planta->CARG_ID = 144;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //============================SERAMBIENTAL==========================//

        //Operaciones
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 139;
        $planta->PALA_CANTIDAD = 77;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 118;
        $planta->PALA_CANTIDAD = 40;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 196;
        $planta->PALA_CANTIDAD = 5;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 39;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 104;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 170;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 134;
        $planta->PALA_CANTIDAD = 85;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 136;
        $planta->PALA_CANTIDAD = 12;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 197;
        $planta->PALA_CANTIDAD = 6;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 70;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 4;
        $planta->CARG_ID = 54;
        $planta->PALA_CANTIDAD = 14;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Mantenimiento
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 20;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 86;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 141;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 174;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 148;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 172;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 198;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 149;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 150;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 171;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 199;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 147;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 154;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 2;
        $planta->PALA_CANTIDAD = 3;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 98;
        $planta->PALA_CANTIDAD = 4;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 6;
        $planta->CARG_ID = 53;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Clus
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 7;
        $planta->CARG_ID = 200;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 7;
        $planta->CARG_ID = 201;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Regulación y Facturación
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 89;
        $planta->PALA_CANTIDAD = 11;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 76;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 82;
        $planta->PALA_CANTIDAD = 5;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 92;
        $planta->PALA_CANTIDAD = 5;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 183;
        $planta->PALA_CANTIDAD = 2;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 202;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 44;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 47;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 2;
        $planta->CARG_ID = 33;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Financiera y Contraloría
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 59;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 203;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 186;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 80;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 81;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 26;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 204;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 5;
        $planta->CARG_ID = 31;
        $planta->PALA_CANTIDAD = 1;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

        //Ventas
        $planta = new PlantaLaboral;
        $planta->EMPL_ID = 1;
        $planta->GERE_ID = 10;
        $planta->CARG_ID = 100;
        $planta->PALA_CANTIDAD = 6;
        $planta->PALA_CREADOPOR = 'admin'; 
        $planta->save();

    }
}
