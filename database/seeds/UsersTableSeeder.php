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

                $this->createPermissions('usuarios', 'usuarios', null,  true, false);
                $this->createPermissions('permisos', 'permisos', null, true, false);
                $this->createPermissions('roles', 'roles', null, true, false);
                $this->createPermissions('cargos', 'cargos');
                $this->createPermissions('tipocontrato', 'tipos de contrato');
                $this->createPermissions('temporales', 'empresas temporales');
                $this->createPermissions('cnos', 'clasificaciones de ocupación (CNOS)');
                $this->createPermissions('jefes', 'jefes');
                $this->createPermissions('clasecontrato', 'clases de contratos');
                $this->createPermissions('estadocontrato', 'estados de contratos');
                $this->createPermissions('motretiro', 'motivo de retiro');
                $this->createPermissions('grupo', 'grupos');
                $this->createPermissions('turno', 'turnos');
                $this->createPermissions('empleador', 'empleadores');
                $this->createPermissions('gerencia', 'gerencias');
                $this->createPermissions('proceso', 'procesos');
                $this->createPermissions('ceco', 'centros de costo');
                $this->createPermissions('tipoemple', 'tipos de empleador');
                $this->createPermissions('riesgoarl', 'riesgos de ARL');
                $this->createPermissions('pais', 'pais');
                $this->createPermissions('depart', 'departamentos');
                $this->createPermissions('ciudad', 'ciudades');
                $this->createPermissions('prospecto', 'hojas de vida');
                $this->createPermissions('contrato', 'contratos');
                $this->createPermissions('plantaslaborales', 'plantas laborales');
                //$this->createPermissions('VALIDADOR DE TNL', 'VALIDADOR DE TNL');
                $this->createPermissions('tkprioridad', 'prioridades ticket');
                $this->createPermissions('tkestados', 'estados ticket');
                $this->createPermissions('tkaprobacion', 'estados aprobaciones');
                $this->createPermissions('tkcategoria', 'categorías ticket');
                $this->createPermissions('tksancion', 'categorías ticket');
                $this->createPermissions('tktpincidente', 'tipo incidente ticket');
                $perms = $this->createPermissions('ticket', 'tickets');
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
                    'email' => 'admin@example.com',
                    'password'  => \Hash::make($pass)
                ]);
                // role attach alias
                $admin->attachRole($this->rolAdmin); // parameter can be an Role object, array, or id
                // or eloquent's original technique
                //$admin->roles()->attach($this->rolAdmin->id); // id only

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
                    'email' => 'gesthum1@example.com',
                    'password'  => \Hash::make($pass)
                ]);
                $gesthum1->attachRole($this->rolGestHum);

                $gesthum2 = User::create( [
                    'name' => 'Gestión humana 2 de prueba',
                    'cedula' => 1144173742,
                    'username' => 'gesthum2',
                    'email' => 'gesthum2@example.com',
                    'password'  => \Hash::make($pass)
                ]);
                $gesthum2->attachRole($this->rolGestHum);

                //5 usuarios faker
                //$USERS = factory(SGH\User::class)->times(5)->create();

		}

        private function createPermissions($name, $display_name, $description = null, $attachAdmin=true, $attachGestHum=true)
        {
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