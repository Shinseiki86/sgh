<?php

use Illuminate\Database\Seeder;
use SGH\Models\ConceptoAusencia;

class ConceptoAusenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TIPO DE ENTIDAD EPS - TIPO DE AUSENTIMOS INCAP. POR ENFERMEDADES GENERALES
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'INCEMP',
            'COAU_DESCRIPCION' => 'INCAPACIDAD POR ENFERMEDAD GENERAL (EMPLEADOR)',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS INCAPACIDADES POR ENFERMEDAD GENERAL QUE SE ENCUENTRAN A CARGO DEL EMPLEADOR',
            'TIAU_ID' => 2,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'INCEPS',
            'COAU_DESCRIPCION' => 'INCAPACIDAD POR ENFERMEDAD GENERAL (EPS)',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS INCAPACIDADES POR ENFERMEDAD GENERAL QUE SE ENCUENTRAN A CARGO DE LA EPS',
            'TIAU_ID' => 2,
            'TIEN_ID' => 2,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'INCLM',
            'COAU_DESCRIPCION' => 'LICENCIA DE MATERNIDAD',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS INCAPACIDADES LICENCIAS DE MATERNIDADES OTORGADAS AL EMPLEADO',
            'TIAU_ID' => 2,
            'TIEN_ID' => 2,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'INCLP',
            'COAU_DESCRIPCION' => 'LICENCIA DE PATERNIDAD',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS INCAPACIDADES LICENCIAS DE MATERNIDADES OTORGADAS AL EMPLEADO',
            'TIAU_ID' => 2,
            'TIEN_ID' => 2,
            'COAU_REMUNERADO' => 'SI',
        ]);

        //TIPO DE ENTIDAD ARL - TIPO DE AUSENTISMOS INCAP. POR ACCIDENTE DE TRABAJO
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'INCAT',
            'COAU_DESCRIPCION' => 'INCAPACIDAD POR ACCIDENTE DE TRABAJO',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS INCAPACIDADES CAUSADAS POR UN ACCIDENTE LABORAL',
            'TIAU_ID' => 1,
            'TIEN_ID' => 1,
            'COAU_REMUNERADO' => 'SI',
        ]);


        //TIPO DE ENTIDAD EMPRESA COMODIN - TIPO DE AUSENTISMO PERMISOS REMUNERADOS
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'DLP',
            'COAU_DESCRIPCION' => 'DILIGENCIA PERSONAL REMUNERADA',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS DILIGENCIAS PERSONALES DEL COLABORADOR QUE SE OTORGAN COMO REMUNERADAS',
            'TIAU_ID' => 4,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'PRL',
            'COAU_DESCRIPCION' => 'PERMISO LABORAL',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LOS PERMISOS QUE SE OTORGAN AL EMPLEADO EN FUNCIÓN DE UNA ACTIVIDAD REQUERIDA POR LA EMPRESA (CAPACITACIÓN, DILIGENCIAS ADMINISTRATIVAS, ETC.)',
            'TIAU_ID' => 4,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'MED',
            'COAU_DESCRIPCION' => 'PERMISO MÉDICO',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LOS PERMISOS QUE SE OTORGAN AL EMPLEADO EN FUNCIÓN DE ASISTENCIA A CITAS Y/O TRATAMIENTOS MÉDICOS',
            'TIAU_ID' => 4,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'PXC',
            'COAU_DESCRIPCION' => 'PERMISO POR CALAMIDAD',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LOS PERMISOS QUE SE OTORGAN AL EMPLEADO POR CALAMIDAD',
            'TIAU_ID' => 4,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'REM',
            'COAU_DESCRIPCION' => 'PERMISO REMUNERADO',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LOS PERMISOS QUE SE OTORGAN AL EMPLEADO EN FORMA REMUNERADA',
            'TIAU_ID' => 4,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'LCL',
            'COAU_DESCRIPCION' => 'LICENCIA DE LUTO',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS LICENCIAS QUE SE OTORGAN AL EMPLEADO POR LICENCIA DE LUTO SEGUN ESTABLECE LA NORMA VIGENTE',
            'TIAU_ID' => 4,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'LR',
            'COAU_DESCRIPCION' => 'LICENCIA REMUNERADA',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS LICENCIAS REMUNERADAS QUE SE OTORGAN AL EMPLEADO POR DISPOSICIÓN DEL EMPLEADOR',
            'TIAU_ID' => 4,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'CMP',
            'COAU_DESCRIPCION' => 'COMPENSATORIO',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LOS DÍAS COMPENSATORIOS QUE SE OTORGAN AL EMPLEADO',
            'TIAU_ID' => 4,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        //TIPO DE ENTIDAD EMPRESA COMODIN - TIPO DE AUSENTISMO PERMISOS NO REMUNERADOS
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'DPNR',
            'COAU_DESCRIPCION' => 'DILIGENCIA PERSONAL NO REMUNERADA',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS DILIGENCIAS PERSONALES DEL COLABORADOR QUE SE OTORGAN COMO NO REMUNERADAS',
            'TIAU_ID' => 5,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'PNR',
            'COAU_DESCRIPCION' => 'PERMISO NO REMUNERADO',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LOS PERMISOS QUE SE OTORGAN AL EMPLEADO EN FORMA NO REMUNERADA',
            'TIAU_ID' => 5,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'LNR',
            'COAU_DESCRIPCION' => 'LICENCIA NO REMUNERADA',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS LICENCIAS NO REMUNERADAS QUE SE OTORGAN AL EMPLEADO POR DISPOSICIÓN DEL EMPLEADOR',
            'TIAU_ID' => 5,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'ATEM',
            'COAU_DESCRIPCION' => 'INCAPACIDAD POR ACCIDENTE DE TRABAJO (EMPLEADOR)',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS INCAPACIDADES POR ACCIDENTE DE TRABAJO A CARGO DEL EMPLEADOR, ES DECIR EL PRIMER DÍA',
            'TIAU_ID' => 5,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        //TIPO DE ENTIDAD EMPRESA COMODIN - TIPO DE AUSENTISMO AUSENCIAS SIN JUSTIFICACIÓN
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'AUS',
            'COAU_DESCRIPCION' => 'AUSENCIA SIN JUSTIFICACIÓN',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS AUSENCIAS DEL COLABORADOR DONDE NO PRESENTA NINGUN SOPORTE PARA JUSTIFICARLA',
            'TIAU_ID' => 6,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

        //TIPO DE ENTIDAD EMPRESA COMODIN - TIPO DE AUSENTISMO SANCIONES
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'SAN',
            'COAU_DESCRIPCION' => 'SANCIONADO',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS SANCIONES PUESTAS AL EMPLEADO',
            'TIAU_ID' => 7,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

        //TIPO DE ENTIDAD EMPRESA COMODIN - TIPO DE AUSENTISMO VACACIONES
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'VAC',
            'COAU_DESCRIPCION' => 'VACACIONES',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LAS VACACIONES DEL EMPLEADO',
            'TIAU_ID' => 8,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        //TIPO DE ENTIDAD EMPRESA COMODIN - TIPO DE AUSENTISMO OTROS
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'DXP',
            'COAU_DESCRIPCION' => 'NO PRESTA SERVICIO POR DOCUMENTOS',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LA NO PRESTACIÓN DEL SERVICIO POR PARTE DE UN EMPLEADO YA QUE NO CUENTA CON LOS DOCUMENTOS PARA LA LABOR',
            'TIAU_ID' => 9,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'DXD',
            'COAU_DESCRIPCION' => 'NO PRESTA SERVICIO POR DOTACIÓN',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LA NO PRESTACIÓN DEL SERVICIO POR PARTE DE UN EMPLEADO YA QUE NO CUENTA CON LA DOTACIÓN PARA LA LABOR',
            'TIAU_ID' => 9,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'NDL',
            'COAU_DESCRIPCION' => 'NO DEBÍA LABORAR',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LA NO PRESTACIÓN DEL SERVICIO POR PARTE DE UN EMPLEADO EN DÍAS FESTIVOS QUE NO FUE PROGRAMADO PARA TURNO',
            'TIAU_ID' => 9,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'SI',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'DAT',
            'COAU_DESCRIPCION' => 'DEVUELTO A LA TEMPORAL',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LA NO PRESTACIÓN DEL SERVICIO POR PARTE DE UN EMPLEADO AL CUAL SE LE INDICA QUE SE PRESENTE A LA TEMPORAL',
            'TIAU_ID' => 9,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'PED',
            'COAU_DESCRIPCION' => 'PERDIDA DE DOMINICAL',
            'COAU_OBSERVACIONES' => 'CORESPONDE A LA PERDIDA DE DOMINICAL COMPENSADO DE ACUERDO A LAS CONDICIONES QUE ESTABLECE LA LEY PARA ELLO',
            'TIAU_ID' => 6,
            'TIEN_ID' => 5,
            'COAU_REMUNERADO' => 'NO',
        ]);

    }
}