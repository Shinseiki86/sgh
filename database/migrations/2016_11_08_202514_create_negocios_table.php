<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegociosTable extends Migration
{

    private $nomTabla = 'NEGOCIOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'NEGOCIOS: contiene las agrupaciones de empleados sobre los diferentes empleadores.';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('NEGO_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla NEGOCIO.');

            $table->string('NEGO_DESCRIPCION', 100)
                ->comment('descripción del negocio Ej: Promocali Proservis, Promocali Atiempo, Etc.');

            $table->integer('EMPL_ID')->unsigned()
                ->comment('llave foranea al empleador');

            $table->integer('PROS_ID')->unsigned()
                ->comment('responsable del negocio, llave foranea a prospecto');

            $table->string('NEGO_OBSERVACIONES', 300)
                ->comment('observaciones del negocio')->nullable();
            
            //Traza
            $table->string('NEGO_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('NEGO_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('NEGO_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('NEGO_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('NEGO_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('NEGO_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relación con tabla EMPLEADORES
            $table->foreign('EMPL_ID')
                ->references('EMPL_ID')
                ->on('EMPLEADORES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla PROSPECTOS
            $table->foreign('PROS_ID')
                ->references('PROS_ID')
                ->on('PROSPECTOS')
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
