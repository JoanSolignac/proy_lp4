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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            EmpleadoSeeder::class,
        ]);

        // Crea usuarios directamente usando el factory
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'adminsm@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('1234567890'), // Asegúrate de encriptar la contraseña
        ]);
    }
}
