<?php

use Illuminate\Database\Seeder;
use SGH\Models\TipoIncidente;

class TiposIncidentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		$this->command->info('---Seeder TiposDeIncidente');

        $tipocontrato = new TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'FALLA EN PROCEDIMIENTO';
        $tipocontrato->TIIN_OBSERVACIONES =  'EL EMPLEADO NO CUMPLIÓ LOS PARAMETROS ESTABLECIDOS';
        $tipocontrato->TIIN_CREADOPOR =  'admin';
        $tipocontrato->save();

        $tipocontrato = new TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'DEFICIENTE DESEMPEÑO';
        $tipocontrato->TIIN_OBSERVACIONES =  'NO CUMPLE LA LABOR';
        $tipocontrato->TIIN_CREADOPOR =  'admin';
        $tipocontrato->save();

        $tipocontrato = new TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'ACCIDENTE DE TRANSITO';
        $tipocontrato->TIIN_OBSERVACIONES =  'POR EVENTOS DE TRANSITO';
        $tipocontrato->TIIN_CREADOPOR =  'admin';
        $tipocontrato->save();

        $tipocontrato = new TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'DAÑO EN ACTIVOS DE LA EMPRESA';
        $tipocontrato->TIIN_OBSERVACIONES =  'EL EMPLEADO REALIZÓ UN DAÑO EN LOS ACTIVOS DE LA EMPRESA';
        $tipocontrato->TIIN_CREADOPOR =  'admin';
        $tipocontrato->save();

        $tipocontrato = new TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'INCUMPLIMIENTO EN NORMAS S.S.T';
        $tipocontrato->TIIN_OBSERVACIONES =  'NO CUMPLE LOS PARAMETROS DEFINIDOS DESDE S.S.T';
        $tipocontrato->TIIN_CREADOPOR =  'admin';
        $tipocontrato->save();

        $tipocontrato = new TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'IRESPETO A SUPERIORES O COMPAÑEROS';
        $tipocontrato->TIIN_OBSERVACIONES =  'COMPORTAMIENTO INADECUADO CON SUS SUPERIORES Y PARES';
        $tipocontrato->TIIN_CREADOPOR =  'admin';
        $tipocontrato->save();

        $tipocontrato = new TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'RETARDO';
        $tipocontrato->TIIN_OBSERVACIONES =  'EL EMPLEADO SE PRESENTA A LABORAR TARDE';
        $tipocontrato->TIIN_CREADOPOR =  'admin';
        $tipocontrato->save();
		
		$tipocontrato = new TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'AUSENCIA SIN JUSTIFICACIÓN';
        $tipocontrato->TIIN_OBSERVACIONES =  'CUANDO UN EMPLEADO NO SE PRESENTÓ A LABORAR';
        $tipocontrato->TIIN_CREADOPOR =  'admin';
        $tipocontrato->save();
        
	}
}
