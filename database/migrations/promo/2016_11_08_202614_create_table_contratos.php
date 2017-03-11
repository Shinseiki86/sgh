<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('prospecto')->unsigned();
            //$table->string('nombres');
            //$table->string('apellidos');
            //$table->string('sexo', 1);
            $table->string('caso_medico', 2);
            $table->integer('cargo')->unsigned();
            $table->date('fecha_ingreso');
            $table->date('fecha_retiro')->nullable();
            $table->integer('salario');
            $table->integer('variable');
            $table->integer('rodaje');
            $table->string('tipo_nomina');
            $table->integer('estado_contrato')->unsigned();
            $table->integer('motivo_retiro')->unsigned()->nullable();
            $table->integer('tipo_contrato')->unsigned();
            $table->integer('clase_contrato')->unsigned();
            $table->integer('empleador')->unsigned();
            $table->integer('tipo_empleador')->unsigned();
            $table->integer('centro_costo')->unsigned();
            $table->integer('gerencia')->unsigned();

            $table->foreign('prospecto')
                  ->references('id')->on('prospectos')
                  ->onUpdate('cascade');

            $table->foreign('estado_contrato')
                  ->references('id')->on('estadoscontratos')
                  ->onUpdate('cascade');

            $table->foreign('motivo_retiro')
                  ->references('id')->on('motivosretiros')
                  ->onUpdate('cascade');
          
            $table->foreign('tipo_contrato')
                  ->references('id')->on('tiposcontratos')
                  ->onUpdate('cascade');

            $table->foreign('clase_contrato')
                  ->references('id')->on('clasecontratos')
                  ->onUpdate('cascade');

            $table->foreign('gerencia')
                  ->references('id')->on('gerencias')
                  ->onUpdate('cascade');

            $table->foreign('empleador')
                  ->references('id')->on('empleadores')
                  ->onUpdate('cascade');

            $table->foreign('tipo_empleador')
                  ->references('id')->on('tiposempleadores')
                  ->onUpdate('cascade');

            $table->foreign('centro_costo')
                  ->references('id')->on('centrocostos')
                  ->onUpdate('cascade');

            $table->foreign('cargo')
                  ->references('id')->on('cargos')
                  ->onUpdate('cascade');      

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contratos');
    }
}
