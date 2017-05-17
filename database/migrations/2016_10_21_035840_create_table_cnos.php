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
   
    private $nomTabla = 'CNOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'CNOS (clasificación nacional de ocupaciones del SENA).';

        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('CNOS_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla CNOS.');

            $table->string('CNOS_CODIGO', 5)
                ->comment('codigo de clasificación Ej: 1-directivos, 2-ejecutivos, 3-operativos');


            $table->string('CNOS_DESCRIPCION', 100)
                ->comment('descripción de clasificación Ej: directivos, ejecutivos, operativos');


            $table->string('CNOS_OBSERVACIONES', 300)
                ->comment('observaciones de clasificación nacional de ocupaciones')->nullable();
            
             //Traza
            $table->string('CNOS_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CNOS_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('CNOS_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('CNOS_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('CNOS_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CNOS_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');
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
        Schema::drop($this->nomTabla);
    }
}
