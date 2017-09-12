<?php

use Illuminate\Database\Seeder;
use SGH\Models\Empleador;

class EmpleadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Empleadores');
    	
    	$empleador = new Empleador;
    	$empleador->EMPL_RAZONSOCIAL = 'SERVICIOS AMBIENTALES S.A E.S.P.';
        $empleador->EMPL_NIT = 830131031;
        $empleador->EMPL_CEDULAREPRESENTANTE = 93152702;
        $empleador->CIUD_CEDULA = 995;
        $empleador->CIUD_DOMICILIO = 492;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'CARLOS ROBERTO BONILLA MELENDRO';
        $empleador->EMPL_NOMBRECOMERCIAL = 'SERAMBIENTAL';
        $empleador->EMPL_DIRECCION = 'CL 21A No. 2-07';
        $empleador->EMPL_CORREO = NULL;
    	$empleador->EMPL_OBSERVACIONES =  NULL;
        $empleador->PROS_ID =  NULL;
    	$empleador->EMPL_CREADOPOR =  'SYSTEM';
    	$empleador->save();

    	$empleador = new Empleador;
    	$empleador->EMPL_RAZONSOCIAL = 'PROMOAMBIENTAL CARIBES.A. E.S.P. ';
        $empleador->EMPL_NIT = 900074102;
        $empleador->EMPL_CEDULAREPRESENTANTE = 79944512;
        $empleador->CIUD_CEDULA = 149;
        $empleador->CIUD_DOMICILIO = 150;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'CARLOS ANDRES GAITAN ANZOLA';
        $empleador->EMPL_NOMBRECOMERCIAL = 'PROMOCARIBE';
        $empleador->EMPL_DIRECCION = 'LOS ALPES TV 73 No 31I 140';
        $empleador->EMPL_CORREO = NULL;
    	$empleador->EMPL_OBSERVACIONES =  NULL;
        $empleador->PROS_ID =  NULL;
    	$empleador->EMPL_CREADOPOR =  'SYSTEM';
    	$empleador->save();

        $empleador = new Empleador;
        $empleador->EMPL_RAZONSOCIAL = 'PROMOAMBIENTAL VALLE S.A. E.S.P';
        $empleador->EMPL_NIT = 900235531;
        $empleador->EMPL_CEDULAREPRESENTANTE = 79398605;
        $empleador->CIUD_CEDULA = 149;
        $empleador->CIUD_DOMICILIO = 1004;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'TOMAS SALVADOR MENDOZA PARDO';
        $empleador->EMPL_NOMBRECOMERCIAL = 'PROMOVALLE';
        $empleador->EMPL_DIRECCION = 'CL 70 7E BIS 04';
        $empleador->EMPL_CORREO = NULL;
        $empleador->EMPL_OBSERVACIONES =  NULL;
        $empleador->PROS_ID =  NULL;
        $empleador->EMPL_CREADOPOR =  'SYSTEM';
        $empleador->save();

        $empleador = new Empleador;
        $empleador->EMPL_RAZONSOCIAL = 'PROMOAMBIENTAL CALI S.A. E.S.P';
        $empleador->EMPL_NIT = 900332590;
        $empleador->EMPL_CEDULAREPRESENTANTE = 79398605;
        $empleador->CIUD_CEDULA = 149;
        $empleador->CIUD_DOMICILIO = 1004;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'TOMAS SALVADOR MENDOZA PARDO';
        $empleador->EMPL_NOMBRECOMERCIAL = 'PROMOCALI';
        $empleador->EMPL_DIRECCION = 'CL 70 7E BIS 04';
        $empleador->EMPL_CORREO = NULL;
        $empleador->EMPL_OBSERVACIONES =  NULL;
        $empleador->PROS_ID =  NULL;
        $empleador->EMPL_CREADOPOR =  'SYSTEM';
        $empleador->save();

        $empleador = new Empleador;
        $empleador->EMPL_RAZONSOCIAL = 'ASEO DEL SUROCCIDENTE S.A. E.S.P';
        $empleador->EMPL_NIT = 900414483;
        $empleador->EMPL_CEDULAREPRESENTANTE = 16862394;
        $empleador->CIUD_CEDULA = 1020;
        $empleador->CIUD_DOMICILIO = 1004;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'MANUEL GUILLERMO VALLECILLA PERDOMO';
        $empleador->EMPL_NOMBRECOMERCIAL = 'SURASEO';
        $empleador->EMPL_DIRECCION = 'CL 11A 32 108';
        $empleador->EMPL_CORREO = NULL;
        $empleador->EMPL_OBSERVACIONES =  NULL;
        $empleador->PROS_ID =  NULL;
        $empleador->EMPL_CREADOPOR =  'SYSTEM';
        $empleador->save();

        $empleador = new Empleador;
        $empleador->EMPL_RAZONSOCIAL = 'PROMOAMBIENTAL S.A. E.S.P';
        $empleador->EMPL_NIT = 900516200;
        $empleador->EMPL_CEDULAREPRESENTANTE = 79944512;
        $empleador->CIUD_CEDULA = 149;
        $empleador->CIUD_DOMICILIO = 150;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'CARLOS ANDRES GAITAN ANZOLA';
        $empleador->EMPL_NOMBRECOMERCIAL = 'PROMOAMBIENTAL';
        $empleador->EMPL_DIRECCION = 'LOS ALPES TV 73 No 31I 140';
        $empleador->EMPL_CORREO = NULL;
        $empleador->EMPL_OBSERVACIONES =  NULL;
        $empleador->PROS_ID =  NULL;
        $empleador->EMPL_CREADOPOR =  'SYSTEM';
        $empleador->save();

        $empleador = new Empleador;
        $empleador->EMPL_RAZONSOCIAL = 'CENTRAL COLOMBIANA DE ASEO S.A. E.S.P';
        $empleador->EMPL_NIT = 900415688;
        $empleador->EMPL_CEDULAREPRESENTANTE = 19497997;
        $empleador->CIUD_CEDULA = 149;
        $empleador->CIUD_DOMICILIO = 149;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'JAIME ALBERTO CANO CAÑAS';
        $empleador->EMPL_NOMBRECOMERCIAL = 'CENCOASEO';
        $empleador->EMPL_DIRECCION = 'CRA 9 No.1 - 26';
        $empleador->EMPL_CORREO = NULL;
        $empleador->EMPL_OBSERVACIONES =  NULL;
        $empleador->PROS_ID =  NULL;
        $empleador->EMPL_CREADOPOR =  'SYSTEM';
        $empleador->save();

        $empleador = new Empleador;
        $empleador->EMPL_RAZONSOCIAL = 'METALMECANICA PROMOAMBIENTAL S.A.S';
        $empleador->EMPL_NIT = 900974517;
        $empleador->EMPL_CEDULAREPRESENTANTE = 73199072;
        $empleador->CIUD_CEDULA = 150;
        $empleador->CIUD_DOMICILIO = 150;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'FABIAN MARRUGO GOMEZ';
        $empleador->EMPL_NOMBRECOMERCIAL = 'METALMECANICA';
        $empleador->EMPL_DIRECCION = 'CRA 54 27 116 BARIO EL BOSQUE';
        $empleador->EMPL_CORREO = NULL;
        $empleador->EMPL_OBSERVACIONES =  NULL;
        $empleador->PROS_ID =  NULL;
        $empleador->EMPL_CREADOPOR =  'SYSTEM';
        $empleador->save();

    }

}
