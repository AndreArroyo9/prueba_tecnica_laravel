<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Creator;
use App\Models\Customer;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario aitor
        $user = User::factory()->create([
            'name' => 'Aitor',
            'last_name' => 'García',
            'email' => 'aitor@example.com',
            'password' => bcrypt('aitor1'),
        ]);

        $creator = Creator::create([
            'user_id' => $user->id,
        ]);

        Customer::create([
            'user_id' => $user->id,
        ]);

        Servicio::create([
            'title' => 'Curso de piano',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 20.50,
            'image' => 'images/piano.png',
            'status' => 1, // 1 = public, 0 = private
            'category' => 'Música',
            'creator_id' => $creator->id
        ]);

        Servicio::create([
            'title' => 'Curso de piano privado',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 12,
            'image' => 'images/piano2.jpg',
            'status' => 0, // 1 = public, 0 = private
            'category' => 'Música',
            'creator_id' => $creator->id
        ]);

        // Usuario nerea
        $user = User::factory()->create([
            'name' => 'Nerea',
            'last_name' => 'García',
            'email' => 'nerea@example.com',
            'password' => bcrypt('nerea1'),
        ]);

        $creator = Creator::create([
            'user_id' => $user->id,
        ]);

        Customer::create([
            'user_id' => $user->id,
        ]);

        Servicio::create([
            'title' => 'Aprende a programar en JavaScript',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 11.99,
            'image' => 'images/java.jpg',
            'status' => 1, // 1 = public, 0 = private
            'category' => 'Tecnología',
            'creator_id' => $creator->id
        ]);


        // Usuario María
        $user = User::factory()->create([
            'name' => 'María',
            'last_name' => 'García',
            'email' => 'maria@example.com',
            'password' => bcrypt('maria1'),
        ]);

        $creator = Creator::create([
            'user_id' => $user->id,
        ]);

        Customer::create([
            'user_id' => $user->id,
        ]);

        Servicio::create([
            'title' => 'Aumenta tu resistencia en 4 semanas',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 18,
            'image' => 'images/deporte.jpg',
            'status' => 1, // 1 = public, 0 = private
            'category' => 'Deportes',
            'creator_id' => $creator->id
        ]);


        Servicio::create([
            'title' => 'Maneja linux como un pro',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 27.99,
            'image' => 'images/linux.webp',
            'status' => 1, // 1 = public, 0 = private
            'category' => 'Tecnología',
            'creator_id' => $creator->id
        ]);

        Servicio::create([
            'title' => 'Aumenta tu resistencia en 4 semanas curso privado',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 10,
            'image' => 'images/deporte.jpg',
            'status' => 0, // 1 = public, 0 = private
            'category' => 'Deportes',
            'creator_id' => $creator->id
        ]);

        // Usuario admin
        $user = User::factory()->create([
            'name' => 'Admin',
            'last_name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin1'),
        ]);

        Admin::create([
            'user_id' => $user->id
        ]);

    }
}
