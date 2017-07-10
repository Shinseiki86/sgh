<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CnosTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(TiposcontratosTableSeeder::class);
        $this->call(TemporalesTableSeeder::class);
        $this->call(EmpleadoresTableSeeder::class);
        $this->call(MotivosretirosTableSeeder::class);
        $this->call(ProspectosTableSeeder::class);
        $this->call(ClasescontratosTableSeeder::class);
        $this->call(GerenciasTableSeeder::class);
        $this->call(ProcesosTableSeeder::class);
        $this->call(CentroscostosTableSeeder::class);
        $this->call(TiposempleadoresTableSeeder::class);
        $this->call(RiesgosTableSeeder::class);
        $this->call(EstadoscontratosTableSeeder::class);
        $this->call(EstadostickectsTableSeeder::class);
        $this->call(PrioridadesTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(TiposIncidentesTableSeeder::class);
        $this->call(JefesTableSeeder::class);
        $this->call(ContratosTableSeeder::class);
        $this->call(EstadosAprobacionesTableSeeder::class);
        $this->call(SancionesTableSeeder::class);        
        
    }
}
