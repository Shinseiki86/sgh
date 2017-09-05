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
        ConceptoAusencia::create([
            'COAU_CODIGO' => 'INEP',
            'COAU_DESCRIPCION' => 'Incapacidad Enfermedad Profesional',
            'COAU_OBSERVACIONES' => 'Corresponde a las incapacidades por EP',
            'TIAU_ID' => 1,
            'TIEN_ID' => 1,
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'INAT',
            'COAU_DESCRIPCION' => 'Incapacidad Accidente de Trabajo',
            'COAU_OBSERVACIONES' => 'Corresponde a las incapacidades por AT',
            'TIAU_ID' => 1,
            'TIEN_ID' => 1,
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => 'INEG',
            'COAU_DESCRIPCION' => 'Incapacidad Enfermedad General',
            'COAU_OBSERVACIONES' => 'Corresponde a las incapacidades por enfermedad general',
            'TIAU_ID' => 3,
            'TIEN_ID' => 2,
        ]);

        ConceptoAusencia::create([
            'COAU_CODIGO' => '	MATER',
            'COAU_DESCRIPCION' => 'Licencia de Maternidad',
            'COAU_OBSERVACIONES' => 'Corresponde a la licencia de maternidad',
            'TIAU_ID' => 3,
            'TIEN_ID' => 2,
        ]);

    }
}
