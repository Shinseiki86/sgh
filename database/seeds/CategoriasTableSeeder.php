<?php

use Illuminate\Database\Seeder;
use SGH\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria;
        $categoria->CATE_DESCRIPCION = 'SOLICITUD DE PROCESO DISCIPLINARÍO';
        $categoria->PROC_ID = 1;
        $categoria->CATE_OBSERVACIONES =  'SOLICITA PROCESO ADMINISTRATIVO PARA EL COLABORADOR';
        $categoria->CATE_COLOR =  'rgb(255, 0, 0)';
        $categoria->CATE_CREADOPOR =  'admin';
        $categoria->save();

    }
}
