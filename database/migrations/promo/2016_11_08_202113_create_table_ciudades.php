<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCiudades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {

            $table->increments('id');           
            $table->string('codigo',5);
            $table->string('descripcion',100)->unique();
            $table->integer('departamento')->unsigned();          
            $table->timestamps();
            
            $table->foreign('departamento')
                  ->references('id')->on('departamentos')
                  ->onUpdate('cascade');            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ciudades');
    }

}
