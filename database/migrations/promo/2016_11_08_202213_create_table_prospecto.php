<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProspecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospectos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cedula')->unique();
            $table->string('nombres',300);
            $table->string('apellidos',300);
            $table->string('direccion',300);
            $table->string('telefono',20);
            $table->string('celular',20);
            $table->string('email',100);
            $table->string('factor_rh',5);
            $table->string('sexo', 1);
            $table->date('fecha_expedicion')->nullable();

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
        Schema::drop('prospectos');
    }
    
}
