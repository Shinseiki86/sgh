<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificadosContratosTable extends Migration
{
    private $nomTabla = 'CERTIFICADOSCONTRATOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = $this->nomTabla.': Histórico de certificados generados, utilizado para verificar su validez.';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('CERT_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla empleado atributos.');

            $table->unsignedInteger('CONT_ID')
                ->comment('referencia al contrato');

            $table->string('CERT_OBSERVACIONES', 300)
                ->comment('observaciones del registro')->nullable();
            
            //Traza
            $table->string('CERT_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CERT_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            /*$table->string('CERT_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');*/
            $table->timestamp('CERT_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            /*$table->string('CERT_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CERT_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');*/

            //Relaciones
            $table->foreign('CONT_ID')
                ->references('CONT_ID')
                ->on('CONTRATOS');

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
