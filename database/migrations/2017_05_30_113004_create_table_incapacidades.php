<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIncapacidades extends Migration
{
    private $nomTabla = 'INCAPACIDADES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'INCAPACIDADES: contiene las incapacidades de los empleados';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('INCA_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla INCAPACIDADES.');

            $table->string('INCA_EMPRESA', 100)
                ->nullable()
                ->comment('empresa donde pertenece el colaborador');

            $table->integer('INCA_IDENTIFICACION')
                ->comment('identificacion del empleado');

            $table->string('INCA_NOMBREEMPLEADO', 100)
                ->nullable()
                ->comment('nombre del empleado');

            $table->string('INCA_DX', 100)
                ->nullable()
                ->comment('diagnostico de incapacidad');

            $table->string('INCA_DXDESCRIPCION', 300)
                ->nullable()
                ->comment('descripcion de diagnostico de incapacidad');

            $table->date('INCA_FECHAINICIO')
                ->comment('fecha de inicio de novedad');

            $table->integer('INCA_TOTALDIAS')
                ->nullable()
                ->comment('numero total de días de la novedad');

            $table->date('INCA_FECHAFINAL')
                ->comment('fecha final de novedad');

            $table->string('INCA_CONTINGENCIA', 20)
                ->comment('contingencia de incapacidad');

            $table->string('INCA_INIPRO', 20)
                ->comment('inicial o prorroga de incapacidad');

             $table->date('INCA_FECHAENVIO')
                ->nullable()
                ->comment('fecha de envio de novedad');

             $table->string('INCA_OBSERVACIONES', 300)
                ->nullable()
                ->comment('observaciones del TNL');

            $table->string('INCA_PRIMERDIAAT', 20)
                ->nullable()
                ->comment('indica si el primer día es a cargo de la empresa');

            $table->string('INCA_DOCUMENTO', 30)
                ->comment('documento del INCAPACIDAD');
            
            //Traza
            $table->string('INCA_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('INCA_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('INCA_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('INCA_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('INCA_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('INCA_FECHAELIMINADO')->nullable()
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
        echo '- Borrando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::drop($this->nomTabla);
    }
}
