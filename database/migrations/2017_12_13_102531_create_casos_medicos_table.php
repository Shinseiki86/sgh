<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasosMedicosTable extends Migration
{
    private $nomTabla = 'CASOSMEDICOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'CASOS MEDICOS: contiene los casos de personal con restricciones medicas';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('CAME_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla casos medicos.');

            $table->date('CAME_FECHARESTRICCION')
                ->comment('fecha de inicio de la restricción');

            $table->string('CAME_DIAGESPECIFICO', 100)
                ->comment('diagnostico especifico del empleado');

            $table->string('CAME_CONTINGENCIA', 100)
                ->comment('contingencia del caso médico');

            $table->string('CAME_LUGARREUBICACION', 100)
                ->comment('lugar donde se encuentra reubicado el empleado')
                ->nullable();

            $table->string('CAME_LABOR', 100)
                ->comment('labor que desempeña el empleado')
                ->nullable();

            $table->text('CAME_PCL', 5)
                ->comment('perdida de capacidad laboral del empleado');

            $table->text('CAME_NIVELPRODUCTIVIDAD', 5)
                ->comment('nivel de productividad del empleado');

            $table->string('CAME_OBSERVACIONES', 300)
                ->comment('observaciones del caso medico')->nullable();

            $table->unsignedInteger('CONT_ID')
                ->comment('referencia al contrato que se convirtió en caso médico');

            $table->unsignedInteger('DIGE_ID')
                ->comment('referencia al diagnostico general del caso medico');

            $table->unsignedInteger('ESRE_ID')
                ->comment('referencia al estado de restricción del caso medico');
            
            //Traza
            $table->string('CAME_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CAME_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('CAME_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('CAME_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('CAME_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CAME_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

            //Relaciones
            $table->foreign('CONT_ID')
                ->references('CONT_ID')
                ->on('CONTRATOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('DIGE_ID')
                ->references('DIGE_ID')
                ->on('DIAGNOSTICOSGENERALES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ESRE_ID')
                ->references('ESRE_ID')
                ->on('ESTADOSRESTRICCION')
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
        Schema::dropIfExists($this->nomTabla);
    }
}
