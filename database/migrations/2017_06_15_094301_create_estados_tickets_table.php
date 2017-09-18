<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTicketsTable extends Migration
{
    private $nomTabla = 'ESTADOSTICKETS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'ESTADOS DE TICKETS: contiene los estados disponibles para los tickets';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('ESTI_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla.');

            $table->string('ESTI_DESCRIPCION', 100)
                ->comment('descripción del estado de ticket Ej: abierto, cerrado');

            $table->string('ESTI_COLOR', 100)
                ->comment('color del estado de ticket');

            $table->string('ESTI_OBSERVACIONES', 300)
                ->comment('observaciones del estado de ticket')->nullable();
            
            //Traza
            $table->string('ESTI_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('ESTI_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('ESTI_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('ESTI_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('ESTI_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('ESTI_FECHAELIMINADO')->nullable()
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
