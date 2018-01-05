	<?php

	use Illuminate\Database\Seeder;
	use SGH\Models\Negocio;

	class NegociosTableSeeder extends Seeder
	{
	    /**
	     * Run the database seeds.
	     *
	     * @return void
	     */
	    public function run()
	    {
	        //
	        $this->command->info('---Seeder Negocios');

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'ACCION PROMOVALLE R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'ACCION PROMOVALLE R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI ATIEMPO - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI ATIEMPO - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI A TIEMPO RH - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOVALLE ATIEMPO - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOVALLE ATIEMPO - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOVALLE A TIEMPO - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SURASEO A TIEMPO - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 5;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SURASEO A TIEMPO - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 5;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'EXTRAS PROMOCALI - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'EXTRAS PROMOCALI - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'GENTEFICIENTE PROMOCALI R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'GENTEFICIENTE PROMOCALI R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'GENTEFICIENTE PROMOVALLE R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'GENTEFICIENTE PROMOVALLE R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'GENTES PROMOCALI R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'GENTES PROMOCALI R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'GENTES PROMOVALLE R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'GENTES PROMOVALLE R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI 100% - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI 100% - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI NMN COMPARTIDA - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI NMN COMPARTIDA - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI RUTA HOSPIT - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI RUTA HOSPIT - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI RUTA HOSPIT - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI 100% - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI 100% - R4';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI RUTA HOSPIT - R4';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOVALLE 100% - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOVALLE 100% - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOVALLE 100% - R4';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCARIBE PROSERVIS - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 2;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCARIBE PROSERVIS - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 2;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCARIBE A TIEMPO - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 2;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCARIBE A TIEMPO - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 2;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCARIBE EXTRAS - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 2;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCARIBE EXTRAS - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 2;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCARIBE SOVEL - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 2;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCARIBE SOVEL - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 2;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL PROSERVIS - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL PROSERVIS - R2';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL SOLUTEMP - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL SOLUTEMP - R2';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL SOLUTEMP - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'METALMECANICA A TIEMPO - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 8;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'METALMECANICA A TIEMPO - R2';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 8;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL SOMOS - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL SOMOS - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL SOMOS - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL SOMOS - R4';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SOLUTEMP CORFERIAS - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SOLUTEMP CORFERIAS - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SOLUTEMP CORFERIAS - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 1;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'CENCOASEO SOLUTEMP - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 7;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'CENCOASEO SOLUTEMP - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 7;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'CENCOASEO SOLUTEMP - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 7;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI DIRECTOS';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOVALLE DIRECTOS';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 3;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SURASEO DIRECTOS';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 5;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI LA CARETA';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'PROMOCALI UFPRAME';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 4;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SURASEO PROSERVIS - R1';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 5;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SURASEO PROSERVIS - R3';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 5;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();

	$negocio = new Negocio;
	$negocio->NEGO_DESCRIPCION = 'SURASEO PROSERVIS - R5';
	$negocio->NEGO_OBSERVACIONES = NULL;
	$negocio->EMPL_ID = 5;
	$negocio->PROS_ID = 1;
	$negocio->NEGO_CREADOPOR = 'admin';
	$negocio->save();


	    }
	}
