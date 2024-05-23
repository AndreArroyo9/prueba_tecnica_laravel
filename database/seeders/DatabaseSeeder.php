<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Crea 2 usuarios y les asigna 2 servicios creados por cada uno.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
    }
}
