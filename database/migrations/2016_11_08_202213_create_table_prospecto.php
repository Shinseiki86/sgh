<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProspecto extends Migration
{

    private $nomTabla = 'PROSPECTOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'PROSPECTOS: contiene los datos basicos de hojas de vida de los empleados';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {

            $table->increments('PROS_ID')
                ->comment('id de la persona llave primaria de la tabla prospectos.');

            $table->unsignedInteger('PROS_CEDULA')->unique()
                ->comment('id de la persona llave primaria de la tabla prospectos.');

            $table->date('PROS_FECHAEXPEDICION')
                ->comment('fecha de expedición del documento de identificación de la persona');

            $table->string('PROS_PRIMERNOMBRE', 100)
                ->comment('primer nombre de la persona');

             $table->string('PROS_SEGUNDONOMBRE', 100)
                ->nullable()
                ->comment('segundo nombre de la persona');

            $table->string('PROS_PRIMERAPELLIDO', 100)
                ->comment('primer apellido de la persona');

             $table->string('PROS_SEGUNDOAPELLIDO', 100)
                ->nullable()
                ->comment('segundo apellido de la persona');

            $table->string('PROS_SEXO', 1)
                ->comment('sexo de la persona');

            $table->string('PROS_DIRECCION', 100)
                ->comment('dirección de domicilio de la persona');

            $table->string('PROS_TELEFONO', 10)
                ->nullable()
                ->comment('numero de telefono de domicilio de la persona');

            $table->string('PROS_CELULAR', 15)
                ->nullable()
                ->comment('numero de celular de la persona');

            $table->string('PROS_COREO', 100)
                ->nullable()
                ->comment('correo electronico de la persona');
            
            //Traza
            $table->string('PROS_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('PROS_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('PROS_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('PROS_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('PROS_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('PROS_FECHAELIMINADO')->nullable()
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
        Schema::drop($this->nomTabla);
    }
    
}
