<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Ejecuta un seeder antes de cada test
     *
     */
    protected $seed = true;
}
