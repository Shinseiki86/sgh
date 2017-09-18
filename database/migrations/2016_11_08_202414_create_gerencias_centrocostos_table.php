<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGerenciasCentrocostosTable extends Migration
{

    private $nomTabla = 'GERENCIAS_CENTROCOSTOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'Tabla de rompimiento (muchos-a-muchos) para asociar Gerencia con Centros de Costos.';
        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;

        Schema::create($this->nomTabla, function (Blueprint $table) {

            $table->unsignedInteger('GERE_ID')
                ->comment('Campo foráneo de la tabla GERENCIAS.');

            $table->unsignedInteger('CECO_ID')
                ->comment('Campo foráneo de la tabla CENTROS DE COSTOS.');

            $table->primary(['GERE_ID', 'CECO_ID']);

            //Relaciones
            $table->foreign('GERE_ID')
            ->references('GERE_ID')
            ->on('GERENCIAS')
            ->onDelete('cascade');

            $table->foreign('CECO_ID')
            ->references('CECO_ID')
            ->on('CENTROSCOSTOS')
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
