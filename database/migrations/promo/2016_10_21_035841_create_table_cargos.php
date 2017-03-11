<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');        
            $table->string('cargo',300);
            $table->integer('cno')->unsigned();
            $table->string('observaciones',500)->nullable();
            

            $table->foreign('cno')
                  ->references('id')->on('cnos')
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
        //
         Schema::drop('cargos');
    }
}
