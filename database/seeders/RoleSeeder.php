<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createrole();
        $this->createpermission();
        $this->createrolehaspermissions();
    }

    public function createrole()
    {
        $roles = [
            [
                'name' => 'Administrador',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Solicitante',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Pagador',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Consultor',
                'guard_name' => 'web'
            ]
        ];

        foreach ($roles as $rol) {
            Role::create($rol);
        }
    }

    public function createpermission()
    {
        $permissions = [
            [
                'name' => 'payment.edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'payment.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'state.edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'other.payment',
                'guard_name' => 'web'
            ],
            [
                'name' => 'payment.list',
                'guard_name' => 'web'
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }

    public function createrolehaspermissions()
    {
        $permissionsAdmin = Permission::all();
        $rolesAdmin = Role::find(1);
        $rolesAdmin->permissions()->sync($permissionsAdmin);

        $rolesSolicitante = Role::find(2);
        $rolesSolicitante->permissions()->sync([1, 5]);

        $permissionsPagador = Permission::all();
        $rolesPagador = Role::find(3);
        $rolesPagador->permissions()->sync($permissionsPagador);

        $rolesConsultor = Role::find(4);
        $rolesConsultor->permissions()->sync([1, 3, 4, 5]);
    }
}
