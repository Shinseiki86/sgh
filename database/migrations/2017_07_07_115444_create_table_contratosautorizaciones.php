<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContratosautorizaciones extends Migration
{
    private $nomTabla = 'CONTRATOS_AUTORIZACIONES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'Tabla de rompimiento (muchos-a-muchos) para asociar los empleados su respectivo jefe.';
        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;

        Schema::create($this->nomTabla, function (Blueprint $table) {

            $table->unsignedInteger('GERE_ID')
                ->comment('Campo foráneo de la tabla GERENCIAS.');

            $table->unsignedInteger('PROC_ID')
                ->comment('Campo foráneo de la tabla PROCESOS.');

            $table->primary(['GERE_ID', 'PROC_ID']);

            //Relaciones
            $table->foreign('GERE_ID')
            ->references('GERE_ID')
            ->on('GERENCIAS')
            ->onDelete('cascade');

            $table->foreign('PROC_ID')
            ->references('PROC_ID')
            ->on('PROCESOS')
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
        Schema::drop($this->nomTabla);
    }
}
