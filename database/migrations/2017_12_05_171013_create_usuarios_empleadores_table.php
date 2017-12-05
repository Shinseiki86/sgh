<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosEmpleadoresTable extends Migration
{
   private $nomTabla = 'USUARIOS_EMPLEADORES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'Tabla de rompimiento (muchos-a-muchos) para asociar Usuarios con Empleadores.';
        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;

        Schema::create($this->nomTabla, function (Blueprint $table) {

            $table->unsignedInteger('USER_id')
                ->comment('Campo foráneo de la tabla USUARIOS.');

            $table->unsignedInteger('EMPL_ID')
                ->comment('Campo foráneo de la tabla EMPLEADORES.');

            $table->primary(['EMPL_ID', 'USER_id']);

            //Relaciones
            $table->foreign('USER_id')
            ->references('USER_id')
            ->on('USERS')
            ->onDelete('cascade');

            $table->foreign('EMPL_ID')
            ->references('EMPL_ID')
            ->on('EMPLEADORES')
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
