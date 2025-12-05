<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'super-admin',
            'admin',
            'ceo',
            'cmo',
            'cto',
            'cfo',
            'coo'
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }

        $permission_map = [

            'super-admin' => [
                'users' => ['view', 'create', 'edit', 'delete', 'export'],
                'roles' => ['view', 'create', 'edit', 'delete'],
                'settings' => ['view', 'edit'],
                'failed_jobs' => ['view', 'retry', 'delete'],
            ],

            'ceo' => [
                'dashboards' => ['view', 'export'],
                'reports' => ['view', 'export'],
                'company_overview' => ['view'],
            ],

            'coo' => [
                'workflows' => ['view', 'create', 'edit', 'delete'],
                'shipments' => ['view', 'create', 'edit', 'delete'],
                'operations_reports' => ['view', 'export'],
            ],

            'cto' => [
                'servers' => ['view', 'deploy', 'edit', 'delete'],
                'jobs' => ['view', 'retry', 'delete'],
                'logs' => ['view', 'export'],
            ],

            'cmo' => [
                'campaigns' => ['view', 'create', 'edit', 'delete', 'export'],
                'leads' => ['view', 'export'],
                'assets' => ['view', 'upload', 'delete'],
            ],

            'cfo' => [
                'invoices' => ['view', 'create', 'edit', 'delete', 'export'],
                'budgets' => ['view', 'edit', 'export'],
                'payments' => ['view', 'export'],
            ],
        ];

        foreach ($permission_map as $panel => $resources) {
            foreach ($resources as $resource => $actions) {
                foreach ($actions as $action) {
                    $name = "{$panel}.{$resource}.{$action}";
                    Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
                }
            }
        }

        $superRole = Role::where('name', 'super-')->first();
        Permission::all()->each(function ($p) use ($superRole) {
            $superRole->givePermissionTo($p);
        });

        // CEO -> only CEO panel permissions
        $ceoRole = Role::where('name', 'ceo')->first();
        Permission::where('name', 'like', 'ceo.%')->get()->each(function ($p) use ($ceoRole) {
            $ceoRole->givePermissionTo($p);
        });

        // COO
        $cooRole = Role::where('name', 'coo')->first();
        Permission::where('name', 'like', 'coo.%')->get()->each(function ($p) use ($cooRole) {
            $cooRole->givePermissionTo($p);
        });

        // CTO
        $ctoRole = Role::where('name', 'cto')->first();
        Permission::where('name', 'like', 'cto.%')->get()->each(function ($p) use ($ctoRole) {
            $ctoRole->givePermissionTo($p);
        });

        // CMO
        $cmoRole = Role::where('name', 'cmo')->first();
        Permission::where('name', 'like', 'cmo.%')->get()->each(function ($p) use ($cmoRole) {
            $cmoRole->givePermissionTo($p);
        });

        // CFO
        $cfoRole = Role::where('name', 'cfo')->first();
        Permission::where('name', 'like', 'cfo.%')->get()->each(function ($p) use ($cfoRole) {
            $cfoRole->givePermissionTo($p);
        });


        $admins = [
            [
                'name' => 'Mwangi Ian',
                'email' => 'elvisrockfield@gmail.com',
                'roles' => ['admin', 'super-admin'],
                'phone' => '+25472421866'
            ],
            [
                'name' => 'Meshack Ayaga',
                'email' => 'meshack.ayaga@boostke.co.ke',
                'roles' => ['admin', 'ceo'],
                'phone' => '+254798917486'
            ],
            [
                'name' => 'Ezborn Maina',
                'email' => 'ezzymaina8150@gmail.com',
                'roles' => ['admin', 'cmo'],
                'phone' => '+254794728976'
            ],
            [
                'name' => 'Francis Ng\'ang\'a',
                'email' => 'francis@boost.co.ke',
                'roles' => ['admin', 'cto'],
                'phone' => '0793710713'
            ],
            [
                'name' => 'Phanice Winfred',
                'email' => 'phanicewinfred@gmail.com',
                'roles' => ['admin', 'cfo'],
                'phone' => '+254112959901'
            ],
            [
                'name' => 'Victor Mulunda',
                'email' => 'victormulunda98@gmail.com',
                'roles' => ['admin', 'coo'],
                'phone' => '+254110569933'
            ]
        ];

        foreach ($admins as $admin) {
            $user = User::firstOrCreate(
                [
                    'email' => $admin['email']
                ],
                [
                    'name' => $admin['name'],
                    'password' => bcrypt('password'),
                    'phone' => $admin['phone']
                ]
            );
            $user->assignRole($admin['roles']);
        }
    }
}
