<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoresGerenciasTable extends Migration
{

    private $nomTabla = 'EMPLEADORES_GERENCIAS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'Tabla de rompimiento (muchos-a-muchos) para asociar Empleadores con Gerencias.';
        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;

        Schema::create($this->nomTabla, function (Blueprint $table) {

            $table->unsignedInteger('EMPL_ID')
                ->comment('Campo foráneo de la tabla EMPLEADORES.');

            $table->unsignedInteger('GERE_ID')
                ->comment('Campo foráneo de la tabla GERENCIAS.');

            $table->primary(['EMPL_ID', 'GERE_ID']);

            //Relaciones
            $table->foreign('EMPL_ID')
            ->references('EMPL_ID')
            ->on('EMPLEADORES')
            ->onDelete('cascade');

            $table->foreign('GERE_ID')
            ->references('GERE_ID')
            ->on('GERENCIAS')
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
