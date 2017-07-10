<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJefes extends Migration
{
     private $nomTabla = 'JEFES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'JEFES: tabla que contiene los lideres de procesos en la compañía)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('JEFE_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla tickets.');

            $table->unsignedInteger('PROS_ID')
                ->comment('relacion a la tabla prospectos');


            $table->string('JEFE_OBSERVACIONES', 300)
                ->comment('observaciones del jefe')->nullable();
            
            //Traza
            $table->string('JEFE_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('JEFE_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('JEFE_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('JEFE_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('JEFE_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('JEFE_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relación con tabla PROSPECTOS
            $table->foreign('PROS_ID')
                ->references('PROS_ID')
                ->on('PROSPECTOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');


        });
        
        if(env('DB_CONNECTION') == 'pgsql')
            DB::statement("COMMENT ON TABLE ".env('DB_SCHEMA').".\"".$this->nomTabla."\" IS '".$commentTabla."'");
        elseif(env('DB_CONNECTION') == 'mysql')
            DB::statement("ALTER TABLE ".$this->nomTabla." COMMENT = '".$commentTabla."'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        echo '- Borrando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::drop($this->nomTabla);
    }
}
