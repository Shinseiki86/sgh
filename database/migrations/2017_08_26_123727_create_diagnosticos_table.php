<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticosTable extends Migration
{
	private $nomTabla = 'diagnosticos';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$commentTabla = 'Contiene los diagnosticos existentes en el CIE10';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
		Schema::create('diagnosticos', function(Blueprint $table)
		{
			
			$table->increments('DIAG_ID')->comment('Valor autonumérico, llave primaria de la tabla.');
			$table->string('DIAG_CODIGO')->comment('Codigo CIE10 ');
			$table->string('DIAG_DESCRIPCION')->comment('Descripcion del codigo CIE10');


			//Traza
            $table->string('DIAG_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('DIAG_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('DIAG_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('DIAG_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('DIAG_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('DIAG_FECHAELIMINADO')->nullable()
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
		Schema::drop('diagnosticos');
	}

}
