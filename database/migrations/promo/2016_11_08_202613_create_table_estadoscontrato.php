<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstadoscontrato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('estadoscontratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado',2);
            $table->string('descripcion',500);
            $table->string('observaciones',500)->nullable();
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
        //
         Schema::drop('estadoscontratos');
    }
}
