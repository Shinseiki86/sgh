<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria = new \SGH\Categoria;
        $categoria->CATE_DESCRIPCION = 'SOLICITUD DE DESCARGOS';
        $categoria->CATE_OBSERVACIONES =  'SOLICITA DESCARGOS PARA EL COLABORADOR';
        $categoria->CATE_COLOR =  'rgb(255, 0, 0)';
        $categoria->CATE_CREADOPOR =  'SYSTEM';
        $categoria->save();

        $categoria = new \SGH\Categoria;
        $categoria->CATE_DESCRIPCION = 'SOLICITUD DE LLAMADO DE ATENCION';
        $categoria->CATE_OBSERVACIONES =  'SOLICITA LLAMADO DE ATENCION PARA EL COLABORADOR';
        $categoria->CATE_COLOR =  'rgb(255, 102, 0)';
        $categoria->CATE_CREADOPOR =  'SYSTEM';
        $categoria->save();

       
    }
}
