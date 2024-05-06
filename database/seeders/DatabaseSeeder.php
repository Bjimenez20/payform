<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Brayan Jimenez',
            'email' => 'bjimenez@overall.com.co',
            'password' => bcrypt('Bjimenez1234*')
        ]);

        User::factory()->create([
            'name' => 'Carlos Mesia',
            'email' => 'cmesia@overall.com.co',
            'password' => bcrypt('Cmesia1234*')
        ]);

        User::factory()->create([
            'name' => 'Brayan Jimenez',
            'email' => 'bjimenez@app-peoplemarketing.com',
            'password' => bcrypt('Hola1234*')
        ]);
    }
}
