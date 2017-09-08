<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoAusentismosTable extends Migration
{
	private $nomTabla = 'TIPOAUSENTISMOS';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$commentTabla = 'Contiene los tipos de ausentismos existentes teniendo de forma implicita su contingencia';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
		Schema::create('TIPOAUSENTISMOS', function(Blueprint $table)
		{
			
			$table->increments('TIAU_ID')->comment('Valor autonumérico, llave primaria de la tabla.');
			$table->string('TIAU_CODIGO')->comment('Codigo del tipo de ausentismo');
			$table->string('TIAU_DESCRIPCION')->comment('Descripcion del Tipo de Ausentismo');
			$table->string('TIAU_OBSERVACIONES')->nullable();


			//Traza
            $table->string('TIAU_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TIAU_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TIAU_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TIAU_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TIAU_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TIAU_FECHAELIMINADO')->nullable()
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
		Schema::drop('TIPOAUSENTISMOS');
	}

}
