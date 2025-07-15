<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un utilisateur de test (optionnel)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'client', // ou 'user' selon ton système
            'password' => Hash::make('password'),
        ]);

        // ✅ Création de l'utilisateur admin par défaut
        User::updateOrCreate(
            ['email' => 'admin@immo.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );
    }
}
