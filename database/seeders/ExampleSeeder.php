<?php

namespace Database\Seeders;

use App\Models\Creator;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Aitor',
            'last_name' => 'García',
            'email' => 'aitor@example.com',
            'password' => 'aitor1',
            'password_confirmation' => 'aitor1',
        ]);

        Creator::create([
            'user_id' => $user->id,
        ]);

        Servicio::create([
            'title' => 'Curso de piano',
            'description' => request('description'),
            'price' => number_format((float) request('price'), 2),
            'image' => $file,
            'status' => request('status'), // 1 = public, 0 = private
            'category' => request('category'),
            'creator_id' => Auth::user()->creator->id
        ]);
    }
}
