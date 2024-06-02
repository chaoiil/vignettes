<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Vérifie si l'utilisateur avec l'adresse e-mail existe déjà
        $existingUser = User::where('email', 'test@example.com')->first();

        // Si l'utilisateur n'existe pas, crée-le
        if (!$existingUser) {
            \App\Models\User::factory()->create([
                'name' => 'TestUser',
                'email' => 'test@example.com',
            ]);
        }

        $this->call(RolesTableSeeder::class); 
        $this->call(CategorySeeder::class); 
    }
}
