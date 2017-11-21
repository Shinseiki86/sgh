<?php

use Illuminate\Database\Seeder;
use SGH\Models\MotivoRetiro;

class MotivosRetirosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->command->info('---Seeder Motivosretiros');
    	
    	$motivoretiro = new MotivoRetiro;
    	$motivoretiro->MORE_DESCRIPCION = 'RENUNCIA VOLUNTARIA';
    	$motivoretiro->MORE_OBSERVACIONES =  'POR VOLUNTAD DEL TRABAJADOR';
    	$motivoretiro->MORE_CREADOPOR =  'admin';
    	$motivoretiro->save();

    	$motivoretiro = new MotivoRetiro;
    	$motivoretiro->MORE_DESCRIPCION = 'DESPIDO SIN JUSTA CAUSA';
    	$motivoretiro->MORE_OBSERVACIONES =  'POR DECISIÓN DE LA EMPRESA';
    	$motivoretiro->MORE_CREADOPOR =  'admin';
    	$motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'DESPIDO CON JUSTA CAUSA';
        $motivoretiro->MORE_OBSERVACIONES =  'POR DECISIÓN DE LA EMPRESA POR VIOLACIÓN DEL REGLAMENTO INTERNO DE TRABAJO O NORMATIVIDAD LABORAL';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'FINALIZACIÓN DE CONTRATO A TERMINO FIJO';
        $motivoretiro->MORE_OBSERVACIONES =  'POR EXPIRACIÓN DEL PLAZO PACTADO';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'MIGRACIÓN COMPAÑÍA';
        $motivoretiro->MORE_OBSERVACIONES =  'PASO DE E.S.T A DIRECTO POR COMPAÑÍA';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'TEMPORALIDAD';
        $motivoretiro->MORE_OBSERVACIONES =  'FINALIZACIÓN DE TRABAJO EN MISIÓN';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'SENTENCIA JUDICIAL O ADMINISTRATIVA';
        $motivoretiro->MORE_OBSERVACIONES =  'POR DECISIÓN ADMINISTRATIVA JUDICIAL';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'FINALIZACIÓN LABOR';
        $motivoretiro->MORE_OBSERVACIONES =  'CUANDO SE TERMINA LA LABOR PARA LA CUAL FUE CONTRATADO';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'TERMINACIÓN DE CONTRATO POR DECISIÓN DE COMPAÑÍA';
        $motivoretiro->MORE_OBSERVACIONES =  'CUANDO EL EMPLEADO NO CUMPLE CON LOS PARAMETROS REQUERIDOS PARA EL CARGO';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'MUERTE DEL TRABAJADOR';
        $motivoretiro->MORE_OBSERVACIONES =  'CUANDO EL EMPLEADO MUERE';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

        $motivoretiro = new MotivoRetiro;
        $motivoretiro->MORE_DESCRIPCION = 'CONCILIACIÓN';
        $motivoretiro->MORE_OBSERVACIONES =  'CUANDO AL COLABORADOR SE LE OTORGA UNA SUMA INDEMNIZATORIA';
        $motivoretiro->MORE_CREADOPOR =  'admin';
        $motivoretiro->save();

    }
}
