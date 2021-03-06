<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    
    private $nomTabla = 'GRUPOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        $commentTabla = 'GRUPOS: contiene los grupos de empleados de la organización (clasificación adicional)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('GRUP_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla empleadores.');

            $table->string('GRUP_DESCRIPCION', 300)
                ->comment('descripción del grupo de empleados');

            $table->string('GRUP_OBSERVACIONES', 300)
                ->comment('observaciones del grupo de empleados')->nullable();
            
            //Traza
            $table->string('GRUP_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('GRUP_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('GRUP_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('GRUP_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('GRUP_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('GRUP_FECHAELIMINADO')->nullable()
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
        Schema::dropIfExists($this->nomTabla);
    }

}
