<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoEntidadTable extends Migration
{
    private $nomTabla = 'CONTRATO_ENTIDAD';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'Contiene Las entides de cada prospecto, por ejemplo EPS, ARL CCF';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('COEN_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla CONTRATO_ENTIDAD.');

            $table->unsignedInteger('CONT_ID');
            $table->unsignedInteger('ENTI_ID');

            $table->foreign('CONT_ID')->references('CONT_ID')->on('CONTRATOS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ENTI_ID')->references('ENTI_ID')->on('ENTIDADES')->onDelete('cascade')->onUpdate('cascade');

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
