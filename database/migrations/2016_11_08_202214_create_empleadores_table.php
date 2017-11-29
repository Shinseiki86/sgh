<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoresTable extends Migration
{
    
    private $nomTabla = 'EMPLEADORES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        $commentTabla = 'EMPLEADORES: contiene los empleadores de la organización (empresas)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('EMPL_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla empleadores.');

            $table->string('EMPL_RAZONSOCIAL', 300)
                ->comment('razon social del empleador');

            $table->unsignedBigInteger('EMPL_NIT')->unique()
                ->comment('numero de identificación tributaria del empleador.');

            $table->unsignedBigInteger('EMPL_CEDULAREPRESENTANTE')
                ->comment('numero de cedula del representante legal del empleador.');

            $table->string('EMPL_NOMBREREPRESENTANTE', 300)
                ->comment('nombre del representante legal del empleador');

            $table->unsignedInteger('CIUD_CEDULA')
                ->comment('ciudad de expedición de cedula del representante.');

            $table->string('EMPL_NOMBRECOMERCIAL', 300)
                ->comment('nombre comercial del empleador');

            $table->string('EMPL_DIRECCION', 300)
                ->comment('dirección de la empresa');

            $table->unsignedInteger('CIUD_DOMICILIO')
                ->comment('ciudad de domicilio del empleador.');

            $table->string('EMPL_CORREO', 320)
                ->nullable()
                ->comment('correo electronico del encargado en el empleador');

            $table->unsignedInteger('PROS_ID')
                ->comment('persona encargada del manejo de gestión humana del empleador.');

            $table->string('EMPL_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('EMPL_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('EMPL_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('EMPL_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('EMPL_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('EMPL_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('EMPL_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            $table->foreign('CIUD_CEDULA')
                ->references('CIUD_ID')
                ->on('CIUDADES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('CIUD_DOMICILIO')
                ->references('CIUD_ID')
                ->on('CIUDADES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
