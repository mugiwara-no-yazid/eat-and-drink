<?php

namespace Database\Seeders;

use App\Models\Commande;
use App\Models\User;
use App\Models\Stand;
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
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'role' => 'admin',
        //     'statut' => 'activer',
        //     'password' => bcrypt('adminpassword'),
        // ]);

        // $user1 = User::create([
        //     'name' => 'Jean Dupont',
        //     'email' => 'jean.dupont@example.com',
        //     'number' => '0600000001',
        //     'role' => 'user',
        //     'statut' => 'activer',
        //     'password' => bcrypt('password1'),
        // ]);
        // $user2 = User::create([
        //     'name' => 'Marie Martin',
        //     'email' => 'marie.martin@example.com',
        //     'number' => '0600000002',
        //     'role' => 'user',
        //     'statut' => 'activer',
        //     'password' => bcrypt('password2'),
        // ]);
        // $user3 = User::create([
        //     'name' => 'Paul Durand',
        //     'email' => 'paul.durand@example.com',
        //     'number' => '0600000003',
        //     'role' => 'user',
        //     'statut' => 'activer',
        //     'password' => bcrypt('password3'),
        // ]);

        // Stand::create([
        //     'name_stand' => 'Stand Pizza',
        //     'category' => 'Food',
        //     'description' => 'Vente de pizzas artisanales',
        //     'logo' => null,
        //     'proprietaire_id' => $user1->id,
        //     'status' => 'pending',
        // ]);
        // Stand::create([
        //     'name_stand' => 'Stand Boissons',
        //     'category' => 'Drinks',
        //     'description' => 'Boissons fraîches et chaudes',
        //     'logo' => null,
        //     'proprietaire_id' => $user2->id,
        //     'status' => 'pending',
        // ]);
        // Stand::create([
        //     'name_stand' => 'Stand Desserts',
        //     'category' => 'Desserts',
        //     'description' => 'Gâteaux et pâtisseries',
        //     'logo' => null,
        //     'proprietaire_id' => $user3->id,
        //     'status' => 'pending',
        // ]);
        Commande::create([
            'stand_id' => 1,
            'user_id' => 2,
            'details_commande' => '2 burgers, 1 soda',
            'date_commande' => now(),
            'statut' => 'pending'
        ]);
    }
}
