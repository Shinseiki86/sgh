<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCentrocostos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centrocostos', function (Blueprint $table) {

            $table->increments('id');
            $table->string('codigo')->unique();       
            $table->string('descripcion', 300);            
            $table->string('observaciones', 1000)->nullable();
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
        Schema::drop('centrocostos');
    }
}
