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

    }
}
