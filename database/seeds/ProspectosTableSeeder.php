<?php

use Illuminate\Database\Seeder;
use SGH\Models\Prospecto;

class ProspectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Prospectos');
        
    	
    	$prospecto = new Prospecto;
    	$prospecto->PROS_CEDULA = 123456789;
    	$prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
        $prospecto->PROS_FECHANACIMIENTO =  '1993-12-22';
    	$prospecto->PROS_PRIMERNOMBRE =  'KEVIN';
    	$prospecto->PROS_SEGUNDONOMBRE =  'FABIAN';
    	$prospecto->PROS_PRIMERAPELLIDO =  'RODRIGUEZ';
    	$prospecto->PROS_SEGUNDOAPELLIDO =  'COLLAZOS (PRUEBA)';
    	$prospecto->PROS_SEXO =  'M';
    	$prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 76';
    	$prospecto->PROS_TELEFONO =  '4059682';
    	$prospecto->PROS_CELULAR =  '3177274520';
    	$prospecto->PROS_CORREO =  'rodriguez221293@outlook.com';
    	$prospecto->PROS_CREADOPOR =  'PRUEBAS';
    	$prospecto->save();

        $prospecto = new Prospecto;
        $prospecto->PROS_CEDULA = 123456780;
        $prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
        $prospecto->PROS_FECHANACIMIENTO =  '1993-01-24';
        $prospecto->PROS_PRIMERNOMBRE =  'HECTOR';
        $prospecto->PROS_SEGUNDONOMBRE =  'FABIO';
        $prospecto->PROS_PRIMERAPELLIDO =  'GONZALEZ';
        $prospecto->PROS_SEGUNDOAPELLIDO =  'GAVIRIA (PRUEBA)';
        $prospecto->PROS_SEXO =  'M';
        $prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 75';
        $prospecto->PROS_TELEFONO =  '4059682';
        $prospecto->PROS_CELULAR =  '3177274520';
        $prospecto->PROS_CORREO =  'kfrodriguez6@misena.edu.co';
        $prospecto->PROS_CREADOPOR =  'PRUEBAS';
        $prospecto->save();

        $prospecto = new Prospecto;
        $prospecto->PROS_CEDULA = 123456781;
        $prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
        $prospecto->PROS_FECHANACIMIENTO =  '1992-09-17';
        $prospecto->PROS_PRIMERNOMBRE =  'DIEGO';
        $prospecto->PROS_SEGUNDONOMBRE =  'ARMANDO';
        $prospecto->PROS_PRIMERAPELLIDO =  'CORTES';
        $prospecto->PROS_SEGUNDOAPELLIDO =  'VALENCIA (PRUEBA)';
        $prospecto->PROS_SEXO =  'M';
        $prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 75';
        $prospecto->PROS_TELEFONO =  '4059682';
        $prospecto->PROS_CELULAR =  '3177274520';
        $prospecto->PROS_CORREO =  'shinseiki86@gmail.com';
        $prospecto->PROS_CREADOPOR =  'PRUEBAS';
        $prospecto->save();

        $prospecto = new Prospecto;
        $prospecto->PROS_CEDULA = 123456782;
        $prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
        $prospecto->PROS_FECHANACIMIENTO =  '1992-09-17';
        $prospecto->PROS_PRIMERNOMBRE =  'MARIA';
        $prospecto->PROS_SEGUNDONOMBRE =  'DEL PILAR';
        $prospecto->PROS_PRIMERAPELLIDO =  'JARAMILLO';
        $prospecto->PROS_SEGUNDOAPELLIDO =  'PASTRANA (PRUEBA)';
        $prospecto->PROS_SEXO =  'F';
        $prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 76';
        $prospecto->PROS_TELEFONO =  '4059682';
        $prospecto->PROS_CELULAR =  '3177274520';
        $prospecto->PROS_CORREO =  'krodriguez93@outlook.com';
        $prospecto->PROS_CREADOPOR =  'PRUEBAS';
        $prospecto->save();

        $prospecto = new Prospecto;
        $prospecto->PROS_CEDULA = 123456783;
        $prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
        $prospecto->PROS_FECHANACIMIENTO =  '1992-09-17';
        $prospecto->PROS_PRIMERNOMBRE =  'DIANA';
        $prospecto->PROS_SEGUNDONOMBRE =  'MILENA';
        $prospecto->PROS_PRIMERAPELLIDO =  'VARGAS (PRUEBA)';
        //$prospecto->PROS_SEGUNDOAPELLIDO =  'PASTRANA';
        $prospecto->PROS_SEXO =  'F';
        $prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 71';
        $prospecto->PROS_TELEFONO =  '4059682';
        $prospecto->PROS_CELULAR =  '3177274520';
        $prospecto->PROS_CORREO =  'krodriguez93@outlook.com';
        $prospecto->PROS_CREADOPOR =  'PRUEBAS';
        $prospecto->save();

        $prospecto = new Prospecto;
        $prospecto->PROS_CEDULA = 123456784;
        $prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
        $prospecto->PROS_FECHANACIMIENTO =  '1992-09-17';
        $prospecto->PROS_PRIMERNOMBRE =  'MAURICIO';
        //$prospecto->PROS_SEGUNDONOMBRE =  'MILENA';
        $prospecto->PROS_PRIMERAPELLIDO =  'JIMENEZ (PRUEBA)';
        //$prospecto->PROS_SEGUNDOAPELLIDO =  'PASTRANA';
        $prospecto->PROS_SEXO =  'F';
        $prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 75';
        $prospecto->PROS_TELEFONO =  '4059682';
        $prospecto->PROS_CELULAR =  '3177274520';
        $prospecto->PROS_CORREO =  'krodriguez93@outlook.com';
        $prospecto->PROS_CREADOPOR =  'PRUEBAS';
        $prospecto->save();

        
    }
}
