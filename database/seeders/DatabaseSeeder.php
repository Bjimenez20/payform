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
        // User::find(1)->assignRole('Solicitante');
        // User::find(1)->removeRole('Pagador');
        $rol = User::find(1)->getRoleNames();
        dd($rol);
    }
}
