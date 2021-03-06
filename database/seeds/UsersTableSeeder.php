<?php
	
use Illuminate\Database\Seeder;
use SGH\Models\User;
use SGH\Models\Role;
use SGH\Models\Permission;

	class UsersTableSeeder extends Seeder {

        private $rolOwner;
        private $rolAdmin;
        private $rolGestHum;


		public function run() {

            $pass = '123';
            $date = \Carbon\Carbon::now()->toDateTimeString();
            //$faker = Faker\Factory::create('es_ES');

            $this->command->info('--- Seeder Creación de Roles');

                $this->rolOwner = Role::create([
                    'name'         => 'owner',
                    'display_name' => 'Project Owner',
                    'description'  => 'User is the owner of a given project',
                ]);
                $this->rolAdmin = Role::create([
                    'name'         => 'admin',
                    'display_name' => 'Administrador',
                    'description'  => 'User is allowed to manage and edit other users',
                ]);
                $this->rolGestHum = Role::create([
                    'name'         => 'gesthum',
                    'display_name' => 'Gestión Humana',
                    //'description'  => 'Comentario',
                ]);
                $rolSuperOper = Role::create([
                    'name'         => 'superoper',
                    'display_name' => 'Supervisor Operaciones',
                    //'description'  => 'Comentario',
                ]);
                $rolCoorOper = Role::create([
                    'name'         => 'cooroper',
                    'display_name' => 'Coordinador Operaciones',
                    //'description'  => 'Comentario',
                ]);

            $this->command->info('--- Seeder Creación de Permisos');


                $menu = Permission::create([
                    'name'         => 'app-menu',
                    'display_name' => 'Administrar menú',
                    'description'  => 'Permite crear, eliminar y ordenar el menú del sistema.',
                ]);
                $parameters = Permission::create([
                    'name'         => 'app-parameters',
                    'display_name' => 'Administrar parámetros',
                    'description'  => 'Permite crear, eliminar y ordenar los parámetros del sistema.',
                ]);
                $uploads = Permission::create([
                    'name'         => 'app-upload',
                    'display_name' => 'Cargas masivas',
                    'description'  => '¡CUIDADO! Permite realizar cargas masivas de datos en el sistema.',
                ]);
                $this->rolOwner->attachPermissions([$menu, $parameters, $uploads]);

                $reportes = Permission::create([
                    'name'         => 'reportes',
                    'display_name' => 'Reportes',
                    'description'  => 'Permite ejecutar reportes y exportarlos.',
                ]);
                $this->rolOwner->attachPermission($reportes);
                $this->rolAdmin->attachPermission($reportes);
                $this->rolGestHum->attachPermission($reportes);

                $this->createPermissions(User::class, 'usuarios', null,  true, false);
                $this->createPermissions(Permission::class, 'permisos', null, true, false);
                $this->createPermissions(Role::class, 'roles', null, true, false);

                $this->createPermissions(Pais::class, 'países');
                $this->createPermissions(Departamento::class, 'departamentos');
                $this->createPermissions(Ciudad::class, 'ciudades');

                $this->createPermissions(Cargo::class, 'cargos');
                $this->createPermissions(TipoContrato::class, 'tipos de contrato');
                $this->createPermissions(Temporal::class, 'empresas temporales');
                $this->createPermissions(Cno::class, 'clasificaciones de ocupación (CNOS)');
                $this->createPermissions(Jefe::class, 'jefes');
                $this->createPermissions(ClaseContrato::class, 'clases de contratos');
                $this->createPermissions(EstadoContrato::class, 'estados de contratos');
                $this->createPermissions(MotivoRetiro::class, 'motivo de retiro');
                $this->createPermissions(Negocio::class, 'negocios');
                $this->createPermissions(Atributo::class, 'atributos');
                $this->createPermissions(EmpleadoAtributo::class, 'atributos x empleado');

                $this->createPermissions(Grupo::class, 'grupos');
                $this->createPermissions(Turno::class, 'turnos');
                $this->createPermissions(Empleador::class, 'empleadores');
                $this->createPermissions(Gerencia::class, 'gerencias');
                $this->createPermissions(Proceso::class, 'procesos');
                $this->createPermissions(PlantaLaboral::class, 'plantas laborales');
                $this->createPermissions(MovimientoPlanta::class, 'movimientos de plantas');
                $this->createPermissions(CentroCosto::class, 'centros de costo');
                $this->createPermissions(TipoEmpleador::class, 'tipos de empleador');
                $this->createPermissions(Riesgo::class, 'riesgos de ARL');
                $this->createPermissions(Entidad::class, 'entidades');
                $this->createPermissions(TipoEntidad::class, 'tipo entidades');

                $this->createPermissions(Prospecto::class, 'hojas de vida');
                $this->createPermissions(Contrato::class, 'contratos');
                $tnl = Permission::create([
                    'name'         => 'tnl',
                    'display_name' => 'Validador de TNL',
                    'description'  => 'Permite realizar ...',
                ]);
                $this->rolGestHum->attachPermissions([$tnl]);

                $this->createPermissions(Prioridad::class, 'prioridades ticket');
                $this->createPermissions(EstadoTicket::class, 'estados ticket');
                $this->createPermissions(EstadoAprobacion::class, 'estados aprobaciones');
                $this->createPermissions(Categoria::class, 'categorías ticket');
                $this->createPermissions(Sancion::class, 'categorías ticket');
                $this->createPermissions(TipoIncidente::class, 'tipo incidente ticket');

                $this->createPermissions(Ausentismo::class, 'Ausentismo');
                $this->createPermissions(ConceptoAusencia::class, 'Concepto Ausencia');
                $this->createPermissions(Diagnostico::class, 'Diagnostico');
                $this->createPermissions(TipoAusentismo::class, 'Tipo de Ausentismo');
                $this->createPermissions(ProrrogaAusentismo::class, 'Prorroga Ausentismo');

                $this->createPermissions(DiagnosticoGeneral::class, 'DX Generales');
                $this->createPermissions(EstadoRestriccion::class, 'Estados de Restricción');
                $this->createPermissions(CasoMedico::class, 'Casos Médicos');
                $this->createPermissions(NovedadMedica::class, 'Novedades de Seguimiento');
                
                $perms = $this->createPermissions(Ticket::class, 'tickets');
                $rolSuperOper->attachPermissions([
                    $perms['index'],
                    $perms['create'],
                    $perms['edit'],
                ]);
                $rolCoorOper->attachPermissions([
                    $perms['index'],
                    $perms['create'],
                    $perms['edit'],
                ]);



            $this->command->info('--- Seeder Creación de Usuarios prueba');

                //Admin
                $admin = User::create( [
                    'name' => 'Administrador',
                    'cedula' => 1144173746,
                    'username' => 'admin',
                    'email' => 'sghmasterpromo@gmail.com',
                    'password'  => \Hash::make($pass)
                ]);
                $admin->attachRole($this->rolAdmin); 

                //Owner
                $owner = User::create( [
                    'name' => 'Owner',
                    'cedula' => 1144173745,
                    'username' => 'owner',
                    'email' => 'diegoarmandocortes@outlook.com',
                    'password'  => \Hash::make('Side102')
                ]);
                $owner->attachRole($this->rolOwner);

                //Owner
                $owner = User::create( [
                    'name' => 'Owner1',
                    'cedula' => 1144173744,
                    'username' => 'owner1',
                    'email' => 'rodriguez221293@outlook.com',
                    'password'  => \Hash::make($pass)
                ]);
                $owner->attachRole($this->rolOwner);

                //Editores
                $gesthum1 = User::create( [
                    'name' => 'Gestión humana 1 de prueba',
                    'cedula' => 1144173743,
                    'username' => 'gesthum1',
                    'email' => 'eva360.uniajc@gmail.com',
                    'password'  => \Hash::make($pass)
                ]);
                $gesthum1->attachRole($this->rolGestHum);

                $super = User::create( [
                    'name' => 'Supervisor de prueba',
                    'cedula' => 12235,
                    'username' => 'superoper',
                    'email' => 'superoper@gmail.com',
                    'password'  => \Hash::make($pass)
                ]);
                $super->attachRole($rolSuperOper);

                $coordi = User::create( [
                    'name' => 'Coordinador de prueba',
                    'cedula' => 12236,
                    'username' => 'coordi',
                    'email' => 'coordi@gmail.com',
                    'password'  => \Hash::make($pass)
                ]);
                $coordi->attachRole($rolCoorOper);

                //5 usuarios faker
                //$USERS = factory(SGH\User::class)->times(5)->create();

		}

        private function createPermissions($name, $display_name, $description = null, $attachAdmin=true, $attachGestHum=true)
        {
            $name = strtolower(basename($name));

            if($description == null)
                $description = $display_name;

            $create = Permission::create([
                'name'         => $name.'-create',
                'display_name' => 'Crear '.$display_name,
                'description'  => 'Crear '.$description,
            ]);
            $edit = Permission::create([
                'name'         => $name.'-edit',
                'display_name' => 'Editar '.$display_name,
                'description'  => 'Editar '.$description,
            ]);
            $index = Permission::create([
                'name'         => $name.'-index',
                'display_name' => 'Listar '.$display_name,
                'description'  => 'Listar '.$description,
            ]);
            $delete = Permission::create([
                'name'         => $name.'-delete',
                'display_name' => 'Borrar '.$display_name,
                'description'  => 'Borrar '.$description,
            ]);

            if($attachAdmin)
                $this->rolAdmin->attachPermissions([$index, $create, $edit, $delete]);

            if($attachGestHum)
                $this->rolGestHum->attachPermissions([$index, $create, $edit]);

            return compact('create', 'edit', 'index', 'delete');
        }

	}