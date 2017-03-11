<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMotivosretiros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivosretiros', function (Blueprint $table) {

            $table->increments('id');           
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
        Schema::drop('motivosretiros');
    }
}
