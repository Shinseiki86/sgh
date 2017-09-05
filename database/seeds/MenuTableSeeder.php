<?php

use Illuminate\Database\Seeder;
use SGH\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderMenu = 0;

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Usuarios y roles',
            'MENU_ICON' => 'fa-user-circle-o',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Usuarios',
                'MENU_URL' => 'auth/usuarios',
                'MENU_ICON' => 'fa-user',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Roles',
                'MENU_URL' => 'auth/roles',
                'MENU_ICON' => 'fa-male',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Permisos',
                'MENU_URL' => 'auth/permisos',
                'MENU_ICON' => 'fa-address-card-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Menú',
                'MENU_URL' => 'auth/menu',
                'MENU_ICON' => 'fa-address-card-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
                'MENU_ENABLED' => true,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Geográficos',
            'MENU_ICON' => 'fa-globe',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Países',
                'MENU_URL' => 'cnfg-geograficos/paises',
                'MENU_ICON' => 'fa-circle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Departamentos',
                'MENU_URL' => 'cnfg-geograficos/departamentos',
                'MENU_ICON' => 'fa-circle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Ciudades',
                'MENU_URL' => 'cnfg-geograficos/ciudades',
                'MENU_ICON' => 'fa-circle-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Contratos',
            'MENU_ICON' => 'fa-handshake-o',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Contratos',
                'MENU_URL' => 'gestion-humana/contratos',
                'MENU_ICON' => 'fa-file-text-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Hojas de Vida',
                'MENU_URL' => 'gestion-humana/prospectos',
                'MENU_ICON' => 'fa-file-text-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Clasificación de ocupaciones',
                'MENU_URL' => 'cnfg-contratos/cnos',
                'MENU_ICON' => 'fa-yelp',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Cargos',
                'MENU_URL' => 'cnfg-contratos/cargos',
                'MENU_ICON' => 'fa-sign-language',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de contratos',
                'MENU_URL' => 'cnfg-contratos/tiposcontratos',
                'MENU_ICON' => 'fa-id-card-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Empresas temporales',
                'MENU_URL' => 'cnfg-contratos/temporales',
                'MENU_ICON' => 'fa-briefcase',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Clases de contratos',
                'MENU_URL' => 'cnfg-contratos/clasescontratos',
                'MENU_ICON' => 'fa-id-card',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de contratos',
                'MENU_URL' => 'cnfg-contratos/estadoscontratos',
                'MENU_ICON' => 'fa-cube',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Motivos de retiro',
                'MENU_URL' => 'cnfg-contratos/motivosretiros',
                'MENU_ICON' => 'fa-hand-o-right',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Organizacionales',
            'MENU_ICON' => 'fa-sitemap',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Empleadores',
                'MENU_URL' => 'cnfg-organizacionales/empleadores',
                'MENU_ICON' => 'fa-black-tie',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Gerencias',
                'MENU_URL' => 'cnfg-organizacionales/gerencias',
                'MENU_ICON' => 'fa-arrows-alt',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Procesos',
                'MENU_URL' => 'cnfg-organizacionales/procesos',
                'MENU_ICON' => 'fa-crosshairs',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Centros de costos',
                'MENU_URL' => 'cnfg-organizacionales/centroscostos',
                'MENU_ICON' => 'fa-money',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de empleadores',
                'MENU_URL' => 'cnfg-organizacionales/tiposempleadores',
                'MENU_ICON' => 'fa-bars',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Riesgos ARL',
                'MENU_URL' => 'cnfg-organizacionales/riesgos',
                'MENU_ICON' => 'fa-fire',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Grupos de Empleados',
                'MENU_URL' => 'cnfg-organizacionales/grupos',
                'MENU_ICON' => 'fa-user-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Turnos',
                'MENU_URL' => 'cnfg-organizacionales/turnos',
                'MENU_ICON' => 'fa-clock-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Plantas Laborales',
                'MENU_URL' => 'cnfg-organizacionales/plantaslaborales',
                'MENU_ICON' => 'fa-area-chart',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipo Entidades',
                'MENU_URL' => 'cnfg-organizacionales/tipoentidades',
                'MENU_ICON' => 'fa-institution',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Entidades',
                'MENU_URL' => 'cnfg-organizacionales/entidades',
                'MENU_ICON' => 'fa-institution',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Tickets Disciplinarios',
            'MENU_ICON' => 'fa-ticket',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Tickets',
                'MENU_URL' => 'cnfg-tickets/tickets',
                'MENU_ICON' => 'fa-id-badge',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Prioridades',
                'MENU_URL' => 'cnfg-tickets/prioridades',
                'MENU_ICON' => 'fa-first-order',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de Ticket',
                'MENU_URL' => 'cnfg-tickets/estadostickets',
                'MENU_ICON' => 'fa-empire',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Sanciones',
                'MENU_URL' => 'cnfg-tickets/sanciones',
                'MENU_ICON' => 'fa-gavel',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de Aprobaciones',
                'MENU_URL' => 'cnfg-tickets/estadosaprobaciones',
                'MENU_ICON' => 'fa-check-circle-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Categorías',
                'MENU_URL' => 'cnfg-tickets/categorias',
                'MENU_ICON' => 'fa-newspaper-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de Incidentes',
                'MENU_URL' => 'cnfg-tickets/tiposincidentes',
                'MENU_ICON' => 'fa-exclamation-triangle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Gestión Humana',
            'MENU_ICON' => 'fa-users',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Validador de TNL',
                'MENU_URL' => 'gestion-humana/helpers/validadorTNL',
                'MENU_ICON' => 'fa-check-square-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Ausentismos',
            'MENU_ICON' => 'fa-bed',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Diagnósticos',
                'MENU_URL' => 'diagnosticos',
                'MENU_ICON' => 'fa-heartbeat',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

            Menu::create([
                'MENU_LABEL' => 'Tipo Ausentismos',
                'MENU_URL' => 'tipoausentismos',
                'MENU_ICON' => 'fa-wrench',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

            Menu::create([
                'MENU_LABEL' => 'Concepto Ausencias',
                'MENU_URL' => 'conceptoausencias',
                'MENU_ICON' => 'fa-wrench',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);


/*                

            Tickets Disciplinarios
                @if(Entrust::can(['ticket-*', 'tkprioridad-*', 'tkestados-*', 'tksancion-*', 'tkaprobacion-*', 'tkcategoria-*', 'tktpincidente-*', ]))

                <!-- Ausentismo -->

                <!-- Geográficos -->
                @if(Entrust::can(['pais-*', 'depart-*', 'ciudad-*', ]))

                <!-- Contratos -->
                @if(Entrust::can(['contrato-*', 'prospecto-*', 'cnos-*', 'cargo-*', 'tipocontrato-*', 'emprtemp-*', 'clasecontrato-*', 'estadocontrato-*', 'motretiro-*']))

                <!-- Organizacionales -->
                @if(Entrust::can(['empleador-*', 'gerencia-*', 'proceso-*', 'ceco-*', 'tipoempleador-*', 'riesgo-*', 'grupo-*', 'turno-*' ]))


*/
        
    }
}
