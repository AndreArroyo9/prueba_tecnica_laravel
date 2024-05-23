<?php

namespace Tests;

use Database\Seeders\TestingSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Ejecuta el DatabaseSeeder antes de cada test
     *
     */
     protected $seeder = TestingSeeder::class;
}
