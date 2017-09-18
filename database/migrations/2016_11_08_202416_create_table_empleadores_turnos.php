<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmpleadoresTurnos extends Migration
{

    private $nomTabla = 'EMPLEADORES_TURNOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'Tabla de rompimiento (muchos-a-muchos) para asociar Empleadores con Turnos.';
        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;

        Schema::create($this->nomTabla, function (Blueprint $table) {

            $table->unsignedInteger('EMPL_ID')
                ->comment('Campo foráneo de la tabla EMPLEADORES.');

            $table->unsignedInteger('TURN_ID')
                ->comment('Campo foráneo de la tabla TURNOS.');

            $table->primary(['EMPL_ID', 'TURN_ID']);

            //Relaciones
            $table->foreign('EMPL_ID')
            ->references('EMPL_ID')
            ->on('EMPLEADORES')
            ->onDelete('cascade');

            $table->foreign('TURN_ID')
            ->references('TURN_ID')
            ->on('TURNOS')
            ->onDelete('cascade');

        });
        
        //Comentario de la tabla
        try{
            if(env('DB_CONNECTION') == 'pgsql')
                DB::statement("COMMENT ON TABLE ".env('DB_SCHEMA').".\"".$this->nomTabla."\" IS '".$commentTabla."'");
            elseif(env('DB_CONNECTION') == 'mysql')
                DB::statement("ALTER TABLE ".$this->nomTabla." COMMENT = '".$commentTabla."'");
        } catch(\Exception $e){
            echo '      No fue posible colocar el comentario de la tabla.'. PHP_EOL; //$e->getMessage() 
        }
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
