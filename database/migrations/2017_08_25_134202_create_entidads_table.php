<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadsTable extends Migration
{
	private $nomTabla = 'ENTIDADES';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$commentTabla = 'Contiene las entidades existentes de todos los tipos de entidades';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
		Schema::create($this->nomTabla, function(Blueprint $table)
		{
			
			$table->increments('ENTI_ID')->comment('Valor autonumérico, llave primaria de la tabla.');
			$table->string('ENTI_CODIGO')->comment('Codigo de la Entidad');
			$table->string('ENTI_NIT')->comment('Nit de la Endidad');
			$table->string('ENTI_RAZONSOCIAL')->comment('Razon Social de la Entidad');
			$table->string('ENTI_OBSERVACIONES')->nullable()->comment('Observacion Relacionada a la Entidad');
			$table->unsignedInteger('TIEN_ID');
			$table->foreign('TIEN_ID')->references('TIEN_ID')->on('TIPOENTIDADES')->onDelete('cascade')->onUpdate('cascade');


			//Traza
            $table->string('ENTI_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('ENTI_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('ENTI_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('ENTI_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('ENTI_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('ENTI_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

            //Relaciones

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
