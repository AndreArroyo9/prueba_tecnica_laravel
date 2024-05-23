<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestingSeeder extends Seeder
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
