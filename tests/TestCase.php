<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Ejecuta el DatabaseSeeder antes de cada test
     *
     */
     protected $seed = true;
}
