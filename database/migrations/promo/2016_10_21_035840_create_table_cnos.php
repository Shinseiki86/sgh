<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('cnos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unsigned()->unique();       
            $table->string('descripcion',300);
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
         Schema::drop('cnos');
    }
}
