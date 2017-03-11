<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTiposempleadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        //
         Schema::create('tiposempleadores', function (Blueprint $table) {
            $table->increments('id');        
            $table->string('descripcion',500);
            $table->string('observaciones',1000)->nullable();
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
         Schema::drop('tiposempleadores');
    }
}
