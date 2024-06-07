<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Asignar rol
        // User::find(1)->assignRole('Administrador');
        // User::find(2)->assignRole('Solicitante');
        // User::find(3)->assignRole('Pagador');
        // User::find(4)->assignRole('Consultor');

        // Quitar el rol
        // User::find(1)->removeRole('Solicitante');
        // User::find(2)->removeRole('Administrador');
        // User::find(3)->removeRole('Consultor');

        // hacer dd
        // $rol = User::find(1)->getRoleNames();
        // dd($rol);

    }
}
