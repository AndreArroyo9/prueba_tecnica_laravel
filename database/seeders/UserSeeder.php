<?php

namespace Database\Seeders;

use App\Models\Creator;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Crea 4 usuarios y les asigna 2 servicios creados por cada uno.
     */
    public function run(): void
    {
        User::factory(4)
            ->has(Creator::factory()
                    ->has(Servicio::factory(2))
            )->create();
    }
}
