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
            'MENU_ICON' => 'user-circle-o',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Usuarios',
                'MENU_URL' => 'auth/usuarios',
                'MENU_ICON' => 'user',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Roles',
                'MENU_URL' => 'auth/roles',
                'MENU_ICON' => 'male',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Permisos',
                'MENU_URL' => 'auth/permisos',
                'MENU_ICON' => 'address-card-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Geográficos',
            'MENU_ICON' => 'globe',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Países',
                'MENU_URL' => 'cnfg-geograficos/paises',
                'MENU_ICON' => 'circle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Departamentos',
                'MENU_URL' => 'cnfg-geograficos/departamentos',
                'MENU_ICON' => 'circle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Ciudades',
                'MENU_URL' => 'cnfg-geograficos/ciudades',
                'MENU_ICON' => 'circle-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Contratos',
            'MENU_ICON' => 'handshake-o',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Contratos',
                'MENU_URL' => 'gestion-humana/contratos',
                'MENU_ICON' => 'file-text-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Hojas de Vida',
                'MENU_URL' => 'gestion-humana/prospectos',
                'MENU_ICON' => 'file-text-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Clasificación de ocupaciones',
                'MENU_URL' => 'cnfg-contratos/cnos',
                'MENU_ICON' => 'yelp',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Cargos',
                'MENU_URL' => 'cnfg-contratos/cargos',
                'MENU_ICON' => 'sign-language',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de contratos',
                'MENU_URL' => 'cnfg-contratos/tiposcontratos',
                'MENU_ICON' => 'id-card-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Empresas temporales',
                'MENU_URL' => 'cnfg-contratos/temporales',
                'MENU_ICON' => 'briefcase',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Clases de contratos',
                'MENU_URL' => 'cnfg-contratos/clasescontratos',
                'MENU_ICON' => 'id-card',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de contratos',
                'MENU_URL' => 'cnfg-contratos/estadoscontratos',
                'MENU_ICON' => 'cube',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Motivos de retiro',
                'MENU_URL' => 'cnfg-contratos/motivosretiros',
                'MENU_ICON' => 'hand-o-right',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Organizacionales',
            'MENU_ICON' => 'sitemap',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Empleadores',
                'MENU_URL' => 'cnfg-organizacionales/empleadores',
                'MENU_ICON' => 'black-tie',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Gerencias',
                'MENU_URL' => 'cnfg-organizacionales/gerencias',
                'MENU_ICON' => 'arrows-alt',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Procesos',
                'MENU_URL' => 'cnfg-organizacionales/procesos',
                'MENU_ICON' => 'crosshairs',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Centros de costos',
                'MENU_URL' => 'cnfg-organizacionales/centroscostos',
                'MENU_ICON' => 'money',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de empleadores',
                'MENU_URL' => 'cnfg-organizacionales/tiposempleadores',
                'MENU_ICON' => 'bars',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Riesgos ARL',
                'MENU_URL' => 'cnfg-organizacionales/riesgos',
                'MENU_ICON' => 'fire',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Grupos de Empleados',
                'MENU_URL' => 'cnfg-organizacionales/grupos',
                'MENU_ICON' => 'user-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Turnos',
                'MENU_URL' => 'cnfg-organizacionales/turnos',
                'MENU_ICON' => 'clock-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Plantas Laborales',
                'MENU_URL' => 'cnfg-organizacionales/plantaslaborales',
                'MENU_ICON' => 'area-chart',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipo Entidades',
                'MENU_URL' => 'cnfg-organizacionales/tipoentidades',
                'MENU_ICON' => 'institution',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Entidades',
                'MENU_URL' => 'cnfg-organizacionales/entidades',
                'MENU_ICON' => 'institution',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Tickets Disciplinarios',
            'MENU_ICON' => 'ticket',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Tickets',
                'MENU_URL' => 'cnfg-tickets/tickets',
                'MENU_ICON' => 'id-badge',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Prioridades',
                'MENU_URL' => 'cnfg-tickets/prioridades',
                'MENU_ICON' => 'first-order',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de Ticket',
                'MENU_URL' => 'cnfg-tickets/estadostickets',
                'MENU_ICON' => 'empire',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Sanciones',
                'MENU_URL' => 'cnfg-tickets/sanciones',
                'MENU_ICON' => 'gavel',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Estados de Aprobaciones',
                'MENU_URL' => 'cnfg-tickets/estadosaprobaciones',
                'MENU_ICON' => 'check-circle-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Categorías',
                'MENU_URL' => 'cnfg-tickets/categorias',
                'MENU_ICON' => 'newspaper-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);
            Menu::create([
                'MENU_LABEL' => 'Tipos de Incidentes',
                'MENU_URL' => 'cnfg-tickets/tiposincidentes',
                'MENU_ICON' => 'exclamation-triangle',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Gestión Humana',
            'MENU_ICON' => 'users',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Validador de TNL',
                'MENU_URL' => 'gestion-humana/helpers/validadorTNL',
                'MENU_ICON' => 'check-square-o',
                'MENU_PARENT' => $parent->MENU_ID,
                'MENU_ORDER' => $orderItem++,
            ]);

        $orderItem = 0;
        $parent = Menu::create([
            'MENU_LABEL' => 'Ausentismos',
            'MENU_ICON' => 'bed',
            'MENU_ORDER' => $orderMenu++,
        ]);
            Menu::create([
                'MENU_LABEL' => 'Diagnósticos',
                'MENU_URL' => 'diagnosticos',
                'MENU_ICON' => 'heartbeat',
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
