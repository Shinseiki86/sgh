<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTnls extends Migration
{
    private $nomTabla = 'TNLS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'TNLS: contiene los tiempos no laborados de los empleados';

        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('TNLA_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla TNLS.');

            $table->string('TNLA_EMPRESA', 100)
                ->nullable()
                ->comment('empresa donde pertenece el colaborador');

            $table->integer('TNLA_IDENTIFICACION')
                ->comment('identificacion del empleado');

            $table->string('TNLA_NOMBREEMPLEADO', 100)
                ->nullable()
                ->comment('nombre del empleado');

            $table->string('TNLA_NOVEDAD', 10)
                ->comment('novedad que presenta el empleado');

            $table->date('TNLA_FECHAINICIO')
                ->comment('fecha de inicio de novedad');

            $table->date('TNLA_FECHAFINAL')
                ->comment('fecha final de novedad');

            $table->integer('TNLA_TOTALDIAS')
                ->nullable()
                ->comment('numero total de días de la novedad');

             $table->string('TNLA_OBSERVACIONES', 300)
                ->nullable()
                ->comment('observaciones del TNL');

            $table->string('TNLA_DOCUMENTO', 30)
                ->comment('documento del TNL');
            
            //Traza
            $table->string('TNLA_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TNLA_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TNLA_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TNLA_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TNLA_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TNLA_FECHAELIMINADO')->nullable()
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
